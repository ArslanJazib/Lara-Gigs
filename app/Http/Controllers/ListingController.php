<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ListingController extends Controller
{
    // Show all listings
    // public function index(Request $request) Dependency Injection Approach
    
    public function index(){
        
        return view('listings.index', [
            'listings' => Listing::latest()
            ->filter(request(['tag','search']))
            ->paginate(5)
        ]);
    }

    // Show single listing
    public function show(Listing $listing){
        return view('listings.show',[
            'listing' => $listing
        ]);
    }

    // Displays the form on the page which created a new listing
    public function create(){
        return view('listings.create');
    }

    // Stores the form created by the create function above
    public function store(Request $request){
        
        $formData =  $request->validate([
            'title' => 'required',
            'company' => ['required',Rule::unique('listings','company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required','email'],
            'tags' => 'required',
            'description' =>'required'
        ]);

        if($request->hasFile('logo')){
            $formData['logo'] = $request->file('logo')->store('logos','public');
        }
        
        Listing::create($formData);

        return redirect('/')->with('message','Listing created successfully!');
    }

    // Shows the edit form on the page
    public function edit(Listing $listing){
        return view('listings.edit' , ['listing' => $listing]);
    }

    // Update function updates the edit data from the above form
    public function update(Request $request, Listing $listing){
        $formData =  $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required','email'],
            'tags' => 'required',
            'description' =>'required'
        ]);

        if($request->hasFile('logo')){
            $formData['logo'] = $request->file('logo')->store('logos','public');
        }
        
        $listing->update($formData);

        return back()->with('message','Listing updated successfully!');
    }

    // Destroy Function deletes a listing
    public function destroy(Listing $listing){
        $listing->delete();
        return redirect('/')->with('message','Listing Deleted Successfully');
    }
}
