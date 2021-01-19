<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    protected $table='recipes';
    public function patient(){
        return $this->belongsTo(Patients::class,'id_patient');
    }
}
