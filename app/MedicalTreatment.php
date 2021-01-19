<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalTreatment extends Model
{
    protected $table = 'medical_treatments';

    public function payments()
    {
        return $this->hasMany(Payment::class, 'id_treatment');
    }

}
