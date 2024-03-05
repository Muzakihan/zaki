@extends('layouts.main')
@section('content')
    <div class="container-form">
        <center>
            <h2>Edit Data Nilai</h2>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif
            @if (session('error'))
                <p class="text-danger">{{ session('error') }}</p>
            @endif
        </center>

        <form action="/nilai/update/{{ $idKelas }}/{{ $nilai->id }}" method="post">
            @csrf
            <label for="">Guru Mapel</label>
            <select name="mengajar_id">
                @foreach ($mengajar as $each)
                    <option value="{{ $each->id }}" @selected($nilai->mengajar_id == $each->id)>{{ $each->guru->nama_guru }}
                        {{ $each->mapel->nama_mapel }}</option>
                @endforeach
            </select>

            <label for="">Nama Siswa</label>
            <select name="siswa_id">
                @foreach ($siswa as $each)
                    <option value="{{ $each->id }}" @selected($nilai->siswa_id == $each->id)>{{ $each->nama_siswa }}</option>
                @endforeach
            </select>

            <label for="">UH</label>
            <input type="number" min="1" max="100" name="uh" value="{{ $nilai->uh }}">

            <label for="">UTS</label>
            <input type="number" min="1" max="100" name="uts" value="{{ $nilai->uts }}">

            <label for="">UAS</label>
            <input type="number" min="1" max="100" name="uas" value="{{ $nilai->uas }}">

            <button type="submit" class="button-submit">Ubah</button>
        </form>
    </div>
@endsection
