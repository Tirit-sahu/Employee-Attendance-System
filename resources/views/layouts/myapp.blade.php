<?php

use \App\Http\Controllers\UsersController;

use Illuminate\Http\Request;


$loginid = Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
$profile = UsersController::getVal('users','photo','id',$loginid);

if ($profile=='') {

  $profile = 'images/customer-login-icon-8.jpg';

}

$user_role = UsersController::getRole();



?>

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>iembhskutela</title>

  <link rel="icon" href="../images/ticon.png" type="image/icon type">

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <!-- Bootstrap 3.3.7 -->

  <link rel="stylesheet" href="{{ asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/bower_components/font-awesome/css/font-awesome.min.css') }}">

  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('public/bower_components/Ionicons/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset('public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('public/plugins/iCheck/all.css') }}">

  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('public/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">

  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{ asset('public/plugins/timepicker/bootstrap-timepicker.min.css') }}">
<!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/dist/css/AdminLTE.min.css') }}">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('public/dist/css/skins/_all-skins.min.css') }}">

  <link rel="stylesheet" href="{{ asset('public/bower_components/select2/dist/css/select2.min.css') }}">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<link href="https://fonts.googleapis.com/css?family=Play&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

  <link rel="stylesheet" href="{{ asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}} ">

  <!-- <script src="https://kit.fontawesome.com/a5b0e198e5.js" crossorigin="anonymous"></script> -->

  <!-- chart -->
  <link href="https://canvasjs.com/assets/css/jquery-ui.1.11.2.min.css" rel="stylesheet" />




  <style type="text/css">

    {

    display : none;

    }

    #divLoading.show

    {

    display : block;

    position : fixed;

    z-index: 100;

    background-image : url('https://www.lingzhivegetarian.com/wp-content/themes/lingzhi/images/loading.gif');

    background-color:#666;

    opacity : 0.4;

    background-repeat : no-repeat;

    /*background-size:100% 100%;*/

    background-position : center;

    left : 0;

    bottom : 0;

    right : 0;

    top : 0;

    }

    #loadinggif.show

    {

    left : 50%;

    top : 50%;

    position : absolute;

    z-index : 101;

    width : 32px;

    height : 32px;

    margin-left : -16px;

    margin-top : -16px;

    }

    div.content {

    width : 1000px;

    height : 1000px;

    }
.checkbox{
  display: inline-block;
    vertical-align: middle;
    margin: 0!important;
    padding: 0;
    width: 18px;
    height: 18px;
    background: url(green.png) no-repeat;
    border: none;
    cursor: pointer;
    line-height: normal;
}


</style>

</head>

<body class="sidebar-mini skin-black">

