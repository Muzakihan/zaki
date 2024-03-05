@extends('layouts.main')
@section('content')
    <center>
        <b>
            <h2>List Data Nilai</h2>
            @if (session('role') == 'Guru')
                <a href="/nilai/create/{{ $idKelas }}" class="button-primary">Tambah Data</a>
            @endif
            @if (session('success'))
                <div class="alert alert-success"><span class="closebtn" id="closeBtn">&times;</span>{{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger"><span class="closebtn" id="closeBtn">&times;</span>{{ session('error') }}
                </div>
            @endif

            <table class="table-data">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>GURU MAPEL</th>
                        <th>KELAS</th>
                        <th>NAMA SISWA</th>
                        <th>UH</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>NA</th>
                        @if (session('role') == 'Guru')
                            <th>ACITON</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nilai as $each)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $each->mengajar->guru->nama_guru }} {{ $each->mengajar->mapel->nama_mapel }}</td>
                            <td>{{ $each->mengajar->kelas->kelas }} {{ $each->mengajar->kelas->jurusan }}
                                {{ $each->mengajar->kelas->rombel }}</td>
                            <td>{{ $each->siswa->nama_siswa }}</td>
                            <td>{{ $each->uh }}</td>
                            <td>{{ $each->uts }}</td>
                            <td>{{ $each->uas }}</td>
                            <td>{{ $each->na }}</td>
                            @if (session('role') == 'Guru')
                                <td>
                                    <a href="/nilai/edit/{{ $idKelas }}/{{ $each->id }}" class="button-warning">Edit</a>
                                    <a href="/nilai/destroy/{{ $each->id }}" class="button-danger"
                                        onclick="return confirm('Yakin Hapus?')">Hapus</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </b>
    </center>
@endsection
