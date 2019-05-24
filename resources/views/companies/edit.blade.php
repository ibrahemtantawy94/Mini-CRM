@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Company Informationy
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
            <form method="post" action="{{route('companies.update', $companies->id)}}" enctype="multipart/form-data">
                @method('PATCH')
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Company Name:</label>
                    <input type="text" class="form-control" name="name" required  value="{{$companies->name}}"/>
                </div>
                <div class="form-group">
                    <label for="email">Company Email :</label>
                    <input type="text" class="form-control" name="email" value="{{$companies->email}}"/>
                </div>
                <div class="form-group">
                    <label for="website">Company Website :</label>
                    <input type="text" class="form-control" name="website" value="{{$companies->website}}"/>
                </div>
                <div class="form-group">
                    <label for="logo">Company Logo :</label>
                    <br>
                    <input type="file" class="form-control-file" name="logo"  value="{{$companies->website}}"/>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('companies.list')}}" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
@endsection