<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationWizardController;
// use App\Http\Controllers\CertificateController;
use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/hakim', [HomeController::class, 'indexHakim'])->name('hakim');
Route::get('/verifiycertificate/{id}', [HomeController::class, 'verifiyCertificate'])->name('verifiy-certificate');
Route::get('/account', [\App\Http\Controllers\AccountController::class, 'edit'])->name('account.edit');
Route::get('/users-settings', [\App\Http\Controllers\UserController::class, 'settings'])->name('users.settings');
Route::post('/account/{tab}', [\App\Http\Controllers\AccountController::class, 'update'])->name('account.update');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);
Route::get('setlocale/{lang}', [HomeController::class, 'setlocale'])->name('lang');
Route::get('setlocale1/{lang}', [DashboardController::class, 'setlocale'])->name('lang1');
Route::get('certificates/preview/{id}', [\App\Http\Controllers\CertificateController::class, 'preview'])->name('certificates.preview');
Route::post('generate-gzal', [\App\Http\Controllers\CertificateController::class, 'generateGZAL'])->name('certificates.generate-gzal');
Route::get('/sign/{id}/{notes}', [\App\Http\Controllers\CertificateController::class, 'sign'])->name('certificates.sign');
Route::get('reject-gzal/{id}/{notes}', [\App\Http\Controllers\CertificateController::class, 'rejectGZAL'])->name('certificates.reject-gzal');
Route::get('create-retroactive-copy/{id}/{reason}', [\App\Http\Controllers\CertificateController::class, 'createRetroactiveCopy'])->name('certificates.create-retroactive-copy');
Route::post('store-retroactive-copy/{id}', [\App\Http\Controllers\CertificateController::class, 'storeRetroactiveCopy'])->name('certificates.store-retroactive-copy');
Route::get('duplicate-gzale/{id}/{type}/{reason}', [\App\Http\Controllers\CertificateController::class, 'duplicateGZALE'])->name('certificates.duplicate-gzale');
Route::get('qr-code', [\App\Http\Controllers\CertificateController::class, 'qrcode'])->name('certificates.qrcode');
Route::get('create-type/{type}', [\App\Http\Controllers\CertificateController::class, 'createType'])->name('certificates.create-type');
Route::get('create-balance-poste', [\App\Http\Controllers\PaymentController::class, 'createBalancePoste'])->name('payments.create-balance-poste');
Route::post('store-balance-poste', [\App\Http\Controllers\PaymentController::class, 'storeBalancePoste'])->name('payments.store-balance-poste');
Route::get('return/{id}', [\App\Http\Controllers\PaymentController::class, 'returnBalancePoste'])->name('payments.return');
Route::get('payment-print/{id}', [\App\Http\Controllers\PaymentController::class, 'print'])->name('payments.print');
Route::get('payment-download/{id}', [\App\Http\Controllers\PaymentController::class, 'download'])->name('payments.download');
Route::get('return/{id}', [\App\Http\Controllers\PaymentController::class, 'returnBalancePoste'])->name('payments.return');
Route::get('images', [\App\Http\Controllers\SettingController::class, 'images'])->name('settings.images');

Route::get('getproducts', [\App\Http\Controllers\ProductController::class, 'getProducts'])->name('products.getproducts');
Route::get('getcities/{id}', [\App\Http\Controllers\CityController::class, 'getCities'])->name('cities.getcities');
Route::get('getstates/{id}', [\App\Http\Controllers\StateController::class, 'getStates'])->name('states.getstates');
Route::get('getalgerianstates', [\App\Http\Controllers\StateController::class, 'getAlgerianStates'])->name('states.getalgerianstates');
Route::get('getsubcategories/{id}', [\App\Http\Controllers\SubCategoryController::class, 'getSubCategories'])->name('subc_ategories.getsubcategories');
Route::get('getactivities', 'ActivityController@getActivities')->name('activities.getactivities');
Route::get('getselectedactivities/{id}', 'ActivityController@getSelectedActivities')->name('activities.getselectedactivities');
Route::get('getimporter/{id}', [\App\Http\Controllers\ImporterController::class, 'getImporter'])->name('importers.getimporter');

Route::resource('certificates', CertificateController::class);
Route::resource('enterprises', EnterpriseController::class);
// Route::resource('exportermanagers', ExportManagerController::class);
Route::resource('importers', ImporterController::class);
Route::resource('producers', ProducerController::class);
Route::resource('managers', ManagerController::class);
Route::resource('products', ProductController::class);
Route::resource('requests', RequestController::class);
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('settings', SettingController::class);
Route::resource('users', UserController::class);
Route::resource('payments', PaymentController::class);
Route::resource('categories', CategoryController::class);
Route::resource('subcategories', SubCategoryController::class);

Route::get('/registration', [RegistrationWizardController::class, 'index'])->name('registration_wizard');
Route::post('/registration', [RegistrationWizardController::class, 'store'])->name('registration_wizard.post');
Route::get('/is-exist/{model}/{property}/{value}', [RegistrationWizardController::class, 'isExist'])->name('registration_wizard.is-exist');


//logger
Route::get('/system-log', [\App\Http\Controllers\LoggerController::class, 'systemLog'])->name('logger.system-log');
Route::get('/activity-log', [\App\Http\Controllers\LoggerController::class, 'usersActivities'])->name('logger.users-activities');
Route::get('/settings-log', [\App\Http\Controllers\LoggerController::class, 'settings'])->name('logger.settings');
Route::post('/update-log-settings', [\App\Http\Controllers\LoggerController::class, 'update'])->name('logger.update.settings');

//-----------------------------------//
//------ email verification ---------//
//-----------------------------------//

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
//     return redirect('/dashboard');
// })->middleware(['auth', 'signed'])->name('email.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
//     return redirect('/products');
// })->middleware(['guest'])->name('email.verify');

Route::get('/profile', function () {
    // Only verified users may access this route...
})->middleware('verified');

Auth::routes(['verify' => true]);

//-----------------------------------//

//  Route::post('register', [RegisteredUserController::class, 'store'])->name('register');

require __DIR__.'/auth.php';

// Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
