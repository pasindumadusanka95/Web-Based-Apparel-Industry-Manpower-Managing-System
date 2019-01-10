<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
     <script src="../js/show_div.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><strong><?=$_SESSION['userName']?><Small> Pvt. Ltd Company</Small></strong></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown job progress-->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                  <ul class="dropdown-menu dropdown-tasks">
                       
                             <?php
                                require_once '../db_config/config.php';
                                require_once './query_boxes/company_ongoing_job_progress.php';
                            ?>
                        
                        
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="badge badge-warning navbar-badge" id="count" ></span><i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts" id=notifications>
                        
                        
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       <li><a data-target="#update_company_profile_modal" data-toggle="modal"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="./query_boxes/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            
            <!-- .sidebar-collapse -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li class="bg-primary">
                            <a style="color:white" href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="./company_tables.php"><i class="fa fa-table fa-fw"></i> Published Jobs Tables</a>
                        </li>
                        <li>
                            <a href="./company_invoices.php"><i class="fa fa-table fa-fw"></i> Invoices</a>
                        </li>
                        
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    <?php
                                        require_once '../db_config/config.php';
                                        require_once './query_boxes/company_ongoing_jobs_count.php';
                                    ?>  </div>
                                    <div>Ongoings!</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3" >
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                            require_once '../db_config/config.php';
                                            require_once './query_boxes/company_newly_published_jobs_count.php';
                                        ?>
                                    </div>
                                    <div>Newly Published!</div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                            require_once '../db_config/config.php';
                                            require_once './query_boxes/company_cancel_jobs_count.php';
                                        ?></div>
                                    <div>Canceled!</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                            require_once '../db_config/config.php';
                                            require_once './query_boxes/company_rejected_jobs_count.php';
                                        ?></div>
                                    <div>Rejected!</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
             <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <button data-target="#publish_company_job_modal" data-toggle="modal" class="btn btn-primary" style="margin:5px 0 10px 0">+Publish Jobs</button> 
                 
                 </div>
                 
                 <!--Publish company Job modal-->
        <div>
           <div class="modal fade" id="publish_company_job_modal" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal"><font style="font-family:arial">&times;</font></button>
                        <h3 class="modal-title">+Publish Job <small>on <?=date('Y-n-j') ?></small></h3>
                    </div>
                    <div class="modal-body">
                        <form action="./query_boxes/company_publish_jobs.php" autocomplete="on" method="post">
                            Enter Job Title
                            <div class="form-group">
                                <input type="text" class="form-control" id="jobTitle" placeholder="Enter Job Title" name="jobTitle" required>
                            </div>
                            Enter Job Type
                            <div class="form-group">
                                <input type="text" class="form-control" id="jobType" placeholder="Enter Job type" name="jobType" required>
                            </div>
                            Enter Job Amount
                             <div class="form-group">
                                <input type="number" class="form-control" id="jobAmount" placeholder="Enter Job Amount" name="jobAmount" required>
                            </div>
                            Enter Job Period
                             <div class="form-group">
                                <input type="number" class="form-control" id="jobPeriod" placeholder="Enter Job Period" name="jobPeriod" required>
                            </div>
                            Enter Job Price
                            <div class="form-group">
                                <input type="number" class="form-control" id="jobPrice" placeholder="Enter Job Price" name="jobPrice" required>
                            </div>
                            <div class="form-group hidden">
                                <input type="date" class="form-control" id="jobDate" value="<?=date('Y-n-j') ?>" name="jobDate" required>
                            </div>                        
                           
                            <div class="form-row text-right">
                                <div class="col-12">
                                <button type="submit" name="addComJob" id="save" class="btn btn-primary">+Publish</button>
                               </div>
                            </div>
                      </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end Publish company Job modal-->
             
                   
        <!--Update company Profile model-->
        <div>
           <div class="modal fade" id="update_company_profile_modal" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-success">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Profile <small>on <?=date('Y-n-j') ?></small></h3>
                    </div>
                    <div class="modal-body">
                        <form action="./query_boxes/company_update_profile.php" autocomplete="on" method="post">
                            Company Id
                            <div class="form-group">
                                <input type="text" class="form-control" id="CompanyId"  name="CompanyId" value='<?=$_SESSION['userID']?>' readonly >
                            </div>
                            Company Name
                            <div class="form-group">
                                <input type="text" class="form-control" id="CompanyName"  name="CompanyName" value='<?=$_SESSION['userName']?>' required>
                            </div>
                            Company Contact No 
                             <div class="form-group">
                                <input type="text" pattern="[07]{2}[0-9]{1}[0-9]{7}" class="form-control" id="ContactNo" name="ContactNo" value='<?=$_SESSION['userMobile']?>' required>
                            </div>
                            Company Address
                             <div class="form-group">
                                <input type="text" class="form-control" id="CompanyAdd" name="CompanyAdd" value='<?=$_SESSION['userAddress']?>' required>
                            </div>
                            Company Email Address
                            <div class="form-group">
                                <input type="email" class="form-control" id="CompanyEmail" name="CompanyEmail" value='<?=$_SESSION['userEmail']?>' required>
                            </div>
                                                    
                           
                            <div class="form-row text-right">
                                <div class="col-12">
                                <button type="submit" name="updateProfile" id="save" class="btn btn-success">Update</button>
                               </div>
                            </div>
                      </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end Update company Profile modal-->
                 
                 
            <div id="published" class="row">
                <div class="col-lg-12">
                   
                    <!-- /.panel -->
                    <div class="panel panel-default">
                       <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Published Jobs
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a onclick="hide_div('rejected');hide_div('canceled');hide_div('ongoings');show_div('published')">Published</a>
                                        </li><li class="divider"></li>
                                        <li><a onclick="hide_div('published');hide_div('canceled');hide_div('ongoings');show_div('rejected')">Rejected</a>
                                        </li><li class="divider"></li>
                                        <li><a onclick="hide_div('published');hide_div('rejected');hide_div('ongoings');show_div('canceled')">Canceled</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a onclick="hide_div('published');hide_div('rejected');hide_div('canceled');show_div('ongoings')">Ongoings</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                    <th>Duration</th>
                                                    <th>Cost</th>
                                                    <th>Published</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php
                                                        require_once('../db_config/config.php');
                                                        require_once('./query_boxes/company_jobs_published.php');
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                              
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                </div>
                 </div>
                
                <div id="ongoings" class="row" style="display:none">
                <div class="col-lg-12">
                   
                    <!-- /.panel -->
                    <div class="panel panel-default">
                       <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Ongoings Jobs
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a onclick="hide_div('rejected');hide_div('canceled');hide_div('ongoings');show_div('published')">Published</a>
                                        </li><li class="divider"></li>
                                        <li><a onclick="hide_div('published');hide_div('canceled');hide_div('ongoings');show_div('rejected')">Rejected</a>
                                        </li><li class="divider"></li>
                                        <li><a onclick="hide_div('published');hide_div('rejected');hide_div('ongoings');show_div('canceled')">Canceled</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a onclick="hide_div('published');hide_div('rejected');hide_div('canceled');show_div('ongoings')">Ongoings</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body" >
                            <div class="row">
                               <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Job ID</th>
                                                    <th>Job Title</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                    <th>Duration</th>
                                                    <th>Price</th>
                                                    <th>Published</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    require_once '../db_config/config.php';
                                                    require_once './query_boxes/company_ongoing_job.php';
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    </div>
                 </div>
                    
                    
                    <div id="rejected" class="row" style="display:none">
                <div class="col-lg-12">
                   
                    <!-- /.panel -->
                    <div class="panel panel-default">
                       <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Rejected Jobs
                           <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a onclick="hide_div('rejected');hide_div('canceled');hide_div('ongoings');show_div('published')">Published</a>
                                        </li><li class="divider"></li>
                                        <li><a onclick="hide_div('published');hide_div('canceled');hide_div('ongoings');show_div('rejected')">Rejected</a>
                                        </li><li class="divider"></li>
                                        <li><a onclick="hide_div('published');hide_div('rejected');hide_div('ongoings');show_div('canceled')">Canceled</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a onclick="hide_div('published');hide_div('rejected');hide_div('canceled');show_div('ongoings')">Ongoings</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div  class="panel-body" >
                            <div class="row">
                               <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Job ID</th>
                                                    <th>Job Title</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                    <th>Duration</th>
                                                    <th>Price</th>
                                                    <th>Published</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    require_once '../db_config/config.php';
                                                    require_once './query_boxes/company_jobs_rejected.php';
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>

                              
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    </div>
                 </div>
                        
                <div id="canceled" class="row" style="display:none">
                    <div class="col-lg-12">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                       <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Canceled Jobs
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a onclick="hide_div('rejected');hide_div('canceled');hide_div('ongoings');show_div('published')">Published</a>
                                        </li><li class="divider"></li>
                                        <li><a onclick="hide_div('published');hide_div('canceled');hide_div('ongoings');show_div('rejected')">Rejected</a>
                                        </li><li class="divider"></li>
                                        <li><a onclick="hide_div('published');hide_div('rejected');hide_div('ongoings');show_div('canceled')">Canceled</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a onclick="hide_div('published');hide_div('rejected');hide_div('canceled');show_div('ongoings')">Ongoings</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div  class="panel-body" >
                            <div class="row">
                               <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                    <th>Duration</th>
                                                    <th>Cost</th>
                                                    <th>Published</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    require_once '../db_config/config.php';
                                                    require_once './query_boxes/company_jobs_canceled.php';
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>

                              
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                            </div>
             
                </div>
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

<script>

                $(document).ready(function(){

                    function load_unseen_notification(view = '')
                    {
                        $.ajax({
                            url:"./query_boxes/fetchCompany.php",
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
