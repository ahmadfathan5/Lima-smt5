<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
  public $table = "prodi";
  public $primaryKey = "id";
  public $incrementing = true;
  public $fillable = [
    'nama',
    'updated_at',
    'created_at'];
}
