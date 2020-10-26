<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserAPIController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
      $user = User::all();

      return $user;
    }

    public function create(request $request){
      $user = new user;
      $user->nama = $request->nama;
      $user->nim = $request->nim;
      $user->tlahir = $request->tlahir;
      $user->tgllahir = $request->tgllahir;
      $user->prodi = $request->prodi;
      $user->gender = $request->gender;
      $user->email = $request->email;
      $user->nohp = $request->nohp;
      $user->semester = $request->semester;
      $user->tim_id = $request->tim_id;
      $user->foto = $request->foto;
      $user->save();

      return $user;
    }

    public function select($id){
      $user = User::find($id);
      return $user;
    }

    public function cari($nama,$role){
      $string = $nama;


      // split on 1+ whitespace & ignore empty (eg. trailing space)
      $searchValues = preg_split('/\+/', $string, -1, PREG_SPLIT_NO_EMPTY);

      $user = User::where(function ($q) use ($searchValues) {
        foreach ($searchValues as $value) {
          $q->orWhere('name', 'like', "%{$value}%");
        }
      })
      ->join('prodi', 'prodi.id', '=','user.prodi_id')
      ->select(DB::raw('ANY_VALUE(user.id) as id,user.name,ANY_VALUE(prodi.nama) as namaprodi'))
      ->where('user.role','=', $role);

      $user = $user->orderby('user.name')
                    ->groupby('user.name')
                    ->get();
      return $user;
    }

    public function update(request $request,$id){


      $name = $request->name;
      $nim = $request->nim;
      $tlahir = $request->tlahir;
      $tgllahir = $request->tgllahir;
      $prodi_id = $request->prodi_id;
      $gender = $request->gender;
      $email = $request->email;
      $nohp = $request->nohp;
      $semester = $request->semester;
      $hasil = $request->file;

      $user = new User();

      $user = User::find($id);
        if($name){
          $user->name = $name;
        }
        if($nim){
          $user->nim = $nim;
        }
        if($tlahir){
          $user->tlahir = $tlahir;
        }
        if($tgllahir){
          $user->tgllahir = $tgllahir;
        }
        if($prodi_id){
          $user->prodi_id = $prodi_id;
        }
        if($gender){
          $user->gender = $gender;
        }
        if($email){
          $user->email = $email;
        }
        if($nohp){
          $user->nohp = $nohp;
        }
        if($semester){
          $user->semester = $semester;
        }
        if($hasil){
          $foto = $hasil->store('public/hasil');
          $user->foto = $foto;
        }

      $user->save();
      // return redirect("/profiluser/".$id);
      return $user;
    }

    public function delete($id){
      $user = User::find($id);
      $user->delete();

      return "Data Berhasil di Hapus";
    }
}
