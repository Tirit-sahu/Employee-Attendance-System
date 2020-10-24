<?php
use \App\Http\Controllers\EmployeesController;
use Illuminate\Http\Request;
?>
@extends('layouts.myapp')

@section('content')



<section class="content-header">
<div id="divLoading">
</div>
      <h1>
        <i class="fa fa-briefcase" aria-hidden="true"></i> Employees
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/parents') }}">Employees</a></li>
      </ol>
    </section>

    <section class="content">

      <div class="box box-default">
        <img src="{{ asset('images/view_data2.png') }}">
 <button type="button" onclick="holiday()" class="pull-right btn bg-navy btn-flat margin"> <i class="fa fa-power-off" aria-hidden="true"></i> Holoday </button>
       
        <div class="box-body">

          <!-- /.row -->
                 

      <form method="post">
                {{csrf_field()}}
      <div class="box">
        <!-- /.box-header -->
        @if (Session::has('success'))
                  <div class="alert alert-success text-center">
                  <strong>Successfully! </strong> {{ Session::get('success') }}
                  </div>
                @endif

            <div class="table-responsive box-body">
              <table id="example1" class="table table-hover" style="text-transform: capitalize;">
                <thead>
                <tr>
                  <th>SNO</th>
                  <th>Emp Id</th>
                  <th>Employee Name</th>
                  <th>Father's Name</th>
                  <th>Photo</th>
                  <th>Mobile</th>
                  <th>Position</th>
                  <th>Home Address</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  @foreach($employees as $row)

                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ 'emp'.$row->id }}</td>

                  <td>{{ $row->fullName }}</td>
                  <td>{{ $row->father }}</td>
                  <td>
                    <img height="40" src="{{ asset('public/'.$row->photo) }}">
                  </td>
                  <td>
                    {{ $row->mobile }}
                  </td>
                  <td>
                    <?php
                    echo EmployeesController::getVal('positions','name','id',$row->position);
                    ?>
                    </td>
                  <td>{{ $row->address }}</td>
                  <td>

                    <a onclick="absent(<?php echo $row->id; ?>)" class="btn-flat margin" href="#">
                    <i class="fa fa-buysellads" aria-hidden="true"></i> Absent
                    </a>

                    <a onclick="present(<?php echo $row->id; ?>)" class="btn-flat margin" href="#">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i> Present
                    </a>

                  

                    <a class="btn-flat margin" href="{{ url('/employees/edit/'.$row->id) }}">
                    <i class="fa fa-pencil" style="color:#efaf51;" aria-hidden="true"></i> Edit
                    </a>
                    <a class="btn-flat margin" href="{{ url('/employees/delete/'.$row->id) }}" onclick="return confirm('Are You Sure ?')"><i class="fa fa-minus-circle" style="color:#c05954;" aria-hidden="true"></i> Delete</a>

                  </td>
                </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
            <!-- /.box-body -->
          </div>
    </div>
        <!-- /.box-body -->
      </div>
      <!-- /.row -->

      <!-- Send Bulk SMS -->
      
      </form>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script type="text/javascript">
    
    function absent(emp_id)
    {
      $.ajax({
           type:"GET",
           url:"{{url('apply_absent')}}?emp_id="+emp_id,
           success:function(res){
            var obj = $.parseJSON(res);
                if (obj['error']) {
                  swal(obj['message'],'','error');
                }
                if (obj['success']) {
                  swal(obj['message'],'','success');
                }
           }

        });
    }

    function present(emp_id)
    {
      $.ajax({
           type:"GET",
           url:"{{url('apply_present')}}?emp_id="+emp_id,
           success:function(res){
            console.log(res);
            var obj = $.parseJSON(res);
                if (obj['error']) {
                  swal(obj['message'],'','error');
                }
                if (obj['success']) {
                  swal(obj['message'],'','success');
                }
           }

        });
    }

    function holiday()
    {
      $.ajax({
           type:"GET",
           url:"{{url('apply_holiday')}}",
           success:function(res){
            var obj = $.parseJSON(res);
                if (obj['error']) {
                  swal(obj['message'],'','error');
                }
                if (obj['success']) {
                  swal(obj['message'],'','success');
                }
           }

        });
    }
    
    </script>

    </section>

    @endsection