<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->

    <a href="#" class="logo">

      <!-- mini logo for sidebar mini 50x50 pixels -->

      <span class="logo-mini"><b>A</b>LT</span>

      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg"><b>iembhs </b>kutela</span>

    </a>

    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">

      <!-- Sidebar toggle button-->

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

        <span class="sr-only">Toggle navigation</span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

      </a>

      @guest

      @else

      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <img src="{{ asset('public/'.$profile) }}" class="user-image" alt="User Image">

              <span class="hidden-xs">{{ Auth::user()->name }}</span>

            </a>

            <ul class="dropdown-menu">

              <!-- User image -->

              <li class="user-header">

                <img src="{{ asset('public/'.$profile) }}" class="img-circle" alt="User Image">



                <p>

                  {{ Auth::user()->name }}

                  <!-- <small>Member since Nov. 2012</small> -->

                </p>

              </li>



              <li class="user-footer">

                

                <div class="pull-right">

                  <!-- <a href="#" class="btn btn-default btn-flat">Sign out</a> -->



                  <a class="btn btn-default btn-flat" href="{{ route('logout') }}"

                                       onclick="event.preventDefault();

                                                     document.getElementById('logout-form').submit();">

                                        {{ __('Logout') }}

                                    </a>



                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                                        @csrf

                                    </form>



                </div>

              </li>

            </ul>

          </li>

          <!-- Control Sidebar Toggle Button -->

          <li>

            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>

          </li>

        </ul>

      </div>

      @endguest

    </nav>

  </header>

  <!-- Left side column. contains the logo and sidebar -->

  @guest

  @else

  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">

      <!-- Sidebar user panel -->

      <div class="user-panel">

        <div class="pull-left image">

          <img src="{{ asset('public/'.$profile) }}" class="img-circle" alt="User Image">

        </div>

        <div class="pull-left info">

          <p>{{ Auth::user()->name }}</p>
         
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->

        </div>

      </div>



      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">MAIN NAVIGATION</li>

        <li>

          <a href="{{ url('/home') }}">

            <i class="fa fa-dashboard"></i> <span>Dashboard</span>

          </a>

        </li>



        <li class="treeview">

          <a href="#">

            <i class="fa fa-briefcase" aria-hidden="true"></i> <span>Employees</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

          <ul class="treeview-menu">

            <li><a href="{{ url('/employees/add') }}"><i class="fa fa-circle-o"></i>Add New Employee</a></li>

            <li><a href="{{ url('/employees/view') }}"><i class="fa fa-circle-o"></i>Employee List</a></li>

            <li><a href="{{ url('/attendance/view') }}"><i class="fa fa-circle-o"></i>Attendance List</a></li>

            

            <li><a href="{{ url('/employees/position') }}"><i class="fa fa-circle-o"></i>Position</a></li>

          </ul>

        </li>


      </ul>

    </section>

    <!-- /.sidebar -->

  </aside>

  @endguest

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">



    <!-- Main content -->

    @yield('content')



  </div>

  <!-- /.content-wrapper -->

  <footer class="main-footer">

    <div class="pull-right hidden-xs">

      <b>Version</b> 2.4.0

    </div>

    <strong>2019-20 &copy; . Powered by <a target="_blank" href="http://sahucoder.com">sahucoder</a>.</strong> Phone Support 24x7 +91 6260690097 | Remote Support :<a href="https://anydesk.com/en/downloads/windows?os=win" target="_blank">Download AnyDesk</a>

  </footer>



  <!-- Control Sidebar -->

  <aside class="control-sidebar control-sidebar-dark">

    <!-- Create the tabs -->

    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

      <li><a href="#control-sidebar-home-tab" data-toggle="tab"></a></li>

    </ul>

    <!-- Tab panes -->

    <div class="tab-content">

      <!-- Home tab content -->

      <div class="tab-pane" id="control-sidebar-home-tab">



      </div>

      <!-- /.tab-pane -->

      <!-- Stats tab content -->

      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>

      <!-- /.tab-pane -->

      <!-- Settings tab content -->

      <div class="tab-pane" id="control-sidebar-settings-tab">

        <form method="post">

          <h3 class="control-sidebar-heading">General Settings</h3>



          <div class="form-group">

            <label class="control-sidebar-subheading">

              Report panel usage

              <input type="checkbox" class="pull-right" checked>

            </label>



            <p>

              Some information about this general settings option

            </p>

          </div>

          <!-- /.form-group -->



          <div class="form-group">

            <label class="control-sidebar-subheading">

              Allow mail redirect

              <input type="checkbox" class="pull-right" checked>

            </label>



            <p>

              Other sets of options are available

            </p>

          </div>

          <!-- /.form-group -->



          <div class="form-group">

            <label class="control-sidebar-subheading">

              Expose author name in posts

              <input type="checkbox" class="pull-right" checked>

            </label>



            <p>

              Allow the user to show his name in blog posts

            </p>

          </div>

          <!-- /.form-group -->



          <h3 class="control-sidebar-heading">Chat Settings</h3>



          <div class="form-group">

            <label class="control-sidebar-subheading">

              Show me as online

              <input type="checkbox" class="pull-right" checked>

            </label>

          </div>

          <!-- /.form-group -->



          <div class="form-group">

            <label class="control-sidebar-subheading">

              Turn off notifications

              <input type="checkbox" class="pull-right">

            </label>

          </div>

          <!-- /.form-group -->



          <div class="form-group">

            <label class="control-sidebar-subheading">

              Delete chat history

              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>

            </label>

          </div>

          <!-- /.form-group -->

        </form>

      </div>

      <!-- /.tab-pane -->

    </div>

  </aside>

  <!-- /.control-sidebar -->

  <!-- Add the sidebar's background. This div must be placed

       immediately after the control sidebar -->

  <div class="control-sidebar-bg"></div>

</div>

<!-- ./wrapper -->



<!-- jQuery 3 -->

