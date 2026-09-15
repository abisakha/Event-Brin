<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('admin.dashboard',[
        "title" => "Dashboard"
    ]);
});

Route::get('/admin/events', function () {
    return view('admin.events.event',[
        "title" => "Events"

    ]);
});

Route::get('/admin/events/create-event', function () {
    return view('admin.events.create-event',[
        "title" => "Events"

    ]);
});

Route::get('/admin/registration', function () {
    return view('admin.registration.registration',[
        "title" => "Registration"

    ]);
});

Route::get('admin/attendance', function () {
    return view('admin.attendance.attendance',[
        "title" => "Registration"

    ]);
});

Route::get('admin/survey', function () {
    return view('admin.survey.survey',[
        "title" => "Survey"

    ]);
});

Route::get('admin/survey/responses', function () {
    return view('admin.survey.responses',[
        "title" => "Survey Responses"

    ]);
});
