<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
	//hasmany means one to many
	public function clients(){
		return $this->hasMany('App\Client');
	}
}
