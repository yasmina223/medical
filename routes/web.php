<?php

use App\Http\Controllers\ServicController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AppoinmentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\QuestionController;
use App\Models\Setting;
use App\Models\About_Us;
use App\Models\Department;
use App\Models\Servic;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use App\Models\Appoinment;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('logout',[BackendController::class,'logout'])->name('logout');
//front
Route::get('/front/about_us', function () {
    $settings=Setting::all();
    $aboutus=About_Us::all();
    return view('front.about_us',compact('settings','aboutus'));
})->name('about_us');

Route::get('/front/services', function () {
    $settings=Setting::all();
    $services=Servic::all();
    return view('front.services',compact('settings','services'));
})->name('services');

Route::get('/front/departments', function () {
    $settings=Setting::all();
    return view('front.departments',compact('settings'));
})->name('departments');

Route::get('/front/doctors', function () {
    $settings=Setting::all();
    return view('front.doctors',compact('settings'));
})->name('doctors');

Route::get('/front/contact_us', function () {
    $settings=Setting::all();
    return view('front.contact_us',compact('settings'));
})->name('contact_us');
//front


Route::get('/front/appoinment', function () {
    $settings=Setting::all();
    $departs = Department::all();
    $doctors = Doctor::all();
    return view('front.appoinment',compact('departs','doctors','settings'));
})->name('appoinment');

//services
Route::get('Services',[ServicController::class,'index'])->name('Services');
Route::post('Services/store',[ServicController::class,'store'])->name('Services.store');
Route::get('Services/edit/{id}',[ServicController::class,'edit'])->name('Services.edit');
Route::post('Services/update/{id}',[ServicController::class,'update'])->name('Services.update');
Route::get('Services/delete/{id}',[ServicController::class,'destroy'])->name('Services.destroy');
//aboutus
Route::get('About_us',[AboutUsController::class,'index'])->name('About_us');
Route::post('About_us/store',[AboutUsController::class,'store'])->name('About_us.store');
Route::get('About_us/edit/{id}',[AboutUsController::class,'edit'])->name('About_us.edit');
Route::post('About_us/update/{id}',[AboutUsController::class,'update'])->name('About_us.update');
Route::get('About_us/delete/{id}',[AboutUsController::class,'destroy'])->name('About_us.destroy');
//departments
Route::get('Departs',[DepartmentController::class,'index'])->name('Departs');
Route::post('Departments/store',[DepartmentController::class,'store'])->name('Departments.store');
Route::get('Departments/edit/{id}',[DepartmentController::class,'edit'])->name('Departments.edit');
Route::post('Departments/update/{id}',[DepartmentController::class,'update'])->name('Departments.update');
Route::get('Departments/delete/{id}',[DepartmentController::class,'destroy'])->name('Departments.destroy');
//gallery
Route::get('/Pictures',[GalleryController::class,'index'])->name('Pictures');
Route::post('gallery/store',[GalleryController::class,'store'])->name('gallery.store');
Route::get('gallery/edit/{id}',[GalleryController::class,'edit'])->name('gallery.edit');
Route::post('gallery/update/{id}',[GalleryController::class,'update'])->name('gallery.update');
Route::get('gallery/delete/{id}',[GalleryController::class,'destroy'])->name('gallery.destroy');
//doctors
Route::get('Medicine',[DoctorController::class,'index'])->name('Medicine');
Route::post('doctors/store',[DoctorController::class,'store'])->name('doctors.store');
Route::get('doctors/edit/{id}',[DoctorController::class,'edit'])->name('doctors.edit');
Route::post('doctors/update/{id}',[DoctorController::class,'update'])->name('doctors.update');
Route::get('doctors/delete/{id}',[DoctorController::class,'destroy'])->name('doctors.destroy');
//appoinment
Route::get('appoinments',[AppoinmentController::class,'index'])->name('appoinments');
Route::post('appoinments/store',[AppoinmentController::class,'store'])->name('appoinments.store');
//contact_us
Route::get('contacts',[ContactUsController::class,'index'])->name('contacts');
Route::post('contacts/store',[ContactUsController::class,'store'])->name('contacts.store');
//settings
Route::get('settings',[SettingController::class,'index'])->name('settings');
Route::post('settings/update/{id}',[SettingController::class,'update'])->name('settings.update');
//question
Route::get('questiones',[QuestionController::class,'index'])->name('questiones');
Route::post('questiones/store',[QuestionController::class,'store'])->name('questiones.store');
Route::get('questiones/edit/{id}',[QuestionController::class,'edit'])->name('questiones.edit');
Route::post('questiones/update/{id}',[QuestionController::class,'update'])->name('questiones.update');
Route::get('questiones/delete/{id}',[QuestionController::class,'destroy'])->name('questiones.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', function () {
        $departs=Department::all();
        $doctors=Doctor::all();
        $settings=Setting::all();
        $aboutus=About_Us::all();
        $services=Servic::all();
        return view('front.home',compact('departs','doctors','settings','aboutus','services'));

    })->name('front');

    Route::get('/dashboard', function () {
        return view('backend.index');
    })->name('dashboard');

});
