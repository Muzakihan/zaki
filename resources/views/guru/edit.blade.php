@extends('layouts.main')
@section('content')
    <div class="container-form">
        <center>
            <h2>Edit Data Guru</h2>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif
        </center>

        <form action="/guru/update/{{ $guru->id }}" method="post">
            @csrf
            <label for="">NIP</label>
            <input type="text" name="nip" value="{{ $guru->nip }}">

            <label for="">Nama Guru</label>
            <input type="text" name="nama_guru" value="{{ $guru->nama_guru }}">

            <label for="">Jenis Kelamin</label>
            <input type="radio" name="jk" value="L" {{ $guru->jk == 'L' ? 'checked' : '' }}>Laki-Laki
            <input type="radio" name="jk" value="P" {{ $guru->jk == 'P' ? 'checked' : '' }}>Perempuan

            <label for="">Alamat</label>
            <textarea name="alamat" rows="5">{{ $guru->alamat }}</textarea>

            <label for="">Password</label>
            <input type="password" name="password" value="{{ $guru->password }}">

            <button type="submit" class="button-submit">Ubah</button>
        </form>
    </div>
@endsection
