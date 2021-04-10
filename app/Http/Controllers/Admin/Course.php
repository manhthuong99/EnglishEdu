<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Course extends Controller
{
    const ENABLE = 1;

    public function index($centerId = null)
    {
        if ($centerId) {
            $data['courses'] = \App\Models\Course::where('center_id', $centerId)->get()->toArray();
        }
        else{
            $data['courses'] = \App\Models\Course::get()->toArray();
        }
        return view('admin.course.show', $data);
    }

    public function edit($courseId)
    {
        $data['centers'] = \App\Models\Center::orderBy('name')
            ->where('status', self::ENABLE)
            ->get()->toArray();
        $data['courses'] = \App\Models\Course::where('course_id', $courseId)
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
                $url = '/admin/course/';
            } else {
                $url = '/admin/course/new';
            }
        } else {
            if ($id) {
                $url = '/admin/course/';
            } else {
                $url = '/admin/course/new';
            }
        }
        return $url;
    }
}
