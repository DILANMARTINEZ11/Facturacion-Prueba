<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facturas extends Model
{
    use HasFactory;

     // UNO A MUCHOS
     public function facturaProductos(){
        return $this->hasMany('App\Models\facturaProductos');
    }

}
