<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Family;
use App\Models\Education;
use Illuminate\Http\Request;
use Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $my_employee = Employee::all();

        $data = compact('my_employee');  
        return  view('all_emp')->with($data);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return  view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
                    // validator
                    $val =  Validator::make($req->all(),[
                        'name'=> 'required',
                        'email'=> 'required|email',
                        'password'=> 'required',
                        'salary'=> 'required',
                        'desigination'=> 'required',             
                        'dob'=> 'required',
                        'address'=> 'required'
                ])->validate();
                
                // validator
                
        
                    $employee = new Employee;
                    $employee->name=$req['name'];
                    $employee->email=$req['email'];
                    $employee->password=$req['password'];
                    $employee->salary=$req['salary'];
                    $employee->desigination=$req['desigination'];
                    $employee->address=$req['address'];
                    $employee->role=$req['role'];
                    $employee->dob=$req['dob'];
                    $employee->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
       
        $my_employee = Employee::with("families")->with("education")->where('id',$employee->id)->first();
        $data = compact('my_employee');  
   
        return  view('view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $data = compact('employee');  
        return  view('update')->with($data);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Employee $employee)
    {
        $emp = $employee;
          if ($req['name']!='') { $emp->name=$req['name']; }
          if ($req['email']!='') { $emp->email=$req['email']; }
          if ($req['password']!='') { $emp->password=$req['password']; }
          if ($req['salary']!='') { $emp->salary=$req['salary']; }
          if ($req['desigination']!='') { $emp->desigination=$req['desigination']; }
          if ($req['address']!='') { $emp->address=$req['address']; }
          if ($req['role']!='') { $emp->role=$req['role']; }
          if ($req['dob']!='') { $emp->dob=$req['dob']; }
          $emp->save();
    
return '1';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return "i am deleted";
    }
}
