<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ElectricityPriceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubscriptionLoginController;
use App\Http\Controllers\MeterInputController;
use App\Http\Controllers\MValueProcessorController;

use App\Http\Controllers\UserHomeController;

// صفحة تسجيل دخول الموظفين
Route::get('/login', function () {
    return view('login');
})->name('login.form');

Route::post('/login', [LoginController::class, 'login'])->name('login');

// صفحة إدخال رقم الاشتراك (عامة للزوار)
Route::get('/dashboard', [SubscriptionLoginController::class, 'showForm'])->name('subscription.form');
Route::post('/subscription-check', [SubscriptionLoginController::class, 'check'])->name('subscription.check');

// صفحة بعد إدخال رقم الاشتراك (مخزنة داخل مجلد user/page2.blade.php)
Route::view('/user/page2', 'user.page2')->name('subscription.page2');

// الصفحات العامة
Route::view('/about', 'about')->name('about');
Route::view('/investment-return', 'investment-return')->name('investment-return');
Route::view('/environmental-benefits', 'environmental-benefits')->name('environmental-benefits');
Route::view('/stakeholders', 'stakeholders')->name('stakeholders');
Route::view('/workflow', 'workflow')->name('workflow');
Route::view('/licenses', 'licenses')->name('licenses');
Route::view('/invoice', 'invoice')->name('invoice');
Route::view('/invoice2', 'invoice2')->name('invoice2');
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// للمستخدمين بعد تسجيل الدخول
Route::middleware(['auth'])->group(function () {
     Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::get('/user/dashboard', fn() => view('user.dashboard'))->name('user.dashboard');

    Route::get('/user/account', [UserController::class, 'edit'])->name('user.account');
    Route::put('/user/account', [UserController::class, 'updateAccount'])->name('user.account.update');

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login.form');
    })->name('logout');
});

// تخزين قراءة العداد
Route::post('/user/meter-input/store', [MeterInputController::class, 'store'])->name('meter.store');

// عرض صفحة النتائج
Route::get('/user/page3', [MeterInputController::class, 'showPage3'])->name('user.page3');
Route::get('/subscription/page3', function () {
    return view('user.page3');
})->name('subscription.page3');
Route::view('/admin/page3', 'admin.page3')->name('admin.page3');
Route::view('/admin/page2', 'admin.page2')->name('admin.page2');
Route::view('/admin/page4', 'admin.page4')->name('admin.page4');
// Route لعرض صفحة نتائج العدادات
Route::get('/subscription/page3', [MeterInputController::class, 'process'])->name('subscription.page3');






// صفحة تسجيل الدخول / التسجيل
Route::get('/auth', [UserHomeController::class, 'showAuth'])->name('auth.show');

// معالجة تسجيل الدخول
Route::post('/login/user', [UserHomeController::class, 'loginUser'])->name('login.user');

// معالجة تسجيل الحساب الجديد
Route::post('/register', [UserHomeController::class, 'registerUser'])->name('register');

// الصفحة الرئيسية بعد تسجيل الدخول
Route::get('/home1', [UserHomeController::class, 'home'])->name('home1');

Route::post('/save-180', [UserHomeController::class, 'save180'])->name('save-180');
Route::get('/old-bills', function () {
    // صفحة الفواتير السابقة
    return view('old-bills');
})->name('old-bills');

// مثال للصفحة بعد حفظ القراءة
Route::get('/target-page', function () {
    return view('target-page'); // الصفحة التي تريد التوجيه إليها بعد الحفظ
});

Route::get('/target-page', function () {
    return view('target-page');
})->name('target-page');

Route::get('/old-bills', [UserHomeController::class, 'oldBills'])->name('old-bills');

    Route::post('/admin/page2', [SubscriptionController::class, 'search'])->name('admin.search');
    Route::view('/admin/page6', 'admin.page6')->name('admin.page6');
    Route::post('/admin/subscription', [SubscriptionController::class, 'store'])->name('admin.subscription.store');

        Route::post('/prices/update', [ElectricityPriceController::class, 'update'])->name('prices.update');
          Route::post('/users', [UserController::class, 'store'])->name('users.store');