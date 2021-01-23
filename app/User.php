<?php

namespace App;

use App\Notifications\UserResetPassword;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*
    protected $fillable = [
        'name',
        'ci',
        'type_document',
        'email',
        'password',
        'last_name',
        'birth_date',
        'gender',
        'address',
        'province',
        'city',
        'phone',
        'url_image',
        'status'
    ];
    */
    protected $table='users';
    protected $guard_name = 'web';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    ///RELACION ONE TO ONE ENTRE EL MODELO USER Y PATIENTS
    public function patient(){
        return $this->hasOne('App\Patients','id_user');
    }
    ///RELACION ONE TO ONE ENTRE EL MODELO USER Y DOCTORES
    public function doctor(){
        return $this->hasOne(Doctor::class,'id_user');
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPassword($token));
    }
}
