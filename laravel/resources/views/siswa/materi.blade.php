@extends('layout.sekolah')
@section('title','Sistem Pengumpulan Tugas')
@section('content')
<div class="container">
<a href="{{url('/siswa')}}" class="kembali" style="display:inline-block;"><-- kembali</a>
    <div class="card">
        <div class="card-body">
            <h5>Daftar Materi</h5>
            @foreach($mapel as $m)
                <p class="sup">Mata Pelajaran : {{$m->mapel}}</p>
            @endforeach
            <div class="table-responsive">
            <table class="table table-hover tabel">
                <thead class="table-secondary">
                    <tr>
                        <th width="1%">No</th>
                        <th class="text-center">Materi</th>
                        <th class="text-center" width="20%">Upload</th>
                        <th class="text-center" width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table table-bordered">
                    @foreach($post as $p)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{$p->materi}}</td>
                        <td class="text-center">{{$p->created_at}}</td>
                        <td class="text-center">
                            <a href="{{url('data_materi'.'/'.$p->materi)}}" class="badge badge-primary">Download</a>
                        </td>
                    </tr>
                    @endforeach  
                    @if($total<=0)
                        <tr><td colspan="4">Data Kosong</td></tr>
                    @endif
                </tbody>
            </table>
            </div>
        </div><!-- ./card-body-->
    </div><!-- ./card-->
    <br>
</div>
@endsection