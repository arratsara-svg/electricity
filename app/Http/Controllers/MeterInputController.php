<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeterInput;
use App\Models\Electricity_Prices;
use App\Models\Subscription;
use App\Models\Result;

class MeterInputController extends Controller
{
    /**
     * ✅ حفظ قراءة جديدة للعداد + حساب النتائج
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
            'current_180'     => 'required|numeric',
            'current_280'     => 'required|numeric',
            'reading_date'    => 'required|date',
        ]);

        // القراءة السابقة
        $previousReading = MeterInput::where('subscription_id', $validated['subscription_id'])
            ->orderBy('created_at', 'desc')
            ->first();

        $previous180 = $previousReading?->current_180 ?? 0;
        $previous280 = $previousReading?->current_280 ?? 0;

        // إنشاء القراءة الجديدة
        $newReading = MeterInput::create($validated);

        // ✅ الفروقات
        $Z1 = $newReading->current_180 - $previous180;
        $U1 = $newReading->current_280 - $previous280;
        $M  = $Z1 - (2 * $U1);

        // ✅ جلب الأسعار
        $price = Electricity_Prices::latest()->first();
        $P1 = $price?->purchase_price ?? 0;
        $P2 = $price?->sale_price ?? 0;
        $taxRate = 0.18;

        // ✅ الحسابات
        if ($M > 0) {
            $G = $M * $P1;
            $Q = $U1 * $P1 * $taxRate;
            $Y = $G + $Q;
        } elseif ($M == 0) {
            $G = 0;
            $Q = $U1 * $P1 * $taxRate;
            $Y = $Q;
        } else {
            $G = $M * $P2;
            $K = $M + $U1;
            $Q = abs($K) * $P1 * $taxRate;
            $Y = $Q + $G;
        }

        // ✅ حفظ النتيجة
        Result::updateOrCreate(
            ['meter_input_id' => $newReading->id],
            [
                'date'       => now()->toDateString(),
                'final_180'  => $Z1,
                'final_280'  => $U1,
                'amount_due' => $Y,
            ]
        );

        // ✅ إذا API → JSON
        if ($request->expectsJson()) {
            return response()->json([
                'message'              => 'تمت العملية بنجاح',
                'subscription_id'      => $validated['subscription_id'],
                'latest_reading_180'   => $newReading->current_180,
                'latest_reading_280'   => $newReading->current_280,
                'previous_reading_180' => $previous180,
                'previous_reading_280' => $previous280,
                'Z1 (diff 180)'        => $Z1,
                'U1 (diff 280)'        => $U1,
                'M'                    => $M,
                'purchase_price'       => $P1,
                'sale_price'           => $P2,
                'G'                    => $G,
                'Q (tax)'              => $Q,
                'amount_due (Y)'       => $Y,
            ]);
        }

        // ✅ إذا Web → Redirect
        return redirect()->route('subscription.page3')
            ->with('success', 'تم حفظ القراءة والنتائج بنجاح');
    }

    /**
     * ✅ معالجة آخر قراءة
     */
    public function process(Request $request)
    {
        $latest = MeterInput::latest()->first();
        if (!$latest) {
            return redirect()->back()->withErrors('لا توجد قراءات مسجلة');
        }

        $subscription = $latest->subscription;

        $previous = MeterInput::where('subscription_id', $subscription->id)
            ->where('id', '<', $latest->id)
            ->orderBy('created_at', 'desc')
            ->first();

        $previous180 = $previous?->current_180 ?? 0;
        $previous280 = $previous?->current_280 ?? 0;

        $Z1 = $latest->current_180 - $previous180;
        $U1 = $latest->current_280 - $previous280;
        $M  = $Z1 - (2 * $U1);

        $price = Electricity_Prices::latest()->first();
        if (!$price) {
            return redirect()->back()->withErrors('لم يتم العثور على سعر الكهرباء');
        }
        $P1 = $price->purchase_price;
        $P2 = $price->sale_price;
        $taxRate = 0.18;

        if ($M > 0) {
            $G = $M * $P1;
            $Q = $U1 * $P1 * $taxRate;
            $Y = $G + $Q;
        } elseif ($M == 0) {
            $G = 0;
            $Q = $U1 * $P1 * $taxRate;
            $Y = $Q;
        } else {
            $G = $M * $P2;
            $K = $M + $U1;
            $Q = abs($K) * $P1 * $taxRate;
            $Y = $Q + $G;
        }

        Result::updateOrCreate(
            ['meter_input_id' => $latest->id],
            [
                'date'       => now()->toDateString(),
                'final_180'  => $Z1,
                'final_280'  => $U1,
                'amount_due' => $Y,
            ]
        );

        return redirect()->back()->with('success', 'تمت العملية بنجاح');
    }

    /**
     * ✅ عرض صفحة النتائج (معدلة لجلب البيانات من DB)
     */
    public function showPage3()
    {
        // آخر قراءة
        $newReading = MeterInput::latest()->first();

        if (!$newReading) {
            return view('user.page3', [
                'Z1'         => null,
                'U1'         => null,
                'newReading' => null,
                'amountDue'  => null,
            ]);
        }

        // النتيجة المرتبطة بهذه القراءة
        $result = Result::where('meter_input_id', $newReading->id)->first();

        return view('user.page3', [
            'Z1'         => $result?->final_180,
            'U1'         => $result?->final_280,
            'newReading' => $newReading,
            'amountDue'  => $result?->amount_due,
        ]);
    }
}