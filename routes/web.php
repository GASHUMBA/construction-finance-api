<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController; 
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AccountantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncomeController;

// Home
Route::get('/', fn() => view('welcome'))->name('home');
Route::resource('income', IncomeController::class)->middleware('auth');
        Route::resource('incomes', IncomeController::class);

// Auth routes
Auth::routes(['verify' => true]);


// Middleware for authenticated users
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/picture', [ProfileController::class, 'uploadProfilePicture'])->name('profile.picture.upload');
Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
Route::resource('expenses', ExpenseController::class);
    // User dashboard
    Route::get('/user/dashboard', fn() => view('user.dashboard'))->name('user.dashboard');

    // Resource routes
    Route::resource('projects', ProjectController::class);
    Route::resource('users', UserController::class)->except(['show']);

    // Admin, Manager, and Accountant specific routes
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        Route::resource('employees', EmployeeController::class);
        Route::resource('reports', ReportsController::class)->except(['create', 'store']);
    });
    Route::resource('employees', EmployeeController::class);
    Route::resource('reports', ReportsController::class)->only(['index', 'show', 'create', 'store']);
});

// Role-based dashboards
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboards/admin', fn() => view('admin.index'))->name('admin.index');
});

Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/dashboards/manager', fn() => view('manager.index'))->name('manager.index');
});

Route::middleware(['auth', 'role:accountant'])->group(function () {
    Route::get('/dashboards/accountant', fn() => view('accountant.index'))->name('accountant.index');
});

// Settings, maintenance, and fallback
Route::get('/settings', fn() => view('settings'))->name('settings');
Route::get('/maintenance', fn() => view('maintenance'))->name('maintenance')->middleware('guest');
Route::fallback(fn() => response()->view('errors.404', [], 404));

// Error routes
Route::get('/error/403', fn() => response()->view('errors.403', [], 403))->name('error.403');
Route::get('/error/500', fn() => response()->view('errors.500', [], 500))->name('error.500');

// Routes for uploads, search, notifications, activity, and user settings
Route::middleware(['auth'])->group(function () {
    Route::post('/upload', [ProjectController::class, 'upload'])->name('project.upload');
    Route::get('/search', [ProjectController::class, 'search'])->name('search');

    Route::get('/notifications', [EmployeeController::class, 'notifications'])->name('notifications');
    Route::get('/activity-feed', [EmployeeController::class, 'activityFeed'])->name('activity.feed');
    Route::get('/activity-logs', [EmployeeController::class, 'activityLogs'])->name('activity.logs');
    Route::get('/notifications/settings', [EmployeeController::class, 'notificationSettings'])->name('notifications.settings');

    // User account management (password/email/etc.)
    Route::prefix('account')->name('account.')->group(function () {
        Route::delete('/delete', [ProfileController::class, 'deleteAccount'])->name('delete');
        Route::post('/password/change', [ProfileController::class, 'changePassword'])->name('password.change');
        Route::post('/email/change', [ProfileController::class, 'changeEmail'])->name('email.change');
        Route::post('/phone/change', [ProfileController::class, 'changePhone'])->name('phone.change');
        Route::post('/address/change', [ProfileController::class, 'changeAddress'])->name('address.change');
        Route::post('/preferences/update', [ProfileController::class, 'updatePreferences'])->name('preferences.update');
        Route::post('/notifications/update', [ProfileController::class, 'updateNotifications'])->name('notifications.update');
        Route::get('/security', [ProfileController::class, 'securitySettings'])->name('security');
        Route::get('/sessions/history', [ProfileController::class, 'sessionHistory'])->name('sessions.history');
        Route::post('/sessions/manage', [ProfileController::class, 'manageSessions'])->name('sessions.manage');
        Route::get('/activity/log', [ProfileController::class, 'activityLog'])->name('activity.log');
        Route::get('/audit/log', [ProfileController::class, 'auditLog'])->name('audit.log');
        
    });
});
