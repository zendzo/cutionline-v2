<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserProfile extends Model
{
    protected $fillable = ['alamat',
							'kcp',
							'pendidikan',
							'user_id'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
