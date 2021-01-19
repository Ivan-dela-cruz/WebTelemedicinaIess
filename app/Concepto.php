<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    protected $table = 'conceptos';
    public function medicalprocedures()
    {
        return $this->hasMany(MedicalProcedure::class, 'id_concept');
    }
}
