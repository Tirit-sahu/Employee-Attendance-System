@extends('layouts.myapp')

@section('content')  

    <section class="content-header">
      <h1>
        <i class="fa fa-briefcase" aria-hidden="true"></i> Position
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/users') }}">Position</a></li>
      </ol>
    </section>

    <section class="content">
          <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <img src="{{ asset('images/edit_data.png') }}">
            <div class="box-body container">
              <form method="POST" action="{{ url('/position/update', array($position->id)) }}">
                @csrf
                @if (Session::has('success'))
                <div class="alert alert-success text-center">
                <strong>Successfully! </strong> {{ Session::get('success') }}
                </div>
                @endif

                @csrf
                @if (Session::has('error'))
                <div class="alert alert-danger text-center">
                <strong>Warning! &nbsp;</strong> {{ Session::get('error') }}
                </div>
                @endif

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $position->name }}" required placeholder="Enter position name" autofocus>

                                <span class="text-danger">{{ $errors->first('name') }}</span>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-4">
                                <a href="{{ url('/employees/position') }}" class="pull-right btn bg-navy btn-flat margin"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back</a>
                                <button type="submit" class="pull-right btn bg-navy btn-flat margin"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{ __('Update') }}</button>
                            </div>
                        </div>
                    </form>
            </div>
          </div>
         
        </div>
      </div>

      <!-- /.row -->

    </section>

    @endsection
