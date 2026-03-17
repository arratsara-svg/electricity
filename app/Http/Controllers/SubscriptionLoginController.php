<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionLoginController extends Controller
{
    public function showForm()
    {
        return view('user.subscription-login'); // عرض الفورم
    }

    public function check(Request $request)
    {
        $request->validate([
            'subscription_number' => 'required|string',
        ]);

        $subscription = Subscription::where('subscription_number', $request->subscription_number)->first();

        if (!$subscription) {
            if ($request->expectsJson()) {
                // ✅ إذا طلب API → رجع JSON خطأ
                return response()->json(['error' => '⚠️ رقم الاشتراك غير موجود'], 404);
            }

            // ✅ إذا طلب Web → رجع للصفحة مع error message
            return back()->with('error', '⚠️ رقم الاشتراك غير موجود');
        }

        if ($request->expectsJson()) {
            // ✅ إذا طلب API → رجع بيانات JSON
            return response()->json([
                'message' => '✅ تم العثور على الاشتراك',
                'subscription' => $subscription
            ]);
        }

        // ✅ إذا طلب Web → خزن subscription_id بالجلسة وحول لصفحة page2
        $request->session()->put('subscription_id', $subscription->id);

        return redirect()->route('subscription.page2');
    }
}