@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Employees List
            <a href="/" class="btn btn-success btn-sm float-right" style="margin-left: 5px;">Back To Dashboard</a>
            <a href="{{route('employees.create')}}" class="btn btn-primary btn-sm float-right">Add An Employee</a>
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
                <div>
                    @if(count($employees))
                            <table class="table table-hover table-condensed">
                                <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>
                                        <a href="/employees/{{$employee->id}}" style="font-size:22px;font-weight: bold">{{$employee->first_name}} {{$employee->last_name}}</a>
                                    </td>
                                    <td>
                                        <span style="float: right">
                                            <form method="post" action="{{action('EmployeesController@destroy', $employee['id'])}}">
                                            <input type="hidden" name="_method" value="Delete">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        </span>
                                        <a href="{{action('EmployeesController@edit',$employee['id'])}}" class="btn btn-success" style="float: right;margin-right: 8px">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                                </tbody>
                            </table>
                        {{$employees->links()}}
                    @else
                        <p>No Employees Found</p>
                    @endif
                </div>
        </div>
    </div>
@endsection