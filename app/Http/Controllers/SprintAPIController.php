<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sprint;
use Illuminate\Support\Facades\DB;

class SprintAPIController extends Controller
{
  public function __construct()
  {
      parent::__construct();
  }
  public function index()
  {
    $sprint = Sprint::all();

    return $sprint;
  }

  public function create(request $request){
    $sprint = new sprint;
    $sprint->nama = $request->nama;
    $sprint->save();

    $user = DB::table('user')
                ->select(DB::raw('id'))
                ->get();

    foreach($user as $i){
      app('App\Http\Controllers\PointMemberAPIController')->createT($sprint->id,$i->id);
    }

    return $sprint;
  }

  public function select(request $request,$id){
    $sprint = Sprint::find($id);

    return $sprint;
  }

  public function update(request $request,$id){
    $nama = $request->nama;

    $sprint = Sprint::find($id);
    if($nama != null){
      $sprint->nama = $nama;
     }

    $sprint->save();

    return $sprint;
  }

  public function delete($id){
    $sprint = Sprint::find($id);
    $sprint->delete();

    $user = DB::table('user')
                ->select(DB::raw('id'))
                ->get();

    foreach($user as $i){
      app('App\Http\Controllers\PointMemberAPIController')->deleteT($sprint->id,$i);
    }

    return $sprint;
  }
}
