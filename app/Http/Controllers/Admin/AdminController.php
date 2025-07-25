<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $data = User::select(\DB::raw('COUNT(*) as count'), \DB::raw('DAYNAME(created_at) as day_name'), \DB::raw('DAY(created_at) as day'))
            ->where('created_at', '>', Carbon::today()->subDays(6))
            ->groupBy('day_name', 'day')
            ->orderBy('day')
            ->get();
        $array[] = ['Name', 'Number'];
        foreach ($data as $key => $value) {
            $array[++$key] = [$value->day_name, $value->count];
        }

        return view('backend.index')->with('users', json_encode($array));
    }
}
