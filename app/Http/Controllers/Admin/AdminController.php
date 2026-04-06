<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; // Tambahkan ini agar lebih rapi

class AdminController extends Controller
{
    public function index()
    {
    
        $data = User::select(
            DB::raw('COUNT(*) as count'),
            DB::raw("TO_CHAR(created_at, 'Day') as day_name"),
            DB::raw('EXTRACT(DAY FROM created_at) as day')
        )
        ->where('created_at', '>', Carbon::today()->subDays(6))
        ->groupBy('day_name', 'day')
        ->orderBy('day', 'ASC')
        ->get();


        $chartData = [];
        $chartData[] = ['Name', 'Number'];

    
        foreach ($data as $value) {
            $chartData[] = [$value->day_name, (int)$value->count];
        }

     
        return view('backend.index')->with('users', json_encode($chartData));
    }
}