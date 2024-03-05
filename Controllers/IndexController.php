<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function home()
    {
        return view('home');
    }

    public function Admin(Request $request)
    {
        $admin = Administrator::where('id_admin', $request->id_admin)
            ->where('password', $request->password)
            ->first();
        if (!$admin) {
            return back()->with('error', 'ID Admin atau Password Salah');
        }

        session([
            'role' => 'Admin',
        ]);

        return redirect('/home');
    }

    public function Guru(Request $request)
    {
        $guru = Guru::where('nip', $request->nip)
            ->where('password', $request->password)
            ->first();
        if (!$guru) {
            return back()->with('error', 'NIP atau Password Salah');
        }

        session([
            'role' => 'Guru',
            'nama' => $guru->nama_guru,
            'id' => $guru->id
        ]);

        return redirect('/home');
    }

    public function Siswa(Request $request)
    {
        $siswa = Siswa::where('nis', $request->nis)
            ->where('password', $request->password)
            ->first();
        if (!$siswa) {
            return back()->with('error', 'NIS atau Password Salah');
        }

        session([
            'role' => 'Siswa',
            'nama' => $siswa->nama_siswa,
            'id' => $siswa->id
        ]);

        return redirect('/home');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();

        return redirect('/');
    }
}
