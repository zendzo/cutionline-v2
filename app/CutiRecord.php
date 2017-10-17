<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cuti;

class CutiRecord extends Model
{
    //

    public function cuti()
    {
    	return $this->hasMany(Cuti::class);
    }
}
