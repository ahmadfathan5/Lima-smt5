<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tim;
use App\Prodi;
use App\Semester;
use Illuminate\Support\Facades\DB;

class DaftarAPIController extends Controller
{
  public function __construct()
  {
      parent::__construct();
  }

  public function index($prodiId,$timId)
  {
    $user = "";
    $namaProdi = "Pilih Prodi";
    $namaTim = "Pilih Kelompok";
    $user = DB::table('user')
            ->leftJoin('tim_member', 'tim_member.mahasiswa_id', '=', 'user.id')
            ->leftJoin('tim', 'tim.id', '=', 'tim_member.tim_id')
            ->leftJoin('prodi', 'prodi.id', '=', 'user.prodi_id')
            ->select(DB::raw('ANY_VALUE(user.id) as id,user.name,ANY_VALUE(tim.nama) as namatim,ANY_VALUE(prodi.nama) as namaprodi,ANY_VALUE(tim_member.id) as tim_member_id'))
            ->where('user.role','=','mahasiswa');

    if($prodiId != 0){
      $namaProdi= Prodi::select(DB::raw('nama'))->findOrFail($prodiId);
      $namaProdi = $namaProdi['nama'];
      $user = $user->where('user.prodi_id','=',$prodiId);
    }

    if($timId != 0){
      $namaTim= Tim::select(DB::raw('nama'))->findOrFail($timId);
      $namaTim = $namaTim['nama'];
      $user = $user->where('tim_member.mahasiswa_id', '=', 'user.id')
                    ->where('tim.id', '=', 'tim_member.tim_id');
    }

    $user = $user->groupby('user.name')
                ->get();
    return compact('user','namaProdi','namaTim','prodiId','timId');
  }

  public function tim($prodi_id)
  {
    $tim =DB::table('tim')
            ->leftJoin('prodi', 'prodi.id', '=', 'tim.prodi_id')
            ->select(DB::raw('tim.id,tim.nama'))
            ->where('tim.prodi_id', '=', $prodi_id)
            ->get();
      return view('daftar.tim')->with('tim', json_decode($tim, true));
  }

  public function tim_member($tim_id)
  {
    $user =DB::table('user')
            ->leftJoin('tim_member', 'tim_member.mahasiswa_id', '=', 'user.id')
            ->leftJoin('tim', 'tim.id', '=', 'tim_member.tim_id')
            ->select(DB::raw('user.id,user.name,tim.nama'))
            ->where('tim_member.tim_id', '=', $tim_id)
            ->get();
      return view('daftar.tim_member',['nama' => $user[0]->nama])->with('user', json_decode($user, true));
  }

  public function semester($userId)
  {
    $user = DB::table('user')
                ->select(DB::raw('user.id,name,nim'))
                ->where('user.id','=',$userId)
                ->first();
    $semester =DB::table('semester')
            ->Join('tim', 'tim.semester_id','=','semester.id')
            ->Join('tim_member', 'tim_member.tim_id','=','tim.id')
            ->Join('nilai_member', 'nilai_member.tim_member_id','=','tim_member.id')
            ->Join('user', 'user.id','=','tim_member.mahasiswa_id')
            ->select(DB::raw('ANY_VALUE(user.id) as user_id,ANY_VALUE(semester.id) as semester_id,tim.id as tim_id,tim_member.id as tim_member_id,semester.nama as namasemester,ANY_VALUE(tim.nama) as namatim,AVG(nilai_member.skor_member) as skor_member,ANY_VALUE(user.name) as name'))
            ->where('user.id', '=', $userId)
            ->orderby('semester.nama')
            ->groupby('semester.nama','tim_member.id','tim.id')
            ->get();
      return compact('semester','userId');
  }

  public function sprint($user_id,$tim_id,$semester_id)
  {
    $nama = DB::table('user')
                ->select(DB::raw('user.id,name,nim'))
                ->where('user.id','=',$user_id)
                ->first();
    $tim = DB::table('user')
                ->join('tim_member','tim_member.mahasiswa_id','=','user.id')
                ->join('tim','tim.id','=','tim_member.tim_id')
                ->select(DB::raw('tim.id'))
                ->where('user.id','=',$user_id)
                ->first();
    // $tim_id = 0;
    // foreach($tim as $i){
    //   $tim_id = $i;
    // }
    $sprint =DB::table('sprint')
            ->join('user','user.id','=','user.id')
            ->join('nilai_tim', 'nilai_tim.sprint_id', '=', 'sprint.id')
            ->Join('tim_member', 'tim_member.mahasiswa_id', '=', 'user.id')
            ->Join('tim', 'tim.id', '=', 'tim_member.tim_id')
            ->Join('semester', 'semester.id', '=', 'tim.semester_id')
            ->join('point_member','point_member.sprint_id','=','sprint.id')
            ->select(DB::raw('sprint.id as sprint_id,sprint.nama as nama, ANY_VALUE(nilai_tim.final_skor) as nilai,point_member.point as point,point_member.keterangan,point_member.id as point_member_id,ANY_VALUE(tim_member.id) as tim_member_id'))
            ->where('nilai_tim.tim_id','=',$tim_id)
            ->where('point_member.tim_member_id','=',$user_id)
            ->where('semester.id','=',$semester_id)
            ->orderby('sprint.nama')
            ->groupby('sprint.nama','point_member.point','point_member.keterangan','point_member.id','sprint.id')
            ->get();
      //return view('daftar.sprint',['user_id' => $user_id,'nama' =>  $nama[0]->name])->with('sprint', json_decode($sprint, true));
      return compact('sprint','nama','user_id','tim');
  }
}
