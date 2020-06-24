<?php

namespace BrainApp;

use BrainApp\Patient;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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
     * Checking for whether user is patient,admin or researcher.
     *
     * @param string
     * @return boolean
     */

    public function hasStatus($status)
    {
        $status = collect(explode('|',$status));
        //Splits the status
        
        if (is_string($status)) {
            return $this->status === $status;
        }
        return $status->contains($this->status);
 
    }

    /**
     * Get the patient record associated with the user.
     * 
     */
    public function patient()
    {
        return $this->hasOne('BrainApp\Patient');
        
    }

    /**
     * 
     * Register Patient.
     * 
     */
    public function register(Patient $patient)
    {
      $this->patient()->save($patient);
    }

}
