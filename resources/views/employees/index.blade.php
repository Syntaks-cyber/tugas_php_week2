@extends('employees.layout')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Laravel CRUD</h2>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-2">
                                <a href="{{url('/employee/create')}}" class="btn btn-success btn-sm" title="Add New Employee">
                                    Add New Employee
                                </a>
                            </div>
                            <div class="col-10">
                                <form action="/employee" method="get">
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="search" id="search" name="search" class="form-control">
                                        </div>
                                        <div class="col-2">
                                            <input type="submit" value="Search" class="btn btn-info"></br>
                                        </div>
                                    </div>
                                </form>
                            </div>             
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Age</th>
                                        <th>Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->position }}</td>
                                        <td>{{ $value->age }}</td>
                                        <td>{{ $value->address }}</td>
  
                                        <td>
                                            <a href="{{ url('/employee/show/' . $value->id) }}" title="View Employee"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/employee/edit/' . $value->id) }}" title="Edit Employee"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
  
                                            <form method="GET" action="{{ url('/employee/delete' . '/' . $value->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm("Confirm delete?")"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
  
                    </div>
                    <div class="card-footer">
                        {{ $employees->links() }}
                    </div>
                    <div class="col-2">
                                <a href="{{url('/home')}}" class="btn btn-success btn-sm" title="back">
                                    Back
                                </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection