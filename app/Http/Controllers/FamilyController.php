<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;
use Validator;


class FamilyController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('family');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
            
 $emp_id_g=$req['emp_id'];
 for( $i=1;$i<$req['add'];$i++){

 $Emp_fam = new Family;
 $Emp_fam->employee_id=$emp_id_g;
 $Emp_fam->name=$req['name'.$i];
 $Emp_fam->age=$req['age'.$i];
 $Emp_fam->relation=$req['relation'.$i];
 $Emp_fam->employeed=$req['employed'.$i];
 $Emp_fam->save();
 }

return '1';
    }

 
}
