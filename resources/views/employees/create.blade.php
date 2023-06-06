@extends('employees.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">
    <span>Create New Employees</span>
    <a href="{{url('/employee')}}" class="btn btn-info btn-sm" style="float: right;" title="Back">
        Back
    </a>
  </div>
  <div class="card-body">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      <form action="{{ url('employee/add') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Position</label></br>
        <input type="text" name="position" id="position" class="form-control"></br>
        <label>Age</label></br>
        <input type="number" name="age" id="age" class="form-control"></br>
        <label>Address</label></br>
        <textarea name="address" id="address" class="form-control"></textarea></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop