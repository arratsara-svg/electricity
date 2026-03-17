<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Subscriptions;
use App\Models\Electricity_Prices;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'usertype',
        'job_identity_number',
        'institution_center',
        'password',
    ];

    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class, 'subscription__users');
    }

    public function electricityPrices()
    {
        return $this->hasMany(Electricity_Prices::class);
    }
}
