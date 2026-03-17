<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
{
    // ناخذ فقط رقم الهوية وكلمة المرور من الطلب
    $credentials = $request->only('job_identity_number', 'password');

    // نعلّم Auth أن يستخدم job_identity_number بدل email
    if (Auth::attempt([
        'job_identity_number' => $credentials['job_identity_number'],
        'password' => $credentials['password'],
    ])) {
        // إذا نجح الدخول، نعمل تجديد للجلسة
        $request->session()->regenerate();

        $user = Auth::user();

        // نحول حسب نوع المستخدم
        if ($user->usertype === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }

    // إذا فشل الدخول
    return back()->withErrors(['message' => 'بيانات غير صحيحة'])->withInput();
}
}