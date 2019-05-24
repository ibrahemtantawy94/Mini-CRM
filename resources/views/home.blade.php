@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div>
                            <a href="{{ route('companies.list') }}">Companies</a>
                        </div>
                        <br>
                        <div>
                            <a href="{{ route('employees.list') }}">Employees</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
