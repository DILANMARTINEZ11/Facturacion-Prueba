<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    use HasFactory;


    // UNO A MUCHOS (INVERSA)
    public function ciudades(){
        return $this->belongsTo('App\Models\ciudades');
    }

}
