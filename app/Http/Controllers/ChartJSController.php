<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class ChartJSController extends Controller
{
    public function index()
    {
        $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTH(created_at) as month"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("MONTH(created_at)"))
                    ->pluck('count', 'month');
    
        $months = [
            1 => 'January', 
            2 => 'February', 
            3 => 'March', 
            4 => 'April', 
            5 => 'May', 
            6 => 'June', 
            7 => 'July', 
            8 => 'August', 
            9 => 'September', 
            10 => 'October', 
            11 => 'November', 
            12 => 'December'
        ];
    
        $labels = [];
        $data = [];
    
        foreach ($users as $month => $count) {
            $labels[] = $months[$month];
            $data[] = $count;
        }
    
        return view('chart.chart', compact('labels', 'data'));
    }  
    

}
