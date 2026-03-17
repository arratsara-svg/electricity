<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MeterInput;

class Result extends Model
{
    use HasFactory;

    protected $table = 'results';

    protected $fillable = [
        'meter_input_id',
        'date',
        'final_180',
        'final_280',
        'amount_due',
    ];

    public function meterInput()
    {
        // حدد المفتاح الأجنبي 'meter_input_id' بشكل صريح
        return $this->belongsTo(MeterInput::class, 'meter_input_id');
    }
}