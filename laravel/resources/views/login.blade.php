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
        <a href="{{url('/')}}" class="logout">Home</a>
        <p class="copyright">Copyright &copy; GINANTAKA<b>CODE</b> 2020</p>
    </div>
</nav>
<div class="wrapper">
    @if(session('error'))
        <div id="confirm" class="alert alert-danger alert-block" style="display:block; margin-bottom:0;">
            <button href="#" id="close" onClick="Close()">&times; </button>
            <p class="pesan">{{session('error')}}</p>
        </div>
    @endif
    <div class="card border-form">
        <div class="card-header">
            <h5>Sistem Pengumpulan Materi</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <img src="{{url('/assets/style/img/logo.png')}}" class="img-fluid gambar">
                </div>
                <div class="col-md-6 col-sm-12">
                    <form action="{{url('/postlogin')}}" method="POST">
                        {{csrf_field()}}
                        <h5 class="judul-form">Login</h5>
                        <div class="form-group">    
                            <label for="email">Username</label>
                            <input type="text" class="form-control" name="email" placeholder="Email">
                            @if($errors->has('email'))
                                <div class="text-danger">
                                    {{$errors->first('email')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">    
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            @if($errors->has('password'))
                                <div class="text-danger">
                                    {{$errors->first('password')}}
                                </div>
                            @endif
                        </div>
                        <input type="submit" class="btn btn-success btn-block" value="LOGIN">
                    </form>
                </div><!-- col md-->
            </div><!-- row -->
        </div><!-- card body-->
    </div><!-- card -->
    <div class="footer text-center">
         KKN Mandiri Universitas Bhinneka 2020 | TIM 35 KKN Desa Notorejo
    </div>
</div>
</body>
<script type="text/javascript">
    var close = document.getElementById('confirm');
    var open = document.getElementById('form-upload');
    function Close(){
        close.style.display="none";
    }
    function Open(){
        open.style.display="block";
    }
    function closeForm(){
        open.style.display="none";
    }
</script>
</html>