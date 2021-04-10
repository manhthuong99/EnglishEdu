<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Review extends Controller
{
    const ENABLE = 1;

    public function index()
    {
        $data['reviews'] = \App\Models\Review::with('user','center')
            ->orderBy('created_at','DESC')
            ->get()->toArray();
        return view('admin.reviews.show', $data);
    }

    public function delete($reviewId){
        $result = \App\Models\Review::find($reviewId);
        $result->delete();
        return redirect()->back()->with('success', 'Xóa thành công!');
    }
}
