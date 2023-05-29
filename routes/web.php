<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\NotActive;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Dts\DocumentOverview;
use App\Http\Livewire\Mswd\AicsList;
use App\Http\Livewire\Mswd\AicsPrintList;
use App\Http\Livewire\Mswd\AicsView;
use App\Http\Livewire\Mswd\ClientList;
use App\Http\Livewire\Mswd\ClientPrintList;
use App\Http\Livewire\Mswd\ClientView;
use App\Http\Livewire\Mswd\MswdReports;
use App\Http\Livewire\Mswd\ReferralList;
use App\Http\Livewire\Mswd\ReferralPrintList;
use App\Http\Livewire\Mswd\ReferralView;
use App\Http\Livewire\Mswd\Reports\AddCapital;
use App\Http\Livewire\Mswd\Reports\Burial;
use App\Http\Livewire\Mswd\Reports\Education;
use App\Http\Livewire\Mswd\Reports\Fire;
use App\Http\Livewire\Mswd\Reports\HouseRepair;
use App\Http\Livewire\Mswd\Reports\Medical;
use App\Http\Livewire\Mswd\Reports\PersonWithDisability;
use App\Http\Livewire\Mswd\Reports\SeniorCitizen;
use App\Http\Livewire\Mswd\Reports\Transpo;
use App\Http\Livewire\Mswd\StrandeeList;
use App\Http\Livewire\Mswd\StrandeePrint;
use App\Http\Livewire\Mswd\StrandeePrintList;
use App\Http\Livewire\Mswd\StrandeeView;
use App\Http\Livewire\User\Dashboard as UserDashboard;
use Illuminate\Support\Facades\Route;

## Rpt
use App\Http\Livewire\Settings\CompanyProfile;
use App\Http\Livewire\Settings\ProfileSettings;
use App\Http\Livewire\Settings\UsersManagement;

use App\Models\User;

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
## ADD ROLE TO USER
Route::get('/role_add', function () {
    $user = User::find(1);
    $user->assignRole(1);
});
Route::get('/permission_add', function () {
    $user = User::find(1);
    $user->givePermissionTo(2);
});

// Route::get('/privacy-policy', PrivacyPolicy::class)->name('Privacy Policy');

Route::get('/', Login::class)->name('login');
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::get('/not-activated', NotActive::class)->name('not-active');

// For grouping prefix and middleware
Route::group(['prefix' => 'user',  'middleware' => ['auth', 'is_active']], function()
{
    Route::get('{user_id}/dashboard', UserDashboard::class)->name('user-dashboard');

    ## MSWD
    Route::get('{user_id}/mswd/aics-list', AicsList::class)->name('mswd/aics-list');
    Route::get('{user_id}/mswd/aics/{id}', AicsView::class)->name('mswd/aics/');
    Route::get('{user_id}/mswd/aics/print-list/all', [AicsPrintList::class, 'print'])->name('mswd/aics/print-list/all');
    Route::get('{user_id}/mswd/client-list', ClientList::class)->name('mswd/client-list');
    Route::get('{user_id}/mswd/client/{id}', ClientView::class)->name('mswd/client');
    Route::get('{user_id}/mswd/client/print-list/all', [ClientPrintList::class, 'print'])->name('mswd/client/print-list/all');
    Route::get('{user_id}/mswd/referral-list', ReferralList::class)->name('mswd/referral-list');
    Route::get('{user_id}/mswd/referral/{id}', ReferralView::class)->name('mswd/referral');
    Route::get('{user_id}/mswd/referral/print-list/all', [ReferralPrintList::class, 'print'])->name('mswd/referral/print-list/all');
    Route::get('{user_id}/mswd/strandee-list', StrandeeList::class)->name('mswd/strandee-list');
    Route::get('{user_id}/mswd/strandee/{id}', StrandeeView::class)->name('mswd/strandee');
    Route::get('{user_id}/mswd/strandee/print/{id}', [StrandeePrint::class, 'print'])->name('mswd/strandee/print');
    Route::get('{user_id}/mswd/strandee/print-list/all', [StrandeePrintList::class, 'print'])->name('mswd/strandee/print-list/all');
    ## REPORTS
    Route::get('{user_id}/mswd/mswd-reports', MswdReports::class)->name('mswd/mswd-reports');
    Route::get('{user_id}/mswd/mswd-reports/add-capital', AddCapital::class)->name('mswd/mswd-reports/add-capital');
    Route::get('{user_id}/mswd/mswd-reports/burial', Burial::class)->name('mswd/mswd-reports/burial');
    Route::get('{user_id}/mswd/mswd-reports/educational', Education::class)->name('mswd/mswd-reports/educational');
    Route::get('{user_id}/mswd/mswd-reports/fire-disaster-victim', Fire::class)->name('mswd/mswd-reports/fire-disaster-victim');
    Route::get('{user_id}/mswd/mswd-reports/house-repair', HouseRepair::class)->name('mswd/mswd-reports/house-repair');
    Route::get('{user_id}/mswd/mswd-reports/medical', Medical::class)->name('mswd/mswd-reports/medical');
    Route::get('{user_id}/mswd/mswd-reports/person-with-disability', PersonWithDisability::class)->name('mswd/mswd-reports/person-with-disability');
    Route::get('{user_id}/mswd/mswd-reports/senior-citizen', SeniorCitizen::class)->name('mswd/mswd-reports/senior-citizen');
    Route::get('{user_id}/mswd/mswd-reports/transportation', Transpo::class)->name('mswd/mswd-reports/transportation');

    ## USER MANAGEMENT
    Route::get('{user_id}/profile-settings', ProfileSettings::class)->name('profile-settings');
    Route::get('{user_id}/company-profile', CompanyProfile::class)->name('company-profile');
    Route::get('{user_id}/user-management', UsersManagement::class)->name('user-management');
    Route::get('{user_id}/user-management', UsersManagement::class)->name('user-management');
});

Route::get('/home', Register::class)->name('Register');
// For grouping prefix and middleware

Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function()
{
    // Route::get('{user_id}/dashboard', DocumentOverview::class)->name('Admin Dashboard');

});
