<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeterInput extends Model
{
    use HasFactory;

    protected $table = 'meter_inputs';

    protected $fillable = [
        'subscription_id',
        'current_180',
        'current_280',
        'reading_date',
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }

    public function result()
    {
        return $this->hasOne(Result::class, 'meter_input_id');
    }

    public function results()
        {
            return $this->hasMany(Result::class, 'meter_input_id');
                        
        }
}
