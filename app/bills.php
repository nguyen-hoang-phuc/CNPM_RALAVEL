<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bills extends Model
{
    protected $table = 'bills';
	public function customer() {
		return $this->belongsTo('App\customer','id_customer','id');
	}
	public function bill_detail() {
		return $this->hasMany('App\bill_detail','id_bill','id');
	}
}
