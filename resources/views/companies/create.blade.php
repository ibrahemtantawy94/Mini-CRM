@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add Company
            <a href="{{route('companies.list')}}" class="btn btn-success btn-sm float-right">Go Back</a>
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
            <form method="post" action="{{route('companies.store')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Company Name:</label>
                    <input type="text" class="form-control" name="name" required/>
                </div>
                <div class="form-group">
                    <label for="email">Company Email :</label>
                    <input type="text" class="form-control" name="email"/>
                </div>
                <div class="form-group">
                    <label for="website">Company Website :</label>
                    <input type="text" class="form-control" name="website"/>
                </div>
                <div class="form-group">
                    <label for="logo">Company Logo :</label>
                    <br>
                    <input type="file" class="form-control-file" name="logo"/>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
                <a href="{{route('companies.list')}}" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
@endsection