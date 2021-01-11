@extends('layout.admin')
@section('title','Sistem Pengumpulan Materi')
@section('content')
<div class="card" style="border:none;">
    <div class="card-header">
        <h5>Edit Akun</h5>
    </div>
    <div class="card-body">
        <form action="{{url('/admin/akun/update/'.$post->id)}}" method="POST">
            {{csrf_field()}}
            <div class="form-row">
                <div class="form-group col-md-3 col-12">
                    <label for="id">ID *</label>
                    <input type="number" name="id" class="form-control" value="{{$post->id}}" disabled="false">
                </div>
                <div class="form-group col-md-5 col-12">
                    <label for="nama">Nama *</label>
                    <input type="text" name="nama" class="form-control" value="{{$post->nama}}">
                    @if($errors->has('nama'))
                        <div class="text-danger">
                            kolom ini wajib diisi lo kak...
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-4 col-12">
                    <label for="email">Email *</label>
                    <input type="email" name="email" class="form-control" value="{{$post->email}}">
                    @if($errors->has('email'))
                        <div class="text-danger">
                            kolom emailnya tidak boleh kosong ya kak...
                        </div>
                    @endif
                </div>
            </div><!--./form-row-->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="role">Role *</label>
                    <select name="role" class="form-control">
                        <option value="Admin" <?php if($post->role == 'Admin') echo "selected";?>>Admin</option>
                        <option value="Guru" <?php if($post->role == 'Guru') echo "selected";?>>Guru</option>
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
                        <option value="0" <?php if($post->kelas == 0) echo "selected";?>>0</option>
                        <option value="1" <?php if($post->kelas == 1) echo "selected";?>>1</option>
                        <option value="2" <?php if($post->kelas == 2) echo "selected";?>>2</option>
                        <option value="3" <?php if($post->kelas == 3) echo "selected";?>>3</option>
                        <option value="4" <?php if($post->kelas == 4) echo "selected";?>>4</option>
                        <option value="5" <?php if($post->kelas == 5) echo "selected";?>>5</option>
                        <option value="6" <?php if($post->kelas == 6) echo "selected";?>>6</option>
                    </select>
                    @if($errors->has('kelas'))
                        <div class="text-danger">
                            {{$errors->first('kelas')}}
                        </div>
                    @endif
                </div>
            </div><!--./form-row-->
            <p class="text-danger"><b>Note</b> : kolom ID tidak bisa di edit</p>
            <input type="submit" class="btn btn-success btn-md" value="UPDATE">
            <a href="{{url('/admin')}}" class="btn btn-danger btn-md" 
                onclick="return confirm('Anda yakin ingin kembali ke halaman utama ?')"> Kembali
            </a><br>
        </form>
    </div>
</div>
@endsection