@extends('layout.sekolah')
@section('title','Sistem Pengumpulan Tugas')
@section('content')
<div class="container">
    <a href="{{url('/siswa')}}" class="kembali" style="display:inline-block;"><-- kembali</a>
    <div class="card">
        <div class="card-header">
             <!-- insert data -->
            <a class="badge badge-success" href="#" onClick="Open()">+ Tambah Tugas</a>
            <div class="mapel">
                <p class="title-tugas">Halaman Upload Tugas </p>
            </div>
            @if(session('sukses-hapus'))
                <div id="confirm" class="confirm-delete">
                    <button href="#" id="close" onClick="Close()">&times;</button>
                    <p class="pesan">{{session('sukses-hapus')}}</p>
                </div>
            @elseif(session('sukses-tambah'))
                <div id="confirm" class="confirm-tambah">
                    <button href="#" id="close-sukses" onClick="Close()">&times;</button>
                    <p class="pesan">{{session('sukses-tambah')}}</p>
                </div>
            @endif
             @foreach($mapel as $m)
                <form action="{{url('/siswa/tugas/upload')}}" method="POST" id="form-upload" class="col-md-6 col-sm-12" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="mapel_id" value="{{$m->kodemapel}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="kelas_user" value="{{$m->kelas_user}}">
                    </br>
                    <div class="form-group">
                        <label for="namaTugas">Pilih file dari perangkat</label>
                        <input type="file" name="namaTugas" class="form-control" value="{{old('/')}}">
                    </div>
                    <button type="submit" class="badge badge-primary"><i class="fa fa-upload"> Upload</i></button>
                    <a href="#" class="badge badge-danger" onClick="closeForm()">&times; Tutup</a>
                </form>
            @endforeach
        </div><!-- ./card-header -->
        <div class="card-body">
            <i class="fa fa-user"> {{Auth::user()->nama}}</i><br>
                @foreach($mapel as $m)
                    <p class="sup">{{$m->mapel}}</p>
                @endforeach
            <!-- Tampilkan data -->
            <div class="table-responsive">
            <table class="table table-hover tabel" id="show-data">
                <thead class="table-secondary">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Tugas</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table table-bordered">
                    @foreach($tugas as $t)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{$t->namaTugas}}</td>
                        <td class="text-center">{{$t->created_at}}</td>
                        <td class="text-center">
                            <a href="{{url('/siswa/tugas/hapus/'.$t->id)}}" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                    @if($total<=0)
                        <tr><td colspan="4">Data kosong</td></tr>
                    @endif 
                </tbody>
            </table>
            </div>
        </div><!-- ./card-body -->
    </div><!-- ./card -->
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
