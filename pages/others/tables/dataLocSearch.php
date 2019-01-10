<?php
    session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../../plugins/datatables/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/admin/dist/css/adminlte.min.css">
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
            <a href="../../supplier.php" class="nav-link">Home</a>
          </li>

        </ul>

   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        
      <!-- User Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user-o"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../../dist/admin/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
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
            
            <a href="#" class="dropdown-item">
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
    <a href="index3.html" class="brand-link">
      <img src="../../../dist/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">A&S Manpower</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../../dist/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
            <a href="../../supplier.php" class="nav-link ">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
           
          </li>
          
          <li class="nav-item has-treeview">
            <a href="../charts/chartjs.php" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Reports
              </p>
            </a>
            
          </li>
         
         
          <li class="nav-item has-treeview">
            <a href="data.php" class="nav-link ">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Workers Tables
              </p>
            </a>
          </li>
            
            <li class="nav-item has-treeview">
            <a href="dataLoc.php" class="nav-link active">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Locations Tables
              </p>
            </a>
          </li>
            <li class="nav-item has-treeview">
            <a href="dataJobP.php" class="nav-link ">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Company Tables
              </p>
            </a>
          </li>
            
            <li class="nav-item has-treeview">
            <a href="dataJobS.php" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Published Jobs
              </p>
            </a>
          </li>
            
            <li class="nav-item has-treeview">
            <a href="dataLeaves.php" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Worker Leaves
              </p>
            </a>
          </li>
         
		  <li class="nav-item has-treeview">
            <a href="dataInvoice.php" class="nav-link ">
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./dataLoc.php">Home</a></li>
              <li class="breadcrumb-item active">Data Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      
      <div style="margin-top:10px" class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                    <?php
                        require_once '../../../db_config/config.php';
                        require_once '../../query_boxes/supplier_view_all_location_count.php';
                    ?>  
                  
                </h3>

                <p>All Locations</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
      
      <section class="content">
        <div class="row">
        <div class="col-12">  
            <div class="card">
            <div class="card-header">
              <h3 class="card-title">Location Data Table</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                    
                </div>
                <div class='pull-left'>
                    <button data-target="#addLoc" data-toggle="modal" style="margin-top:10px" class="btn btn-primary">+Add Location</button>
                </div>
                <div class="pull-right">
                <form class="form-inline" method="get" action="./dataLocSearch.php">
                  <div class="form-group">
                    
                    <input style="margin:5px" placeholder="search" type="text" class="form-control" name="search" required>
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <h3>Search results of <?=$_GET['search']?></h3>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Street</th>
                  <th>Village</th>
                  <th>City</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    
                    <?php
                            require_once('../../../db_config/config.php');
                            require_once('../../query_boxes/supplier_view_location_by_search.php');
                    ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Street</th>
                  <th>Village</th>
                  <th>City</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
        </div>
      </section>
      
  </div>
  <!-- /.content-wrapper -->
    
    
     <!--Add Location modal-->
        <div>
           <div class="modal fade" id="addLoc" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-primary">
                        
                        <h3 class="modal-title">+Add Location</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="../../query_boxes/supplier_add_location.php" autocomplete="on" method="post">
                            Enter Location ID
                            <div class="form-group">
                                <input type="text" class="form-control" id="jobTitle" placeholder="Enter Location ID" name="locID">
                            </div>
                            Enter Location Name
                            <div class="form-group">
                                <input type="text" class="form-control" id="jobType" placeholder="Enter Location Namee" name="locName">
                            </div>
                            Enter Location Street
                             <div class="form-group">
                                <input type="text" class="form-control" id="jobAmount" placeholder="Enter Location Street" name="locStreet">
                            </div>
                            Enter Location Village
                             <div class="form-group">
                                <input type="text" class="form-control" id="jobPeriod" placeholder="Enter Location Village" name="locVillage">
                            </div>
                            Enter Location City
                            <div class="form-group">
                                <input type="text" class="form-control" id="jobPrice" placeholder="Enter Location City" name="locCity">
                            </div>
                                                 
                           
                            <div class="form-row text-right">
                                <div class="col-12">
                                <button type="submit" name="addLoc" id="save" class="btn btn-primary">+Add</button>
                               </div>
                            </div>
                      </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end Add Loc modal-->
    
    
    
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0-alpha
    </div>
    <strong>Copyright &copy; 2018-2019 <a href="http://adminlte.io">UCSC CS-7</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../../plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- SlimScroll -->
<script src="../../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/admin/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