<script src="{{ asset('public/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<script src="{{ asset('public/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- FastClick -->

<script src="{{ asset('public/bower_components/fastclick/lib/fastclick.js') }}"></script>

<!-- AdminLTE App -->

<script src="{{ asset('public/dist/js/adminlte.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->

<script src="{{ asset('public/dist/js/demo.js') }}"></script>

<script src="{{ asset('public/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<script src="{{ asset('public/plugins/input-mask/jquery.inputmask.js') }}"></script>

<script src="{{ asset('public/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>

<script src="{{ asset('public/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

<!-- date-range-picker -->

<script src="{{ asset('public/bower_components/moment/min/moment.min.js') }}"></script>

<script src="{{ asset('public/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<!-- bootstrap datepicker -->

<script src="{{ asset('public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

<!-- bootstrap color picker -->

<script src="{{ asset('public/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>

<!-- bootstrap time picker -->

<script src="{{ asset('public/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>

<!-- SlimScroll -->

<script src="{{ asset('public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- iCheck 1.0.1 -->

      <script src="{{ asset('public/plugins/iCheck/icheck.min.js') }}"></script>

      <script src="{{ asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

      <script src="{{ asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

      <!-- charts -->

      <script src="https://canvasjs.com/assets/script/jquery-ui.1.11.2.min.js"></script>
      <script src="{{ asset('public/bower_components/canvasjs/1.7.0/jquery.canvasjs.min.js') }}"></script>
      <script src="{{ asset('public/bower_components/canvasjs/1.7.0/canvasjs.min.js') }}"></script>

      <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

      <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>

      <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>

      <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

      <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>





<script type="text/javascript">

  $(document).ready(function() {
    var table = $('#studentsTbl').DataTable( {
    // $('#studentsTbl').DataTable({
    dom: 'Bfrtip',
    buttons: [
            {
              extend: 'excelHtml5',
              footer: true,
              exportOptions: {
                    columns: ':visible'
                }
            },

            {
             extend: 'pdf',
             footer: true,
              exportOptions: {
                    columns: ':visible'
                }
            },
            {
              extend: 'colvis'
            }
        ]
    } );


    $('#example1').DataTable({

    dom: 'Bfrtip',

    buttons: [

            {
              extend: 'excelHtml5',
              footer: true,
              exportOptions: {
                    columns: ':visible'
                }
            },

            {
             extend: 'pdf',
             footer: true,
              exportOptions: {
                    columns: ':visible'
                }
            },
            {
              extend: 'colvis'
            }

        ]
    } );



  $('#example2').DataTable({

  dom: 'Bfrtip',

  buttons: [
            {
              extend: 'excelHtml5',
              footer: true,
              exportOptions: {
                    columns: ':visible'
                }
            },

            {
             extend: 'pdf',
             footer: true,
              exportOptions: {
                    columns: ':visible'
                }
            },
            {
              extend: 'colvis'
            }

        ],

    "paging": false

  } );

} );

</script>



<script>

  $(function () {

    //Initialize Select2 Elements

    $('.select2').select2()



    //Datemask dd/mm/yyyy

    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

    //Datemask2 mm/dd/yyyy

    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })

    //Money Euro

    $('[data-mask]').inputmask()



    //Date range picker

    $('#reservation').daterangepicker()

    //Date range picker with time picker

    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})

    //Date range as a button

    $('#daterange-btn').daterangepicker(

      {

        ranges   : {

          'Today'       : [moment(), moment()],

          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],

          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],

          'Last 30 Days': [moment().subtract(29, 'days'), moment()],

          'This Month'  : [moment().startOf('month'), moment().endOf('month')],

          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]

        },

        startDate: moment().subtract(29, 'days'),

        endDate  : moment()

      },

      function (start, end) {

        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))

      }

    )



    //Date picker

    $('#datepicker').datepicker({

      autoclose: true

    })



    //iCheck for checkbox and radio inputs

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({

      checkboxClass: 'icheckbox_minimal-blue',

      radioClass   : 'iradio_minimal-blue'

    })

    //Red color scheme for iCheck

    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({

      checkboxClass: 'icheckbox_minimal-red',

      radioClass   : 'iradio_minimal-red'

    })

    //Flat red color scheme for iCheck

    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({

      checkboxClass: 'icheckbox_flat-green',

      radioClass   : 'iradio_flat-green'

    })



    //Colorpicker

    $('.my-colorpicker1').colorpicker()

    //color picker with addon

    $('.my-colorpicker2').colorpicker()



    //Timepicker

    $('.timepicker').timepicker({

      showInputs: false

    })

  })

</script>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>

<script type="text/javascript">
  $(document).ready(function() {
    <?php if($user_role==0){ ?>
     $('.button_role').prop('disabled', true);
     $('.anchor_role').attr("disabled","disabled");
     $('.anchor_role').click(function() { return false; });
   <?php } ?>
 });
</script>






</body>

</html>

