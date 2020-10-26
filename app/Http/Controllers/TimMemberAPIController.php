<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tim_member;
use Illuminate\Support\Facades\DB;

class TimMemberAPIController extends Controller
{
  public function index()
  {
    return Tim_member::all();
    //return view('tim_member.index');
  }

  public function create(request $request){
    $tim_member = new tim_member;
    $tim_member->tim_id = $request->tim_id;
    $tim_member->nim = $request->nim;
    $tim_member->final_skor = $request->final_skor;
    $tim_member->peran = $request->peran;
    $tim_member->created_by = $request->created_by;
    $tim_member->save();

    return "data Berhasil masuk";
  }

  public function select(request $request,$tim_id){
    $tim_member =DB::table('tim_member')
            ->leftJoin('user', 'user.id', '=', 'tim_member.mahasiswa_id')
            ->select(DB::raw('tim_member.id,name'))
            ->where('tim_member.tim_id', '=', $tim_id)
            ->get();

    return $tim_member;
  }

  public function update(request $request,$id){
    $tim_id = $request->tim_id;
    $nim = $request->nim;
    $final_skor = $request->final_skor;
    $peran = $request->peran;
    $created_by = $request->created_by;

    $tim_member = Tim_member::find($id);
    if($tim_id != null){
      $tim_member->tim_id = $tim_id;
     }
     if($nim != null){
      $tim_member->nim = $nim;
    }
    if($final_skor != null){
      $tim_member->final_skor = $final_skor;
    }
    if($peran != null){
      $tim_member->peran = $peran;
    }
    if($created_by != null){
      $tim_member->create_by = $created_by;
    }
    $tim_member->save();

    return "data berhasil di update";
  }

  public function delete($id){
    $tim_member = Tim_member::find($id);
    $tim_member->delete();

    return "Data Berhasil di Hapus";
  }
}
