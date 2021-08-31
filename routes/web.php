<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClaimRequestController;
use App\Http\Controllers\ApprovalRequestController;


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
    return view('welcome');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::resource('tasks', TaskController::class);
    Route::resource('departments', DepartmentController::class);
    Route::post('requirements', [RequirementController::class, 'store']);
    Route::post('assets', [AssetController::class, 'store']);
    Route::get('users', [UserController::class, 'index']);
    Route::get('completed-tasks', [TaskController::class, 'completedIndex']);
    Route::get('requests', [ClaimRequestController::class, 'index']);
    Route::get('approvals', [ApprovalRequestController::class, 'index']);
    Route::get('requests/{claimRequest}/approve', [ClaimRequestController::class, 'approveRequest']);
    Route::get('approvals/{approvalRequest}/approve', [ApprovalRequestController::class, 'approveRequest']);
});

Route::middleware(['auth'])->prefix('user')->group(function () {

    Route::get('tasks', [TaskController::class, 'userIndex'] );
    Route::get('tasks/{task}', [TaskController::class, 'userShow'] );
    Route::get('completed', [TaskController::class, 'completedTasksIndex'] );
    Route::get('claimed', [TaskController::class, 'claimedTasksIndex'] );
    Route::get('requests', [ClaimRequestController::class, 'userIndex'] );
    Route::get('approvals', [ApprovalRequestController::class, 'userIndex'] );
    Route::get('tasks/{task}/submit', [ApprovalRequestController::class, 'makeRequest'] );

    Route::post('requirements', [RequirementController::class, 'store']);
    Route::get('tasks/{task}/requirements/{requirement}/complete',[RequirementController::class, 'complete']);
    Route::get('tasks/{task}/claim', [ClaimRequestController::class, 'makeRequest']);
});

Route::post('/tasks/{task}/comments', [CommentsController::class, 'store'])->middleware('auth');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
