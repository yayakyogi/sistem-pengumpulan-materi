@extends('layout.admin')
@section('title','Sistem Pengumpulan Materi')
@section('content')
<div class="card" style="border:none;">
    <div class="card-header">
        <h5>Tambah Mata Pelajaran</h5>
    </div>
    <div class="card-body">
        <form action="{{url('/mapel/store')}}" method="POST">
            {{csrf_field()}}
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="kodemapel">Kode Mapel</label>
                    <input type="text" name="kodemapel" class="form-control" placeholder="Contoh : TEMA 1,BAHASA INDONESIA" value="{{old('kodemapel')}}">
                    @if($errors->has('kodemapel'))
                        <div class="text-danger">
                            {{$errors->first('kodemapel')}}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-5">
                    <label for="kodemapel">Mata Pelajaran</label>
                    <input type="text" name="mapel" class="form-control" placeholder="Contoh : SUB-TEMA 1,BAHASA INDONESIA 1" value="{{old('mapel')}}">
                    @if($errors->has('mapel'))
                        <div class="text-danger">
                            {{$errors->first('mapel')}}
                        </div>
                    @endif
                </div>
            </div><!--./form-row-->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="user_id">User ID</label>
                    <select name="user_id" class="browser-default custom-select">
                        @foreach($user as $u)
                            <option value="{{$u->id}}">{{$u->id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="nama">Nama Guru</label>
                    <select name="guru" class="browser-default custom-select">
                        @foreach($user as $u)
                            <option value="{{$u->nama}}">{{$u->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div><!--./form-row-->
            <div class="form-group col-md-4">
                    <label for="kelas_user">Kelas</label>
                    <select name="kelas_user" class="browser-default custom-select">
                        @for($i=1; $i<=6; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
            <p class="text-danger"><b>Note </b>: Semua form wajib diisi</b></p>
            <input type="submit" class="btn btn-success btn-md" value="SAVE">
            <a href="{{url('/mapel')}}" class="btn btn-danger btn-md">Kembali</a>
        </form>
    </div>
</div><!--./card-->
@endsection