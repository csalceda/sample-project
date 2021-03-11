<?php

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


Route::get('/home', 'HomeController@index');

// Frontend
Route::get('/', 'SRA\HomepageController@index');

// Front Enrollment
Route::resource('enroll', 'SRA\EnrollmentController');
Route::get('/enroll', 'SRA\EnrollmentController@index')->name('enroll.index');
Route::post('/enroll', 'SRA\EnrollmentController@store')->name('enroll.store');
Route::get('/enroll/{enroll}', 'SRA\EnrollmentController@show')->name('enroll.show');
Route::get('/pdf', 'SRA\EnrollmentController@generatePdf');

// Front About
Route::resource('about', 'SRA\AboutController');
Route::get('/about', 'SRA\AboutController@index')->name('about.index');

// Front Annnouncement
Route::resource('notices', 'SRA\AnnouncementController');
Route::get('/notices', 'SRA\AnnouncementController@index')->name('notices.index');
Route::get('/notices/{notices}', 'SRA\AnnouncementController@show')->name('notices.show');

// Front Contact
Route::resource('contact', 'SRA\ContactController');
Route::get('contact', 'SRA\ContactController@index')->name('contact.index');
Route::post('contact', 'SRA\ContactController@store')->name('contact.store');

// Admin page
Route::resource('admin', 'Admin\AdminController');

// Admin Login Page
Route::get('/admin-login', 'Auth\AdminLoginController@index')->name('admin.login');
Route::post('/admin-login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

// Admin Tuition page
Route::get('admin-tuition', 'Admin\TuitionFeeController@index')->name('tuition.index');
Route::post('admin-tuition', 'Admin\TuitionFeeController@store')->name('tuition.store');
Route::get('admin-tuition/create', 'Admin\TuitionFeeController@create')->name('tuition.create');
Route::get('admin-tuition/{tuition}/edit', 'Admin\TuitionFeeController@edit')->name('tuition.edit');
Route::put('admin-tuition/{tuition}/update', 'Admin\TuitionFeeController@update')->name('tuition.update');
Route::delete('admin-tuition/{tuition}', 'Admin\TuitionFeeController@destroy')->name('tuition.delete');

// Admin Students page
Route::get('admin-students', 'Admin\StudentsController@index')->name('student.index');
Route::get('admin-student/{student}', 'Admin\StudentsController@show')->name('student.show');
Route::get('admin-student/{student}/edit', 'Admin\StudentsController@edit')->name('student.edit');
Route::put('admin-student/{student}/update', 'Admin\StudentsController@update')->name('student.update');
Route::delete('admin-student/{student}', 'Admin\StudentsController@destroy')->name('student.delete');

// Admin Enrollees page
Route::resource('admin-enrollees', 'Admin\EnrolleesController');
Route::get('admin-enrollees', 'Admin\EnrolleesController@index')->name('admin-enrollees.index');
Route::delete('admin-enrollees/{admin_enrollee}', 'Admin\EnrolleesController@destroy')->name('admin-enrollees.delete');

// Admin Announcement Page
Route::resource('admin-announcement', 'Admin\AnnouncementController');
Route::get('admin-announcement', 'Admin\AnnouncementController@index')->name('admin-announcement.index');
Route::get('admin-announcement/create', 'Admin\AnnouncementController@create')->name('admin-announcement.create');
Route::post('admin-announcement', 'Admin\AnnouncementController@store')->name('admin-announcement.store');
Route::delete('admin-announcement/{admin_announcement}', 'Admin\AnnouncementController@destroy')->name('admin-announcement.delete');

// Admin Contact Page
Route::resource('admin-contact', 'Admin\ContactController');
Route::get('admin-contact', 'Admin\ContactController@index')->name('admin-contact.index');
Route::get('admin-contact/{admin_contact}', 'Admin\ContactController@show')->name('admin-contact.show');
Route::delete('admin-contact/{admin_contact}', 'Admin\ContactController@destroy')->name('admin-contact.delete');

Auth::routes();
