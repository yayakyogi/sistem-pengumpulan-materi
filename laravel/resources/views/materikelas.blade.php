@extends('layout.siswa')
@section('title','Sistem Pengumpulan Tugas')
@section('content')
<div class="container">
<a href="{{url('/kelas/daftarkelas/mapel/'.$mapel->kelas_user)}}" class="kembali" style="display:inline-block;"><-- kembali</a>
    <div class="card">
        <div class="card-header">
            <h5>Daftar Materi Kelas </h5>
        </div>
        <div class="card-body">
            <p class="role">Mata Pelajaran : {{$mapel->mapel}}</p>
            <div class="table-responsive">
            <table class="table table-hover tabel" style="font-size:10pt;">
                <thead class="table-info">
                    <tr>
                        <th width="1%">No</th>
                        <th class="text-center">Materi</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center" width="20%">Upload</th>
                        <th class="text-center" width="15%">Download Materi</th>
                    </tr>
                </thead>
                <tbody class="table">
                    @foreach($materi as $p)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{$p->materi}}</td>
                        <td class="text-center">{{$p->kelas_user}}</td>
                        <td class="text-center">{{$p->created_at}}</td>
                        <td class="text-center">
                            <a href="{{url('data_materi'.'/'.$p->materi)}}" class="btn btn-primary btn-sm">Download</a>
                        </td>
                    </tr>
                    @endforeach  
                    @if($count<=0)
                        <tr><td colspan="5">Data kosong</td></tr>
                    @endif
                </tbody>
            </table>
            </div>
        </div><!-- ./card-body-->
    </div><!-- ./card-->
    <br>
</div>
@endsection