<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultHome extends Model
{
    protected $table = 'result_homes';

    protected $fillable = [
        'user_id',
        'old_180',
        'new_180',
        'date',
        'amount_due'
    ];

    // كل نتيجة تنتمي لمستخدم واحد
    public function user()
    {
        return $this->belongsTo(UserHome::class, 'user_id');
    }
}