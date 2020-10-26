<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CariController extends Controller
{
  public function index()
  {
    return view('cari.index');
  }

  public function cariPage(request $request)
  {
    return view('cari.index',['nama' => $request->name,'role' => 'mahasiswa']);
  }

  public function cari($nama,$role)
  {
    return view('cari.index',['nama' => $nama,'role' => $role]);
  }

}
