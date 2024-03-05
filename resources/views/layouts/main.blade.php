<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('partials.header')

    <div class="menu">
        <a href="/home" class="active">HOME</a>
        @if (session('role') == 'Admin')
            <a href="/guru/index">GURU</a>
            <a href="/siswa/index">SISWA</a>
            <a href="/kelas/index">KELAS</a>
            <a href="/mapel/index">MAPEL</a>
            <a href="/mengajar/index">MENGAJAR</a>
        @else
            <a href="/nilai/index">NILAI</a>
        @endif
        <a href="/logout">LOGOUT</a>
    </div>

    <div class="content">
        @yield('content')
    </div>

    @include('partials.footer')
</body>
<script src="{{ asset('js/script.js') }}"></script>

</html>
