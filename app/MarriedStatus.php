<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarriedStatus extends Model
{
    public function user()
    {
    	return $this->hasOne('App\User','married_status_id');
    }
}
