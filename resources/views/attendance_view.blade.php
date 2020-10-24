<?php
use \App\Http\Controllers\ApplyAttendanceController;
use Illuminate\Http\Request;
$apply_attendances='';
if (isset($apply_attendances_filter)) {
  $apply_attendances = $apply_attendances_filter;
}else{
  $apply_attendances = ApplyAttendanceController::fetch_record_static('apply_attendances', 'id', 'DESC');
}
$employees = ApplyAttendanceController::fetch_record_static('employees', 'id', 'DESC');
?>
@extends('layouts.myapp')

@section('content')

<?php
$frome_date='';
$to_date='';
$employee=0;
if (isset($_GET['frome_date'])) {
  $frome_date=$_GET['frome_date'];
}
if (isset($_GET['to_date'])) {
  $to_date=$_GET['to_date'];
}

if (isset($_GET['employee'])) {
  $employee=$_GET['employee'];
}

$columDate='';
if (isset($columDateFilter)) {
 $columDate=$columDateFilter;

}else{
   $columDate = ApplyAttendanceController::myStaticQuery("SELECT * FROM `apply_attendances` WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE()) GROUP BY date");
}

?>


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

       

        <!-- /.box-header -->
        <div class="box-body">
        <form id="search-form" action="{{ url('/attendance/filter') }}" method="get">
        @csrf
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Classes</label>
                <select class="form-control select2" id="employee" name="employee" style="width: 100%;">
                  <option value="" selected="selected">Select All</option>
                  @foreach($employees as $employee)
                  <option value="{{ $employee->id }}">{{ $employee->fullName }}</option>
                  @endforeach
                </select>
                <script type="text/javascript">
                  document.getElementById('employee').value = <?php echo old('employee'); ?>;
                </script>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Frome Date</label>

                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa fa-calendar"></i>

                  </div>

                  <input type="text" class="form-control" id="frome_date" name="frome_date" value="{{ $frome_date }}" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask placeholder="Frome Date" tabindex="7">

                </div>
                <span class="text-danger">{{ $errors->first('DOB') }}</span>
               
              </div>
            </div>
            <!-- /.col -->

            <div class="col-md-4">
              <div class="form-group">
                <label>To Date</label>
               
                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa fa-calendar"></i>

                  </div>

                  <input type="text" class="form-control" id="to_date" name="to_date" value="{{ $to_date }}" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask placeholder="To Date" tabindex="7">

                </div>
               
                <span class="text-danger">{{ $errors->first('DOB') }}</span>
              </div>
            </div>

           


            <div class="col-md-12">
              <button type="submit" name="filter" class="btn bg-navy btn-flat margin"> <i class="fa fa-filter" aria-hidden="true"></i> Apply Filter</button>

              <a href="{{ url('/attendance/view') }}" class="btn bg-navy btn-flat margin"> Show All</a>
             
            </div>
            <!-- /.col -->
          </div>
          </form>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->

      </div>

       
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
              <table id="example" class="table table-hover" style="text-transform: capitalize;">
                <thead>
                <tr>
                  <th>SNO</th>
                  <th>Emp Id</th>
                  <th>Employee Name</th>
                  <?php
                  $n=0;
                  // $date = date('Y-m-d');
                  // $day=date("d", strtotime($date));
                  // $month=date("m", strtotime($date));
                  // $year=date("Y", strtotime($date));
                  
                  foreach ($columDate as $culumn) {
                    ?>
                    <th><?php echo $culumn->date; ?></th>
                    <?php
                  }
                  ?>
                  
                </tr>
                </thead>
                <tbody>
                  @foreach($employees as $row)
                  <tr>
                    <td><?php echo ++$n; ?></td>
                    <td>{{ "emp".$row->id }}</td>
                     <td>{{ $row->fullName }}</td>

                     <?php

                     $attendance_cmonth = ApplyAttendanceController::myStaticQuery("SELECT * FROM `apply_attendances` WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())");

                     for ($k=0; $k < sizeof($columDate); $k++) { 
                     
                       for ($i=0; $i < sizeof($attendance_cmonth); $i++) { 
                        
                          if ($row->id == $attendance_cmonth[$i]->employee_id && $columDate[$k]->date == $attendance_cmonth[$i]->date ) {
                            echo '<td>'.$attendance_cmonth[$i]->attendance.'</td>';
                          }

                        }
                       
                     }

                     ?>

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

   

    </section>

    @endsection
