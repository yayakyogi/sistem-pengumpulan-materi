<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/style/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/style/style.css')}}">
    <title>@yield('title')</title>
</head>
<body>
<nav class="nav">
    <div class="wrap">
        <div class="title">Sistem Pengumpulan Materi</div>
        <div class="menu" id="menu-navbar">
            <a href="{{url('/logout')}}" class="logout">Logout</a>
            <p class="copyright">Copyright &copy; GINANTAKA<b>CODE</b> 2020</p>
        </div>
    </div>
</nav>
<!--
<nav class="navbar navbar-expand topbar mb-4 static-top shadow" id="Navbar">
    <a class="brand text-light">Sistem Pengumpulan Tugas</a>
    <a href="/logout" class="logout"><i class="fa fa-power-off"> Logout</i></a>
</nav>-->
@yield('content')
<div class="footer text-center">
    &copy; <b>Kuli</b>Kode 2020 - Made by &hearts; yayakyogi
</div>
@yield('script')
</body>
</html>