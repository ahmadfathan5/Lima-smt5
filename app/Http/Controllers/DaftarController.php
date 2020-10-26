<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      parent::__construct();
  }

  public function index($prodiId,$timId){
    return view('daftar.index',['prodiId' => $prodiId,'timId' => $timId]);

  }

  public function semester($user_id){
    return view('daftar.semester',['userId' => $user_id]);
  }

  public function prodi()
  {
      return view('daftar.prodi');
  }

  public function sprint($user_id,$tim_id,$semester_id)
  {
      return view('daftar.sprint',['userId' => $user_id,'timId' => $tim_id,'semesterId' => $semester_id]);
  }

}
