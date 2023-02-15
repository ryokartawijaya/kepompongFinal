<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ForumPostController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MailController;

//FOR EVERYONE:
Route::get('/', function () {
    return view('landingpage');
});
Route::get('password', 'App\Http\Controllers\UserController@password')->name('password');
Route::post('password', 'App\Http\Controllers\UserController@password')->name('password.action');
Route::get('logout', 'App\Http\Controllers\UserController@logout')->name('logout');
Route::get('about', function () {
    return view('about');
});
Route::post('checkout', function () {
    return view('checkout');
});

Route::post('xendit', function () {
    return view('xendit');
});

//test
Route::get('email-resetPassword', 'App\Http\Controllers\MailController@index');
Route::post('email-resetPassword', 'App\Http\Controllers\MailController@indexAction')->name('email-resetPassword.action');
Route::get('email-resetPasswordAction/{data}/{key}', 'App\Http\Controllers\MailController@indexAction');
Route::post('email-resetPasswordAction', 'App\Http\Controllers\UserController@resetPassword_action')->name('reset-password.action');

Route::get('forgot-password', function () {
    return view('forgot-password');
});
Route::post('forgot-password.action', 'App\Http\Controllers\MailController@index')->name('forgot-password.action');



// Route::post('forgot-password.action', 'App\Http\Controllers\UserController@test')->name('forgot-password.action');
// Route::get('test', 'App\Http\Controllers\UserController@test');
//END OF FOR EVERYONE


//FOR STUDENT:

Route::get('login', 'App\Http\Controllers\UserController@login')->name('login');
Route::post('login', 'App\Http\Controllers\UserController@login_action')->name('login.action');
Route::get('/home-student', 'App\Http\Controllers\scheduleController@viewSchedule')->name('home');
Route::get('/forum', 'App\Http\Controllers\scheduleController@viewForum');

Route::get('/modules', 'App\Http\Controllers\ImageUploadController@viewImage')->name('images.view');
Route::get('/video', 'App\Http\Controllers\ImageUploadController@video');

Route::get('/course', 'App\Http\Controllers\courseController@viewCourse');

Route::get('profile', 'App\Http\Controllers\UserController@profileStudent')->name('profileStudent.index');


Route::get('change-password', 'App\Http\Controllers\UserController@changePassword')->name('change-password');
Route::post('change-password', 'App\Http\Controllers\UserController@changePassword_action')->name('change-password.action');


// END OF FOR STUDENT


//FOR ADMIN
Route::get('register', 'App\Http\Controllers\UserController@register')->name('register');
Route::post('register', 'App\Http\Controllers\UserController@register_action')->name('register.action');

Route::get('uploadschedule', 'App\Http\Controllers\adminController@uploadSchedule');
Route::post('/store-schedule', 'App\Http\Controllers\adminController@storeSchedule')->name('schedule.store');

Route::get('uploadcourse', 'App\Http\Controllers\adminController@uploadCourse');
Route::post('/store-course', 'App\Http\Controllers\adminController@storeCourse')->name('course.store');
Route::get('/course-admin', 'App\Http\Controllers\adminController@viewCourse')->name('courses.index');
Route::get('/course-admin/{courseId}', 'App\Http\Controllers\adminController@destroyCourse')->name('courses.destroy');


Route::get('/home-admin', 'App\Http\Controllers\adminController@viewUser')->name('users.index');
// Route::delete('/home-admin/{userID}', 'App\Http\Controllers\adminController@destroy')->name('users.destroy');
Route::get('/home-admin/{userID}', 'App\Http\Controllers\adminController@destroy')->name('users.destroy');

Route::get('/schedule-admin', 'App\Http\Controllers\adminController@viewSchedule')->name('schedules.index');
// Route::delete('/schedule-admin/{meetingID}', 'App\Http\Controllers\adminController@destroySchedule')->name('schedules.destroy');
Route::get('/schedule-admin/{meetingID}', 'App\Http\Controllers\adminController@destroySchedule')->name('schedules.destroy');

Route::get('/modules-admin', 'App\Http\Controllers\adminController@viewModules')->name('modules.index');
Route::get('/modules-admin/{id}', 'App\Http\Controllers\adminController@destroyModules')->name('modules.destroy');
Route::get('/video-admin', 'App\Http\Controllers\adminController@video');

Route::get('login-admin', 'App\Http\Controllers\UserController@login_admin')->name('login-admin');
Route::post('login-admin', 'App\Http\Controllers\UserController@login_action_admin')->name('login.action-admin');


//END OF FOR ADMIN


//FOR TEACHER

Route::get('/uploadModul', 'App\Http\Controllers\teacherController@uploadModul')->name('uploadModul');
Route::post('/store-image', 'App\Http\Controllers\ImageUploadController@storeImage')->name('images.store');

Route::get('/home-teacher', 'App\Http\Controllers\teacherController@viewSchedules');

Route::get('/modules-teacher', 'App\Http\Controllers\teacherController@viewModules');
Route::get('/video-teacher', 'App\Http\Controllers\teacherController@video');

Route::get('register-teacher', 'App\Http\Controllers\UserController@register_teacher')->name('register-teacher');

Route::post('register-teacher', 'App\Http\Controllers\UserController@register_action_teacher')->name('register.action-teacher');

Route::get('login-teacher', 'App\Http\Controllers\UserController@login_teacher')->name('login-teacher');

Route::post('login-teacher', 'App\Http\Controllers\UserController@login_action_teacher')->name('login.action-teacher');

Route::get('password-teacher', 'App\Http\Controllers\UserController@password_teacher')->name('password-teacher');

Route::post('password-teacher', 'App\Http\Controllers\UserController@password_teacher')->name('password.action-teacher');

Route::get('logout-teacher', 'App\Http\Controllers\UserController@logout_teacher')->name('logout-teacher');

Route::get('change-password-teacher', 'App\Http\Controllers\UserController@changePasswordTeacher')->name('change-password-teacher');
Route::post('change-password-teacher', 'App\Http\Controllers\UserController@changePasswordTeacher_action')->name('change-password-teacher.action');
Route::get('profile-teacher', 'App\Http\Controllers\UserController@profileTeacher')->name('profileTeacher.index');


//end of for TEACHER

//Forum Routes


Route::get('/forum/categories', [CategoryController::class, 'index'])->middleware('auth');
Route::get('/forum/categories/create-categories', [CategoryController::class, 'create'])->middleware('auth');
Route::get('/forum/categories/delete', [CategoryController::class, 'delete'])->middleware('auth');
Route::post('/forum/categories/store', [CategoryController::class, 'store']);
Route::delete('/forum/categories/destroy/{category:id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/forum/posts/checkSlug', [ForumPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/forum/posts', ForumPostController::class)->middleware('auth');

Route::post('/forum/posts/comment/store', [CommentController::class, 'store']);

Route::get('/forum', [PostController::class, 'index']);

Route::get('/forum/{post:slug}', [PostController::class, 'show']);





//end of Forum Routes



