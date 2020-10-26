<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tim;
use Illuminate\Support\Facades\DB;

class TimAPIController extends Controller
{
  public function __construct()
  {
      parent::__construct();
  }
  public function index()
  {
    $tim = Tim::all();
    return $tim;
  }

  public function create(request $request){
    $tim = new tim;
    $tim->nama = $request->nama;
    $tim->save();

    return $tim;
  }

  public function select(request $request,$id){
    $tim = DB::table('tim')
            ->select(DB::raw('*'))
            ->where('prodi_id', '=', $id)
            ->get();

    return $tim;
  }

  public function update(request $request,$id){
    $nama = $request->nama;

    $tim = Tim::find($id);
    if($nama != null){
      $tim->nama = $nama;
     }

    $tim->save();

    return $tim;
  }

  public function delete($id){
    $tim = Tim::find($id);
    $tim->delete();

    return "Data Berhasil di Hapus";
  }
}
