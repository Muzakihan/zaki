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
        <a href="/" class="active">HOME</a>
    </div>

    <div class="kiri-atas">
        <fieldset>
            <center>
                <button class="button-primary" onclick="Admin()">Admin</button>
                <button class="button-primary" onclick="Guru()">Guru</button>
                <button class="button-primary" onclick="Siswa()">Siswa</button>
                <hr>
                Pilih Login Sesuai Dengan Role Anda!!
                <hr>
            </center>

            <div class="container-login" id="login_admin">
                <center>
                    <b>Login Admin</b>
                    <p>{{ session('error') }}</p>
                </center>

                <form action="/login_admin" method="post">
                    @csrf
                    <table>
                        <tr>
                            <td width="25%"><strong>ID Admin</strong></td>
                            <td width="25%" style="text-align: right"><input type="text" name="id_admin"></td>
                        </tr>
                        <tr>
                            <td width="25%"><strong>Password</strong></td>
                            <td width="25%" style="text-align: right"><input type="password" name="password"></td>
                        </tr>
                    </table>
                    <button type="submit" class="button-submit">Login</button>
                </form>
            </div>

            <div class="container-login" id="login_guru" style="display: none">
                <center>
                    <b>Login Guru</b>
                    <p>{{ session('error') }}</p>
                </center>

                <form action="/login_guru" method="post">
                    @csrf
                    <table>
                        <tr>
                            <td width="25%"><strong>NIP</strong></td>
                            <td width="25%" style="text-align: right"><input type="text" name="nip"></td>
                        </tr>
                        <tr>
                            <td width="25%"><strong>Password</strong></td>
                            <td width="25%" style="text-align: right"><input type="password" name="password"></td>
                        </tr>
                    </table>
                    <button type="submit" class="button-submit">Login</button>
                </form>
            </div>

            <div class="container-login" id="login_siswa" style="display: none">
                <center>
                    <b>Login Siswa</b>
                    <p>{{ session('error') }}</p>
                </center>

                <form action="/login_siswa" method="post">
                    @csrf
                    <table>
                        <tr>
                            <td width="25%"><strong>NIS</strong></td>
                            <td width="25%" style="text-align: right"><input type="text" name="nis"></td>
                        </tr>
                        <tr>
                            <td width="25%"><strong>Password</strong></td>
                            <td width="25%" style="text-align: right"><input type="password" name="password"></td>
                        </tr>
                    </table>
                    <button type="submit" class="button-submit">Login</button>
                </form>
            </div>
        </fieldset>
    </div>

    <div class="kanan">
        <center>
            <h1>Selamat Datang di Website <br> Penilaian SMKN 1 Cibinong</h1>
        </center>
    </div>

    <div class="kiri-bawah">
        <center>
            <b>
                <p class="mar">Gallery</p>
                <div class="gallery">
                    <img src="{{ asset('img/g2.jpg') }}" alt="">
                    <div class="deskripsi">SMK BISA {{ date('Y') }}</div>
                </div>
            </b>
        </center>
    </div>

    @include('partials.footer')
</body>
<script src="{{ asset('js/script.js') }}"></script>

</html>
