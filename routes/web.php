<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleAssignmentController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('user.home',[
        "title" => "Home"
    ]);
});


Route::get('/event', function () {
    return view('user.events.event',[
        "title" => "Event"
    ]);
});

Route::get('/event-detail', function () {
    return view('user.events.detail-event',[
        "title" => "Event-detail"
    ]);
});

Route::get('/calendar', function () {
    return view('user.calendar.calendar',[
        "title" => "Calendar"
    ]);
});

Route::get('/my-event', function () {
    return view('user.my-event.my-event',[
        "title" => "My Event"
    ]);
});

Route::get('/attendance', function () {
    return view('user.my-event.attendance',[
        "title" => "Attendance"
    ]);
});

Route::get('/notification', function () {
    return view('user.notification.notification',[
        "title" => "Notification"
    ]);
});

Route::get('/survey', function () {
    return view('user.survey.survey',[
        "title" => "Survey"
    ]);
});

Route::get('/profile', function () {
    return view('user.profil.profil',[
        "title" => "Profile"
    ]);
});

Route::get('/profile', function () {
    return view('user.profil.profil',[
        "title" => "Profile"
    ]);
});

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


