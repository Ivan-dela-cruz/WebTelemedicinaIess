<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table='references';
    public function medicalprocedures()
    {
        return $this->hasMany(MedicalProcedure::class,'id_reference');
    }
}
