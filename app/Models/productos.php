<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    use HasFactory;

    // UNO A MUCHOS
    public function facturaProductos(){
        return $this->hasMany('App\Models\facturaProductos');
    }

     // UNO A MUCHOS (INVERSA)
     public function categorias(){
        return $this->belongsTo('App\Models\categorias');
    }

}
