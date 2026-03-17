<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_owner_name' => 'required|string|max:255',
            'company_manager_name' => 'required|string|max:255',
            'license_number' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'subscription_number' => 'required|string|max:255|unique:subscriptions,subscription_number',
        ]);

        $subscription = Subscription::create($request->all());

        return redirect()->back()->with('success', 'تم إنشاء الشركة بنجاح');
    }

    public function showForm()
    {
        return view('admin.page2'); // نموذج البحث عن الاشتراك
    }
public function search(Request $request)
{
    $subscriptionNumber = $request->input('subscription_number');

    $subscription = Subscription::where('subscription_number', $subscriptionNumber)
        ->with(['meterInputs.results']) // ✅ بدل result
        ->first();

    if (!$subscription) {
        return back()->with('error', 'رقم الاشتراك غير موجود');
    }

    return view('admin.subscription-results', compact('subscription'));
}
}
