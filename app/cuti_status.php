<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cuti;

class cuti_status extends Model
{
    protected $fillable = ['status'];


    public function cuti()
    {
    	return $this->hasOne(Cuti::class);
    }
}
