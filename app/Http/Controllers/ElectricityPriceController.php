<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Electricity_Prices;

class ElectricityPriceController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'purchase_price' => 'required|numeric|min:0',
            'sale_price'     => 'required|numeric|min:0',
        ]);

        // جلب أول سجل أو إنشاء سجل جديد
        $price = Electricity_Prices::first();

        if ($price) {
            $price->update([
                'purchase_price' => $request->purchase_price,
                'sale_price'     => $request->sale_price,
            ]);
        } else {
            Electricity_Prices::create([
                'user_id'        => $request->user_id ?? 1,
                'purchase_price' => $request->purchase_price,
                'sale_price'     => $request->sale_price,
            ]);
        }

        // إن كان الطلب متوقع JSON (مثلاً من AJAX) نرجع JSON
        if ($request->expectsJson()) {
            return response()->json(['message' => 'تمت العملية بنجاح']);
        }

        // وإلّا نرجع للصفحة نفسها مع رسالة نجاح في الـ session
        return redirect()->back()->with('success', 'تم تعديل الأسعار بنجاح');
    }
}