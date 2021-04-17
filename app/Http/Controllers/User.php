<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    const ENABLE = 1;

    public function login()
    {
        return view('frontend.user.login');
    }

    public function checkLogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
            'permission' => 1,
            'status' => 1
        ];
        if (Auth::attempt($arr)) {
            return redirect(route('home.index'));
        } else {
            return
                redirect()->back()->with('message', 'Email hoặc không chính xác!');
        }
    }

    public function logout()
    {
        Auth::logout();
        $urlPrev = \url()->previous();
        return redirect($urlPrev);
    }

    public function register()
    {
        return view('frontend.user.register');
    }

    public function save(Request $request)
    {
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('email-error', 'Email không đúng định dạng');
        }
        $count = \App\Models\User::where([
            'email' => $request->email
        ])->get()->count();
        if ($count) {
            return redirect()->back()->with('email-error', 'Email đã có người sử dụng');
        }
        if ($request->verify_password != $request->password) {
            return redirect()->back()->with('password-error', 'Hai mật khẩu không khớp');
        }
        $user = isset($request->user_id) ? \App\Models\User::find($request->user_id) : new \App\Models\User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->full_name = $request->full_name;
        $user->save();
        return redirect(route('user.register'))->with('success', 'Đăng khí tài khoản thành công! ');
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();
        if (Hash::check($request->old_password,$user->password)){
            if ($request->verify_password != $request->password) {
                return redirect()->back()->with('password-error', 'Hai mật khẩu không khớp');
            } else {
                $user = \App\Models\User::find($request->user_id);
                $user->password = bcrypt($request->password);
                $user->save();
                return redirect(route('user.change_password'))->with('success', 'Thay đổi mật khẩu thành công! ');
            }
        }
        else {
            return redirect()->back()->with('old-pass-error', 'Mật khẩu không chính xác');
        }
    }
}
