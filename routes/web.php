<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketMessageController;
use Illuminate\Support\Facades\Route;

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

//User routes

Route::get('/',[PageController::class, 'login'])->name('login');
Route::get('/register',[PageController::class, 'register'])->name('register');

Route::post('/register_submit',[AuthController::class,'register_submit'])->name('register_submit');
Route::post('/login_submit',[AuthController::class,'login_submit'])->name('login_submit');
Route::get('/verify/{id}',[AuthController::class, 'verify'])->name('verify');

Route::get('/forget_password',[AuthController::class,'forget_password'])->name('forget_password');
Route::post('/submit_forget_password', [AuthController::class, 'submit_forget_password'])->name('submit_forget_password');
Route::get('/reset_form/{token}', [AuthController::class, 'reset_form'])->name('reset_form');
Route::post('/submit_reset_form', [AuthController::class, 'submit_reset_form'])->name('submit_reset_form');

Route::group(['middleware' => 'auth', 'prefix' => 'cabinet'], function(){

    Route::get('/user_logout',[AuthController::class,'user_logout'])->name('user_logout');

    Route::resource('tickets',TicketController::class);
    Route::get('ticket/{ticketId}', [TicketMessageController::class, 'index'])->name('ticket.messages');
    Route::post('ticket/{ticket}', [TicketMessageController::class, 'newMessage'])->name('ticket.new-message');

});

// Admin routes

Route::get('/admin', [AdminController::class, 'admin_login'])->name('admin_login');
Route::post('/admin_login_submit', [AdminController::class, 'admin_login_submit'])->name('admin_login_submit');
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {

    Route::get('permissions',[PermissionController::class,'permission'])->name('permission_list')->middleware('role:permission_list');
    Route::post('create_permission',[PermissionController::class,'create_permission'])->name('create_permission');

    Route::get('roles',[RoleController::class,'role'])->name('role_list')->middleware('role:role_list');
    Route::get('edit_role/{id}',[RoleController::class,'edit_role'])->name('edit_role');
    Route::post('update_role/{id}',[RoleController::class,'update_role'])->name('update_role');
    Route::post('create_role',[RoleController::class,'create_role'])->name('create_role');

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('admin_logout', [AdminController::class, 'admin_logout'])->name('admin_logout');
    Route::get('/users',[AdminController::class,'users_list'])->name('users_list')->middleware('role:users_list');
    Route::get('/delete_user/{id}',[AdminController::class,'delete_user'])->name('delete_user');
    Route::get('/edit_user/{id}',[AdminController::class,'edit_user'])->name('edit_user');
    Route::post('/update_user/{id}',[AdminController::class,'update_user'])->name('update_user');

    Route::get('users-tickets', [AdminController::class, 'users'])->name('users.list')->middleware('role:users-tickets');
    Route::get('tickets/{user}', [AdminController::class, 'userTickets'])->name('user.tickets')->middleware('role:user.tickets');

    Route::get('ticket/messages/{ticketId}', [TicketMessageController::class, 'ticketMessagesAdmin'])->name('ticket.messages.admin');
    Route::post('ticket/{ticket}', [TicketMessageController::class, 'newMessageFromAdmin'])->name('ticket.new-message-from-admin');

    Route::get('/admin_list',[AdminController::class,'admin_list'])->name('admin_list')->middleware('role:admin_list');
    Route::post('/create_admin',[AdminController::class,'create_admin'])->name('create_admin');
    Route::post('/update_admin/{id}',[AdminController::class,'update_admin'])->name('update_admin');
    Route::get('/edit_admin/{id}',[AdminController::class,'edit_admin'])->name('edit_admin');


});
