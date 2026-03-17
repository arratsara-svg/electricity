<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\UserHome;
use App\Models\ResultHome;

class UserHomeController extends Controller
{
    // صفحة تسجيل الدخول / التسجيل
    public function showAuth()
    {
        return view('auth');
    }

    // تسجيل الدخول
    public function loginUser(Request $request)
    {
        $request->validate([
            'email_user' => 'required|email',
            'password_user' => 'required|string'
        ]);

        $user = UserHome::where('email_user', $request->email_user)->first();

        if (!$user || !Hash::check($request->password_user, $user->password_user)) {
            return back()->withErrors(['email_user' => 'الإيميل أو كلمة المرور غير صحيحة']);
        }

        Auth::guard('home')->loginUsingId($user->id);
        session(['user_id' => $user->id]);

        return redirect()->route('home1')->with('success', 'تم تسجيل الدخول بنجاح!');
    }

    // تسجيل حساب جديد
    public function registerUser(Request $request)
    {
        $request->validate([
            'name_user'       => 'required|string|max:255',
            'email_user'      => 'required|email|unique:user_home,email_user',
            'password_user'   => 'required|string|min:6',
            'subscription_id' => 'nullable|numeric'
        ]);

        $user = UserHome::create([
            'name_user'       => $request->name_user,
            'email_user'      => $request->email_user,
            'password_user'   => Hash::make($request->password_user),
            'subscription_id' => $request->subscription_id,
            'usertype'        => 'user home'
        ]);

        Auth::guard('home')->loginUsingId($user->id);
        session(['user_id' => $user->id]);

        return redirect()->route('home1')->with('success', 'تم إنشاء الحساب بنجاح!');
    }

    // الصفحة الرئيسية
    public function home()
    {
        $user = UserHome::find(session('user_id'));

        return view('home1', [
            'subscription_id' => $user ? $user->subscription_id : null
        ]);
    }

    // حفظ قراءة 180 أو فتح فواتير سابقة
    public function save180(Request $request)
    {
        $request->validate([
            'new_180'    => 'required|numeric',
            'date_input' => 'required|date'
        ]);

        $user = UserHome::find(session('user_id'));
        if (!$user) {
            return redirect()->route('auth.show')->withErrors(['error' => 'يجب تسجيل الدخول أولاً']);
        }

        // زر: فواتير سابقة
        if ($request->action === 'bills') {
            return redirect()->route('old-bills');
        }

        // جلب آخر قراءة
        $lastResult = ResultHome::where('user_id', $user->id)->latest()->first();
        $old_180 = $lastResult->new_180 ?? 0;
        $new_180 = $request->new_180;
        $D = $new_180 - $old_180;

        // حساب قيمة الفاتورة
        if ($D > 0 && $D <= 300) {
            $amount_due = $D * 600;
        } elseif ($D > 300) {
            $amount_due = $D * 1400;
        } else {
            $amount_due = 0;
        }

        // حفظ الفاتورة بقاعدة البيانات
        ResultHome::create([
            'user_id'    => $user->id,
            'old_180'    => $old_180,
            'new_180'    => $new_180,
            'date'       => $request->date_input,
            'amount_due' => $amount_due
        ]);

        // عرض صفحة النتيجة مع البيانات
        return view('target-page', [
            'subscription_id' => $user->subscription_id,
            'old_180'         => $old_180,
            'new_180'         => $new_180,
            'difference'      => $D,
            'amount_due'      => $amount_due,
            'date'            => $request->date_input
        ]);
    }

    // عرض جميع الفواتير السابقة
    public function oldBills()
    {
        $user = UserHome::find(session('user_id'));

        if (!$user) {
            return redirect()->route('auth.show');
        }
        $bills = ResultHome::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->get();

        return view('old_bills', compact('bills', 'user'));
    }
}