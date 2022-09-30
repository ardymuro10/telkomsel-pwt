<?php

use App\Models\Certificate;
use App\Models\CoverLetter;
use App\Models\DifferentData;
use App\Models\BusinessInfo;
use App\Models\MailPoor;
use App\Models\Data1;
use App\Models\Data2;
use App\Models\PublicComplaint;
use App\Models\UserList;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

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

Auth::routes([
    'register' => false
]);

Route::middleware('auth')->group(function () {
    Route::get('/', App\Http\Livewire\Home\Index::class)->name('home');
    Route::name('mail-monitoring.')->prefix('/mail-monitoring')->group(function () {
        Route::get('/cover-letter', App\Http\Livewire\MailMonitoring\CoverLetter\Index::class)->name('cover-letter');
        Route::get('/cover-letter/{id}/pdf', function ($id, CoverLetter $coverLetter) {
            $coverLetter = $coverLetter->findOrFail($id)->toArray();
            $pdf = Pdf::loadView('mail-monitoring.cover-letter.pdf', [
                'cover_letter' => $coverLetter
            ]);
            return $pdf->stream('surat-pengantar-'.Str::slug($coverLetter['name'], '-').'-'.now()->timestamp.'.pdf');
        });
        // ->name('cover-letter.pdf');
        Route::get('/certificate', App\Http\Livewire\MailMonitoring\Certificate\Index::class)->name('certificate');
        Route::get('/certificate/{id}/pdf', function ($id, Certificate $certificate) {
            $certificate = $certificate->findOrFail($id)->toArray();
            $pdf = Pdf::loadView('mail-monitoring.certificate.pdf', [
                'certificate' => $certificate
            ]);
            return $pdf->stream('surat-pengantar-'.Str::slug($certificate['name'], '-').'-'.now()->timestamp.'.pdf');
        })->name('certificate.pdf');
        Route::get('/different-data', App\Http\Livewire\MailMonitoring\DifferentData\Index::class)->name('different-data');
        Route::get('/different-data/{id}/pdf', function ($id, DifferentData $different_data) {
            $different_data = $different_data->findOrFail($id)->toArray();
            $pdf = Pdf::loadView('mail-monitoring.different-data.pdf', [
                'different_data' => $different_data
            ]);
            return $pdf->stream('surat-beda-data-'.Str::slug($different_data['name'], '-').'-'.now()->timestamp.'.pdf');
        })->name('different-data.pdf');
        Route::get('/business-info', App\Http\Livewire\MailMonitoring\BusinessInfo\Index::class)->name('business-info');
        Route::get('/business-info/{id}/pdf', function ($id, BusinessInfo $business_info) {
            $business_info = $business_info->findOrFail($id)->toArray();
            $pdf = Pdf::loadView('mail-monitoring.business-info.pdf', [
                'business_info' => $business_info
            ]);
            return $pdf->stream('surat-keterangan-usaha-'.Str::slug($business_info['name'], '-').'-'.now()->timestamp.'.pdf');
        })->name('business-info.pdf');
        Route::get('/mail-poor', App\Http\Livewire\MailMonitoring\MailPoor\Index::class)->name('mail-poor');
        Route::get('/mail-poor/{id}/pdf', function ($id, MailPoor $mail_poor) {
            $mail_poor = $mail_poor->findOrFail($id)->toArray();
            $pdf = Pdf::loadView('mail-monitoring.mail-poor.pdf', [
                'mail_poor' => $mail_poor
            ]);
            return $pdf->stream('surat-keterangan-miskin-'.Str::slug($mail_poor['name'], '-').'-'.now()->timestamp.'.pdf');
        })->name('mail-poor.pdf');
    });
    Route::get('/death-person', App\Http\Livewire\DeathPerson\Index::class)->name('death-person');
    Route::get('/public-complaints', App\Http\Livewire\PublicComplaint\Index::class)->name('public-complaints');
    Route::get('/user-list', App\Http\Livewire\UserList\Index::class)->name('user-list');
    Route::name('data.')->prefix('/data')->group(function () {
        Route::get('/data1', App\Http\Livewire\Data\Data1\Index::class)->name('data1');
        Route::get('/data2', App\Http\Livewire\Data\Data2\Index::class)->name('data2');
        Route::get('/data3', App\Http\Livewire\Data\Data3\Index::class)->name('data3');
    });
});


Route::get('request/post-data', [App\Http\Controllers\Controller::class, 'viewPostData']);
Route::post('request/post-data', [App\Http\Controllers\Controller::class, 'processPostData']);
Route::post('request/post-data2', [App\Http\Controllers\Controller::class, 'processPostData2']);
Route::post('request/post-data3', [App\Http\Controllers\Controller::class, 'processPostData3']);
Route::post('request/post-data4', [App\Http\Controllers\Controller::class, 'processPostData4']);
Route::post('request/post-data5', [App\Http\Controllers\Controller::class, 'processPostData5']);
Route::post('request/post-data6', [App\Http\Controllers\Controller::class, 'processPostData6']);
