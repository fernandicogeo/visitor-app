<?php

use App\Division;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SatpamController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;

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

Route::get('/', function () {
    return view('index');
});
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

Route::get('/registration', [RegistrationController::class, 'index'])->name('registration')->middleware('guest');
Route::post('/registration', [RegistrationController::class, 'store'])->name('registration')->middleware('guest');

Route::get('/forget-password', [LoginController::class, 'forget_password'])->name('forget-password')->middleware('guest');
Route::post('/process-forget-password', [LoginController::class, 'process_forget_password'])->name('process-forget-password')->middleware('guest');

Route::middleware('auth:web')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'index_profile'])->name('profile');
    Route::get('/edit-profile', [DashboardController::class, 'index_edit_profile'])->name('edit-profile');
    Route::post('/edit-profile', [DashboardController::class, 'edit_profile'])->name('edit-profile');
    Route::get('/schedule', [DashboardController::class, 'index_schedule'])->name('schedule');
    Route::post('/schedule', [DashboardController::class, 'set_schedule'])->name('schedule');
    Route::get('/history', [DashboardController::class, 'index_history'])->name('schedule');
    Route::get('/process', [DashboardController::class, 'index_process'])->name('schedule');
    Route::get('/histories', [DashboardController::class, 'index_histories'])->name('schedule');
    Route::post('/reschedule-acc', [DashboardController::class, 'reschedule_acc'])->name('reschedule_acc');
    Route::post('/reschedule-reject', [DashboardController::class, 'reschedule_reject'])->name('reschedule_reject');
    Route::get('/update-password', [DashboardController::class, 'index_update_password'])->name('update_password');
    Route::post('/update-password', [DashboardController::class, 'update_password'])->name('update_password');
});


Route::middleware('auth:staff')->group(function () {
    Route::get('/dashboard-staff', [StaffController::class, 'index'])->name('dashboard-staff');
    Route::get('/schedule-staff', [StaffController::class, 'index_schedule_staff'])->name('schedule-staff');
    // Route::post('/filter-schedule-staff', [StaffController::class, 'filter_schedule_staff'])->name('filter-schedule-staff');
    Route::post('/schedule-acc', [StaffController::class, 'schedule_acc'])->name('schedule_acc');
    Route::post('/schedule-reschedule', [StaffController::class, 'schedule_reschedule'])->name('schedule_reschedule');
    Route::post('/schedule-reject', [StaffController::class, 'schedule_reject'])->name('schedule_reject');
});

Route::middleware('auth:manager')->group(function () {
    Route::get('/dashboard-manager', [ManagerController::class, 'index'])->name('dashboard-manager');
    Route::get('/schedule-manager', [ManagerController::class, 'index_schedule_manager'])->name('schedule-manager');
    Route::post('/export-manager', [ManagerController::class, 'export'])->name('export-manager');
    // Route::post('/filter-schedule-manager', [ManagerController::class, 'filter_schedule_manager'])->name('filter-schedule-manager');
});

Route::middleware('auth:satpam')->group(function () {
    Route::get('/dashboard-satpam', [SatpamController::class, 'index'])->name('dashboard-satpam');
    Route::get('/recap-satpam', [SatpamController::class, 'index_recap'])->name('recap-satpam');
    Route::get('/dashboard-satpam/{division:slug}', [SatpamController::class, 'divisi_schedule_today'])->name('division-schedule-satpam');
    Route::get('/dashboard-satpam/total/{division:slug}', [SatpamController::class, 'divisi_schedule_total'])->name('division-total-schedule-satpam');
    Route::post('/schedule-check-in-satpam', [SatpamController::class, 'schedule_check_in_satpam'])->name('schedule-check-in-satpam');
    Route::post('/schedule-check-out-satpam', [SatpamController::class, 'schedule_check_out_satpam'])->name('schedule-check-out-satpam');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('dashboard-admin');
    Route::get('/admin-data-user', [AdminController::class, 'index_admin_data_user'])->name('admin-data-user');

    Route::get('/admin-data-staff', [AdminController::class, 'index_admin_data_staff'])->name('admin-data-staff');
    Route::post('/create-admin-data-staff', [AdminController::class, 'create_admin_data_staff'])->name('create-admin-data-staff');
    Route::post('/edit-admin-data-staff', [AdminController::class, 'edit_admin_data_staff'])->name('edit-admin-data-staff');
    Route::post('/delete-admin-data-staff', [AdminController::class, 'delete_admin_data_staff'])->name('delete-admin-data-staff');

    Route::get('/admin-data-satpam', [AdminController::class, 'index_admin_data_satpam'])->name('admin-data-satpam');
    Route::post('/create-admin-data-satpam', [AdminController::class, 'create_admin_data_satpam'])->name('create-admin-data-satpam');
    Route::post('/edit-admin-data-satpam', [AdminController::class, 'edit_admin_data_satpam'])->name('edit-admin-data-satpam');
    Route::post('/delete-admin-data-satpam', [AdminController::class, 'delete_admin_data_satpam'])->name('delete-admin-data-satpam');

    Route::get('/admin-data-manager', [AdminController::class, 'index_admin_data_manager'])->name('admin-data-manager');
    Route::post('/create-admin-data-manager', [AdminController::class, 'create_admin_data_manager'])->name('create-admin-data-manager');
    Route::post('/edit-admin-data-manager', [AdminController::class, 'edit_admin_data_manager'])->name('edit-admin-data-manager');
    Route::post('/delete-admin-data-manager', [AdminController::class, 'delete_admin_data_manager'])->name('delete-admin-data-manager');
});

Route::middleware('auth:web,staff,manager,satpam,admin')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
});
