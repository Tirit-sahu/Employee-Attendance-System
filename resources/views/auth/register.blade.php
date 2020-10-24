<?php use \App\Http\Controllers\SchoolmoneyController; 
use Illuminate\Http\Request;
?>
@extends('layouts.myapp')

@section('content')  

<section class="content-header">
      <h1>
        Fees Structure
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/schoolmoney') }}">Fees Structure</a></li>
      </ol>
    </section>

    <section class="content">
          <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
             <div class="box-header with-border">
          <h3 class="box-title">Add New</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    
          </div>
        </div>
            <div class="box-body container">
              <form method="POST" action="{{ url('users/register') }}">
                        @csrf
                @if (Session::has('success'))
                <div class="alert alert-success text-center">
                <strong>Successfully! </strong> {{ Session::get('success') }}
                </div>
                @endif

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                <span class="text-danger">{{ $errors->first('name') }}</span>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required>

                                <span class="text-danger">{{ $errors->first('mobile') }}</span>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                <span class="text-danger">{{ $errors->first('email') }}</span>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" required>

                                <span class="text-danger">{{ $errors->first('password-confirm') }}</span>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
          </div>
         
        </div>
      </div>

       
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">View Classes</h3>
            </div>
            <!-- /.box-header -->
            <div class="table-responsive box-body">
              
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.row -->

    </section>

    @endsection
