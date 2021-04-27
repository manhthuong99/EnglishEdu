<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class Report extends Controller
{
    public function create(Request $request){
        $data = new \App\Models\Report();
        $data->center_id = $request->center_id;
        $data->user_id = $request->user_id;
        $data->title = $request->title;
        $data->content = $request->contents;
        $data->save();
        return redirect()->back()->with('report_success','Gửi yêu cầu thành công! Quản trị viên sẽ xem xét báo cáo của bạn');
    }
}
