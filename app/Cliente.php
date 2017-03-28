<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
	use SoftDeletes;
   protected $dates = ['deleted_at'];

 	protected $table='cliente';
    protected $guarded = [];
    //public $incrementing = false;
    protected $primaryKey='id_cliente';

    public function deudas(){
    	 return $this->hasMany('App\Deuda','id_cliente');
    }
}
