<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiagnosticsPatient extends Model
{
     protected $table = 'diagnostics_patients';

    public function allergy()
    {
        return $this->belongsTo(Allergy::class,'diagnostic_id');
    }
    public function diagnostic()
    {
        return $this->belongsTo(Diagnostic::class,'diagnostic_id');
    }
    public function patient()
    {
        return $this->belongsTo(Patients::class,'patient_id');
    }



}
