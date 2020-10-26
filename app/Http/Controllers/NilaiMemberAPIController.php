<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nilai_final_member;
use Illuminate\Support\Facades\DB;

class NilaiMemberAPIController extends Controller
{
  public function __construct()
  {
      parent::__construct();
  }
  public function index()
  {
    return Nilai_final_member::all();
  }

  public function create(request $request){
    $nilai_final_member = new nilai_final_member;
    $nilai_final_member->final_skor_member = $request->final_skor_member;
    $nilai_final_member->final_skor_tim_id = $request->final_skor_tim_id;
    $nilai_final_member->mahasiswa_id = $request->mahasiswa_id;
    $nilai_final_member->sprint_id = $request->sprint_id;
    $nilai_final_member->save();

    return $nilai_final_member;
  }

  public function select(request $request,$id){
    $nilai_final_member = Nilai_final_member::find($id);

    return $nilai_final_member;
  }


  public function update(request $request,$id){
    $final_skor_member = $request->final_skor_member;
    $final_skor_tim_id = $request->final_skor_tim_id;
    $mahasiswa_id = $request->mahasiswa_id;
    $sprint_id = $request->sprint_id;

    $nilai_final_member = Nilai_final_member::find($id);
    if($tim_id != null){
      $nilai_final_member->final_skor_member = $final_skor_member;
     }
     if($nim != null){
      $nilai_final_member->final_skor_tim_id = $final_skor_tim_id;
    }
    if($final_skor != null){
      $nilai_final_member->mahasiswa_id = $mahasiswa_id;
    }
    if($sprint_id != null){
      $nilai_final_member->sprint_id = $sprint_id;
    }
    $nilai_final_member->save();

    $nilai_final_member;
  }

  public function delete($id){
    $nilai_final_member = Nilai_final_member::find($id);
    $nilai_final_member->delete();

    return $nilai_final_member;
  }
}
