<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\User;
use App\Mapel;
use App\Materi;
use App\Tugas;


class SiswaController extends Controller
{
    public function siswa(){
        $post = Auth::user();
        $id = $post->id;
        $kelas = $post->kelas;
        $data = Mapel::all()->where('kelas_user','=',$kelas);
        return view('siswa.mapel',['post'=>$data]);
    }
    public function materi($id){
        $post = Materi::all()->where('mapel_id',$id);
        $totalMateri = $post->count('mapel_id');
        $mapel = Mapel::all()->where('kodemapel',$id);
        return view('siswa.materi',['post'=>$post,'mapel'=>$mapel,'total'=>$totalMateri]);
    }
    public function tugas($id){
        $post = Auth::user();
        $iduser = $post->id;
        $tugas = Tugas::all()->where('mapel_id',$id)->where('user_id',$iduser);
        $total = $tugas->count('mapel_id');
        $mapel = Mapel::all()->where('kodemapel',$id);
        return view('siswa.tugas',['tugas'=>$tugas,'mapel'=>$mapel,'total'=>$total,'id'=>$iduser,'idmapel'=>$id]);
    }
    public function upload(Request $request){
        $this->validate($request,['namaTugas' => 'required']);
        // simpan data file yang diupload
        $file = $request->file('namaTugas');
        $nama_file = time().'_'.$file->getClientOriginalName();
        $tujuan_upload = 'data_tugas';
        // upload file
        $file->move($tujuan_upload,$nama_file);
        Tugas::create([
            'mapel_id' => $request->mapel_id,
            'user_id' => $request->user_id,
            'namaTugas' => $nama_file,
            'kelas_user' => $request->kelas_user,
        ]);
        $id = $request->mapel_id;
        $tugas = Tugas::all()->where('mapel_id',$id);
        $total = $tugas->count();
        $mapel = Mapel::all()->where('kodemapel',$id);
        return redirect()->back()->with('sukses-tambah','Sukses menambahkan data');
        //return view('siswa.tugas',['tugas'=>$tugas,'mapel'=>$mapel,'total'=>$total])->with('msg','Sukses menambah data');
    }
    public function hapus($id){
        // hapus file
        $tugas = Tugas::where('id',$id)->first();
        File::delete('data_tugas/'.$tugas);
        // hapus data
        Tugas::where('id',$id)->delete();
        return redirect()->back()->with('sukses-hapus','Data berhasil dihapus');;

        //$tugas = Tugas::find($id);
        //$tugas->delete();
        //return redirect()->back()->with('sukses-hapus','Data berhasil dihapus');
    }
}
