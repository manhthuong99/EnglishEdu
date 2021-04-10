<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Report extends Controller
{
    const ENABLE = 1;

    public function index()
    {
        $data['reports'] = \App\Models\Report::with('user','center')
            ->orderBy('created_at','DESC')
            ->get()->toArray();
        return view('admin.report.show', $data);
    }

    public function delete($reportId){
        $result = \App\Models\Report::find($reportId);
        $result->delete();
        return redirect()->back()->with('success', 'Xóa thành công!');
    }
}
