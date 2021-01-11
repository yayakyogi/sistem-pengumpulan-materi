@extends('layout.admin')
@section('title','Sistem Pengumpulan Materi')
@section('content')
<div class="card" style="border:none;">
    <div class="card-header">
        <h5>Tambah Akun</h5>
    </div>
    <div class="card-body">
        <form action="{{url('/akun/store')}}" method="POST">
            {{csrf_field()}}
            <div class="form-row">
                <div class="form-group col-md-3 col-12">
                    <label for="id">ID *</label>
                    <input type="number" name="id" class="form-control" value="{{old('id')}}">
                    @if($errors->has('id'))
                        <div class="text-danger">
                            <b>ID SANGAT WAJIB DIISI</b>
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-5 col-12">
                    <label for="nama">Nama *</label>
                    <input type="text" name="nama" class="form-control" value="{{old('nama')}}">
                    @if($errors->has('nama'))
                        <div class="text-danger">
                            kolom ini wajib diisi lo kak...
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-4 col-12">
                    <label for="email">Email *</label>
                    <input type="email" name="email" class="form-control" value="{{old('email')}}">
                    @if($errors->has('email'))
                        <div class="text-danger">
                            kolom emailnya tidak boleh kosong ya kak...
                        </div>
                    @endif
                </div>
            </div><!--./form-row-->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="password">Password *</label>
                    <input type="password" name="password" class="form-control" value="{{old('password')}}">
                    @if($errors->has('password'))
                        <div class="text-danger">
                            {{$errors->first('password')}}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <label for="role">Role *</label>
                    <select name="role" class="form-control">
                        <option value="Admin">Admin</option>
                        <option value="Guru">Guru</option>
                    </select>
                    @if($errors->has('role'))
                        <div class="text-danger">
                            {{$errors->first('role')}}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <label for="kelas">Kelas *</label>
                    <select name="kelas" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                    @if($errors->has('kelas'))
                        <div class="text-danger">
                            {{$errors->first('kelas')}}
                        </div>
                    @endif
                </div>
            </div><!--./form-row-->
            <p class="text-danger"><b>Note</b> : Semua form wajib untuk diisi</p>
            <input type="submit" class="btn btn-success btn-md" value="SAVE">
            <a href="{{url('/admin')}}" class="btn btn-danger btn-md"> Kembali</a><br>
        </form>
    </div>
</div>
@endsection