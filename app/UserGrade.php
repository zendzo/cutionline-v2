<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class UserGrade extends Model
{
    public function user()
    {
    	return $this->hasOne(User::class,'user_grade_id');
    }
}
