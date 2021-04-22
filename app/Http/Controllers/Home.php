<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class Home extends Controller
{
    const ENABLE = 1;

    public function index()
    {
        $data['topOffer'] = $this->topOffer();
        $data['topBasic'] = $this->topBasic();
        $data['topAdvance'] = $this->topAdvance();
        $data['topChildren'] = $this->topChildren();
        $data['countUser'] = $this->countUser();
        $data['countCourse'] = $this->countCourse();
        $data['countReview'] = $this->countReview();
        $data['provinces'] = \App\Models\Province::orderBy('name')->get()->toArray();
        return view('frontend.home',$data);
    }
    public function topOffer(){
        return \App\Models\Course::with('center')
            ->orderBy('discount','DESC')
            ->limit(4)
            ->get()->toArray();
    }
    public function topBasic(){
        return \App\Models\Course::with('center')
            ->select('english_center.name as center_name','course.*')
            ->join('english_center','course.center_id','=','english_center.center_id')
            ->where('type','Giao tiếp cơ bản')
            ->orderBy('english_center.ave_star','DESC')
            ->orderBy('discount','DESC')
            ->limit(4)
            ->get()->toArray();
    }
    public function topAdvance(){
        return \App\Models\Course::with('center')
            ->select('english_center.name as center_name','course.*')
            ->join('english_center','course.center_id','=','english_center.center_id')
            ->where('type','Giao tiếp nâng cao')
            ->orderBy('english_center.ave_star','DESC')
            ->orderBy('discount','DESC')
            ->limit(4)
            ->get()->toArray();
    }
    public function topChildren(){
        return \App\Models\Course::with('center')
            ->select('english_center.name as center_name','course.*')
            ->join('english_center','course.center_id','=','english_center.center_id')
            ->where('type','Giành cho trẻ em')
            ->orderBy('english_center.ave_star','DESC')
            ->orderBy('discount','DESC')
            ->limit(4)
            ->get()->toArray();
    }
    public function countReview(){
        return \App\Models\Review::all()->count();
    }
    public function countCourse(){
        return \App\Models\Course::all()->count();
    }
    public function countUser(){
        return \App\Models\User::all()->count();
    }
}
