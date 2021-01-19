<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    /*
    protected $fillable = [
        'instruction',
        'marital_status',
        'affiliate',
        'job',

        'allergy',
        'id_user',
        'blood_type',
        'observation',
        'history_medical'
    ];
*/
    protected $table = 'patients';

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class, 'id_patient');
    }

    ///RELACION ONE TO ONE ENTRE EL MODELO MEDICALRECORD Y PATIENTS
    public function medical_records()
    {
        return $this->hasOne(MedicalRecord::class, 'id_patient');
    }

    public function allergies()
    {
        return $this->belongsToMany(Allergy::class, 'allergies_patients', 'patient_id', 'allergy_id');

    }

    public function evolutions()
    {
        return $this->hasMany(Evolution::class, 'id_patient');

    }

    public function recipes()
    {
        return $this->hasMany(Recipes::class, 'id_patient');

    }

    public function files()
    {
        return $this->hasMany(Files::class, 'id_patient');

    }

    public function treatments()
    {
        return $this->hasMany(MedicalTreatment::class, 'id_patient');
    }

    public function vouchers()
    {
        return $this->belongsToMany(VoucherPayment::class, 'id_patient');
    }
    public function payments(){
        return $this->hasMany(Payment::class,'id_patient');
    }

}
