<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/admin/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    
    <div class="wrapper">

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
          </li>

        </ul>

   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="badge badge-warning navbar-badge" id="count"></span>
                <i class="fa fa-bell-o"></i>

            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="notifications">
              
            </div>
        </li>
    <!-- /.dropdown-alerts -->
            

        
        
      <!-- User Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user-o"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/admin/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">Mr. 
                  <?=$_SESSION['userName']?>
                    <br>
                    <small>Owner A&S Manpower Solutions</small>
                 
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
            
            <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              
              <div class="media-body">
                <h3 class="dropdown-item-title">                  
                    <small>Profile</small>
                 
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
            
            <a href="./query_boxes/logout.php" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              
              <div class="media-body">
                <h3 class="dropdown-item-title">                  
                    <small>Log Out</small>
                 
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
            
		  </div>
      </li>
      	
	 
     
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../dist/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">A&S Manpower</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Mr. Suminda</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="./index.php" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
           
          </li>
          
          <li class="nav-item has-treeview">
            <a href="others/charts/chartjs.php" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Reports
              </p>
            </a>
            
          </li>
         
         
          <li class="nav-item has-treeview">
            <a href="others/tables/data.php" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Workers Tables
              </p>
            </a>
          </li>
            
            <li class="nav-item has-treeview">
            <a href="others/tables/dataLoc.php" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Locations Tables
              </p>
            </a>
          </li>
            <li class="nav-item has-treeview">
            <a href="others/tables/dataJobP.php" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Company Tables
              </p>
            </a>
          </li>
            
            <li class="nav-item has-treeview">
            <a href="others/tables/dataJobS.php" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Published Jobs
              </p>
            </a>
          </li>
            
            <li class="nav-item has-treeview">
            <a href="others/tables/dataLeaves.php" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Worker Leaves
              </p>
            </a>
          </li>
         
		  <li class="nav-item has-treeview">
            <a href="others/tables/dataInvoice.php" class="nav-link">
              <i class="nav-icon fa fa-envelope-o"></i>
              <p>
                Invoices
              </p>
            </a>
          </li>
           
		  
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Calendar
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-envelope-o"></i>
              <p>
                Mailbox
              </p>
            </a>
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6" onclick="show_div('orders');hide_div('activeW');hide_div('ongoings');change_col_2('orders')">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
<!--                    Display count of jobs published by companies-->
                    <?php
                        require_once '../db_config/config.php';
                        require_once './query_boxes/supplier_view_new_company_jobs_count.php';
                    ?>  
                  
                </h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                    <?php
                        require_once '../db_config/config.php';
                        require_once './query_boxes/supplier_view_pending_jobs_count.php';
                    ?>    
                </h3>

                <p>Pendings</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6" onclick="hide_div('orders');hide_div('ongoings');show_div('activeW')">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                    <!-- Display count of workers engaged in jobs by companies-->
                    <?php
                        require_once '../db_config/config.php';
                        require_once './query_boxes/supplier_view_workers_count.php';
                    ?>   
                </h3>

                <p>Active Workers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6" onclick="change_col('orders');show_div('ongoings')">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                    <!-- Display count of ongoing jobs-->
                    
                <?php
                    require_once '../db_config/config.php';
                    require_once './query_boxes/supplier_view_ongoing_job_count.php';
                ?>  
                  
                </h3>

                <p>Ongoings</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
          
          
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section id="orders" class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <!-- /.card -->
              <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Job Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Title</th>
                        <th>Amount</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Acceptance</th>
                    </tr>
                    </thead>
                    <tbody>
                        <!-- Display all jobs published by companies-->
                        <?php
                            require_once('../db_config/config.php');
                            require_once('./query_boxes/company_job_accept.php');
                        ?>
                        
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </section>
            
          <section id="ongoings" class="col-lg-5 connectedSortable" style="display:none">

			<div class="row">
            <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Current Ongoings</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                    
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <p class="text-center">
                      <strong>Goal Completion</strong>
                    </p>
                      <!-- Display ongoing jobs of supplier-->
                      <?php
                            require_once('../db_config/config.php');
                            require_once('./query_boxes/supplier_ongoing_jobs_view.php');
                        ?>
                </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            </div>
                
                
            <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Pendings</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                    
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <p class="text-center">
                      <strong>Goal Completion</strong>
                    </p>
                      <!-- Display pending jobs which are accpeted by workers-->
                      <?php
                            require_once('../db_config/config.php');
                            require_once('./query_boxes/supplier_pending_jobs.php');
                        ?>
                </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            </div>
              </div>
            </section>
                
            <section id="activeW" class="col-lg-12 connectedSortable" style='display:none'>
                <div class="row">   
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h5 class="card-title">Active Workers</h5>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                          </button>
                            <button type="button" class="btn btn-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                          </button>
                        </div>
                        </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="table-responsive">
                                  <table class="table m-0">
                                    <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Name</th>
                                      
                                      <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                            require_once('../db_config/config.php');
                                            require_once('./query_boxes/supplier_view_active_workers.php');
                                        ?>
                                      </tbody>
                                    </table>
                                    
                                </div>
                              </div>
                        </div>
                      </div>
                    </div>
                </div>
                </div>
                         
            </section>
            
          </div>
        </div>
      </section>
    </div>
        
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2018-2019 <a href="http://adminlte.io">UCSC CS-7</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0-alpha
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script src="../js/supplier.js"></script>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- App -->
<script src="../dist/admin/dist/js/adminlte.js"></script>
<!-- dashboard demo (This is only for demo purposes) -->
<script src="../dist/admin/dist/js/pages/dashboard.js"></script>
<!-- for demo purposes -->
<script src="../dist/admin/dist/js/demo.js"></script>
    
<!--Show hide HTML elements    -->
<script src="../js/show_div.js"></script>

<!--Show notifications-->
<script>

        $(document).ready(function(){

            function load_unseen_notification(view = '')
            {
                $.ajax({
                    url:"./query_boxes/fetchSupplier.php",
                    method:"POST",
                    data:{view:view},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#notifications').html(data.notification);
                        if(data.unseen_notification > 0)
                        {
                            $('#count').html(data.unseen_notification);
                        }
                    }
                });
            }

            load_unseen_notification();

            $('#comment_form').on('submit', function(event){
                event.preventDefault();
                if($('#notificationID').val() != '' && $('#notification').val() != '' && $('#userType').val() != '')
                {
                    var form_data = $(this).serialize();
                    $.ajax({
                        url:"./query_boxes/insertnoti.php",
                        method:"POST",
                        data:form_data,
                        success:function(data)
                        {
                            $('#comment_form')[0].reset();
                            load_unseen_notification();
                        }
                    });
                    //  alert("Data insert successfully");
                }
                else
                {
                    alert("Both Fields are Required");
                }
            });

            $(document).on('click', '.dropdown-toggle', function(){
                $('#count').html('');
                load_unseen_notification('yes');
            });

            setInterval(function(){
                load_unseen_notification();;
            }, 5000);

        });



    </script>
</body>
</html>
