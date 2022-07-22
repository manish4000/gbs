<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['namespace' => 'App\Http\Controllers\website'],function(){
    Route::get('/','HomeController@index')->name('home'); 

    Route::get('/job-by-category','JobByCategoryController@index' )->name('job_by_category');
    Route::get('/jobs', 'JobsController@index')->name('jobs');
    Route::get('/jobs/{id}','JobsController@jobDetails')->name('job_details');
    Route::get('/jobs/shortlist/{job_id}','JobsController@shortlistJob')->name('shortlist_job');

    Route::get('/job/locations','JobsLocationController@index')->name('job_by_location');
    Route::post('apply-job','JobsController@applyJob')->name('job.apply');
    Route::get('/candidates', 'CandidatesController@index')->name('candidates');
    Route::get('/candidate/details/', 'CandidatesController@candidateDetails')->name('candidates.details');

    Route::get('candidate/shortlist','CandidatesController@shortlistCandidate')->name('shortlist_candidate');

    Route::post('contact-us','ContactUsController@store')->name('contact_us');

    Route::get('/career-with-jobsbloc','CareerWithJobsblocController@index')->name('career_with_jabsbloc');

    Route::post('/career-with-jobsbloc/store','CareerWithJobsblocController@store')->name('store_career_with_jabsbloc');
    Route::get('/coaches', function () {
        return view('website.coaches');
    })->name('coaches');

});





// Route::get('/job-by-location', function () {
//     return view('website.jobs_by_location');
// })->name('job_by_location');

Route::get('/contact-us', function () {
    return view('website.contact_us');
})->name('contact');



Route::get('/login-register', function () {
    return view('website.login_register');
})->name('login_register');

Route::get('/about-us', function () {
    return view('website.about_us');
})->name('about_us');

Route::get('/terms-conditions', function () {
    return view('website.terms_condition');
})->name('terms_conditions');

Route::get('/privacy-policy', function () {
    return view('website.privacy_policy');
})->name('privacy_policy');


Route::get('/test', function () {
    return view('website.test');
});
// this is for candidates
Route::get('/candidates/dashboard/', function () {
    return view('website.candidate.dashboard');
})->name('candidate.dashboard');

Route::get('/candidates/profile/', function () {
    return view('website.candidate.profile');
});

Route::get('/candidates/resume/', function () {
    return view('website.candidate.resume');
});

Route::get('/candidates/shortlist-jobs/', function () {
    return view('website.candidate.shortlist_jobs');
})->name('candidate.shortlist_jobs');

Route::get('/candidates/applied-jobs/', function () {
    return view('website.candidate.applied_jobs');
})->name('candidate.applied_jobs');

Route::get('/candidates/alert-jobs/', function () {
    return view('website.candidate.alert_job');
})->name('candidate.alert_job');

Route::get('/candidates/change-password/', function () {
    return view('website.candidate.change_password');
})->name('candidate.change_password');

Route::get('/candidates/delete-profile/', function () {
    return view('website.candidate.delete_profile');
})->name('candidate.delete_profile');

//this is for employer 

Route::get('/employer/dashboard/', function () {
    return view('website.employer.dashboard');
});

Route::get('/employer/profile/', function () {
    return view('website.employer.profile');
});

Route::get('/employer/shortlist-candidates/', function () {
    return view('website.employer.shortlist_candidates');
});
Route::get('/employer/messages/', function () {
    return view('website.employer.messages');
});



Route::get('/employer/resume/', function () {
    return view('website.employer.resume');
});



Route::get('/employer/applied-jobs/', function () {
    return view('website.employer.applied_jobs');
});
Route::get('/employer/alert-jobs/', function () {
    return view('website.employer.alert_job');
});
Route::get('/employer/change-password/', function () {
    return view('website.employer.change_password');
});

Route::get('/employer/delete-profile/', function () {
    return view('website.employer.delete_profile');
});

Route::get('/employer/my-jobs/', function () {
    return view('website.employer.my_jobs');
});

Route::get('/employer/cart/', function () {
    return view('website.employer.cart');
});

Route::get('/employer/check-out/', function () {
    return view('website.employer.checkout');
});

