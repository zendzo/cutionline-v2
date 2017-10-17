<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class UserGrade extends Model
{
    public function user()
    {
    	return $this->hasMany(User::class);
    }
}
