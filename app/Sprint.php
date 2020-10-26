<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
  public $table = "sprint";
  public $primaryKey = "id";
  public $incrementing = true;
  public $fillable = [
    'project_id',
    'nama',
    'deskripsi',
    'tgl_mulai',
    'tgl_selesai',
    'deleted_at',
    'updated_at',
    'created_at'];
}
