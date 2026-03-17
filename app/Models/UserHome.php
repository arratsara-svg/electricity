<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserHome extends Authenticatable
{
    protected $table = 'user_home';

    protected $fillable = [
        'name_user',
        'email_user',
        'password_user',
        'usertype',
        'subscription_id'
    ];

    protected $hidden = [
        'password_user',
    ];

    public function getAuthPassword()
    {
        return $this->password_user;
    }

    // علاقة 1 إلى متعدد مع النتائج
    public function results()
    {
        return $this->hasMany(ResultHome::class, 'user_id');
    }
}