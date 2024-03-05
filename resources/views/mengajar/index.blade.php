@extends('layouts.main')
@section('content')
    <center>
        <b>
            <h2>List Data Mengajar</h2>
            <a href="/mengajar/create" class="button-primary">Tambah Data</a>
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
                        <th>NAMA GURU</th>
                        <th>MATA PELAJARAN</th>
                        <th>KELAS</th>
                        <th>ACITON</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mengajar as $m)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $m->guru->nama_guru }}</td>
                            <td>{{ $m->mapel->nama_mapel }}</td>
                            <td>{{ $m->kelas->kelas }} {{ $m->kelas->jurusan }} {{ $m->kelas->rombel }}</td>
                            <td>
                                <a href="/mengajar/edit/{{ $m->id }}" class="button-warning">Edit</a>
                                <a href="/mengajar/destroy/{{ $m->id }}" class="button-danger"
                                    onclick="return confirm('Yakin Hapus?')">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </b>
    </center>
@endsection
