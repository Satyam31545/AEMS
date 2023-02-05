<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Family;
use Session;
use Validator;

use Illuminate\Http\Request;

class Mycon extends Controller
{
    public function login(){
        return  view('login');
       } 
       public function error(){
        return  view('error');
       }
       public function update(){
        $emp = Employee::where('id',Session::get('id'))->get();
        $data = compact('emp');
    return  view('s_update')->with($data);
       } 

       public function p_update(request $req){
        $emp = employee::find(Session::get('id'));
        $emp->dob = $req['dob'];
        $emp->address = $req['address'];
        $emp->save(); 
return '1';
     }
       public function login_p(request $req){
        // validator
           $val =  Validator::make($req->all(),[
                'email'=> 'required|email',
                'password'=> 'required'
        ],
        $messages= [
            'required'=> 'The field must be filled.'
        ])->validate();
    
        // validator

     $users=Employee::where('email', $req['email'])->where('password',$req['password'])->get();
    
    
     if( $users->count() != 0){
       Session::put('role', $users[0]->role);
           Session::put('id', $users[0]->id);
  
  
       return 1;
     }else{
     return 0; 
    }
     
         } 

         public function view(){
            $my_employee = Employee::with("families")->with("education")->where('id',Session::get('id'))->first();
            $data = compact('my_employee');  
            return  view('view')->with($data);
           }    
           public function logout(){
            session()->flush();
            return redirect('/');
           }
}
