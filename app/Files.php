<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table = 'files';

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'id_patient');
    }
}
