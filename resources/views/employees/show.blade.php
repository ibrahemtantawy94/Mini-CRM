@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$employees->name}}
                    <a href="{{route('employees.list')}}" class="btn btn-success btn-sm float-right">Go Back</a>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <ul class="list-group">
                                <li class = "list-group-item">First Name : {{$employees->first_name}}</li>
                                <li class = "list-group-item">Last Name : {{$employees->last_name}}</li>
                                <li class = "list-group-item">Email : {{$employees->email}}</li>
                                <li class = "list-group-item">Phone : {{$employees->phone}}</li>
                                <li class = "list-group-item">Compay : {{$company->name}}</li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
