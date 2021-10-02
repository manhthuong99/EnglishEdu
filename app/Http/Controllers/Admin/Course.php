<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Course extends Controller
{
    const ENABLE = 1;

    public function index($centerId = null)
    {
        $user = Auth::user();
        if ($user->permission == 2){
            $centers = \App\Models\Center::where('user_id',$user->user_id)->get()->toArray();
            foreach ($centers as $center){
                $centerId[] = $center['center_id'];
            }
        }
        if ($centerId) {
            $data['courses'] = \App\Models\Course::with('center')->orderByDesc('course_id')
            ->whereIn('center_id', $centerId)->get()->toArray();
        }
        else{
            $data['courses'] = \App\Models\Course::with('center')->orderByDesc('course_id')
            ->get()->toArray();
        }
        return view('admin.course.show', $data);
    }

    public function edit($courseId)
    {
        $user = Auth::user();
        if ($user->permission == 2){
            $data['centers'] = \App\Models\Center::orderBy('name')
                ->where('status', self::ENABLE)
                ->where('user_id', $user->user_id)
                ->get()->toArray();
        }
        else{
            $data['centers'] = \App\Models\Center::orderBy('name')
                ->where('status', self::ENABLE)
                ->get()->toArray();
        }
        $data['courses'] = \App\Models\Course::where('course_id', $courseId)
            ->get()->toArray();
        return view('admin.course.edit', $this->prepareCenter($data));
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
            return redirect(route('admin.course.edit', $data->course_id))->with('success', 'Khóa học ' . $request->name . ' cập nhật thành công!');
        } else {
            return redirect()->back()->with('failed', 'Khóa học ' . $request->name . ' cập nhật thất bại!');
        }


    }

    public function create()
    {
        $user = Auth::user();
        if ($user->permission == 2){
            $data['centers'] = \App\Models\Center::orderBy('name')
                ->where('status', self::ENABLE)
                ->where('user_id', $user->user_id)
                ->get()->toArray();
        }
        else{
            $data['centers'] = \App\Models\Center::orderBy('name')
                ->where('status', self::ENABLE)
                ->get()->toArray();
        }
        return view('admin.course.create', $this->prepareCenter($data));
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
    public function prepareCenter($data){
        $centers['centers'] = [];
        foreach ($data['centers'] as $key => $center){
            if ($key == 0){
                $centers['centers'][$key] = $center;
            }
            else if ( $center['name'] != $data['centers'][$key-1]['name'] ){
                $centers['centers'][$key] = $center;
            }
        }
        if (isset( $data['courses'])){
            $centers['courses'] = $data['courses'];
        }
        return $centers;
    }
    public function delete($courseId){
        \App\Models\Course::find($courseId)->delete();
        return redirect()->back()->with('success', 'Xóa thành công!');
    }
}
