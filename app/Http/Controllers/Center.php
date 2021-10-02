<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use function Symfony\Component\Translation\t;

class Center extends Controller
{
    const ENABLE = 1;

    public function show($centerId)
    {
        $data['centers'] = \App\Models\Center::where('center_id', $centerId)
            ->where('status', self::ENABLE)
            ->get()->toArray();
        $model = \App\Models\Course::where('center_id', $centerId)
            ->where('status', self::ENABLE);
        $data['total'] = $model->count();
        $data['courses'] = $model->get()->toArray();
        $data['reviews'] = $this->getReview($centerId);
        return view('frontend.center.view', $data);
    }

    public function topCenter($page = 0)
    {
        $models =  \App\Models\Center::orderBy('ave_star', 'DESC')
            ->where('status', self::ENABLE);
        $data['total'] = $models->count();
        $data['centers'] = $models->offset($page * 10 + 10)
            ->limit(20)
            ->get()->toArray();
        return view('frontend.center.top_center', $data);
    }

    public function getReview($centerId, $limit = 2)
    {
        $model = $this->getModelReviewByCenterId($centerId);
        $data['totalReview'] = $model->count();
        $data['review'] = $model->limit($limit)
            ->orderBy('review_id', 'DESC')
            ->get()->toArray();
        return $data;
    }

    public function review(Request $request)
    {
        $data = new \App\Models\Review();
        $data->center_id = $request->center_id;
        $data->user_id = $request->user_id;
        $data->rate = isset($request->rate) ? $request->rate : 1;
        $data->comment = $request->comment;
        if ($data->save()){
            $this->updateRate($data->center_id);
        }

        $model['reviews'] = $this->getModelReviewByCenterId($data->center_id)
            ->orderBy('review_id', 'DESC')
            ->limit(2)
            ->get()->toArray();
        return view('frontend.center.review', $model);
    }

    public function showMore(Request $request)
    {

        $model['reviews'] = $this->getModelReviewByCenterId($request->center_id)
            ->orderBy('review_id', 'DESC')
            ->limit($request->limit)
            ->get()->toArray();
        return view('frontend.center.review', $model);
    }

    public function getModelReviewByCenterId($centerId)
    {
        return \App\Models\Review::with('user')
            ->where('center_id', $centerId);
    }

    public function updateRate($centerId)
    {
        $review = \App\Models\Review::where('center_id', $centerId);
        $ave_star = $review->sum('rate') / $review->count();
        $center = \App\Models\Center::find($centerId);
        $center->ave_star = $ave_star;
        $center->save();
    }

    public function filter(Request $request)
    {
        $models = \App\Models\Course::
        join('english_center', 'english_center.center_id', '=', 'course.center_id')
            ->orderBy('english_center.ave_star', 'DESC')
            ->where('english_center.status', self::ENABLE);
        if ($request->search) {
            $models->where('english_center.name', 'LIKE', "%$request->search%");
        } else {
            $models->where('english_center.province_id', $request->province_id)
                ->where('course.type', $request->type);
        }

        $data['total'] = $models->count('english_center.center_id');
        $data['centers'] = $models->limit(10)
            ->get()->toArray();
        return view('frontend.center.top_center', $this->prepareCenter($data));
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
        if (isset( $data['total'])){
            $centers['total'] = count($data);
        }
        return $centers;
    }
}
