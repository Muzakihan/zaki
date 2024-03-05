@extends('layouts.main')
@section('content')
    <div class="container-form">
        <center>
            <h2>Tambah Data Siswa</h2>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif
        </center>

        <form action="/siswa/store" method="post">
            @csrf
            <label for="">NIS</label>
            <input type="text" name="nis">

            <label for="">Nama Siswa</label>
            <input type="text" name="nama_siswa">

            <label for="">Jenis Kelamin</label>
            <input type="radio" name="jk" value="L">Laki-Laki
            <input type="radio" name="jk" value="P">Perempuan

            <label for="">Alamat</label>
            <textarea name="alamat" rows="5"></textarea>

            <label for="">Kelas</label>
            <select name="kelas_id">
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->jurusan }} {{ $k->rombel }}</option>
                @endforeach
            </select>

            <label for="">Password</label>
            <input type="password" name="password">

            <button type="submit" class="button-submit">Simpan</button>
        </form>
    </div>
@endsection
