<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalProcedure extends Model
{
    protected $table='medical_procedures';

    public function reference()   {
        return $this->belongsTo(Reference::class,'id_reference');
    }
     public function concepto()
    {
        return $this->belongsTo(Concepto::class,'id_concept');
    }

}
