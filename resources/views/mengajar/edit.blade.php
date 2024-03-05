@extends('layouts.main')
@section('content')
    <div class="container-form">
        <center>
            <h2>Edit Data Mengajar</h2>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif
            @if (session('error'))
                <p class="text-danger">{{ session('error') }}</p>
            @endif
        </center>

        <form action="/mengajar/update/{{ $mengajar->id }}" method="post">
            @csrf
            <label for="">Nama Guru</label>
            <select name="guru_id">
                @foreach ($guru as $g)
                    <option value="{{ $g->id }}" @selected($mengajar->guru_id == $g->id)>{{ $g->nama_guru }}</option>
                @endforeach
            </select>

            <label for="">Mata Pelajaran</label>
            <select name="mapel_id">
                @foreach ($mapel as $m)
                    <option value="{{ $m->id }}" @selected($mengajar->mapel_id == $m->id)>{{ $m->nama_mapel }}</option>
                @endforeach
            </select>

            <label for="">Kelas</label>
            <select name="kelas_id">
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}" @selected($mengajar->kelas_id == $k->id)>{{ $k->kelas }} {{ $k->jurusan }}
                        {{ $k->rombel }}</option>
                @endforeach
            </select>

            <button type="submit" class="button-submit">Ubah</button>
        </form>
    </div>
@endsection
