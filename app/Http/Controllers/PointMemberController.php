<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Point_member;
use App\User;
use App\Sprint;
use Illuminate\Support\Facades\DB;

class PointMemberController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      parent::__construct();
  }

  public function index()
  {
    return view('point_member.index');
  }

  public function createPage(){
    return view('point_member.create');

  }

  public function updatePage($userId,$sprintId,$timmemberId,$timId,$semesterId){
    return view('point_member.update',['userId' => $userId,'sprintId' => $sprintId,'timmemberId' => $timmemberId,'timId' => $timId,'semesterId' => $semesterId]);

  }
}
