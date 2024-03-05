@extends('layouts.main')
@section('content')
    <div class="container-form">
        <center>
            <h2>Edit Data Mapel</h2>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif
        </center>

        <form action="/mapel/update/{{ $mapel->id }}" method="post">
            @csrf
            <label for="">Mata Pelajaran</label>
            <input type="text" name="nama_mapel" value="{{ $mapel->nama_mapel }}">

            <button type="submit" class="button-submit">Ubah</button>
        </form>
    </div>
@endsection
