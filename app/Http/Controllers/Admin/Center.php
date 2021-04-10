<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Center extends Controller
{
    const ADMIN_PERMISSION = 0;
    const ENABLE = 1;
    const CENTER_PERMISSION = 2;
    const USER_PERMISSION = 1;

    public function index()
    {
        $data['centers'] = \App\Models\Center::with('user')
            ->join('user', 'user.user_id', '=', 'english_center.user_id')
            ->where('user.permission', self::CENTER_PERMISSION)
            ->get()->toArray();
        return view('admin.center.show', $data);
    }

    public function edit($centerId)
    {
        $data['users'] = \App\Models\User::where('status', self::ENABLE)
            ->where('permission', [self::CENTER_PERMISSION, self::USER_PERMISSION])
            ->get();
        $data['provinces'] = \App\Models\Province::orderBy('name')
            ->get();
        $data['centers'] = \App\Models\Center::where('center_id', $centerId)
            ->get();
        return view('admin.center.edit', $data);
    }

    public function save(Request $request)
    {
        if ($request->center_id) {
            $checkName = $this->checkDuplicateName($request->name, $request->center_id);
            $data = \App\Models\Center::find($request->center_id);
            $url = $this->getUrlRedirect($request->route()->getPrefix(), $checkName, $request->center_id);
        } else {
            $checkName = $this->checkDuplicateName($request->name);
            $data = new \App\Models\Center();
            $url = $this->getUrlRedirect($request->route()->getPrefix(), $checkName);
        }
        $data->status = $request->status ? $request->status : 0;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone_number = $request->phone_number;
        $data->website = $request->website;
        $data->description = $request->description;
        $data->user_id = $request->user_id;
        $data->province_id = $request->province_id;
        $data->district_id = $request->district_id;
        $data->address = $this->getAddress($request->address, $request->province, $request->district);
        if ($request->avatar) {
            $data->avatar = $this->uploadAvatar($request->avatar);
        }
        if ($checkName) {
            return redirect($url)->with('failed', 'Trung tâm ' . $request->name . ' đã tồn tại!');
        } else {
            $data->save();
            return redirect($url)->with('success', 'Trung tâm ' . $request->name . ' cập nhật thành công!');
        }

    }

    public function create()
    {
        $data['centers'] = \App\Models\Center::where('status', self::ENABLE)
            ->get()->toArray();
        return view('admin.course.create', $data);
    }

    public function uploadAvatar($avatar)
    {
        $fileName = rand() . '-' . $avatar->getClientOriginalName();
        $avatar->storeAs('/avatars', $fileName, 'public');
        return $fileName;
    }

    public function checkDuplicateName($name, $id = null)
    {
        $checkEmail = \App\Models\Center::where([
            'name' => $name
        ])->get();
        if ($checkEmail->count()) {
            $checkId = \App\Models\Center::where([
                'name' => $name,
                'center_id' => $id
            ])->get();
            if ($checkId->count()) {
                $check = false;
            } else $check = true;
        } else
            $check = false;
        return $check;
    }

    public function getUrlRedirect($preUrl, $checkEmail, $id = null)
    {
        if ($preUrl == '/admin') {
            if ($id && $checkEmail) {
                $url = '/admin/center/edit/' . $id;
            } else {
                if (!$id) {
                    $url = '/admin/center/new';
                } else {
                    $url = '/admin/center';
                }
            }
        } else {
            if ($id && $checkEmail) {
                $url = '/center/edit/' . $id;
            } else {
                if (!$id) {
                    $url = '/center/new';
                } else {
                    $url = '/center';
                }
            }
        }
        return $url;
    }

    public function getDistricts(Request $request)
    {
        $listDistricts = \App\Models\District::where('province_id', $request->id)->orderBy('name')->get();
        $option = '';
        foreach ($listDistricts as $district) {
            $option .= '<option  value="' . $district->id . '">' . $district->name . '</option>';
        }
        return $option;
    }

    public function getAddress($address, $provinceId, $districtId)
    {
        if ($districtId) {
            $district = \App\Models\District::find($districtId)->first();
            $address .= ', ' . $district->prefix . ', ' . $district->name;
        }
        if ($provinceId) {
            $province = \App\Models\Province::find($provinceId)->first();
            $address .= ', ' . $province->name;
        }

        return $address;

    }
}
