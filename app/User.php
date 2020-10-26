<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    public $table = "user";
    public $primaryKey = "id";
    public $incrementing = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'email',
        'nim',
        'nidn',
        'tlahir',
        'tgllahir',
        'role',
        'nohp',
        'gender',
        'foto',
        'prodi_id',
        'fingerprint_code',
        'pin',
        'updated_at',
        'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function prodi()
    {
    return $this->hasOne('App\Prodi', 'id', 'prodi_id');
    }

    public function absenceLog()
    {
        return $this->hasMany('App\LogAbsence', 'id', 'prodi_id');

    }

}
