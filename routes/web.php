<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\EvacuationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HouseholdController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\BarangayEvacController;
use App\Http\Controllers\PurokController;
use App\Http\Controllers\BarangayReportController;
use App\Http\Controllers\EvacuationAdminController;
use App\Http\Controllers\UserController;

// Root route
Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect(route('admin.dashboard'));
        } elseif ($user->role === 'evacuation_admin') {
            return redirect(route('EvacAdmin.dashboard'));
        } elseif ($user->role === 'barangay_admin') {
            return redirect(route('barangay.dashboard'));
        } else {
            return redirect(route('home'));
        }
    }
    // show the welcome page for guests
    return view('welcome');
})->name('welcome');

// Additional route for /welcome to handle redirect('welcome')
Route::get('/welcome', function () {
    return view('welcome');
});

// Public Pages (No Authentication Required)
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/alerts', [HomeController::class, 'alerts'])->name('alerts');
Route::get('/first-aid', [HomeController::class, 'firstaid'])->name('firstaid');

// Personalized Login Routes
Route::get('/login/admin', fn() => view('auth.login-admin'))->name('login.admin');
Route::get('/login/evacuation', fn() => view('auth.login-evacuation'))->name('login.evacuation');
Route::get('/login/barangay', fn() => view('auth.login-barangay'))->name('login.barangay');

// Logout Route
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// ADMIN Routes - Fixed & Complete
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // COMPLETE Users Management
    Route::resource('users', UserController::class);
    
    // Your other resources
    Route::get('/barangay', [BarangayController::class, 'index'])->name('barangay.index');
    Route::resource('evacuation_center', EvacuationCenterController::class);
    Route::resource('households', HouseholdController::class);
});


Route::prefix('Evacuation')
    ->name('EvacAdmin.')
    ->middleware(['auth', CheckRole::class.':evacuation_admin'])
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [EvacuationAdminController::class, 'dashboard'])
            ->name('dashboard');

        // Registration list page
        Route::get('/registration', [EvacuationAdminController::class, 'Registration'])
            ->name('Registration');

        // Show DAFAC form
        Route::get('/registration/form', [EvacuationAdminController::class, 'DAFACForm'])
            ->name('DAFACForm');

        // Store DAFAC form submission
        Route::post('/registration', [EvacuationAdminController::class, 'storeDaFac'])
            ->name('store');  // This now becomes EvacAdmin.store

        // Monitor progress
        Route::get('/monitor-progress', [EvacuationAdminController::class, 'monitorProgress'])
            ->name('monitor-progress');
            Route::get('/Evacuation/monitor-progress', [EvacuationAdminController::class, 'monitorProgress'])
    ->name('EvacAdmin.monitor-progress');
        Route::get('/evacuation-tracking', [EvacuationAdminController::class, 'evacuationTracking'])
    ->name('evacuation-tracking');

Route::get('/evacuees/latest', [EvacuationAdminController::class, 'getLatestEvacuees']);
    });
// BARANGAY ADMIN Routes
Route::middleware(['auth', CheckRole::class.':barangay_admin'])->group(function () {
    Route::get('/barangay/dashboard', fn() => view('BarangayPages.BarangayAdmin'))->name('barangay.dashboard');
    Route::get('/barangay/evacuations', fn() => view('BarangayPages.evacuation.dashboard'))->name('barangay.evacuations');
    Route::get('/barangay/residents', fn() => view('BarangayPages.Residents'))->name('barangay.residents');
    Route::get('/barangay/reports', [BarangayReportController::class, 'index'])->name('barangay.reports');
    
   
 Route::resource('households', HouseholdController::class);
    
    Route::get('/household/report', [HouseholdController::class, 'report'])->name('household.report');
Route::get('households/members/bulk-create', [HouseholdController::class, 'bulkAddMembers'])->name('households.members.bulk-create');
Route::post('households/bulk-destroy', [HouseholdController::class, 'bulkDestroy'])->name('households.bulk-destroy');
Route::get('households/bulk-edit', [HouseholdController::class, 'bulkEdit'])->name('households.bulk-edit');
Route::get('households/{household}/members/bulk-create', [HouseholdController::class, 'membersBulkCreate'])->name('households.members.bulk-create');

});




// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/dashboard', [HomeController::class, 'index'])->name('UserDashboard');
    
    // Resources
    Route::resource('evacuations', EvacuationController::class);
    Route::resource('calamity', \App\Http\Controllers\CalamityController::class);
    Route::resource('barangay', \App\Http\Controllers\BarangayController::class);
    Route::resource('households', HouseholdController::class);
    Route::resource('evacuation_center', \App\Http\Controllers\EvacuationCenterController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('puroks', PurokController::class);

    // Evacuee management
    Route::get('evacuee/add', [\App\Http\Controllers\EvacueeController::class, 'create'])->name('evacuee.add');
    Route::post('evacuee', [\App\Http\Controllers\EvacueeController::class, 'store'])->name('evacuee.store');
    Route::get('evacuee', [\App\Http\Controllers\EvacueeController::class, 'index'])->name('evacuee.list');
    Route::get('evacuee/{id}/edit', [\App\Http\Controllers\EvacueeController::class, 'edit'])->name('evacuee.edit');
    Route::put('evacuee/{id}', [\App\Http\Controllers\EvacueeController::class, 'update'])->name('evacuee.update');
    Route::delete('evacuee/{id}', [\App\Http\Controllers\EvacueeController::class, 'destroy'])->name('evacuee.destroy');
    // ✅ UPDATE EVACUEE ROUTE
    
    // Reports
    Route::get('reports/by_barangay', [ReportController::class, 'reportsByBarangay'])->name('reports.by_barangay');
    Route::get('reports/evacuees_by_calamity', [ReportController::class, 'evacueesByCalamity'])->name('reports.evacuees_by_calamity');
    Route::get('reports/export-pdf/{type}', [ReportController::class, 'exportPdf'])->name('reports.export_pdf');
    Route::get('reports/export-csv/{type}', [ReportController::class, 'exportCsv'])->name('reports.export_csv');
    Route::get('reports/compile-folder/{type}', [ReportController::class, 'compileFolder'])->name('reports.compile_folder');

Route::prefix('puroks')->name('puroks.')->group(function () {
    Route::get('/', [PurokController::class, 'index'])->name('index');  // Main table page
    Route::post('/', [PurokController::class, 'store'])->name('store');
    Route::get('{purok}/edit', [PurokController::class, 'edit'])->name('edit');
    Route::put('{purok}', [PurokController::class, 'update'])->name('update');
    Route::delete('{purok}', [PurokController::class, 'destroy'])->name('destroy');
});
  Route::prefix('evacuation')->name('evacuation.')->group(function () {
    Route::get('/', [BarangayEvacController::class, 'index'])->name('dashboard');
    Route::get('/register', [BarangayEvacController::class, 'register'])->name('register');
    Route::post('/register', [BarangayEvacController::class, 'store'])->name('store');
    Route::get('/list', [BarangayEvacController::class, 'list'])->name('list');
    Route::get('/potential', [BarangayEvacController::class, 'potential'])->name('potential');
    Route::post('/evacuation/potential/{id}/register', [EvacuationController::class, 'registerPotential'])->name('evacuation.potential.register');
    Route::delete('/potential/{id}', [BarangayEvacController::class, 'destroyPotential'])->name('potential.destroy');
    Route::get('/inventory', [BarangayEvacController::class, 'inventory'])->name('inventory');
    Route::post('/inventory/add', [BarangayEvacController::class, 'addInventory'])->name('inventory.add');
    Route::post('/inventory/store', [BarangayEvacController::class, 'storeInventory'])
    ->name('inventory.store');
    Route::put('/inventory/{id}', [BarangayEvacController::class, 'updateInventory'])
        ->name('inventory.update');

    Route::delete('/inventory/{id}', [BarangayEvacController::class, 'destroyInventory'])
        ->name('inventory.destroy');
  Route::get('/stats', [BarangayEvacController::class, 'stats'])->name('stats');
    Route::post('/evacuation/store', [BarangayEvacController::class, 'store'])->name('evacuation.store');
    // ✅ FIXED: Remove extra /evacuation/
    Route::put('/evacuee/{id}', [BarangayEvacController::class, 'updateEvacuee'])->name('update');
    Route::delete('/evacuee/{id}', [BarangayEvacController::class, 'destroy'])->name('destroy');
    
    // Household Routes
    Route::resource('households', HouseholdController::class);
    Route::get('/household/report', [HouseholdController::class, 'report'])->name('household.report');

    // Barangay Report Routes
  Route::prefix('barangay')->name('barangay.')->middleware(['auth', 'role:barangay_admin'])->group(function () {
    // ✅ Reports - Clean & simple
    Route::get('/reports', [BarangayReportController::class, 'index'])->name('reports');
    
    // ✅ Reports sub-pages
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/households', [BarangayReportController::class, 'households'])->name('households');
        Route::get('/puroks', [BarangayReportController::class, 'puroks'])->name('puroks');
        Route::get('/evacuees', [BarangayReportController::class, 'evacuees'])->name('evacuees');
    });
    
    // ✅ API endpoints (no prefix conflict)
    Route::get('/reports/progress', [BarangayReportController::class, 'getProgress'])->name('reports.progress');
});
});
});

require __DIR__.'/auth.php';