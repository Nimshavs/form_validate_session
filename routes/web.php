<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    Session::put("message","logged in successfully");
    return view('welcome');
});
Route::get('/form', function () {
    return view('form');
})->name("form");

Route::post("post", function (Request $request) {

    $validate = $request->validate([
        'name' => 'required',
        'age' => ['required','gte:18'],
        'date'=>['required','date','after:2023-09-15'],
        'image'=>['required','image','mimes:jpeg,pnp']
    ]);

    if($request->file("image")){
        foreach($request->file("image") as $file){
            $filename = date("YmdHi").$file->getClientOriginalName();
            $file->move(public_path("images"),$filename);
        }
    }
})->name("submit.form");


