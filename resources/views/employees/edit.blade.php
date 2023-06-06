@extends('employees.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">
    <span>Edit Employee</span>
    <a href="{{url('/employee')}}" class="btn btn-info btn-sm" style="float: right;" title="Back">
        Back
    </a>
  </div>
  <div class="card-body">
       
      <form action="{{ url('employee/update/' .$employees->id) }}" method="post">
        {!! csrf_field() !!}
        <input type="hidden" name="id" id="id" value="{{$employees->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$employees->name}}" class="form-control"></br>
        <label>Position</label></br>
        <input type="text" name="position" id="position" value="{{$employees->position}}" class="form-control"></br>
        <label>Age</label></br>
        <input type="number" name="age" id="age" value="{{$employees->age}}" class="form-control"></br>
        <label>Address</label></br>
        <textarea name="address" id="address" class="form-control">{{$employees->address}}</textarea></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop