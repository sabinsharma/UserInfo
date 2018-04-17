<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
	protected $fillable=[
		'name',
		'prov_id',
		'telephone',
		'postal',
		'salary'
	];
    use SoftDeletes;

    //client/users table can have many provinces.
	public function province(){
		return $this->belongsTo('App\Province','prov_id');
	}
	protected $table='users';
	protected $dates=['deleted_at'];
}
