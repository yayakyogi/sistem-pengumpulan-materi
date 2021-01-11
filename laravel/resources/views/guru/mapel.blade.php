@extends('layout.sekolah')
@section('title','Sistem Pengumpulan Materi')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Daftar Mata Pelajaran Kelas {{$kelas}}</h5>
            <div class="mapel">
                <p class="title-tugas"> Halaman Guru</p>
            </div>
        </div>
        <div class="card-body">
            Guru <p class="role">{{Auth::user()->nama}}</p>
            <div class="table-responsive">
                <table class="table table-hover tabel">
                    <thead class="table-primary">
                        <tr>
                            <th width="1%">No</th>
                            <th class="kelas">Kode Mapel</th>
                            <th>Mapel</th>
                            <th class="kelas">Nama Guru</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table">
                        @foreach($post as $p)
                        <tr>
                            <td>{{$loop->iteration}}
                            <td class="kelas">{{$p->kodemapel}}</td>
                            <td>{{$p->mapel}}</td>
                            <td class="kelas">{{$p->guru}}</td>
                            <td class="text-center">{{$p->kelas_user}}</td>
                            <td class="text-center">
                                <a href="{{url('/guru/materi/'.$p->id)}}" class="btn btn-success btn-sm">Materi</a>
                            </td>
                        </tr>
                        @endforeach    
                        @if($count==0)
                            <tr><td colspan="6">Data kosong</td></tr>
                        @endif
                    </tbody>
                </table>
            </div><!-- ./tabel-->
        </div><!-- ./card-body-->
    </div><!--./card-->
</div>
@endsection
@section('script')

</script>
@endsection