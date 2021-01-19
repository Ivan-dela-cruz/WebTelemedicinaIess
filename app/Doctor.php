<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    /*
    protected  $fillable = [
        'academic_title',
        'graduation_date',
        'marital_status',
        'biography',
        'id_user',
        'id_specialty'
    ];
*/
    protected $table = 'doctors';

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
    public function specialty()
    {
        return $this->hasMany(Specialty::class,'id_specialty');
    }
    public function appointment()
    {
        return $this->hasMany(Appointment::class,'id_doctor');
    }
    public function recipes(){
        return $this->hasMany( Recipes::class,'id_doctor');

    }
    public function evolutions()
    {
        return $this->hasMany(Evolution::class, 'id_doctor');
    }
    public function payments(){
        return $this->hasMany(Payment::class,'id_doctor');
    }
}
