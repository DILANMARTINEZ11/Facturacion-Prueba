<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;

    
    // UNO A MUCHOS
    public function productos(){
        return $this->hasMany('App\Models\productos');
    }

}
