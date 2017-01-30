<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
   protected $guarded = [];
   protected $primaryKey='id_producto';

}
