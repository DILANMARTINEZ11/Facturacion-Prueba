<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facturaProductos extends Model
{
    use HasFactory;

    // UNO A MUCHOS (INVERSA)
    public function productos(){
        return $this->belongsTo('App\Models\productos');
    }
    // UNO A MUCHOS (INVERSA)
    public function facturas(){
        return $this->belongsTo('App\Models\facturas');
    }
}
