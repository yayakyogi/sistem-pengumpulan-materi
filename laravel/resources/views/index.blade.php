<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/style/style.css')}}">
    <title>Sistem Pengumpulan Materi</title>
</head>
<body>
<nav class="nav">
    <div class="wrap">
        <div class="title">SDN 1 NOTOREJO</div>
        <a href="{{url('/sign-in')}}" class="logout">Login</a>
        <p class="copyright">Copyright &copy; GINANTAKA<b>CODE</b> 2020</p>
    </div>
</nav>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Kelas</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    @for($i=1; $i <=6; $i++)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <h4>Kelas {{$i}}</h4><br>
                            </div>
                            <div class="card-footer">
                                <a href="{{url('/kelas/daftarkelas/mapel/'.$i)}}">Lihat mapel</a>
                            </div>
                            <img class="icon-index" src="{{asset('/assets/icon/list.svg')}}">
                        </div><br>
                    </div>
                    @endfor
                </div>
            </div>
        </div><!--./card-->
    </div>
    <div class="footer text-center">
         KKN Mandiri Universitas Bhinneka 2020 | TIM 35 KKN Desa Notorejo
    </div>
</body>
</html>