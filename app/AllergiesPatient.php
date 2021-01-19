<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllergiesPatient extends Model
{
     protected $table = 'allergies_patients';

    public function allergy()
    {
        return $this->belongsTo(Allergy::class,'allergy_id');
    }
    
    public function patient()
    {
        return $this->belongsTo(Patients::class,'patient_id');
    }
}
