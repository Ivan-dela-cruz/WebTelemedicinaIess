<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    protected $table = 'diagnostics';

    public function evolutions()
    {
        return $this->hasMany(Evolution::class, 'id_diagnostic');
    }
    public function diagnostics_patient()
    {
        return $this->hasMany(DiagnosticsPatient::class, 'diagnostic_id');
    }

}
