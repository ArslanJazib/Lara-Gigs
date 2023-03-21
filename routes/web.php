<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => Listing::all()
    ]);
});

// Response Header Modification
Route::get('/hello',function(){
    return response('<h1>Hello World</h1>', 200)
        ->header('Content-Type','text/plain')
        ->header('foo','bar');
});

// Wildcards with constraints using regular expressions
Route::get('/posts/{id}',function($id){
    return response('Post '.$id);
})->where('id','[0-9]+');

// Query string With GET Request
Route::get('/search', function(Request $request){
    return $request->name;
});

// Single Listing
Route::get('/listing/{id}',function($id){
    return view('listing',[
        'heading' => 'Latest Listings',
        'listing' => Listing::find($id)
    ]);
});