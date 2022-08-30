<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobModel;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $total_employer =  User::where('role',"employer")->count('id');
        $total_candidates =  User::where('role',"candidate")->count('id');

        $total_jobs = JobModel::count('id');

        return view('dashboard',compact('total_candidates','total_employer','total_jobs'));
    }
}
