<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    protected $table= 'allergies';

     public function patients(){
        return $this->belongsToMany( Patients::class,'allergies_patients','patient_id','allergy_id');
         
    }
}
