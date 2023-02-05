@extends('layout.main')

@push('title')
    <title>EMS | Update</title>
    <style>
        body {
            background-color: #df9ef5;
            margin: 0px;

        }


        #login {
            height: 700px;
            width: 400px;
            box-shadow: 0.5px 0.5px 3px 3px #888888;
            background-color: #ffffff;
        }

        select {
            height: 30px;
            border: 0px solid black;
            font-size: 15px;
            box-shadow: 0.5px 3px 3px #888888;
            width: 220px;

        }
    </style>
@endpush
@section('main-section')
    <div id="login_box">

        <div id="login">
            <div id="login_h">
                Create User
            </div>

            <div id="form_container">
                <div id="forms">
                    <form id="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="myid" id="myid" value="">
                        <div class="form-group">

                            <input type="text" name="name" id="name" aria-describedby="helpId"
                                placeholder="     Name" value="{{$employee->name}}">
                            <span id="ename"></span>
                        </div>
                        <div class="form-group">

                            <input type="email" name="email" id="email" aria-describedby="helpId"
                                placeholder="     Email" value="{{$employee->email}}">
                            <span id="eemail"></span>

                        </div>
                        <div class="form-group">

                            <input type="password" name="password" id="password" aria-describedby="helpId"
                                placeholder="    Password" value="{{$employee->password}}">
                            <span id="epassword"></span>

                        </div>
                        <div class="form-group">

                            <select name="role" id="role" value="{{$employee->role}}">
                                <option value="0">Staff</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">

                            <input type="number" name="salary" id="salary" aria-describedby="helpId"
                                placeholder="    Salary" value="{{$employee->salary}}">
                            <span id="esalary"></span>

                        </div>
                        <div class="form-group">

                            <input type="text" name="desigination" id="desigination" aria-describedby="helpId"
                                placeholder="    Desigination" value="{{$employee->desigination}}">
                            <span id="edesigination"></span>

                        </div>
                        <div class="form-group">

                            <input type="text" name="dob" id="dob" onfocus="(this.type='date')"
                                aria-describedby="helpId" placeholder="    DOB" value="{{$employee->dob}}">
                            <span id="edob"></span>

                        </div>
                        <div class="form-group">

                            <input type="text" name="address" id="address" aria-describedby="helpId"
                                placeholder="    Address" value="{{$employee->address}}">
                            <span id="eaddress"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="send" value="REGISTER">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="http://127.0.0.1:8000/jquary.js"></script>
    <script>
        jQuery('#form').submit(function(e) {
            e.preventDefault();
            jQuery.ajax({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                url: "{{url('employee')}}/{{$employee->id}}",
                type: "PUT",
                data: jQuery('#form').serialize(),
                success: function(result) {
                    window.location = '/view';
                }
            });
        });


        // jQuery('#u_form').submit(function(e) {
        //     e.preventDefault();
        //     jQuery.ajax({
        //         headers: {
        //             'X-CSRF-Token': $('input[name="_token"]').val()
        //         },
        //         url: "{{ url('/a_update') }}",
        //         type: "POST",
        //         data: jQuery('#u_form').serialize(),
        //         success: function(result) {
        //             // $("#name").attr('value',result[0].name );
        //             // $("#email").attr('value',result[0].email );
        //             // $("#password").attr('value',result[0].password );
        //             // $("#role").attr('value',result[0].role );
        //             // $("#salary").attr('value',result[0].salary );
        //             // $("#desigination").attr('value',result[0].desigination );
        //             // $("#dob").attr('value',result[0].dob );
        //             // $("#address").attr('value',result[0].address );
        //             // $("#myid").attr('value',result[0].id );
        //             console.log(result);

        //         }
        //     });
        // });
    </script>
@endsection
