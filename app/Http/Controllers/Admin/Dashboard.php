<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    public function index()
    {
        $data['headers'] = $this->getHeaderData();
        $data['body'] = $this->getBodyData();
        return view('admin.dashboards.dashboard', $data);
    }

    public function getHeaderData()
    {
        $data['numberUser'] = \App\Models\User::count();
        $data['numberCenter'] = \App\Models\Center::count();
        $data['numberCourse'] = \App\Models\Course::count();
        return $data;
    }

    public function getBodyData()
    {
        $data['bestCenter'] = \App\Models\Center::with('user')
            ->join('user', 'user.user_id', '=', 'english_center.user_id')
            ->orderBy('ave_star', 'DESC')
            ->orderBy('english_center.created_at', 'DESC')
            ->limit(10)
            ->get()->toArray();
        $data['research'] = \App\Models\Research::orderBy('research.created_at','DESC')
            ->limit(15)->get()->toArray();
        return $data;
    }

    public function getNumberCustomerData()
    {
        $users = [];
        $data = DB::select($this->getSQLQuery());
        foreach ($data as $value) {
            $users['month'][] = 'Tháng ' . $value->month;
            $users['number'][] = $value->number;
        }
        return $users;
    }

    private function getSQLQuery()
    {
        $current_time = Carbon::now();
        return '
        SELECT DISTINCT MONTH(user.created_at) as month, (COUNT(user.user_id) OVER (PARTITION BY MONTH(user.created_at)
        ORDER BY MONTH(user.created_at))) as number FROM user WHERE YEAR(user.created_at) =
        ' . $current_time->year;
    }


}
