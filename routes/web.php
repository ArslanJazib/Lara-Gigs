<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Listing;
use App\Http\Controllers\ListingController;

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

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show from to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing

// Show all listings
Route::get('/', [ListingController::class, 'index']);

// Single Listing with Route Model Binding
Route::get('/listing/{listing}', [ListingController::class, 'show']);

// Response Header Modification
// Route::get('/hello',function(){
//     return response('<h1>Hello World</h1>', 200)
//         ->header('Content-Type','text/plain')
//         ->header('foo','bar');
// });

// Wildcards with constraints using regular expressions
// Route::get('/posts/{id}',function($id){
//     return response('Post '.$id);
// })->where('id','[0-9]+');

// Query string With GET Request
// Route::get('/search', function(Request $request){
//     return $request->name;
// });


// Single Listing without Route Model Binding
// Route::get('/listing/{id}',function($id){
    
//     $listing = Listing::find($id);

//     if($listing){

//         return view('listing',[
//             'listing' => $listing
//         ]);

//     } else{
//         abort('404');
//     }
// });


