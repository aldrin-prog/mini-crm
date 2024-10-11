<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies= Company::orderBy('created_at', 'desc')->paginate(10);
        // dd($companies);
        return view('companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
        ]);

        $path = $request -> file('logo')->store('logos','public');
        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $path,
            'website' => $request->website,
        ]);
        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Fetch the company by ID
        $company = Company::findOrFail($id);
        
        // Return the view with company data
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    // Validate the incoming request
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'nullable|email|max:255',
        'website' => 'nullable|url|max:255',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Retrieve the company by ID
    $company = Company::findOrFail($id);

    // Update the company details
    $company->name = $request->name;
    $company->email = $request->email;
    $company->website = $request->website;

    // Handle the logo upload if a new file is provided
    if ($request->hasFile('logo')) {
        // Store the logo and update the path in the database
        $path = $request->file('logo')->store('logos', 'public');
        $company->logo = $path;
    }

    // Save the updated company data
    $company->save();

    // Redirect back to the companies index with a success message
    return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the company by ID
        $company = Company::findOrFail($id);

        // Optionally delete associated employees
        $company->employees()->delete();

        // Delete the company's logo if it exists
        if ($company->logo) {
            \Storage::delete($company->logo);
        }

        // Delete the company
        $company->delete();

        // Redirect back to the companies index with a success message
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
