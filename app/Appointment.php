<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'id_doctor');
    }
    public function specailty()
    {
        return $this->belongsTo(Specialty::class,'id_specialty');
    }
    public function patient()
    {
        return $this->belongsTo(Patients::class,'id_patient');
    }
}
