<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prodi;
use Illuminate\Support\Facades\DB;

class ProdiAPIController extends Controller
{
  public function __construct()
  {
      parent::__construct();
  }
  public function index()
  {
    $prodi = Prodi::all();
    return $prodi;
  }

  public function create(request $request){
    $prodi = new prodi;
    $prodi->nama = $request->nama;
    $prodi->save();

    return redirect('prodi/profil');
  }

  public function select(request $request,$id){
    $prodi = Prodi::find($id);

    return $prodi;
  }

  public function update(request $request,$id){
    $nama = $request->nama;

    $prodi = Prodi::find($id);
    if($nama != null){
      $prodi->nama = $nama;
     }

    $prodi->save();

    return redirect('prodi/profil');
  }

  public function delete($id){
    $prodi = Prodi::find($id);
    $prodi->delete();

    return "Data Berhasil di Hapus";
  }
}
