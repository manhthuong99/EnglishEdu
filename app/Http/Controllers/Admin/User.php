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
    /**
     * @var \App\Models\User
     */
    private $user;

    public function __construct(
        \App\Models\User $user
    )
    {
        $this->user = $user;
    }

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

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

    public function index()
    {
        $data['listUsers'] = \App\Models\User::where('permission', self::USER_PERMISSION)
            ->where('status', self::ENABLE)
            ->orderBy('user_id', 'DESC')
            ->paginate(10);
        echo view('admin.user.show', $data);
    }

    public function edit($userId)
    {
        echo $pageNumber;
    }
}
