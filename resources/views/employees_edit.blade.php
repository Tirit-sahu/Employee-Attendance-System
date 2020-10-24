<?php use \App\Http\Controllers\ParentsController;
use Illuminate\Http\Request;
?>
@extends('layouts.myapp')

@section('content')

<section class="content-header">
      <h1>
        Employee
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/employees/add') }}">Edit Employee</a></li>
      </ol>
    </section>

    <section class="content">
          <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
             <img src="{{ asset('images/edit_data.png') }}">
            <div class="box-body">
              <form method="post" action="{{ url('/employees/edit', array($employees->id)) }}" enctype="multipart/form-data">
                @csrf

                @if (Session::has('success'))
                  <div class="alert alert-success text-center">
                  <strong>Successfully! </strong> {{ Session::get('success') }}
                  </div>
                @endif

              <div class="form-group">
                <label>Employee Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Full Name" value="{{ $employees->fullName }}" onkeyup="this.value = this.value.toUpperCase();">
                <span class="text-danger">{{ $errors->first('name') }}</span>
              </div>

              <div class="form-group">
                <label>Father's Name</label>
                <input type="text" class="form-control" name="father" placeholder="Enter Father's Name" value="{{ $employees->father }}" required="" onkeyup="this.value = this.value.toUpperCase();">
                <span class="text-danger">{{ $errors->first('father') }}</span>
              </div>

              <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile" value="{{ $employees->mobile }}">
                <span class="text-danger">{{ $errors->first('mobile') }}</span>
              </div>


              <div class="form-group">
                <label>Position</label>
                <select class="form-control select2" name="position">
                  <option value="">Select position</option>
                  @foreach($positions as $position)
                  <option <?php if($employees->position==$position->id){ echo 'selected'; } ?> value="{{$position->id}}">{{$position->name}}</option>
                  @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('mobile') }}</span>
              </div>


            <div class="form-group">
                <label>Photo</label>
                <input type="file" class="form-control" name="image">
                <img style="width: 140px;" src="{{asset('public/'.$employees->photo)}}">
                <span class="text-danger">{{ $errors->first('image') }}</span>
              </div>


              <div class="form-group">
                <label>Home Address</label>
                <textarea onkeyup="this.value = this.value.toUpperCase();" class="form-control" rows="5" name="HomeAddress" placeholder="Enter Home Address">{{$employees->address}}</textarea>
                <span class="text-danger">{{ $errors->first('HomeAddress') }}</span>
              </div>


              <div class="form-group">
                <a href="{{ url('/employees/view') }}" class="pull-right btn bg-navy btn-flat margin"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back</a>
                  <button type="submit" class="pull-right btn bg-navy btn-flat margin"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Update</button>
              </div>
              </form>
            </div>
          </div>

        </div>
      </div>

      <!-- /.row -->

    </section>

    @endsection
