<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CutiRecord extends Model
{
    protected $fillable = ['cuti_type_id',
							'user_id',
							'masa_berlaku',
							'masa_berakhir',
							'total'];
    public function cuti()
    {
    	return $this->hasMany('App\Cuti');
    }

    public function cutiType()
    {
    	return $this->belongsTo('App\CutiType','cuti_type_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function getSisaAttribute()
    {
    	if ($this->attributes['terpakai'] == 0) {
    		return 0;
    	}else{
    		return $this->attributes['sisa'] = $this->attributes['total'] - $this->attributes['terpakai'];
    	}
    }
}
