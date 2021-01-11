@extends('layout.admin')
@section('title','Sistem Pengumpulan Materi');
@section('content')
<div class="card" style="border:none;">
      <div class="card-header">
        <h5>Daftar Mapel</h5>
      </div>
      <div class="card-body">
      <div class="row">
          <div class="col-5 col-sm-4 col-xl-8">
            <a href="{{url('/mapel/tambah')}}" class="btn btn-primary btn-sm"> Tambah</a>
            <a href="{{url('/mapel')}}" class="btn btn-success btn-sm"> Show all</a>
          </div>
          <div class="col-7 col-sm-6 col-xl-4 mb-2">
            <form action="{{url('/admin/searchmapel')}}" method="GET">
              <div class="input-group custom-search-form">
                <input type="text" class="form-control form-control-sm" name="search" placeholder="Cari berdasarkan Kelas">
                <span class="input-group-btn">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary btn-sm" type="submit"><i class="fa fa-search"></i> Cari</button>
                  </span>
                </span>
              </div>
            <form>
          </div><!--./col-md-4-->
        </div><!--./row-->
        @if(session('sukses-hapus'))
        <div id="confirm" class="alert alert-success alert-block" style="display:block;">
            <button id="close" onClick="Close()">&times; </button>
            <p class="pesan">{{session('sukses-hapus')}}</p>
        </div>
        @elseif(session('sukses-tambah'))
        <div id="confirm" class="alert alert-success alert-block" style="display:block;">
            <button id="close" onClick="Close()">&times; </button>
            <p class="pesan">{{session('sukses-tambah')}}</p>
        </div>
        @elseif(session('sukses-edit'))
        <div id="confirm" class="alert alert-success alert-block" style="display:block;">
            <button id="close" onClick="Close()">&times; </button>
            <p class="pesan">{{session('sukses-edit','nama')}}</p>
        </div>
        @endif
          <div class="table-responsive">
            <table class="table table-hover tabel" style="font-size:10pt;">
                  <thead class="table-primary">
                      <tr class="text-left">
                          <th width="1%">No</th>
                          <th>Tema</th>
                          <th>Sub-Tema</th>
                          <th>Guru</th>
                          <th class="text-center">Kelas</th>
                          <th class="text-center">Tanggal</th>
                          <th class="text-center">Aksi</th>
                      </tr>
                  </thead>
                  <tbody class="table">
                      @foreach($post as $p)
                      <tr class="text-center">
                          <td>{{$loop->iteration}}
                          <td class="text-left">{{$p->kodemapel}}</td>
                          <td class="text-left">{{$p->mapel}}</td>
                          <td class="text-left">{{$p->guru}}</td>
                          <td>{{$p->kelas_user}}</td>
                          <td>{{$p->created_at}}</td>
                          <td>
                              <a href="{{url('/admin/mapel/edit/'.$p->id)}}" class="btn btn-primary btn-sm"><img class="icon" src="{{asset('/assets/icon/Admin - akun/edit.svg')}}"> Edit</a>
                              <a href="{{url('/admin/mapel/hapus/'.$p->id)}}" class="btn btn-danger btn-sm"  onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><img class="icon" src="{{asset('/assets/icon/Admin - akun/trash.svg')}}"> Hapus</a>
                          </td>
                      </tr>
                      @endforeach    
                      @if($count<=0)
                        <tr><td colspan="7">Data Kosong</td></tr>
                    @endif
                  </tbody>
              </table>
              {!!$post -> links()!!}
              <div class="alert alert-success" style="font-size:11pt;">
                Jumlah data ditemukan : {{$post->total()}}
              </div>
          </div><!--./table-responsive-->
        </div><!--./card-body-->
      </div><!--./card-->
    </div><!--./col-md-9 -->
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