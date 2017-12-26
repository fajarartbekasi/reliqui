<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function doctor()
    {
        return $this->hasOne('App\Models\Doctor\Doctor');
    }

    public function patient()
    {
        return $this->hasOne('App\Models\Patient\Patient');
    }

    public function appointment()
    {
        return $this->hasMany('App\Models\Appointment\Appointment');
    }

    public function medicalRecord()
    {
        return $this->hasMany('App\Models\MedicalRecord\MedicalRecord');
    }
}
