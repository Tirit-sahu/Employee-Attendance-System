@extends('layouts.myapp')

@section('content')

<?php
use \App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
$loginid = Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
$status = UsersController::getVal('users','status','id',$loginid);
if ($status==1) {
  UsersController::logout('users','status','id',$loginid);
}
?>

<style>
    .small-box h3 {
    font-size: 28px;}

    .widget-user-2 .widget-user-username, .widget-user-2 .widget-user-desc {
    margin-left: 0;
    }
</style>

     <section class="content">

    

      <!-- Small boxes (Stat box) -->
      <div class="row">
        
        <!-- ./col -->
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6" data-toggle="tooltip" title="">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">

              <h3>{{ UsersController::count_record('employees') }}</h3>

              <p>Employees</p>
            </div>
            <div class="icon">
              <i class="fa fa-briefcase" aria-hidden="true"></i>
            </div>
            <a data-toggle="tooltip" title="" href="{{ url('/employees/view') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6" data-toggle="tooltip" title="">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ UsersController::count_record('users') }}</h3>

              <p>Users</p>
            </div>
            <div class="icon">
            <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <a data-toggle="tooltip" title="" href="{{ url('/users/create') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->


     


    </section>

@endsection
