@extends('layouts.main')
@section('content')
    <div class="container-form">
        <center>
            <h2>Tambah Data Kelas</h2>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif
            @if (session('error'))
                <p class="text-danger">{{ session('error') }}</p>
            @endif
        </center>

        <form action="/kelas/store" method="post">
            @csrf
            <label for="">Kelas</label>
            <select name="kelas">
                @foreach ($Kelas as $k)
                    <option value="{{ $k }}">{{ $k }}</option>
                @endforeach
            </select>

            <label for="">Jurusan</label>
            <select name="jurusan">
                @foreach ($Jurusan as $j)
                    <option value="{{ $j }}">{{ $j }}</option>
                @endforeach
            </select>

            <label for="">Rombel</label>
            <input type="number" min="1" max="4" name="rombel">

            <button type="submit" class="button-submit">Simpan</button>
        </form>
    </div>
@endsection
