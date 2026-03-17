<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MeterInput;
class Subscription extends Model
{
    use HasFactory;

    protected $table = 'subscriptions';

    protected $fillable = [
        'company_name',
        'company_owner_name',
        'company_manager_name',
        'license_number',
        'location',
        'subscription_number',
    ];

    // العلاقة مع المستخدمين (لو عندك جدول pivot باسم subscription_user)
    public function users()
    {
        return $this->belongsToMany(User::class, 'subscription_user');
    }

    // العلاقة مع قراءات العداد
   public function meterInputs()
{
    return $this->hasMany(MeterInput::class, 'subscription_id')
                ->orderBy('reading_date', 'desc'); // ✅ الترتيب هون
}
}