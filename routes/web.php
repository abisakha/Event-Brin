<?php

use App\Http\Controllers\Admin\Event\EventController;
use App\Http\Controllers\Admin\RoleAssignmentController;
use App\Http\Controllers\Auth\SsoController;
use App\Http\Controllers\User\Event\EventsController;
use App\Http\Controllers\User\Home\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| authentification
|--------------------------------------------------------------------------
*/
    Route::get('/login',function(){
        return view('auth.login');
    })->middleware('guest')->name('login');

    Route::get('/auth/sso/redirect',[SsoController::class,'login'])
        ->middleware('guest')
        ->name('sso.redirect');

    Route::get('/auth/sso/callback',[SsoController::class,'callback'])
        ->name('sso.callback');

    Route::post('/logout',[SsoController::class,'logout'])
        ->name('logout');



/*
|--------------------------------------------------------------------------
| public Pages
|--------------------------------------------------------------------------
*/
    Route::get('/',[HomeController::class,'index'])->name('home');


    Route::get('/event',[EventsController::class,'index'])->name('event');

    // Route::get('/event',function(){
    //     return view('user.events.event',[
    //         'title'=>'Event'
    //     ]);
    // })->name('events');

    Route::get('/calendar',function(){
        return view('user.calendar.calendar',[
            'title'=>'Calendar'
        ]);
    })->name('calendar');






Route::middleware(['auth','check.user'])->group(function(){

    /*
    |--------------------------------------------------------------------------
    | User Pages
    |--------------------------------------------------------------------------
    */


    Route::get('/event-detail',function(){
        return view('user.events.detail-event',[
            'title'=>'Event Detail'
        ]);
    });



    Route::get('/my-event',function(){
        return view('user.my-event.my-event',[
            'title'=>'My Event'
        ]);
    });

    Route::get('/attendance',function(){
        return view('user.my-event.attendance',[
            'title'=>'Attendance'
        ]);
    });

    Route::get('/notification',function(){
        return view('user.notification.notification',[
            'title'=>'Notification'
        ]);
    });

    Route::get('/survey',function(){
        return view('user.survey.survey',[
            'title'=>'Survey'
        ]);
    });

    Route::get('/profile',function(){
        return view('user.profil.profil',[
            'title'=>'Profile',
            'user'=>request()->user()
        ]);
    })->name('profile');

    /*
    |--------------------------------------------------------------------------
    | Admin Pages
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard',function(){
        return view('admin.dashboard',[
            'title'=>'Dashboard'
        ]);
    })->name('dashboard');

    // menampilkan event
    Route::get('/admin/events',[EventController::class,'index'])->name('admin-event');

    Route::get('/admin/events/create-event', [EventController::class,'create']);

    Route::post('/admin/event', [EventController::class,'store'])->name('admin.events.store');

    Route::get('/admin/events/{event}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
    // kenapa pakai put
    Route::put('/admin/events/{event}', [EventController::class, 'update'])->name('admin.events.update');
    Route::delete('/admin/events/{event}', [EventController::class, 'destroy'])
    ->name('admin.events.destroy');
    Route::get('/admin/registration',function(){
        return view('admin.registration.registration',[
            'title'=>'Registration'
        ]);
    });

    Route::get('/admin/attendance',function(){
        return view('admin.attendance.attendance',[
            'title'=>'Attendance'
        ]);
    });

    /*
    |--------------------------------------------------------------------------
    | Admin Survey
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/survey',function(){
        return view('admin.survey.survey',[
            'title'=>'Survey'
        ]);
    });

    Route::get('/admin/survey/responses',function(){
        return view('admin.survey.responses',[
            'title'=>'Survey Responses'
        ]);
    });

    Route::get('/admin/survey/create-survey',function(){
        return view('admin.survey.create-survey',[
            'title'=>'Survey Create'
        ]);
    });

    Route::get('/admin/survey/create-survey/questions',function(){
        return view('admin.survey.questions',[
            'title'=>'Survey Questions'
        ]);
    });

    Route::get('/admin/survey/review',function(){
        return view('admin.survey.review-publish',[
            'title'=>'Survey Review'
        ]);
    });

    /*
    |--------------------------------------------------------------------------
    | Admin Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/profile',function(){
        return view('admin.profile.profile',[
            'title'=>'Profile',
            'user'=>request()->user()



        ]);
    });

    /*
    |--------------------------------------------------------------------------
    | Role Management
    |--------------------------------------------------------------------------
    */

        // http://127.0.0.1:8000/dev-login/1 - buat testing, HAPUS setelah SSO (13138) beneran terintegrasi
        Route::get('/dev-login/{id}', function ($id) {
            if (! app()->environment('local')) {
                abort(404);
            }

            Auth::loginUsingId($id);

            return redirect('/admin/roles');
        });

        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('/roles', [RoleAssignmentController::class, 'index'])->name('roles.index');
            Route::post('/roles', [RoleAssignmentController::class, 'store'])->name('roles.store');
            Route::delete('/roles', [RoleAssignmentController::class, 'destroy'])->name('roles.destroy');
        });



});





