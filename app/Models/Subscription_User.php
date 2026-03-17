<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Subscription_User extends Pivot
{
    use HasFactory;

    protected $table = 'subscription__users';

    protected $fillable = [
        'user_id',
        'subscription_id',
    ];
}
