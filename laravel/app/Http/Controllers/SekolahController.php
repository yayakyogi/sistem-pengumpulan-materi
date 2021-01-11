<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Mapel;
use App\Materi;
class SekolahController extends Controller
{
    public function mapel($kelas){
        $mapel = Mapel::All()->where('kelas_user','=',$kelas);
        $count = $mapel->count();
        $kls = $kelas;
        $guru = User::All()->where('kelas','=',$kls);
        return view('mapelkelas',['mapel'=>$mapel,'count'=>$count,'kelas'=>$kls,'guru'=>$guru]);
    }
    public function materi($id){
        $materi = Materi::All()->where('mapel_id','=',$id);
        $count = $materi->count();
        $mapel = Mapel::find($id);
        return view('materikelas',['materi'=>$materi,'mapel'=>$mapel,'count'=>$count]);
    }
}
