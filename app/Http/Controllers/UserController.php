<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    public function index()
    {
      $users = User::all();
      return view('user.index',['users' => $users]);
    }

    public function select($id){

        $users = User::find($id);
      return view('user.index',['id' => $id,'users'=>$users]);
    }

    public function profil($id){
      return view('user.profil',['id' => $id]);
    }

    public function updateprofil($id){
      $users = User::find($id);
      return view('user.updateprofil',['id'=>$id,'users' => $users]);
    }

}
