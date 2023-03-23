<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Show all listings
    public function index(){
        return view('listings.index', [
            'listings' => Listing::all()
        ]);
    }

    // Show single listing
    public function show(Listing $listing){
        return view('listings.show',[
            'listing' => $listing
        ]);
    }

    // Displays the form on the page which created a new listing
    public function create(Listing $listing){

    }

    // Stores the form created by the create function above
    public function store(Listing $listing){

    }

    // Shows the edit form on the page
    public function edit(Listing $listing){

    }

    // Update function updates the edit data from the above form
    public function update(Listing $listing){

    }

    // Destroy Function deletes a listing
    public function destroy(Listing $listing){

    }
}
