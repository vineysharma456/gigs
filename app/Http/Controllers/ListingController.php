<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Listing; // Import the Listing model


class ListingController extends Controller
{
    // Render the index page
    public function index()
{
    $filters = request()->only('search');
    $list = Listing::filter($filters)->get();
    
    return view('listings.index', [
        'list' => $list,
    ]);
}
    // Render the create page
    public function create()
    {
        return view('listings.create');
    }

    // Store the listing
    public function store(Request $request)
    {  

      
        // Validate the incoming form data
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('list', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
       if(auth()->check()){
        $formFields['user_id']= auth()->id();
       }
       else{
        return redirect()->route('login')->with('error', 'You must be logged in to create a listing');
       }
        if($request->hasFile('logo')){
            $formFields['logo']= $request->file('logo')->store('logos','public');

        }
          
      

        
      Listing::create($formFields);
       
  
        return redirect('/')->with('message', 'Listing created successfully!');
    }


    // edit
    public function edit(Listing $listing){

        
        return view('listings.edit',['listing'=> $listing]);

    }

    // update

    public function update(Request $request, Listing $listing){

        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo']= $request->file('logo')->store('logos','public');

        }
        $listing->update($formFields);
        return redirect('/')->with('message', 'Listing created successfully!');

 


    } 
// delete
    public function delete(Listing $listing){
   $listing->delete();
   return redirect('/')->with('message','Listing deleted successfully');  

    }

    // show
    public function show(Listing $li)
{
    
    
    return view('listings.show', ['listing' => $li]);
}

// manage listing
public function manage(){
    return view('listings.manage',['listings'=>auth()->user()->listings()->get()]);
}

}
