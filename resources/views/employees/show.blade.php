@extends('employees.layout')
@section('content')
  
<div class="card" style="margin:20px;">
    <div class="card-header">
        <span>Employees Page</span>
        <a href="{{url('/employee')}}" class="btn btn-info btn-sm" style="float: right;" title="Back">
            Back
        </a>    
    </div>
        <div class="card-body">
            <div class="card-body">
                <p class="card-text">Name : {{ $employee->name }}</p>
                <p class="card-text">Position : {{ $employee->position }}</p>
                <p class="card-text">Age : {{ $employee->age }}</p>
                <p class="card-text">Address : {{ $employee->address }}</p>
            </div>
            </hr>
        </div>
    </div>
</div>