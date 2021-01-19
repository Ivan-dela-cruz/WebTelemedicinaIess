<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoucherPayment extends Model
{
    protected $table = 'voucher_payments';

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'id_patient');
    }

    public function treatment()
    {
        return $this->belongsTo(MedicalTreatment::class, 'id_treatment');
    }
}
