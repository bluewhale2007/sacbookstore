<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserManagementController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\GuestDivisionAuthController;
use App\Http\Controllers\AdminInventoryController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\AdminTransactionController;
use App\Http\Controllers\AdminSupplierController;
use App\Http\Controllers\FinanceAuthController;
use App\Http\Controllers\FinanceController;

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

//Admin Group Middleware
Route::middleware(['alreadyLoggedIn'])->group(function() {  
    //Admin Login
    Route::get('/admin-login',[AdminController::class,'adminLogin']);

    //Guest and Division Login
    Route::get('/login',[GuestDivisionAuthController::class,'login']);

    //Finance Login
    Route::get('/finance-login',[FinanceAuthController::class,'financeLogin']);
});

Route::middleware(['isLoggedIn'])->group(function() {
    
    //Start ADMIN PAGES
    Route::get('/dashboard',[AdminDashboardController::class,'dashboard']);
    Route::get('/inventory',[AdminInventoryController::class,'inventoryShow']);
    Route::get('/transaction',[AdminTransactionController::class,'transactionShow']);
    Route::get('/supplier',[AdminSupplierController::class,'supplierShow']);
    Route::get('/report',[AdminReportController::class,'reportShow']);
    Route::get('/user-management',[AdminUserManagementController::class,'userManagement']);
    //End ADMIN PAGES


});



//Admin Authentication
Route::get('/logout',[AdminController::class,'logout']);
Route::post('/login-user',[AdminController::class,'loginUser'])->name('login-user');


//Admin User Management Page
Route::post('/multi-user',[AdminUserManagementController::class,'multiUser'])->name('multi-user'); // add new user


//Admin Add Stock
Route::post('/add-stock',[AdminInventoryController::class,'addStock'])->name('add-stock'); 

//Admin Transaction Status
Route::get('admin-success/{id}',[AdminTransactionController::class,'adminSuccessStatus']);
Route::get('admin-decline/{id}',[AdminTransactionController::class,'adminDeclinedStatus']);




//Guest Page
Route::get('/guest',[GuestController::class,'guestView']);
Route::get('/guest-receipt/{username}/{order_id}', [GuestController::class,'guestReceipt']);
Route::post('/guest-stock-request',[GuestController::class,'GuestStockRequest'])->name('guest-stock-request');
Route::get('/download-pdf/{username}/{order_id}', [GuestController::class,'downloadPDF']);



//Division Page
Route::get('/division',[DivisionController::class,'divisionView'])->middleware('DivisionisLoggedIn');
Route::get('/autocomplete-search',[DivisionController::class,'autocompleteSearch']);
Route::post('/request-stock',[DivisionController::class,'requestStock'])->name('request-stock');
Route::post('/stock-request',[DivisionController::class,'stockRequest'])->name('stock-request');



//Finance Authentication
Route::post('/login-finance',[FinanceAuthController::class,'loginFinance'])->name('login-finance');
Route::get('/finance',[FinanceController::class,'financeView'])->middleware('FinanceisLoggedIn');
Route::get('accept/{id}',[FinanceController::class,'acceptStatus']);
Route::get('decline/{id}',[FinanceController::class,'declinedStatus']);
Route::get('/logout-finance',[FinanceAuthController::class,'logoutFinance']);



// Guest and Division Authentication
Route::get('/logout-guest',[GuestDivisionAuthController::class,'logoutGuest']);
Route::get('/logout-division',[GuestDivisionAuthController::class,'logoutDivision']);
Route::post('/multi-login',[GuestDivisionAuthController::class,'multiLogin'])->name('multi-login');






