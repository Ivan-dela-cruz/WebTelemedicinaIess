<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table='payments';

    public function type(){
        return $this->belongsTo(TypeVoucher::class,'id_type');
    }
    public function treatment(){
        return $this->belongsTo(MedicalTreatment::class,'id_treatment');
    }
    public function patient(){
        return $this->belongsTo(Patients::class,'id_patient');
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class,'id_doctor');
    }

}
