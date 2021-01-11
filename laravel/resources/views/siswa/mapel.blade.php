@extends('layout.sekolah')
@section('title','Sistem Pengumpulan Tugas')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Daftar Mapel Kelas {{Auth::user()->kelas}}</h5>
        </div>
        <div class="card-body">
        <p class="role">{{Auth::user()->nama}}</p>
            <table class="table table-hover tabel">
                <thead class="table-secondary">
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama Guru</th>
                        <th>Mapel</th>
                        <th width="1%">Kelas</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table table-bordered">
                    @foreach($post as $p)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{$p->guru}}</td>
                        <td>{{$p->mapel}}</td>
                        <td class="text-center">{{$p->kelas_user}}</td>
                        <td class="text-center">
                            <a href="{{url('/siswa/materi/'.$p->kodemapel)}}" class="badge badge-primary">Materi</a>
                            <a href="{{url('/siswa/tugas/'.$p->kodemapel)}}" class="badge badge-success">Tugas</a>
                        </td>
                    </tr>
                    @endforeach     
                </tbody>
            </table>
        </div><!-- card-body-->
    </div><!-- card-->
</div>
@endsection