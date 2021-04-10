<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Course extends Controller
{
    const ENABLE = 1;
    const CENTER_PERMISSION = 2;
    const USER_PERMISSION = 1;

    public function index()
    {
        $data['courses'] = \App\Models\Course::get()->toArray();
        return view('admin.course.show', $data);
    }

    public function edit($courseId)
    {
        $data['centers'] = \App\Models\Center::orderBy('name')
            ->where('status', self::ENABLE)
            ->get()->toArray();
        $data['course'] = \App\Models\Course::where('course',$courseId)
        ->get()->toArray();
        return view('admin.course.edit', $data);
    }

    public function save(Request $request)
    {
        if ($request->course_id) {
            $data = \App\Models\Course::find($request->course_id);
            $url = $this->getUrlRedirect($request->route()->getPrefix(), $request->course_id);
        } else {
            $data = new \App\Models\Course();
            $url = $this->getUrlRedirect($request->route()->getPrefix());
        }
        $data->status = $request->status ? $request->status : 0;
        $data->name = $request->name;
        $data->center_id = $request->center_id;
        $data->price = $request->price;
        $data->discount = $request->discount;
        if ($request->type) {
            $data->type = $request->type;
        } else {
            $data->type = $request->other_type;
        }
        $data->number_of_session = $request->number_of_session;
        $data->description = $request->description;
        $data->study_time = $request->study_time;
        if ($request->type_customer == 0) {
            $data->type_customer = $request->other_customer;
        } else {
            $data->type_customer = $request->type_customer;
        }
        $data->input_requirement = $request->input_requirement;
        $data->input_point = $request->input_point;
        if ($data->save()) {
            return redirect($url)->with('success', 'Khóa học ' . $request->name . ' cập nhật thành công!');
        } else {
            return redirect($url)->with('failed', 'Khóa học ' . $request->name . ' cập nhật thất bại!');
        }


    }

    public function create()
    {
        $data['centers'] = \App\Models\Center::orderBy('name')
            ->where('status', self::ENABLE)
            ->get()->toArray();
        return view('admin.course.create', $data);
    }

    public function getUrlRedirect($preUrl, $id = null)
    {
        if ($preUrl == '/admin') {
            if ($id) {
                $url = '/admin/center/edit/' . $id;
            } else {
                if (!$id) {
                    $url = '/admin/center/new';
                } else {
                    $url = '/admin/center';
                }
            }
        } else {
            if ($id) {
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
