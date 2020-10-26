<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
  public $table = "semester";
  public $primaryKey = "id";
  public $incrementing = true;
  public $fillable = [
    'nama',
    'updated_at',
    'created_at'];
}
