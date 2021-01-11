@extends('layout.sekolah')
@section('title','Delete Cache')
@section('content')
<div class="container">
    <div class="alert alert-primary text-center">
        <h2 class="text-center">Cache berhasil dihapus</h2>
        <br>
        <a href="{{url('/')}}" class="btn btn-primary btn-lg">Home</a>
    </div>
</div>
@endsection