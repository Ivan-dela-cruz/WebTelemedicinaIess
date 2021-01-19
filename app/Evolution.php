<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evolution extends Model
{
    protected $table ='evolutions';
    public function patient(){
        return $this->belongsTo(Patients::class, 'id_patient');
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class,'id_doctor');
    }
    public function diagnostic(){
        return $this->belongsTo(Diagnostic::class,'id_diagnostic');
    }
}
