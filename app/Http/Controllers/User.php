<?php


namespace App\Http\Controllers;


use App\Models\District;
use App\Models\PasswordReset;
use App\Models\RegisterCenter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class User extends Controller
{
    const STATUS_ENABLE = 1;
    const USER_PERMISSION = 1;
    const CENTER_PERMISSION = 2;

    public function index($userId)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->district_id && $user->province_id){
                $data['districts'] = District::orderBy('name')
                    ->where('province_id',$user->province_id)->get()->toArray();
            }
            $data['provinces'] = \App\Models\Province::orderBy('name')->get();
            return view('frontend.user.my_account',$data);
        } else return redirect()->back();
    }

    public function login()
    {
        return view('frontend.user.login');
    }

    public function checkLogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
            'type_login' => 'default',
            'permission' => [self::USER_PERMISSION,self::CENTER_PERMISSION],
            'status' => self::STATUS_ENABLE
        ];
        if (Auth::attempt($arr)) {
            return redirect(route('home.index'));
        } else {
            return
                redirect()->back()->with('message', 'Email hoặc mật khẩu không chính xác!');
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
            'email' => $request->email,
            'type_login' => 'default'
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
        if (Hash::check($request->old_password, $user->password)) {
            if ($request->verify_password != $request->password) {
                return redirect()->back()->with('password-error', 'Hai mật khẩu không khớp');
            } else {
                $user = \App\Models\User::find($request->user_id);
                $user->password = bcrypt($request->password);
                $user->save();
                return redirect(route('user.change_password'))->with('success', 'Thay đổi mật khẩu thành công! ');
            }
        } else {
            return redirect()->back()->with('old-pass-error', 'Mật khẩu không chính xác');
        }
    }

    public function sendMail(Request $request)
    {
        $user = \App\Models\User::where('email', $request->email)
            ->where('type_login', 'default')
            ->first();
        if ($user) {
            $token = Str::random(60);
            $url = route('password.reset', $token);
            $passwordReset = new PasswordReset();
            $passwordReset->token = $token;
            $passwordReset->email = $request->email;
            $passwordReset->save();
            $data = [
                'url' => $url,
                'name' => $user->full_name
            ];
            Mail::to($request->email)->send(new \App\Mail\Email($data, 'forgot_password'));
//            Mail::to('mthuong03@gmail.com')->send(new \App\Mail\Email($data, 'forgot_password'));
            return redirect()->back()->with('success', 'success');
        } else {
            return redirect()->back()->with('failed', 'email bạn vừa nhập không tồn tại.');
        }
    }

    public function resetPassword(Request $request)
    {
        if ($request->password != $request->repassword) {
            return redirect()->back()->with('failed', 'Hai mật khẩu không khớp nhau.');
        } else {
            $token = $request->token_reset;
            $resetPassword = \App\Models\PasswordReset::where('token', $token)
                ->first()->toArray();
            if ($resetPassword) {
                $timeRequest = date('Y-m-d H:m:s', strtotime($resetPassword['created_at']));
                $diffHours = Carbon::now()->diffAsCarbonInterval($timeRequest)->h;
                $diffDays = Carbon::now()->diffAsCarbonInterval($timeRequest)->d;
                if ($diffDays > 0 || $diffHours > 1 ) {
                    return redirect()->back()->with('timeout', 'Token của bạn đã hết hạn.');
                } else {
                    $email = $resetPassword['email'];
                    $user = \App\Models\User::where('email', $email)
                        ->where('type_login', 'default')
                        ->first();
                    $user->password = bcrypt($request->password);
                    $user->save();
                    return redirect()->back()->with('success', 'Thay đổi mật khẩu thành công.');
                }
            }
        }
    }
    public function update(Request $request){
        $data = \App\Models\User::find($request->user_id);
        if ($request->avatar) {
            $data->avatar = $this->uploadAvatar($request->avatar);
        }
        $data->phone_number = $request->phone_number;
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->province_id = $request->province_id;
        $data->birthday = $request->birthday;
        $data->birthday = $request->birthday;
        $data->address = $request->address;
        $data->save();
        return redirect()->back()->with('success', 'Cập nhật thành công!');
    }
    public function uploadAvatar($avatar)
    {
        $fileName = rand() . '-' . $avatar->getClientOriginalName();
        $avatar->storeAs('/avatars', $fileName, 'public');
        return $fileName;
    }
    public function registerCenter($userId){
        if (Auth::check()){
            $data = new RegisterCenter();
            $data->user_id = $userId;
            $data->save();
            return redirect()->back()->with('register_center','Gửi yêu cầu thành công! English Review sẽ liên lạc với bạn sớm nhất.');
        }
        else{
            return redirect()->back()->with('register_center','Bạn cần đăng nhập để thực hiện yêu cầu');
        }
    }

}
