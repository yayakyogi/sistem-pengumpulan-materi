<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/bootstrap.min.css')}}">
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
<br>
<div class="container-fluid" style="margin-top:50px;">
<div class="row">
    <div class="col-md-3">
        <div class="card" style="border:none;">
        <div class="card-header">
            <h5>Dashboard Admin</h5>
        </div>
        <div class="card-body">
            <div class="alert alert-success">
                <h5>Selamat Datang</h5><hr style="border-bottom:1px solid #28a745;">
                <strong class="role" style="margin:0 0 0 -5px;font-size:9pt;">{{Auth::user()->email}}</strong>
            </div>
            <div class="row">
                <div class="col-12 col-xl-12 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100" style="border:none;">
                    <div class="card-body">
                        <div class="mr-5">Akun Users</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{url('/admin')}}">
                        <span class="float-left">View Details </span>
                        <span class="float-right">
                        </span>
                    </a>
                    </div>
                </div>
                <div class="col-12 col-xl-12 col-sm-6 mb-3">
                    <div class="card text-white bg-info o-hidden h-100" style="border:none;">
                    <div class="card-body">
                        <div class="mr-5">Data Mapel</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{url('/mapel')}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        </span>
                    </a>
                    </div>
                </div>
            </div><!--./row-->
        </div><!-- ./card-body-->
        </div><!--./card-->
    </div><!--./col-md-3-->
    <div class="col-md-9 content-admin">
        @yield('content')
    </div><!--./col-md-9 -->
  </div><!--./ row pertama -->
</div>
<div class="footer text-center">
    &copy; <b>Kuli</b>Kode 2020 - Made by &hearts; yayakyogi
</div>
@yield('script')
</body>
</html>