<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // التحقق من صحة البيانات
        $request->validate([
            'subscription_number' => 'required',
            'password' => 'required',
        ]);

        // محاولة تسجيل الدخول
        if (!Auth::attempt([
            'subscription_number' => $request->subscription_number,
            'password' => $request->password
        ])) {
            return response()->json(['message' => 'البيانات غير صحيحة'], 401);
        }

        $user = Auth::user();

        return response()->json([
            'message' => 'تم تسجيل الدخول بنجاح',
            'usertype' => $user->usertype,
            'name' => $user->name,
        ]);
    }
}