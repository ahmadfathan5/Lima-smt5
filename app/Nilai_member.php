<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai_member extends Model
{
  public $table = "point_member";
  public $primaryKey = "id";
  public $incrementing = true;
  public $fillable = [
    'final_skor_member',
    'final_skor_tim_id',
    'mahasiswa_id',
    'sprint_id',
    'updated_at',
    'created_at'
  ];
}
