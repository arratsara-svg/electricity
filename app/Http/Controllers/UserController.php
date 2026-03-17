<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{ 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'job_identity_number' => 'nullable|string|max:255|unique:users,job_identity_number',
            'institution_center' => 'nullable|string|max:255',
            'password' => 'required|string|min:6',
            'usertype' => 'nullable|string|max:255',
        ]);

        $now = now();
        $insertData = [
            'name' => $request->name,
            'job_identity_number' => $request->job_identity_number,
            'institution_center' => $request->institution_center,
            'usertype' => $request->usertype ?? '0',
            'password' => Hash::make($request->password),
            'created_at' => $now,
            'updated_at' => $now,
        ];

        $newId = DB::table('users')->insertGetId($insertData);

        // رجع للصفحة نفسها
        return redirect()->back()->with('success', 'تم إنشاء المستخدم بنجاح (ID: ' . $newId . ')');
    }


    public function edit()
    {
        $userId = auth()->id();
        $user = DB::table('users')->where('id', $userId)->first();
        return view('admin.account', compact('user'));
    }

    
    public function updateAccount(Request $request)
    {
        $userId = auth()->id();

        $request->validate([
            'name' => 'required|string|max:255',
            'job_identity_number' => 'nullable|string|max:255|unique:users,job_identity_number,' . $userId,
            'institution_center' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:6',
        ]);

        $current = DB::table('users')->where('id', $userId)->first();

        $data = [
            'name' => $request->name,
            'job_identity_number' => $request->job_identity_number ?? ($current->job_identity_number ?? null),
            'institution_center' => $request->institution_center ?? ($current->institution_center ?? null),
            'updated_at' => now(),
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        DB::table('users')->where('id', $userId)->limit(1)->update($data);

        return redirect()->back()->with('success', 'تم تحديث الحساب بنجاح');
    }

    
    public function update(Request $request, $id)
    {
        $existing = DB::table('users')->where('id', $id)->first();
        if (! $existing) {
            return response()->json(['message' => 'المستخدم غير موجود'], 404);
        }

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'job_identity_number' => 'nullable|string|max:255|unique:users,job_identity_number,' . $id,
            'institution_center' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:6',
            'usertype' => 'sometimes|string|max:255',
        ]);

        $data = [
            'updated_at' => now(),
        ];

        if ($request->has('name')) {
            $data['name'] = $request->name;
        }
        if ($request->has('job_identity_number')) {
            $data['job_identity_number'] = $request->job_identity_number;
        }
        if ($request->has('institution_center')) {
            $data['institution_center'] = $request->institution_center;
        }
        if ($request->has('usertype')) {
            $data['usertype'] = $request->usertype;
        }
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        DB::table('users')->where('id', $id)->limit(1)->update($data); 
        return redirect()->back()->with('success', 'تم تحديث بيانات المستخدم بنجاح');
    }
    
    public function index()
    {
        $users = DB::table('users')->orderBy('id', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'تم حذف المستخدم');
    }
}