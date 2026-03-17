<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home180;
use App\Models\ResultHome;

class Home180CalcController extends Controller
{
    /**
     * ✅ حفظ القراءة الجديدة new_80 وحساب الفرق وإرجاع النتيجة
     */
    public function calculate(Request $request, $homeId)
    {
        $validated = $request->validate([
            'new_80' => 'required|numeric'
        ]);

        // جلب السجل المطلوب
        $home = Home180::find($homeId);

        if (!$home) {
            return response()->json(['error' => 'لم يتم العثور على المنزل'], 404);
        }

        // القراءة القديمة
        $old = $home->old_80 ?? 0;

        // القراءة الجديدة
        $new = $validated['new_80'];

        // الفرق
        $D = $new - $old;

        // حساب Y حسب الشروط
        if ($D > 0 && $D <= 300) {
            $Y = $D * 600;
        } elseif ($D > 300) {
            $Y = $D * 1400;
        } else {
            $Y = 0; // إذا كان الفرق صفر أو سالب
        }

        // تحديث القراءة الجديدة في جدول 180_home
        $home->update([
            'new_80' => $new
        ]);

        // حفظ النتيجة في جدول result_home
        $result = ResultHome::updateOrCreate(
            ['home_id' => $home->id],
            [
                'date'       => now()->toDateString(),
                'amount_due' => $Y
            ]
        );

        return response()->json([
            'message'        => 'تم الحساب وتسجيل النتيجة بنجاح',
            'home_id'        => $home->id,
            'old_80'         => $old,
            'new_80'         => $new,
            'difference (D)' => $D,
            'amount_due (Y)' => $Y,
            'result_saved'   => $result
        ]);
    }
}