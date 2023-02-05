<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Validator;


class EducationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('education');

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

 $Emp_fam = new Education;
 $Emp_fam->employee_id=$emp_id_g;
 $Emp_fam->edu_level=$req['edu_level'.$i];
 $Emp_fam->course_n=$req['course_n'.$i];
 $Emp_fam->place=$req['place'.$i];
 $Emp_fam->percent=$req['percent'.$i];
 $Emp_fam->save();
 }

return '1';
    }


}
