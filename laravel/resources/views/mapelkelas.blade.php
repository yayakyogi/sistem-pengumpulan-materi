@extends('layout.siswa')
@section('title','Sistem Pengumpulan Tugas')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Daftar Mata Pelajaran Kelas {{$kelas}}</h5>
        </div>
        <div class="card-body">
        @foreach($guru as $g)
            <p class="role">Wali Kelas : {{$g->nama}}</p>
        @endforeach
            <table class="table table-hover tabel" style="font-size:10pt;">
                <thead class="table-info">
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama Guru</th>
                        <th>Kodemapel</th>
                        <th>Mapel</th>
                        <th width="1%">Kelas</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table">
                    @foreach($mapel as $p)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{$p->guru}}</td>
                        <td>{{$p->kodemapel}}</td>
                        <td>{{$p->mapel}}</td>
                        <td class="text-center">{{$p->kelas_user}}</td>
                        <td class="text-center">
                            <a href="{{url('/kelas/daftarkelas/materi/'.$p->id)}}" class="btn btn-primary btn-sm">Buka</a>
                        </td>
                    </tr>
                    @endforeach 
                    @if($count<=0)
                        <tr><td colspan="5">Data kosong</td></tr>
                    @endif    
                </tbody>
            </table>
        </div><!-- card-body-->
    </div><!-- card-->
</div>
@endsection