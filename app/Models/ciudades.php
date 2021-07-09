<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ciudad extends Model
{
    use HasFactory;

    // UNO A MUCHOS
    public function clientes(){
        return $this->hasMany('App\Models\clientes');
    }

}
