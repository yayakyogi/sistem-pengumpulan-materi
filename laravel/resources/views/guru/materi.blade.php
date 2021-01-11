@extends('layout.sekolah')
@section('title','Sistem Pengumpulan Tugas')
@section('content')
<div class="container">
        <a href="{{url('/guru')}}" class="kembali" style="display:inline-block;"><-- kembali</a>
    <div class="card">
        <div class="card-header">
            <a href="#" class="badge badge-success" onClick="Open()">+ Tambah Materi</a>
            <div class="mapel">
                @foreach($mapel as $m)
                    <p class="role">Kelas : {{$m->kelas_user}}</p>
                @endforeach<br>
            </div>
            @if(session('sukses-hapus'))
            <div id="confirm" class="alert alert-success alert-block" style="display:block;">
                <button href="#" id="close" onClick="Close()">&times; </button>
                <p class="pesan">{{session('sukses-hapus')}}</p>
            </div>
            @elseif(session('sukses-tambah'))
            <div id="confirm" class="alert alert-success alert-block" style="display:block;">
                <button href="#" id="close" onClick="Close()">&times; </button>
                <p class="pesan">{{session('sukses-tambah')}}</p>
            </div>
            @endif
            @foreach($mapel as $m)
                <form action="{{url('/guru/materi/upload')}}" class="col-md-6 col-sm-12" id="form-upload" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="mapel_id" class="form-control" value="{{$m->id}}" readonly="true">
                    <input type="hidden" name="kelas_user" class="form-control" value="{{$m->kelas_user}}" readonly="true">
                    <div class="form-group">
                        <label for="materi">Pilih file</label>
                        <input type="file" class="form-control-file" name="materi" value="{{old('/')}}">
                    </div>
                    <input type="submit" class="btn btn-primary btn-sm" value="Upload">
                    <!--<button type="submit" class="badge badge-primary"><i class="fa fa-upload"> Upload</i></button>-->
                    <a href="#" class="btn btn-danger btn-sm" onClick="closeForm()">Tutup</a>
                </form>
            @endforeach
            @if(count($errors)>0)
                <div class="alert alert-danger alert-block" id="confirm" style="display:block;">
                    <button href="#" id="close" onClick="Close()">&times; </button>
                    <p class="pesan">File yang anda pilih tidak di izinkan</p>
                </div>
            @endif
        </div>
        <div class="card-body"> 
            @foreach($mapel as $m)
                <h5>Daftar Materi {{$m->mapel}}</h5>
            @endforeach
            Guru <p class="role">{{Auth::user()->nama}}</p>
            <div class="table-responsive">
            <table class="table table-hover tabel">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th width="1%">No</th>
                        <th>Daftar Materi</th>
                        <th>Upload</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table">
                    @foreach($post as $p)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{$p->materi}}</td>
                        <td class="text-center">{{$p->created_at}}</td>
                        <td class="text-center">  
                            <a href="{{url('/guru/materi/hapus/'.$p->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?');"> Hapus</a> 
                        </td>
                    </tr>
                    @endforeach   
                    @if($total<=0)
                        <tr><td colspan="5">Data kosong</td></tr>
                    @endif       
                </tbody>
            </table>
            </div>
        </div><!-- ./card-body-->
    </div><!-- ./card-->
</div><!-- ./container-->
@endsection
@section('script')
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
@endsection