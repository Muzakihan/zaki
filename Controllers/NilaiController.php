<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mengajar;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('role') == 'Guru') {
            $kelasIds = Mengajar::where('guru_id', session('id'))->pluck('kelas_id')->toArray();
            $kelas = Kelas::whereIn('id', $kelasIds)->get();
            return view('nilai.menu', compact('kelas'));
        } else {
            $nilai = Nilai::where('siswa_id', session('id'))->get();
            return view('nilai.index', compact('nilai'));
        }
    }

    public function kelas(Kelas $kelas)
    {
        $idGuru = session('id');
        $idKelas = $kelas->id;
        $nilai = Nilai::whereHas('mengajar', function ($query) use ($idGuru, $idKelas) {
            $query->where('guru_id', $idGuru)->where('kelas_id', $idKelas);
        })->get();
        return view('nilai.index', compact('nilai', 'idKelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Kelas $kelas)
    {
        $idKelas = $kelas->id;
        $mengajar = Mengajar::where('guru_id', session('id'))->where('kelas_id', $idKelas)->get();
        $siswa = Siswa::where('kelas_id', $idKelas)->get();

        return view('nilai.create', compact('idKelas', 'mengajar', 'siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Kelas $kelas)
    {
        $data = $request->validate([
            'mengajar_id' => ['required'],
            'siswa_id' => ['required'],
            'uh' => ['required', 'numeric'],
            'uts' => ['required', 'numeric'],
            'uas' => ['required', 'numeric'],
        ]);
        $data['na'] = round(($request->uh + $request->uts + $request->uas) / 3);

        $cek = Nilai::where('mengajar_id', $request->mengajar_id)->where('siswa_id', $request->siswa_id)->first();
        if ($cek) {
            return back()->with('error', 'Data Yang Anda Masukan Sudah Ada');
        }
        Nilai::create($data);
        return redirect("/nilai/kelas/$kelas->id")->with('success', 'Data Nilai Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas, Nilai $nilai)
    {
        $idKelas = $kelas->id;
        $mengajar = Mengajar::where('guru_id', session('id'))->where('kelas_id', $idKelas)->get();
        $siswa = Siswa::where('kelas_id', $idKelas)->get();

        return view('nilai.edit', compact('idKelas', 'mengajar', 'siswa', 'nilai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas, Nilai $nilai)
    {
        $data = $request->validate([
            'mengajar_id' => ['required'],
            'siswa_id' => ['required'],
            'uh' => ['required', 'numeric'],
            'uts' => ['required', 'numeric'],
            'uas' => ['required', 'numeric'],
        ]);
        $data['na'] = round(($request->uh + $request->uts + $request->uas) / 3);

        if ($request->mengajar_id != $nilai->mengajar_id || $request->siswa_id != $nilai->siswa_id) {
            $cek = Nilai::where('mengajar_id', $request->mengajar_id)->where('siswa_id', $request->siswa_id)->first();
            if ($cek) {
                return back()->with('error', 'Data Yang Anda Masukan Sudah Ada');
            }
        }
        $nilai->update($data);
        return redirect("/nilai/kelas/$kelas->id")->with('success', 'Data Nilai Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
        return back()->with('success', 'Data Nilai Berhasil di Hapus');
    }
}
