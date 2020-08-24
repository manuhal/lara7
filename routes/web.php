<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    //return 'APP_NAME = ' . env('APP_NAME') . '<br>DB_DATABASE = ' . env('DB_DATABASE') . '<br>';
    return view('welcome');
});

Route::view('/welcome','welcome');

Route::get('/user', 'UserController@index');

Route::post('/upload', function(Request $request){    
    
    //check if user select image (avatar field is not empty)
    if($request->hasFile('avatar')){
        //store in the  public/images folder
        $request->avatar->store('images','public');
        // verify that there were no problems uploading the file
        if ($request->avatar->isValid()) {
            return 'image uploaded successfully';
        }        
    } else{
        return 'please select your image';
    }
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
