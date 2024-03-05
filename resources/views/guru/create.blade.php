@extends('layouts.main')
@section('content')
    <div class="container-form">
        <center>
            <h2>Tambah Data Guru</h2>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif
        </center>

        <form action="/guru/store" method="post">
            @csrf
            <label for="">NIP</label>
            <input type="text" name="nip">

            <label for="">Nama Guru</label>
            <input type="text" name="nama_guru">

            <label for="">Jenis Kelamin</label>
            <input type="radio" name="jk" value="L">Laki-Laki
            <input type="radio" name="jk" value="P">Perempuan

            <label for="">Alamat</label>
            <textarea name="alamat" rows="5"></textarea>

            <label for="">Password</label>
            <input type="password" name="password">

            <button type="submit" class="button-submit">Simpan</button>
        </form>
    </div>
@endsection
