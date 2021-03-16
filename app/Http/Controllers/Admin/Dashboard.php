<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    const ADMIN_PERMISSION = 0;
    const ENABLE = 1;

    public function checkLogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
            'permission' => self::ADMIN_PERMISSION,
            'status' => self::ENABLE
        ];
        if (Auth::attempt($arr)) {
            return $this->loginSuccess();
        } else {
            return
                redirect()->back()->with('message', 'Email hoặc mật khẩu không chính xác!');
        }
    }

    public function loginSuccess()
    {
        return redirect('/admin/dashboard');
    }
}
