<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeVoucher extends Model
{
    protected $table='type_vouchers';
    public function payments(){
        return $this->hasMany(Payment::class,'id_type');
    }
}