Route::get('/employer/submit-job/', function () {
    return view('website.employer.submit_job');
});
Route::get('/employer/submit-job-form/', function () {
    return view('website.employer.submit_job_form');
});


//route for admin


//====================================guset admin ==============================================

Route::group(['prefix' => 'admin','middleware'=> ['guest','preventBackHistory','autoTrim'] ,'namespace' => 'App\Http\Controllers\Admin'],function(){
    Route::get('/',function (){  return view('admin.auth.login');})->name('login_view');
    Route::post('/login','Auth\LoginController@login')->name('admin.login');
 });


//==================================== admin ==============================================
 Route::group(['prefix' => 'admin','as'=>'admin.' ,'middleware'=> ['auth','isAdmin','preventBackHistory'] ],function(){
    
              Route::get('/logout','App\Http\Controllers\Auth\LoginController@logout')->name('logout');

              Route::group(['middleware' => 'auth'], function () {
                Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
                Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
                Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
                Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
            });


            // this is for contact us inquery 
            Route::group(['prefix' => 'contact-us','as'=>'contact_us.' ,'namespace' => 'App\Http\Controllers\Admin\user'],function(){   

                Route::get('/','ContactUsController@index')->name('index');
                Route::delete('/delete/{id}','ContactUsController@destroy')->name('delete');
                Route::get('/view/{id}','ContactUsController@view')->name('view');
                                   
            });


            
        // Route::group(['prefix' => 'inquery','as'=>'inquery.'],function(){

        //     Route::get('/','InqueryController@index')->name('index');
         
  
        // });


            Route::group(['prefix' => 'users','as'=>'users.' ,'namespace' => 'App\Http\Controllers\Admin\user'],function(){   
                Route::get('/','UserController@index')->name('index');
                Route::get('/status/','UserController@changeStatus')->name('status');
                Route::get('/profile/','UserController@profile')->name('profile');
                      
            });



              Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('dashboard');

              Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
          
              Route::group(['middleware' => 'auth'], function () {
                  Route::get('table-list', function () {
                      return view('pages.table_list');
                  })->name('table');
          
                  Route::get('typography', function () {
                      return view('pages.typography');
                  })->name('typography');
          
                  Route::get('icons', function () {
                      return view('pages.icons');
                  })->name('icons');
          
                  Route::get('map', function () {
                      return view('pages.map');
                  })->name('map');
          
                  Route::get('notifications', function () {
                      return view('pages.notifications');
                  })->name('notifications');
          
                  Route::get('rtl-support', function () {
                      return view('pages.language');
                  })->name('language');
          
                  Route::get('upgrade', function () {
                      return view('pages.upgrade');
                  })->name('upgrade');
              });
          
              

          
          
                        Route::group(['prefix' => 'settings','as'=>'settings.' ,'middleware'=> ['autoTrim'],'namespace' => 'App\Http\Controllers\Admin\Settings' ],function(){
          
                          Route::get('/social','SocialController@index')->name('social.index'); 
                          Route::post('/social','ContactController@store')->name('social.store');  
          
                          Route::get('/contact','ContactController@index')->name('contact.index'); 
          
                          Route::post('/contact','ContactController@store')->name('contact.store'); 
          
                        //this is for testmonials              
                        
                          Route::group(['prefix' => 'testimonial','as'=>'testimonial.'],function(){
                  
                              Route::get('/','TestimonialController@index')->name('index');
                              Route::Post('/store','TestimonialController@store')->name('store');
                  
                              Route::get('/edit/{id}','TestimonialController@edit')->name('edit');
                              Route::post('/update/','TestimonialController@update')->name('update');
                              Route::delete('/delete/{id}','TestimonialController@destroy')->name('delete');
                              Route::get('/status/{id}','TestimonialController@changeStatus')->name('status');
                  
                             });
                         });
          
          
          
                        Route::group(['prefix' => 'job','as'=>'job.' ,"namespace" => "App\Http\Controllers\Admin\Job"],function(){

                        Route::group(['prefix' => 'applications','as'=>'applications.'],function(){                        
                        Route::get('/','JobApplicationController@index')->name('index');
                        Route::delete('/delete/{id}','JobApplicationController@destroy')->name('delete');                   
            
                        });




                    Route::group(['prefix' => 'submit-job','as'=>'submit_job.'],function(){                          
                        Route::get('/','SubmitJobController@index')->name('index');
                        Route::Post('/store','SubmitJobController@store')->name('store');
                        Route::get('/edit/{id}','SubmitJobController@edit')->name('edit');
                        Route::post('/update/','SubmitJobController@update')->name('update');
                        Route::delete('/delete/{id}','SubmitJobController@destroy')->name('delete');
                        Route::get('/status/{id}','SubmitJobController@changeStatus')->name('status');
                        Route::get('/featured/{id}','SubmitJobController@changefeatured')->name('featured');            
                    });


                      Route::group(['prefix' => 'job-type','as'=>'job_type.'],function(){
                          
                          Route::get('/','JobTypeController@index')->name('index');
                          Route::Post('/store','JobTypeController@store')->name('store');
                          Route::get('/edit/{id}','JobTypeController@edit')->name('edit');
                          Route::post('/update/','JobTypeController@update')->name('update');
                          Route::delete('/delete/{id}','JobTypeController@destroy')->name('delete');
                          Route::get('/status/{id}','JobTypeController@changeStatus')->name('status');
              
                      });

                      Route::group(['prefix' => 'salary-type','as'=>'salary_type.'],function(){
          
                          Route::get('/','SalaryTypeController@index')->name('index');
                          Route::Post('/store','SalaryTypeController@store')->name('store');
                          Route::get('/edit/{id}','SalaryTypeController@edit')->name('edit');
                          Route::post('/update/','SalaryTypeController@update')->name('update');
                          Route::delete('/delete/{id}','SalaryTypeController@destroy')->name('delete');
                          Route::get('/status/{id}','SalaryTypeController@changeStatus')->name('status');
              
                      });
                     
                      Route::group(['prefix' => 'job-category','as'=>'job_category.'],function(){
          
                          Route::get('/','JobCategory@index')->name('index');
                          Route::Post('/store','JobCategory@store')->name('store');
                          Route::get('/edit/{id}','JobCategory@edit')->name('edit');
                          Route::post('/update/','JobCategory@update')->name('update');
                          Route::delete('/delete/{id}','JobCategory@destroy')->name('delete');
                          Route::get('/status/{id}','JobCategory@changeStatus')->name('status');
                          Route::get('/featured/{id}','JobCategory@changefeatured')->name('featured');
              
                      });
                     
                  });

                  Route::group(['prefix' => 'location','as'=>'location.', "namespace" => "App\Http\Controllers\Admin"],function(){
                  
                      Route::get('/','LocationController@index')->name('index');
                      Route::Post('/store','LocationController@store')->name('store');
                      Route::get('/edit/{id}','LocationController@edit')->name('edit');
                      Route::post('/update/','LocationController@update')->name('update');
                      Route::delete('/delete/{id}','LocationController@destroy')->name('delete');
                      Route::get('/status/{id}','LocationController@changeStatus')->name('status');
          
                  });

 });


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        if(Auth::user()->role == "candidate"){
            return view('website.candidate.dashboard');
        }
        return view('website.employer.dashboard');
    })->name('dashboard');

    Route::get('/profile', function () {
        if(Auth::user()->role == "candidate"){
            return view('website.candidate.dashboard');
        }
        return view('website.employer.dashboard');
    })->name('dashboard');

});


//these route for candidates
Route::group(['prefix' => 'candidate','namespace' => 'App\Http\Controllers\website\candidate','as'=>'candidate.'],function(){
    
    Route::get('profile','ProfileController@index')->name('profile.index'); 
    Route::post('profile','ProfileController@updateProfile')->name('profile.update'); 

    Route::get('resume','ResumeController@index')->name('resume.index'); 
    Route::post('resume','ResumeController@updateResume')->name('resume.update'); 

});

Route::group(['prefix' => 'employer','namespace' => 'App\Http\Controllers\website\employer','as'=>'employer.'],function(){

    Route::get('profile','ProfileController@index')->name('profile.index'); 
    Route::post('profile','ProfileController@updateProfile')->name('profile.update'); 
    
});



