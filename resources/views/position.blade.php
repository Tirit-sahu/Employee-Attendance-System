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
            <img src="{{ asset('images/add_new2.png') }}">
            <div class="box-body container">
              <form method="POST" action="{{ url('/position/store') }}">
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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Enter position name" autofocus>

                                <span class="text-danger">{{ $errors->first('name') }}</span>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-4">
                                <button type="submit" class="button_role pull-right btn bg-navy btn-flat margin"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{ __('Submit') }}</button>
                            </div>
                        </div>
                    </form>
            </div>
          </div>
         
        </div>
      </div>

       
      <div class="box">
        <img src="{{ asset('images/view_data2.png') }}">
            <!-- <div class="box-header">              
              <h3 class="box-title">View Users</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="table-responsive box-body">
                <table id="example1" class="table table-hover">
                
                <thead>
                <tr>
                  <th>SNO</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  @foreach($positions as $row)
                  
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $row->name }}</td>
                
                  <td>
                    <a class="anchor_role btn-flat margin" href="{{ url('/position/edit/'.$row->id) }}"><i class="fa fa-pencil" style="color:#efaf51;" aria-hidden="true"></i> Edit
                    </a>
                    <a class="anchor_role btn-flat margin" href="{{ url('/position/delete/'.$row->id) }}" onclick="return confirm('Are you sure ?')"> <i class="fa fa-minus-circle" style="color:#c05954;" aria-hidden="true"></i> Delete</a>
                  </td>
                </tr>
                  @endforeach                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.row -->

    </section>

    @endsection
