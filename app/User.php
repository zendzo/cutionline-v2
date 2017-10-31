<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Role;
use App\Cuti;
use App\UserProfile;
use App\UserGrade;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'user_grade_id', 'NPP', 'join_year', 'name', 'email', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'join_year'
    ];

    public $jatahCuti = 0;

    public function cutis()
    {
        return $this->hasMany(Cuti::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function grade()
    {
        return $this->belongsTo(UserGrade::class);
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function fullName()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function setJoinYearAttribute($value)
    {
        $this->attributes['join_year'] = Carbon::createFromFormat('d/m/Y',$value)->toDateString();
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function routeNotificationForSmsGateway()
    {
        return $this->phone;
    }

    public function masaKerja()
    {
        $now = Carbon::now();

        $masa_kerja = Carbon::createFromFormat('Y-m-d',$this->attributes['join_year']);

        return $now->diffInYears($masa_kerja);
    }

    public function jatahCuti()
    {
        
    }
}
