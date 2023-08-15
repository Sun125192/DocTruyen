<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginPost(request $request)
    {
        // var_dump($request->email);exit;
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        } else {
            echo "Đăng nhập sai";
            exit;
        }
    }
    public function dashboard()
    {
        $adminUser = Auth::guard('admin')->user();

        session()->put('adminUser', $adminUser);

        return view('admin.dashboard', ['admin' => $adminUser]);
    }

    public function statistics()
    {
        echo "đây là tài khoản thống kê";
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        
        session()->forget('adminUser');

        return redirect('admin/login');
    }
}
