<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Consulting extends Controller
{
    public function create(Request $request){
        if ($request->center_id){
            $data = new \App\Models\Consulting();
            $data->center_id = $request->center_id;
            $data->user_id = $request->user_id;
            $data->full_name = $request->full_name;
            $data->phone_number = $request->phone_number;
            $data->email = $request->email;
            $data->note = $request->note;
            $data->save();
            $center = \App\Models\Center::find($request->center_id);

            $mailData = [
                'center_name' => $center->name,
                'user_name' => $request->full_name,
                'user_email' => $request->email,
                'user_phone' => $request->phone_number,
                'user_note' => $request->note

            ];
            Mail::to($center->email)->send(new \App\Mail\Email($mailData, 'consulting'));
        }

        return redirect()->back()->with('success','Gửi yêu cầu thành công!');

    }
}
