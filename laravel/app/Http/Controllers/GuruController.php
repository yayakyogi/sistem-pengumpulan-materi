<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

use App\User;
use App\Mapel;
use App\Materi;
use App\Tugas;

class GuruController extends Controller
{
    public function guru(){
        $post = Auth::user();
        $id = $post->id;
        $kelas = $post->kelas;
        $data = Mapel::all()->where('user_id','=',$id,'AND','kelas_user','=',$kelas);
        $count = $data->count();
        return view('guru.mapel',['post'=>$data,'kelas'=>$kelas,'count'=>$count]);
    }
    public function gurukhusus(){
        $post = Auth::user();
        $id = $post->id;
        $data = Mapel::where('user_id','=',$id)->get();
        return view('guru.khusus.mapel',['post'=>$data]);
    }
    public function materi($id){
        $post = Materi::all()->where('mapel_id',$id);
        $total = $post->count('mapel_id');
        $mapel = Mapel::all()->where('id',$id);
        return view('guru.materi',['post'=>$post,'mapel'=>$mapel,'total'=>$total]);
    }
    public function upload(Request $request){
        $this->validate($request,['materi' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,jpg,png,mp4,zip']);
        // simpan data file yang diupload
        $file = $request->file('materi');
        $nama_file = time().'_'.$file->getClientOriginalName();
        $tujuan_upload = 'data_materi';
        // upload file
        $file->move($tujuan_upload,$nama_file);
        Materi::create([
            'mapel_id' => $request->mapel_id,
            'materi' => $nama_file,
            'kelas_user' => $request->kelas_user,
        ]);
        $id = $request->mapel_id;
        $post = Materi::all()->where('mapel_id',$id);
        $mapel = Mapel::all()->where('kodemapel',$id);
        return redirect()->back()->with('sukses-tambah','Sukses menambahkan data');
        //return view('guru.materi',['post'=>$post,'mapel'=>$mapel]);   
    }
    public function tugas($id){
        $tugas = Tugas::all()->where('mapel_id',$id);
        $total = $tugas->count();
        $mapel = Mapel::all()->where('kodemapel',$id);
        return view('guru.tugas',['tugas'=>$tugas,'mapel'=>$mapel,'total'=>$total]);
    }
    public function hapus($id){
        $data = Materi::find($id);
        $data->delete();
        return redirect()->back()->with('sukses-hapus','Data berhasil dihapus');
    }
}
