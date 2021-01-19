<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    protected $table='medical_records';

    public function patient()
    {
        return $this->belongsTo( Patients::class,'id_patient');
    }

}
