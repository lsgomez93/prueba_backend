<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    //Realizamos la relación de muchos users a una city
    public function users(){

        return $this->hasMany(User::class);
    }
}
