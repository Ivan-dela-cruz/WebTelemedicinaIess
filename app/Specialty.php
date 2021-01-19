<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = [
        'name',
        'description',
        'url_image',
        'status'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'id_specialty');
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class, 'id_specialty');
    }


}
