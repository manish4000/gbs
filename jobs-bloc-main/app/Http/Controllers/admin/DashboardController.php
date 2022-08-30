<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerModel;
use App\Models\DailyMilkEntryModel;
use App\Models\InqueryModel;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardData(){

        $total_candidates =  User::where('role',"candidate")->count('id');
        $total_employer =  User::where('role',"employer")->count('id');
        

        

            return view('admin.dashboard',compact('total_candidates','total_employer'));
    }
}
