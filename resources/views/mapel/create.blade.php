@extends('layouts.main')
@section('content')
    <div class="container-form">
        <center>
            <h2>Tambah Data Mapel</h2>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif
        </center>

        <form action="/mapel/store" method="post">
            @csrf
            <label for="">Mata Pelajaran</label>
            <input type="text" name="nama_mapel">

            <button type="submit" class="button-submit">Simpan</button>
        </form>
    </div>
@endsection
