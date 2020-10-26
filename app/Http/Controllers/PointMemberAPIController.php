<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Point_member;
use App\User;
use App\Sprint;
use Illuminate\Support\Facades\DB;

class PointMemberAPIController extends Controller
{
  public function __construct()
  {
      parent::__construct();
  }

  public function index()
  {
    return Point_member::all();
  }

  public function create(request $request){
      $point_member = new Point_member;
      $point_member->point = -1 * count($request->keterangan);
      $keterangan = $request->keterangan;
      $point_member->keterangan =implode(',',$keterangan);
      $point_member->dosen_scrum_master_id = $request->dosen_scrum_master_id;
      $point_member->mahasiswa_id = $request->mahasiswa_id;
      $point_member->sprint_id = $request->sprint_id;
      $point_member->save();

      return $point_member;
  }

  //buat point_member jika sprint di buat
  public function createT($sprint_id,$mahasiswa_id){
      $point_member = new Point_member;
      $point_member->point = 1;
      $point_member->keterangan ="";
      $point_member->dosen_scrum_master_id = 16;
      $point_member->mahasiswa_id =$mahasiswa_id;
      $point_member->sprint_id =$sprint_id;
      $point_member->save();

      return $point_member;
  }

  public function select($id){
    $point_member =DB::table('point_member')
            ->leftJoin('sprint', 'sprint.id', '=', 'point_member.sprint_id')
            ->leftJoin('user', 'user.id', '=', 'point_member.tim_member_id')
            ->select(DB::raw('point_member.id,user.name,sprint.nama,point_member.point'))
            ->where('user.id', '=', $id)
            ->orderby('sprint.nama')
            ->get();
    return $point_member;
  }

  public function updatePage($userId,$sprintId,$timmemberId,$timId,$semesterId){
      $user = User::findOrFail($userId);
      $sprint = Sprint::findOrFail($sprintId);
      //
      // $tim = DB::table('tim')
      //             ->join('tim_member','tim_member.tim_id','=','tim.id')
      //             ->select(DB::raw('tim.id'))
      //             ->where('tim_member.id','=',$timmemberId)
      //             ->first();
      // $tim_id = 0;
      // foreach($tim as $i){
      //   $tim_id = $i;
      // }
      //
      // $semester = DB::table('semester')
      //             ->join('tim','tim.semester_id','=','semester.id')
      //             ->select(DB::raw('semester.id'))
      //             ->where('tim.id','=',$tim_id)
      //             ->first();
      // $semester_id = 0;
      // foreach($semester as $i){
      //   $semester_id = $i;
      // }
      $semester_id = $semesterId;
      $tim_id = $timId;
      $point_member = DB::table('point_member')
              ->select(DB::raw('*'))
              ->where('point_member.tim_member_id','=',$timmemberId)
              ->where('point_member.sprint_id','=',$sprintId)
              ->first();
      return compact('user','sprint','point_member','tim_id','semester_id');
  }

  public function update(request $request,$userId,$sprintId,$timmemberId,$timId,$semesterId){
      if (is_null($request->keterangan)) {
        $keterangan = $request->keterangan;
        $point = 0;
        $dosen_scrum_master_id = $request->dosen_scrum_master_id;
      }
      else {
        $keterangan = implode(',',$request->keterangan);
        $point = -1 * count($request->keterangan);
        $dosen_scrum_master_id = $request->dosen_scrum_master_id;
      }

      $point_member = Point_member::where('point_member.tim_member_id', $userId)
        ->where('point_member.sprint_id',$sprintId)
        ->update([
           'keterangan'=> $keterangan,
           'point'=> $point,
           'dosen_scrum_master_id'=> $dosen_scrum_master_id,
           'sprint_id'=> $sprintId,
        ]);
      // echo "$keterangan";
      return redirect($request->redirect_url);
  }

  public function updatemobile(request $request,$userId,$sprintId){
      $keterangan = $request->keterangan;
      $keterangan = explode(',',$request->keterangan);
      $point = -1 * count($keterangan);
      $keterangan = $request->keterangan;
      $dosen_scrum_master_id = $request->dosen_scrum_master_id;

      $point_member = Point_member::where('point_member.tim_member_id', $userId)
        ->where('point_member.sprint_id',$sprintId)
        ->update([
           'keterangan'=> $keterangan,
           'point'=> $point,
           'dosen_scrum_master_id'=> $dosen_scrum_master_id,
           'mahasiswa_id'=> $userId,
           'sprint_id'=> $sprintId,
        ]);

      return $point_member;
  }

  public function delete($id){
    $point_member = Point_member::find($id);
    $point_member->delete();

    return $point_member;
  }

  //delete point jika sprint di delete
  public function deleteT($sprint_id,$mahasiswa_id){
    $point_member = DB::table('point_member')
                ->where('sprint_id','=',$sprint_id)
                ->where('mahasiswa_id','=',$mahasiswa_id)
                ->get();
    $point_member->delete();

    return $point_member;
  }
}
