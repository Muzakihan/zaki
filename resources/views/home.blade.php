@extends('layouts.main')
@section('content')
    <center>
        <h1>
            Selamat Datang
            @if (session('role') == 'Admin')
                {{ session('role') }}
            @else
                {{ session('role') }}, {{ session('nama') }}
            @endif
        </h1>
    </center>
@endsection
