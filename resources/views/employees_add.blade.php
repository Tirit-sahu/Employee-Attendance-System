<?php use \App\Http\Controllers\EmployeesController; 
use Illuminate\Http\Request;
?>
@extends('layouts.myapp')

@section('content')  

<section class="content-header">
      <h1>
       <i class="fa fa-briefcase" aria-hidden="true"></i> Add New Employee
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/employees/add') }}">Add Employees</a></li>
      </ol>
    </section>

    <section class="content">
          <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
             <img src="{{ asset('images/add_new2.png') }}">
            <div class="box-body">
              <form method="post" action="{{ url('/employees/add') }}" enctype="multipart/form-data" autocomplete="off">
                @csrf

                @if (Session::has('success'))
                  <div class="alert alert-success text-center">
                  <strong>Successfully! </strong> {{ Session::get('success') }}
                  </div>
                @endif

              <div class="form-group">
                <label>Employee Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Employee Name" value="{{ old('Name') }}" required="" onkeyup="this.value = this.value.toUpperCase();">
                <span class="text-danger">{{ $errors->first('name') }}</span>
              </div>

              <div class="form-group">
                <label>Father's Name</label>
                <input type="text" class="form-control" name="father" placeholder="Enter Father's Name" value="{{ old('Name') }}" required="" onkeyup="this.value = this.value.toUpperCase();">
                <span class="text-danger">{{ $errors->first('father') }}</span>
              </div>

              <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile" value="{{ old('mobile') }}" maxlength="10" required="">
                <span class="text-danger">{{ $errors->first('mobile') }}</span>
              </div>


              <div class="form-group">
                <label>Position</label>
                <select class="form-control select2" name="position" required="">
                  <option value="">Select position</option>
                  @foreach($positions as $position)
                  <option value="{{$position->id}}">{{$position->name}}</option>
                  @endforeach   
                </select>
                <span class="text-danger">{{ $errors->first('mobile') }}</span>
              </div>

            
            <div class="form-group">
                <label>Photo</label>
                <input type="file" class="form-control" name="image">
                <span class="text-danger">{{ $errors->first('image') }}</span>
              </div>


              <div class="form-group">
                <label>Home Address</label>
                <textarea onkeyup="this.value = this.value.toUpperCase();" class="form-control" rows="5" name="HomeAddress" placeholder="Enter Home Address" required="">{{ old('HomeAddress') }}</textarea>
                <span class="text-danger">{{ $errors->first('HomeAddress') }}</span>
              </div>


              <div class="form-group">
                  <button type="submit" class="btn bg-navy btn-flat margin"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Submit </button>
              </div>
              </form>
            </div>
          </div>
         
        </div>
      </div>

      <!-- /.row -->

    </section>

    @endsection
