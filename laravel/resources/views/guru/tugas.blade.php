@extends('layout.sekolah')
@section('title','Sistem Pengumpulan Tugas')
@section('content')
<div class="container">
    <a href="{{url('/guru')}}" class="kembali"><-- kembali</a>
    <div class="card">
        <div class="card-header">
            @foreach($mapel as $m)
                <h5>Daftar Tugas {{$m->mapel}}</h5>
            @endforeach
        </div>
        <div class="card-body">
            <p class="role">{{Auth::user()->nama}}</p>
            @foreach($mapel as $m)
                <p class="role">Kelas : {{$m->kelas_user}}</p>
            @endforeach<br>
            <div class="table-responsive">
            <table class="table table-hover tabel">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Tugas</th>
                        <th class="kelas">Kelas</th>
                        <th>Upload</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table table-bordered">
                    @foreach($tugas as $t)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{$t->namaTugas}}</td>
                        <td class="text-center kelas">{{$t->kelas_user}}</td>
                        <td class="text-center">{{$t->created_at}}</td>
                        <td class="text-center">
                            <a href="{{url('data_tugas'.'/'.$t->namaTugas)}}" class="badge badge-primary"><i class="fa fa-download"> Download</i></a>
                        </td>
                    </tr>
                    @endforeach
                    @if($total<=0)
                        <tr><td colspan="7">Data Kosong</td></tr>
                    @endif           
                </tbody>
            </table>
            </div>
        </div><!-- ./card-body-->
        <br>
    </div><!-- ./card-->
</div><!-- ./container-->
@endsection
@section('script')

@endsection