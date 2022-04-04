<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'level',
    ];

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

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
            ->isoFormat('dddd, D MMMM Y');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])
            ->diffForHumans();
    }

    // Relationship
    public function marital_status()
    {
        return $this->belongsTo('App\Models\MaritalStatus', "marital_id");
    }
    public function family_status()
    {
        return $this->belongsTo('App\Models\FamilyStatus', "family_id");
    }
    public function family_c_status()
    {
        return $this->belongsTo('App\Models\FamilyCStatus', "family_c_id");
    }
    public function rt()
    {
        return $this->belongsTo('App\Models\RT', "rt_id");
    }
}
