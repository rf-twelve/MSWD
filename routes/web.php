<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Dts\Document;
use App\Http\Livewire\Dts\DocumentCreate;
use App\Http\Livewire\Dts\DocumentEdit;
use App\Http\Livewire\Dts\DocumentOverview;
use App\Http\Livewire\Dts\PrivacyPolicy;
use App\Http\Livewire\Mao\AssessmentRoll;
use App\Http\Livewire\Mao\AssessmentRollCreate;
use App\Http\Livewire\Mao\AssessmentRollUpdate;
use App\Http\Livewire\Mao\MaoReports;
use App\Http\Livewire\Mto\AccountComputation;
use App\Http\Livewire\Mto\AccountList;
use App\Http\Livewire\Mto\AccountVerification;
use App\Http\Livewire\Mto\Collections;
use App\Http\Livewire\Mto\LedgerEntry;
use App\Http\Livewire\Mto\MtoReports;
use App\Http\Livewire\Mto\MtoSettings;
use App\Http\Livewire\Mto\Reports;
use App\Http\Livewire\Mto\Reports\AssessmentRollReport;
use App\Http\Livewire\Mto\Reports\CollectibleReport;
use App\Http\Livewire\Mto\Reports\CollectionAndDepositReport;
use App\Http\Livewire\Mto\Reports\DelinquencyReport;
use App\Http\Livewire\Mto\Settings\BookletSetting;
use App\Http\Livewire\Mto\Settings\FormSetting;
use App\Http\Livewire\Mto\Settings\LocalitySetting;
use App\Http\Livewire\Mto\Settings\TaxSetting;
use App\Http\Livewire\User\Dashboard as UserDashboard;
use Illuminate\Support\Facades\Route;

## Rpt
use App\Http\Livewire\Rpt\Account;
use App\Http\Livewire\Settings\CompanyProfile;
use App\Http\Livewire\Settings\ProfileSettings;
use App\Http\Livewire\Settings\UsersManagement;
use App\Http\Livewire\Settings\Users as UserSettings;
use App\Models\MaoAssmtRoll;
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


Route::get('/privacy-policy', PrivacyPolicy::class)->name('Privacy Policy');

Route::get('/', Login::class)->name('login');
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

// For grouping prefix and middleware
Route::group(['prefix' => 'user',  'middleware' => 'auth'], function()
{
    Route::get('{user_id}/dashboard', UserDashboard::class)->name('user-dashboard');
    // Route::ge{user_id}/t('tracking-numbers', TrackingNumbers::class)->name('Tracking Numbers');
    Route::get('{user_id}/document/{id}', DocumentOverview::class)->name('Document Overview');
    Route::get('{user_id}/document/{tn}/create', DocumentCreate::class)->name('Create Document');
    Route::get('{user_id}/document/{id}/edit', DocumentEdit::class)->name('Edit Document');
    Route::get('{user_id}/documents/{type}', Document::class)->name('Documents');
    Route::get('{user_id}/settings', UserSettings::class)->name('Users Setting');

    ## ASSESSOR
    Route::get('{user_id}/assessment-roll', AssessmentRoll::class)->name('assessment-roll');
    Route::get('{user_id}/assessment-roll-create', AssessmentRollCreate::class)->name('assessment-roll-create');
    Route::get('{user_id}/assessment-roll-update/{id}', AssessmentRollUpdate::class)->name('assessment-roll-update/{id}');
    Route::get('{user_id}/mao-reports', MaoReports::class)->name('mao-reports');
    Route::get('{user_id}/reports/assessment-roll-report', AssessmentRollReport::class)->name('reports/assessment-roll-report');

    ## TREASURER
    Route::get('{user_id}/account-list', AccountList::class)->name('account-list');
    Route::get('{user_id}/account-computation/{id}', AccountComputation::class)->name('account-computation');
    Route::get('{user_id}/account-verification/{id}', AccountVerification::class)->name('account-verification');
    Route::get('{user_id}/collections', Collections::class)->name('collections');
    Route::get('{user_id}/ledger-entry/{id}', LedgerEntry::class)->name('ledger-entry');
    Route::get('{user_id}/mto-reports', MtoReports::class)->name('mto-reports');
    Route::get('{user_id}/mto-settings', MtoSettings::class)->name('mto-settings');
    Route::get('{user_id}/reports/collectible-report', CollectibleReport::class)->name('reports/collectible-report');
    Route::get('{user_id}/reports/collection-and-deposit-report', CollectionAndDepositReport::class)->name('reports/collection-and-deposit-report');
    Route::get('{user_id}/reports/delinquency-report', DelinquencyReport::class)->name('reports/delinquency-report');
    Route::get('{user_id}/settings/booklet-setting', BookletSetting::class)->name('settings/booklet-setting');
    Route::get('{user_id}/settings/form-setting', FormSetting::class)->name('settings/form-setting');
    Route::get('{user_id}/settings/locality-setting', LocalitySetting::class)->name('settings/locality-setting');
    Route::get('{user_id}/settings/tax-setting', TaxSetting::class)->name('settings/tax-setting');

    ## USER MANAGEMENT
    Route::get('{user_id}/profile-settings', ProfileSettings::class)->name('profile-settings');
    Route::get('{user_id}/company-profile', CompanyProfile::class)->name('company-profile');
    Route::get('{user_id}/user-management', UsersManagement::class)->name('user-management');
});

Route::get('/home', Register::class)->name('Register');
// For grouping prefix and middleware

Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function()
{
    Route::get('{user_id}/dashboard', DocumentOverview::class)->name('Admin Dashboard');

});
