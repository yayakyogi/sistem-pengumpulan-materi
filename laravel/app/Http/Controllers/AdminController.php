<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\User;
use App\Mapel;
use App\Materi;

class AdminController extends Controller
{
    public function index(){
        $post = user::paginate(5);
        $akun = User::All();
        $countakun = $akun->count();
        return view('admin.index',compact('post'),['countakun'=>$countakun]);
    }
    public function mapel(){
        $post = Mapel::paginate(5);
        $count = $post->count();
        $mapel = Mapel::All();
        $countmapel = count($mapel);
        return view('admin.mapel',compact('post'),['count'=>$count,'countmapel'=>$countmapel]);
    }
    public function searchakun(Request $request){
        $search = $request -> search;
        $post = User::where('nama','LIKE','%'.$search.'%')->orwhere('role','LIKE','%'.$search.'%')->paginate(5);
        return view('admin.index',compact('post'));
    }
    // tambah akun
    public function tambahakun(){
        return view('admin.akuntambah');
    }
    // simpan data akun
    public function storeakun(Request $request){
        // pesan validasi form
        $messages = [
            'required' => 'Kolom ini sangat wajib diisi ya kakak...',
            'min' => 'Password tidak boleh kurang dari :min ya kakak...',
            'max' => 'Passwordnya kepanjangan guys, maksimal :max karakter ya kak...',
        ];
        // validasi form
        $this->validate($request,[
            'id' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required|min:5|max:20',
            'role' => 'required',
            'kelas' => 'required'
        ],$messages);
        
        $password = $request->password;
        $encrypt = bcrypt($password);
        // save data ke database
        User::create([
            'id' => $request->id,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $encrypt,
            'role' => $request->role,
            'kelas' => $request->kelas
        ]);
        $nama = $request->nama;
        // redirect ke halaman awal
        return redirect('/admin')->with(['sukses-tambah'=>'Sukses menambahkan data '.$nama]);
    }
    // edit akun
    public function editakun($id){
        $post = User::find($id);
        return view('admin.akunedit',['post'=>$post]);
    }
    // update akun
    public function updateakun($id,Request $request){
        // pesan validasi form
        $messages = [
            'required' => 'Kolom ini sangat wajib diisi ya kakak...',
        ];
        // validasi form
        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required',
            'role' => 'required',
            'kelas' => 'required'
        ],$messages);

        $user = User::find($id);
        $user->nama = $request -> nama;
        $user->email = $request -> email;
        $user->role = $request -> role;
        $user->kelas = $request -> kelas;
        $user -> save();
        $nama = $user->nama;
        return redirect('/admin')->with(['sukses-edit'=>'Sukses mengubah data '.$nama]);
    }
    // edit password
    public function editpassword($id){
        $post = User::find($id);
        return view('admin.akuneditpassword',['post'=>$post]);
    }
    // update password
    public function updatepassword($id, Request $request){
        $messages = [
            'required' => 'Kolom tidak boleh kosong',
            'min' => 'Password tidak boleh kurang dari :min ya kakak...',
            'max' => 'Passwordnya kepanjangan guys, maksimal :max karakter ya kak...',
        ];
        // validasi form
        $this->validate($request,[
            'password' => 'required|min:5|max:20'
        ],$messages);

        $encrypt = $request->password;
        $hasilEncrypt = bcrypt($encrypt);
        $password = User::find($id);
        $password -> password = $hasilEncrypt;
        $password -> save();
        $nama = $password->nama;
        return redirect('/admin')->with(['sukses-edit'=>'Sukses mengubah data '.$nama]);
    }
    // hapus data
    public function hapus($id){
        $user = User::find($id);
        $nama = $user->nama;
        $user->delete();
        return redirect('/admin')->with(['sukses-hapus'=>'Sukses menghapus data '.$nama]);
    }

    /* MAPEL */
    // tambah mapel
    public function tambahmapel(){
        $user = User::All()->where('role','=','Guru');
        return view('admin.mapeltambah',['user'=>$user]);
    }
    // store mapel
    public function storemapel(Request $request){
        $messages = [
            'required' => 'Kolom tidak boleh kosong'
        ];
        // validasi form
        $this->validate($request,[
            'kodemapel' => 'required',
            'mapel' => 'required'
        ],$messages);

        Mapel::create([
            'kodemapel' => $request->kodemapel,
            'user_id' => $request->user_id,
            'mapel' => $request->mapel,
            'guru' => $request->guru,
            'kelas_user' => $request->kelas_user
        ]);
        // redirect ke halaman awal
        return redirect('/mapel')->with(['sukses-tambah'=>'Sukses menambahkan data ']);
    }
    // edit mapel
    public function editmapel($id){
        $mapel = Mapel::find($id);
        $user = User::All()->where('role','=','Guru');
        return view('admin.mapeledit',['mapel'=>$mapel,'user'=>$user]);
    }
    // update mapel
    public function updatemapel($id,Request $request){
        $messages = [
            'required' => 'Kolom tidak boleh kosong'
        ];
        // validasi form
        $this->validate($request,[
            'kodemapel' => 'required',
            'mapel' => 'required'
        ],$messages);
        
        $mapel = Mapel::find($id);
        $mapel -> kodemapel = $request -> kodemapel;
        $mapel -> user_id = $request -> user_id;
        $mapel -> mapel = $request -> mapel;
        $mapel -> guru = $request -> guru;
        $mapel -> kelas_user = $request -> kelas_user;
        $mapel->save();
        $name = $request->guru;
        return redirect('/mapel')->with(['sukses-edit'=>'Sukses mengubah data '.$name]);
    }
    // hapus mapel
    public function hapusmapel($id){
        $mapel = Mapel::find($id);
        $nama = $mapel->mapel;
        $mapel->delete();
        return redirect('/mapel')->with(['sukses-hapus'=>'Sukses menghapus data '.$nama]);
    }
    // memfilter mata pelajaran
    public function searchmapel(Request $request){
        $search = $request->search;
        $post = Mapel::where('kodemapel','LIKE','%'.$search.'%')
                      ->orwhere('mapel','LIKE','%'.$search.'%')
                      ->orwhere('guru','LIKE','%'.$search.'%')
                      ->orwhere('kelas_user','LIKE','%'.$search.'%')
                      ->paginate(5);
        $count = $post->count();
        return view('admin.mapel',compact('post'),['count'=>$count]);
    }
}
