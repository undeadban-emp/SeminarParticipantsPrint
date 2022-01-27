<?php

use App\City;
use App\Participant;
use Illuminate\Support\Facades\Route;

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
    $municipality = City::select('code', 'name')->get();
    $count = Participant::get()->count();
    $barobo = Participant::select('city')->where('city', '166801000')->count();
    $bayabas = Participant::select('city')->where('city', '166802000')->count();
    $bislig = Participant::select('city')->where('city', '166803000')->count();
    $cagwait = Participant::select('city')->where('city', '166804000')->count();
    $cantilan = Participant::select('city')->where('city', '166805000')->count();
    $carmen = Participant::select('city')->where('city', '166806000')->count();
    $carrascal = Participant::select('city')->where('city', '166807000')->count();
    $cortes = Participant::select('city')->where('city', '166808000')->count();
    $hinatuan = Participant::select('city')->where('city', '166809000')->count();
    $lanuza = Participant::select('city')->where('city', '166810000')->count();
    $lianga = Participant::select('city')->where('city', '166811000')->count();
    $lingig = Participant::select('city')->where('city', '166812000')->count();
    $madrid = Participant::select('city')->where('city', '166813000')->count();
    $marihatag = Participant::select('city')->where('city', '166814000')->count();
    $san_agustin = Participant::select('city')->where('city', '166815000')->count();
    $san_miguel = Participant::select('city')->where('city', '166816000')->count();
    $tagbina = Participant::select('city')->where('city', '166817000')->count();
    $tago = Participant::select('city')->where('city', '166818000')->count();
    $tandag = Participant::select('city')->where('city', '166819000')->count();
    return view('user.index',
    compact('count', 'municipality', 'barobo','bayabas','bislig','cagwait','cantilan','carmen','carrascal','cortes','hinatuan','lanuza','lianga','lingig','madrid','marihatag','san_agustin','san_miguel','tagbina','tago', 'tandag'));
});

Route::resource('/list-of-participants', 'User\ListController');
Route::get('/listOfParticipants/data/{municipality_code}', 'User\ListController@listOfParticipants');
Route::get('/print/{id}', 'User\ListController@print');
Route::get('/printAll/{municipality_code}', 'User\ListController@printAll');
Route::resource('settings', 'User\SettingsController');
Route::put('/settings/update/{id}', 'User\SettingsController@update')->name('update');
Route::delete('/settings/delete/{id}', 'User\SettingsController@destroy')->name('destroy');
Route::get('/CertificateImageList', 'User\SettingsController@CertificateImageList');


