<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\CutiType;
use App\cuti_status;
use App\User;
use App\CutiRecord;

class Cuti extends Model
{
    protected $fillable = [
	'cuti_type_id',
	'mulai',
	'berakhir',
	'masa_tahun',
	'keperluan',
	'alamat',
	'catatan_umc',
	'permohonan_lain',
	'rekomendasi_1',
	'rekomendasi_2',
	'status',
	'user_id',
	'total'
    ];

    protected $dates = ['mulai','berakhir','masa_tahun'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cutiType()
    {
        return $this->belongsTo(CutiType::class);
    }

    public function cutiStatus()
    {
        return $this->belongsTo(cuti_status::class);
    }

    public function cutiRecord()
    {
        return $this->belongsTo(CutiRecord::class);
    }

    public function setMasaTahunAttribute($value)
    {
    	$this->attributes['masa_tahun'] = Carbon::createFromFormat('Y',$value)->toDateString();	
    }
}
