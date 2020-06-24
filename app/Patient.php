<?php

namespace BrainApp;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * 
     * Get the User that owns the patient or Researcher/Admin that registered the Patient.
     * 
     */
    public function user()
    {

        return $this->belongsTo('BrainApp\User');

    }
}