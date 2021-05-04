<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Event</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">

  <script src="../../assets/plugins/moment/moment.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../../assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Events Management System
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/eventmanagementsystem/index.php/eventsmanagement/addevent" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Event</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/eventmanagementsystem" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Event</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Event</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <!-- form start -->
              <!-- <form id="quickForm" action="save" method="post"> -->
              <form id="quickForm">
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Event Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Event Title">
                  </div>
                  <!-- <div class="form-group">
                    <label for="startdate">Start Date</label>
                    <input type="text" name="startdate" class="form-control" id="startdate" placeholder="Start Date">
                  </div>
                  <div class="form-group">
                    <label for="startdate">End Date</label>
                    <input type="text" name="enddate" class="form-control" id="enddate" placeholder="End Date">
                  </div> -->


                    <div class="form-group">
                      <label>Start Date:</label>
                        <div class="input-group date" id="eventstartdate" data-target-input="nearest">
                            <input type="text" name="startdate" id="startdate" class="form-control datetimepicker-input" data-target="#eventstartdate" readonly />
                            <div class="input-group-append" data-target="#eventstartdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>End Date:</label>
                        <div class="input-group date" id="eventenddate" data-target-input="nearest">
                            <input type="text" name="enddate" id="enddate" class="form-control datetimepicker-input" data-target="#eventenddate" readonly/>
                            <div class="input-group-append" data-target="#eventenddate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                      <label>Recurrence:</label>
                      <br>
                        <input id="Radiobutton2" name="RepeatGroup" tabindex="9" type="radio" value="1" />&nbsp;<label for="Radiobutton2"><span style="font-size: 10pt; font-family: Verdana"> Repeat</span></label>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<select id="lstRepeatType" class="textbox-medium"
                        name="lstRepeatType" style="font-size: x-small; width: 100px; font-family: Verdana"
                        tabindex="10">
                        <option selected="selected" value="1">Every</option>
                        <option value="2">Every Other</option>
                        <option value="3">Every Third</option>
                        <option value="4">Every Fourth</option>
                    </select>
                    <select id="lstEvery" class="textbox-medium" name="lstEvery" style="font-size: x-small;
                        width: 66px; font-family: Verdana" tabindex="10">
                        <option selected="selected" value="1">Day</option>
                        <option value="2">Week</option>
                        <option value="3">Month</option>
                        <option value="4">Year</option>
                    </select>

                    <br>
                    <INPUT id="RadioButton3" tabIndex=11 type=radio value="2" name="RepeatGroup" />&nbsp;<label for="RadioButton3"><span style="font-size: 10pt; font-family: Verdana"> Repeat on the</span></label>&nbsp;
                        <select id="lstRepeatOn" class="textbox-middle" name="lstRepeatOn" style="font-size: x-small; width: 68px; font-family: Verdana" tabindex="12">
                            <option selected="selected" value="1">First</option>
                            <option value="2">Second</option>
                            <option value="3">Third</option>
                            <option value="4">Fourth</option>
                        </select>
                        <select id="lstRepeatWeek" class="textbox-middle" name="lstRepeatWeek" style="font-size: x-small; width: 56px; font-family: Verdana" tabindex="13">
                            <option selected="selected" value="0">Sun</option>
                            <option value="1">Mon</option>
                            <option value="2">Tue</option>
                            <option value="3">Wed</option>
                            <option value="4">Thu</option>
                            <option value="5">Fri</option>
                            <option value="6">Sat</option>
                        </select>
                    of the
                    <select id="lstRepeatMonth" class="textbox-middle" language="javascript" name="lstRepeatMonth"
                        style="font-size: x-small; width: 80px;
                        font-family: Verdana" tabindex="14">
                        <option selected="selected" value="1">Month</option>
                        <option value="3">3 Months</option>
                        <option value="4">4 Months</option>
                        <option value="6">6 Months</option>
                        <option value="12">Year</option>
                    </select>
                    </div>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="#">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- jquery-validation -->
<script src="../../assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="../../dist/js/demo.js"></script> -->
<!-- Page specific script -->
<script>
$(function () {

    //Date picker
    $('#eventstartdate').datetimepicker({
        format: 'L'
    });
    $('#eventenddate').datetimepicker({
        format: 'L'
    });

  $.validator.setDefaults({
    submitHandler: function () {
      $.ajax({
        url: 'save',
        type: "post",
        data: $('#quickForm').serialize(),
        success: function(data)
        {
            var result = $.parseJSON(data);
            if(result.status == 'success') {
                $('#quickForm').find('input').val('');
            }
            alert(result.msg);
        }
      });
    }
  });
  $('#quickForm').validate({
    rules: {
      title: {
        required: true,
      },
      startdate: {
        required: true,
        minlength: 5
      },
      enddate: {
        required: true
      },
      RepeatGroup: {
        required: true
      }
    },
    messages: {
      title: {
        required: "Please enter event title"
      },
      startdate: {
        required: "Please select start date"
      },
      enddate: "Please select end date",
      RepeatGroup: {
        required: "Select any one"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>
