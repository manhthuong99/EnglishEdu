<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User extends Controller
{
    const ADMIN_PERMISSION = 0;
    const ENABLE = 1;
    const USER_PERMISSION = 1;
    const CENTER_PERMISSION = 2;

    public function checkLogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
            'type_login' => 'default',
            'permission' => [self::ADMIN_PERMISSION,self::CENTER_PERMISSION],
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
        return redirect(route('admin.dashboards.index'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('admin.login'));
    }

    public function index()
    {
        $data['users'] = \App\Models\User::where('permission', self::USER_PERMISSION)
            ->get();
        echo view('admin.user.show', $data);
    }

    public function edit($userId)
    {
        $data['users'] = \App\Models\User::where('permission', self::USER_PERMISSION)
            ->where('user_id', $userId)
            ->get();
        return view('admin.user.edit', $data);
    }

    public function save(Request $request)
    {
        if ($request->user_id) {
            $checkEmail = $this->checkDuplicateEmail($request->email, $request->user_id);
            $data = \App\Models\User::find($request->user_id);
            $url = $this->getUrlRedirect($request->route()->getPrefix(), $checkEmail, $request->user_id);
        } else {
            $checkEmail = $this->checkDuplicateEmail($request->email);
            $data = new \App\Models\User();
            $url = $this->getUrlRedirect($request->route()->getPrefix(), $checkEmail);
        }
        if ($request->password) {
            $data->password = bcrypt($request->password);
            if ($request->password != $request->re_password){
                return redirect($url)->with('failed', 'Hai mật khẩu ko khớp nhau!');
            }
        }
        $data->status = $request->status ? $request->status : 0;
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->phone_number = $request->phone_number;
        $data->permission = 1;

        if ($request->avatar) {
            $data->avatar = $this->uploadAvatar($request->avatar);
        }
        if ($checkEmail) {
            return redirect($url)->with('failed', 'Email ' . $request->email . ' đã được sử dụng!');
        } else {
            $data->save();
            return redirect($url)->with('success', 'Tài khoản ' . $request->email . ' cập nhật thành công!');
        }

    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function uploadAvatar($avatar)
    {
        $fileName = rand() . '-' . $avatar->getClientOriginalName();
        $avatar->storeAs('/avatars', $fileName, 'public');
        return $fileName;
    }

    public function checkDuplicateEmail($email, $id = null)
    {
        $checkEmail = \App\Models\User::where([
            'email' => $email
        ])->get();
        if ($checkEmail->count()) {
            $checkId = \App\Models\User::where([
                'email' => $email,
                'user_id' => $id
            ])->get();
            if ($checkId->count()) {
                $check = false;
            } else $check = true;
        } else
            $check = false;
        return $check;
    }

    public function getUrlRedirect($preUrl, $checkEmail, $userId = null)
    {
        if ($preUrl == '/admin') {
            if ($userId && $checkEmail) {
                $url = '/admin/user/edit/' . $userId;
            } else {
                if (!$userId) {
                    $url = '/admin/user/new';
                } else {
                    $url = '/admin/user';
                }
            }
        } else {
            if ($userId && $checkEmail) {
                $url = '/user/edit/' . $userId;
            } else {
                if (!$userId) {
                    $url = '/user/new';
                } else {
                    $url = '/user';
                }
            }
        }
        return $url;
    }
}
