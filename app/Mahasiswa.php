<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    public $table = "mahasiswa";
    public $primaryKey = "id";
    public $incrementing = true;
    public $fillable = [
      'nama',
      'nim',
      'tlahir',
      'tgllahir',
      'prodi_id',
      'gender',
      'email',
      'nohp',
      'semester',
      'foto',
      'updated_at',
      'created_at'];
}
