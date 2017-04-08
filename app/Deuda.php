<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deuda extends Model
{
    use SoftDeletes;
      protected $dates = ['deleted_at'];

 	protected $table='deuda';
    protected $guarded = [];
    //public $incrementing = false;
    protected $primaryKey='id_deuda';


   public function clientes(){

   	 return $this->belongsTo('App\Cliente','id_cliente');
   }
}
