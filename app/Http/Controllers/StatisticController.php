<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

//use App\Http\Requests\Request;

class StatisticController extends Controller
{
    public function day()
    {
        $todayStart = \Carbon\Carbon::today('Europe/Kiev');
        $todayEnd = \Carbon\Carbon::today('Europe/Kiev')->addDay();

        return Response::json($this->getData($todayStart, $todayEnd));
    }

    public function week()
    {
        $weekStart = \Carbon\Carbon::today('Europe/Kiev')->startOfWeek();
        $weekEnd = \Carbon\Carbon::today('Europe/Kiev')->addWeek();

        return Response::json($this->getData($weekStart, $weekEnd));
    }

    public function month()
    {
        $monthStart = \Carbon\Carbon::today('Europe/Kiev')->startOfMonth();
        $monthEnd = \Carbon\Carbon::today('Europe/Kiev')->addMonth();

        return Response::json($this->getData($monthStart, $monthEnd));
    }

    public function custom(Request $request)
    {
        $monthStart = $request->start;;
        $monthEnd = $request->end;

        return Response::json($this->getData($monthStart, $monthEnd));
    }

    private function getData($start, $end) {
        $active = Task::whereBetween('due_date', [$start, $end])->where('user_id', Auth::user()->id)->where('is_check', 0)->where('is_delete', 0)->where('is_overdue', 0)->count();
        $checked = Task::whereBetween('due_date', [$start, $end])->where('user_id', Auth::user()->id)->where('is_check', 1)->where('is_delete', 0)->count();
        $overdue = Task::whereBetween('due_date', [$start, $end])->where('user_id', Auth::user()->id)->where('is_check', 0)->where('is_delete', 0)->where('is_overdue', 1)->count();

        return $response = ['active' => $active, 'checked' => $checked, 'overdue' => $overdue];
    }
}
