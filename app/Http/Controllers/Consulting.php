<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class Consulting extends Controller
{
    public function create(Request $request){
        $data = new \App\Models\Consulting();
        $data->center_id = $request->center_id;
        $data->user_id = $request->user_id;
        $data->full_name = $request->full_name;
        $data->phone_number = $request->phone_number;
        $data->email = $request->email;
        $data->note = $request->note;
        $data->save();
        return redirect()->back()->with('success','Gửi yêu cầu thành công!');
    }
}
