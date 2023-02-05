@extends('layout.main')

@push('title')
    <title>EMS | View</title>
    <style>
        #login_box,
        #persional,
        #educational,
        #experience,
        #family {
            display: grid;
        }

        #detail {
            padding-left: 25px;


        }

        #allhead {
            text-align: center;
            font-size: 30px;
            color: red;
        }

        #btn {
            display: block;
        }
    </style>
@endpush
@section('main-section')
    @php
        $arr = ['HS', 'SHS', 'UG', 'PG'];
        $arr2 = ['NO', 'YES'];
        $family = ['mother', 'father', 'sister', 'brother', 'whif/husbend', 'son', 'daughter'];
    @endphp
    <div id="detail">
        <div id="persional">
            <div id="allhead">Persional</div>

            @foreach ($my_employee as $item)
                            <p>name - {{ $item->name }}</p>
            <p>email - {{ $item->email }}</p>
            <p>desigination - {{ $item->desigination }}</p>
            <div id="btn">
                <a href="employee/{{$item->id}}"><button>show</button></a>
                <a href="employee/{{$item->id}}/edit"><button>edit</button></a>
                <form action="{{ url('employee/'.$item->id)}}" method="POST">
                @csrf 
                @method('DELETE')
                <button>delete</button>
                </form>
                
            </div>
            <hr>
            @endforeach


        </div>




    </div>

@endsection
