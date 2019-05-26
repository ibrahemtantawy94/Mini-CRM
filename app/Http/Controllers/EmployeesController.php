<?php

namespace App\Http\Controllers;

use App\Employees;
use App\Companies;
use Illuminate\Http\Request;

class EmployeesController extends Controller
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
        $employees = Employees::paginate(10); //getting 10 records from db
        return view('employees.list')->with('employees' , $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Companies::all(); //getting all the records in the companies table to pass it to the view
        return view('employees.create',compact('companies')); //passing a variable to the view
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
            'first_name' =>'required|min:2|max:50',
            'last_name' =>'required|min:2|max:50',
            'email'=>'email|min:3|max:50',
            'phone'=>'min:3|max:50',
        ]);

        $employee = new Employees();
        $employee->first_name = request('first_name');
        $employee->last_name = request('last_name');
        $employee->email = request('email');
        $employee->phone = request('phone');
        $employee->company_id = request('company_id');
        $employee->save();
        return redirect('/employees')->with('success','company added successfully'); //redirect to the view with a success message
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees = Employees::find($id);
        $company = Companies::find($employees->company_id); // get the company entity which it's id is the company_id field in employee table
        $data = ['employees'=>$employees , 'company'=>$company];
        return view('employees.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $employees = Employees::find($id);
        $company = Companies::find($employees->company_id);
        $companies = Companies::all();
        $data = ['employees'=>$employees , 'company'=>$company ,'companies'=>$companies];
        return view('employees.edit',$data);
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
        // validating the request
        $this->validate($request,[
            'first_name' =>'required|min:2|max:50',
            'last_name' =>'required|min:2|max:50',
            'email'=>'email|min:3|max:50',
            'phone'=>'min:3|max:50',
        ]);

        $employee = Employees::find($id);
        $employee->first_name = request('first_name');
        $employee->last_name = request('last_name');
        $employee->email = request('email');
        $employee->phone = request('phone');
        $employee->company_id = request('company_id');
        $employee->save();
        return redirect('/employees')->with('success','Employee Edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employees = Employees::find($id);
        $employees->delete();
        return redirect('/employees')->with('success','Company Deleted Successfully');
    }
}
