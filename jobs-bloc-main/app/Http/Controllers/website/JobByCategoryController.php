<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Job\JobCategoryModel;
use Illuminate\Http\Request;

class JobByCategoryController extends Controller
{
    public function index(){

        $job_categories =   JobCategoryModel::whereNull('parent_id')->with(['children'])->get();

        // echo "<pre>";
        // print_r($job_categories);
        
        return view('website.job_by_category',compact('job_categories'));

    }
}
