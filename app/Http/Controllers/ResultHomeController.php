<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResultHome;

class ResultHomeController extends Controller
{
    /**
     * جلب النتيجة النهائية لمنزل معين
     */
    public function show($homeId)
    {
        $result = ResultHome::where('home_id', $homeId)->first();

        if (!$result) {
            return response()->json([
                'error' => 'لا توجد نتيجة لهذا المنزل'
            ], 404);
        }

        return response()->json([
            'home_id'    => $homeId,
            'amount_due' => $result->amount_due,
            'date'       => $result->date
        ]);
    }
}