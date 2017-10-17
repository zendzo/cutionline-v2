<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cuti;

class CutiType extends Model
{

	protected $fillable = ['type'];
	
    public function cuti()
    {
    	return $this->hasOne(Cuti::class);
    }
}
