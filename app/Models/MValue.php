<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MeterInput;
class MValue extends Model
{
    use HasFactory;

    protected $fillable = ['value', 'meter_input_id'];

    public function meterInput()
    {
        return $this->belongsTo(MeterInput::class);
    }
}