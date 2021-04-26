<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class Course extends Controller
{
    const ENABLE = 1;

    public function show($courseId)
    {

    }

    public function filter($filter, $page)
    {
        $type = null;
        $object = null;
        switch ($filter) {
            case 'giao-tiep-co-ban':
            {
                $type = 'Giao tiếp cơ bản';
                break;
            }
            case 'giao-tiep-trung-cap':
            {
                $type = 'Giao tiếp trung cấp';
                break;
            }
            case 'giao-tiep-nang-cao':
            {
                $type = 'Giao tiếp nâng cao';
                break;
            }
            case 'business-english':
            {
                $type = 'Business English';
                break;
            }
            case 'tre-em':
            {
                $object = 'Trẻ em';
                break;
            }
            case 'hoc-sinh':
            {
                $object = 'Học sinh';
                break;
            }
            case 'moi-lua-tuoi':
            {
                $object = 'Mọi lứa tuổi';
                break;
            }
            case 'nguoi-di-lam':
            {
                $object = 'Người đi làm';
                break;
            }
            case 'top-uu-dai':
            {
                $data = $this->topOffer($page);
                break;
            }

        }
        if ($type) {
            $data = $this->getCourseOfType($page, $type);
        }
        if ($object){
            $data = $this->getCourseOfObject($page, $object);
        }
        $data['type'] = $filter;
        return view('frontend.course.view', $data);
    }

    public function topOffer($page)
    {
        $page = $page - 1;
        $page = $page < 1 ? 0 : $page;
        $model = \App\Models\Course::with('center')
            ->orderBy('discount', 'DESC');
        $data['total'] = $model->count();
        $data['courses'] = $model->offset($page * 10 + 10)
            ->limit(10)
            ->get()->toArray();
        return $data;
    }

    public function getCourseOfType($page, $type)
    {
        $page = $page - 1;
        $page = $page < 1 ? 0 : $page;
        $model = \App\Models\Course::with('center')
            ->where('type', $type)
            ->orderBy('discount', 'DESC');
        $data['total'] = $model->count();
        $data['courses'] = $model->offset($page * 10 + 10)
            ->limit(10)
            ->get()->toArray();
        return $data;
    }
    public function getCourseOfObject($page, $object)
    {
        $page = $page - 1;
        $page = $page < 1 ? 0 : $page;
        $model = \App\Models\Course::with('center')
            ->where('type_customer', $object)
            ->orderBy('discount', 'DESC');
        $data['total'] = $model->count();
        $data['courses'] = $model->offset($page * 10 + 10)
            ->limit(10)
            ->get()->toArray();
        return $data;
    }
}
