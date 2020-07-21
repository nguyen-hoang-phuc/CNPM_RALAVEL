<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill_detail extends Model
{
   protected $table = 'bill_detail';
	public function products() {
		return $this->hasMany('App\products','id_product','id');
	}
	public function bills() {
		return $this->belongsTo('App\bills','id_bill','id');
	}
}
