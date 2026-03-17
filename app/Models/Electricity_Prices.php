<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Electricity_Prices extends Model
{
    use HasFactory;

    protected $table = 'electricity__prices';

    protected $fillable = [
        'user_id',
        'purchase_price',
        'sale_price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}