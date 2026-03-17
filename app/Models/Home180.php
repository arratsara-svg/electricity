<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home180 extends Model
{
    protected $table = '180_home';

    protected $fillable = [
        'old_80',
        'new_80'
    ];

    public function userHomes()
    {
        return $this->hasMany(UserHome::class, 'home_id');
    }

    public function resultHomes()
    {
        return $this->hasMany(ResultHome::class, 'home_id');
    }
}