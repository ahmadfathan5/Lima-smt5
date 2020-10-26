<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tim_member extends Model
{
  public $table = "tim_member";
  public $primaryKey = "id";
  public $incrementing = true;
  public $fillable = [
    'tim_id',
    'mahasiswa_id',
    'peran_id',
    'tanggung_jawab',
    'final_skor',
    'semester_id',
    'created_by',
    'updated_at',
    'created_at'
  ];
}
