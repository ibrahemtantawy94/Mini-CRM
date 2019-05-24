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
                    <div class="card-header">{{$companies->name}}
                    <a href="{{route('companies.list')}}" class="btn btn-success btn-sm float-right">Go Back</a>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <ul class="list-group">
                                <li class = "list-group-item">Name : {{$companies->name}}</li>
                                <li class = "list-group-item">Email : {{$companies->email}}</li>
                                <li class = "list-group-item">Website : <a href="#" target="_blank">{{$companies->website}}</a> </li>
                                <li class = "list-group-item"  style="overflow: hidden">Logo : <img src="/storage/{{$companies->logo}}" alt="nice"> </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
