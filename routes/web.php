<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\NotActive;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Mswd\AicsPrintList;
use App\Http\Livewire\Mswd\ClientPrintList;
use App\Http\Livewire\Mswd\MswdReports;
use App\Http\Livewire\Mswd\PageAics;
use App\Http\Livewire\Mswd\PageClient;
use App\Http\Livewire\Mswd\PageMinorTravelingAbroad;
use App\Http\Livewire\Mswd\PageReferral;
use App\Http\Livewire\Mswd\PageSpecialCase;
use App\Http\Livewire\Mswd\PageStrandee;
use App\Http\Livewire\Mswd\PageViewAics;
use App\Http\Livewire\Mswd\PageViewClient;
use App\Http\Livewire\Mswd\PageViewMinorTravelingAbroad;
use App\Http\Livewire\Mswd\PageViewReferral;
use App\Http\Livewire\Mswd\PageViewSpecialCase;
use App\Http\Livewire\Mswd\PageViewStrandee;
use App\Http\Livewire\Mswd\ReferralPrintList;
use App\Http\Livewire\Mswd\Reports\AddCapital;
use App\Http\Livewire\Mswd\Reports\Burial;
use App\Http\Livewire\Mswd\Reports\Education;
use App\Http\Livewire\Mswd\Reports\Fire;
use App\Http\Livewire\Mswd\Reports\HouseRepair;
use App\Http\Livewire\Mswd\Reports\Medical;
use App\Http\Livewire\Mswd\Reports\PersonWithDisability;
use App\Http\Livewire\Mswd\Reports\SeniorCitizen;
use App\Http\Livewire\Mswd\Reports\Transpo;
use App\Http\Livewire\Mswd\StrandeePrint;
use App\Http\Livewire\Mswd\StrandeePrintList;
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

    ## LIST
    Route::get('{user_id}/aics-list', PageAics::class)->name('aics-list');
    Route::get('{user_id}/client-list', PageClient::class)->name('client-list');
    Route::get('{user_id}/minor-traveling-abroad-list', PageMinorTravelingAbroad::class)->name('minor-traveling-abroad-list');
    Route::get('{user_id}/special-case-list', PageSpecialCase::class)->name('special-case-list');
    Route::get('{user_id}/referral-list', PageReferral::class)->name('referral-list');
    Route::get('{user_id}/strandee-list', PageStrandee::class)->name('strandee-list');

    ## VIEW
    Route::get('{user_id}/aics-view/{id}', PageViewAics::class)->name('aics-view');
    Route::get('{user_id}/client-view/{id}', PageViewClient::class)->name('client-view');
    Route::get('{user_id}/minor-traveling-abroad-view/{id}', PageViewMinorTravelingAbroad::class)->name('minor-traveling-abroad-view');
    Route::get('{user_id}/special-case-view/{id}', PageViewSpecialCase::class)->name('special-case-view');
    Route::get('{user_id}/referral-view/{id}', PageViewReferral::class)->name('referral-view');
    Route::get('{user_id}/strandee-view/{id}', PageViewStrandee::class)->name('strandee-view');

    Route::get('{user_id}/aics-print-list', [AicsPrintList::class, 'print'])->name('aics-print-list');
    Route::get('{user_id}/client-print-list', [ClientPrintList::class, 'print'])->name('client-print-list');
    Route::get('{user_id}/referral-print-list', [ReferralPrintList::class, 'print'])->name('referral-print-list');
    Route::get('{user_id}/strandee-print/{id}', [StrandeePrint::class, 'print'])->name('strandee-print');
    Route::get('{user_id}/strandee-print-list', [StrandeePrintList::class, 'print'])->name('strandee-print-list');
    ## REPORTS
    Route::get('{user_id}/mswd-reports', MswdReports::class)->name('mswd-reports');
    Route::get('{user_id}/mswd-reports-add-capital', AddCapital::class)->name('mswd-reports-add-capital');
    Route::get('{user_id}/mswd-reports-burial', Burial::class)->name('mswd-reports-burial');
    Route::get('{user_id}/mswd-reports-educational', Education::class)->name('mswd-reports-educational');
    Route::get('{user_id}/mswd-reports-fire-disaster-victim', Fire::class)->name('mswd-reports-fire-disaster-victim');
    Route::get('{user_id}/mswd-reports-house-repair', HouseRepair::class)->name('mswd-reports-house-repair');
    Route::get('{user_id}/mswd-reports-medical', Medical::class)->name('mswd-reports-medical');
    Route::get('{user_id}/mswd-reports-person-with-disability', PersonWithDisability::class)->name('mswd-reports-person-with-disability');
    Route::get('{user_id}/mswd-reports-senior-citizen', SeniorCitizen::class)->name('mswd-reports-senior-citizen');
    Route::get('{user_id}/mswd-reports-transportation', Transpo::class)->name('mswd-reports-transportation');

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
