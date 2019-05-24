@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Employee Information
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{route('employees.update', $employees->id)}}" enctype="multipart/form-data">
                @method('PATCH')
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="first_name">Fitst Name:</label>
                    <input type="text" class="form-control" name="first_name" required  value="{{$employees->first_name}}"/>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" required  value="{{$employees->last_name}}"/>
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="text" class="form-control" name="email" value="{{$employees->email}}"/>
                </div>
                <div class="form-group">
                    <label for="website">Phone :</label>
                    <input type="text" class="form-control" name="phone" value="{{$employees->phone}}"/>
                </div>
                <div class="form-group">
                    <select class="form-control" name="company_id">
                        <option value="{{$employees->company_id}}">{{$company->name}}</option>
                    @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('employees.list')}}" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
@endsection