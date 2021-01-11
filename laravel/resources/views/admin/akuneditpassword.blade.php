@extends('layout.admin')
@section('title','Sistem Pengumpulan Materi')
@section('content')
<div class="card" style="border:none;">
    <div class="card-header">
        <h5>Edit Password</h5>
    </div>
    <div class="card-body">
        <form action="{{url('/admin/akun/updatepassword/'.$post->id)}}" method="POST">
            {{csrf_field()}}
            <div class="form-row">
                 <input type="hidden" name="password" class="form-control" value="{{$post->nama}}" >
                <div class="form-group col-md-8 col-12">
                    <label for="id">Password *</label>
                    <input type="text" name="password" class="form-control" value="{{$post->password}}" >
                    @if($errors->has('password'))
                        <div class="text-danger">
                            {{$errors->first('password')}}
                        </div>
                    @endif
                </div>
            </div><!--./form-row-->
            <b class="text-danger">Note</b> 
                <ul class="text-danger">
                    <li>Masukkan password minimal 5 karakter dan maksimal 20 karakter</li>
                    <li>Jika ingin mengganti password hapus semua text yang ada dikolom</li>
                    <li>Lalu masukkan password yang baru</li>
                    <b>Contoh : </b>
                    <li>Password lama = asda9a92h01nf101n10fn</li>
                    <li>Password baru = 12345</li>
                </ul>
            <input type="submit" class="btn btn-success btn-md" value="UPDATE">
            <a href="{{url('/admin')}}" class="btn btn-danger btn-md" 
                onclick="return confirm('Anda yakin ingin kembali ke halaman utama ?')"> Kembali
            </a><br>
        </form>
    </div>
</div>
@endsection