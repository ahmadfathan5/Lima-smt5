<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
  public $table = "tim";
  public $primaryKey = "id";
  public $incrementing = true;
  public $fillable = [
    'nama',
    'semester_id',
    'prodi_id',
    'final_skor',
    'created_by'.
    'updated_at',
    'created_at'];
}
