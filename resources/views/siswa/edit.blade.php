@extends('layouts.main')
@section('content')
    <div class="container-form">
        <center>
            <h2>Edit Data Siswa</h2>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif
        </center>

        <form action="/siswa/update/{{ $siswa->id }}" method="post">
            @csrf
            <label for="">NIS</label>
            <input type="text" name="nis" value="{{ $siswa->nis }}">

            <label for="">Nama Siswa</label>
            <input type="text" name="nama_siswa" value="{{ $siswa->nama_siswa }}">

            <label for="">Jenis Kelamin</label>
            <input type="radio" name="jk" value="L" {{ $siswa->jk == 'L' ? 'checked' : '' }}>Laki-Laki
            <input type="radio" name="jk" value="P" {{ $siswa->jk == 'P' ? 'checked' : '' }}>Perempuan

            <label for="">Alamat</label>
            <textarea name="alamat" rows="5">{{ $siswa->alamat }}</textarea>

            <label for="">Kelas</label>
            <select name="kelas_id">
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}" @selected($siswa->kelas_id == $k->id)>{{ $k->kelas }} {{ $k->jurusan }}
                        {{ $k->rombel }}</option>
                @endforeach
            </select>

            <label for="">Password</label>
            <input type="password" name="password" value="{{ $siswa->password }}">

            <button type="submit" class="button-submit">Ubah</button>
        </form>
    </div>
@endsection
