<?php

namespace App\Http\Controllers;

use Image;
use App\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::paginate(10); //get 10 records from the db
        return view('companies.list')->with('companies' , $companies); //passing a varialbe to the view
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
        //validating the request
        $this->validate($request,[
            'name' =>'required|min:3|max:255',
            'email'=>'email|min:3|max:255',
            'logo' => 'image|mimes:jpg,jpeg,png,gif|dimensions:min_width=100,min_height=100',
            'website'=>'required|url',
        ]);

        $logo = $request->file('logo'); // get the logo from the view on name (logo)
        $name = time() . $logo->getClientOriginalName(); // change it's name to current time+it's original name
        $logo->storeAs('/public', $name); // store the uploaded file to /public
        $company = new Companies();
        $company->name = request('name');
        $company->email = request('email');
        $company->website = request('website');
        $company->logo = $name;
        $company->save();
        return redirect('/companies')->with('success','company added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companies = Companies::find($id); // find the company of id = $id
        return view('companies.show')->with('companies' , $companies); // pass the company to the view
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Companies::find($id); // find the company of id = $id
        return view('companies.edit')->with('companies' , $companies); // pass the company to the view
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
        //validating the request
        $this->validate($request,[
            'name' =>'required|min:3|max:255',
            'email'=>'email|min:3|max:255',
            'logo' => 'image|mimes:jpg,jpeg,png,gif|dimensions:min_width=100,min_height=100',
            'website'=>'required|url',
        ]);

        $logo = $request->file('logo');
        $name = time() . $logo->getClientOriginalName();
        $logo->storeAs('/public', $name);
        $company = Companies::find($id);
        $company->name = request('name');
        $company->email = request('email');
        $company->website = request('website');
        $company->logo = $name;
        $company->save();

        return redirect('/companies')->with('success', 'company has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies = Companies::find($id); // find the company of id = $id --> passed from the request
        $companies->delete();
        return redirect('/companies')->with('success','Company Deleted Successfully');
    }
}
