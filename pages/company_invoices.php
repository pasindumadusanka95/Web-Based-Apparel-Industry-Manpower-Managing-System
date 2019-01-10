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

    <title>Invoices</title>

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
                    <span class id="count" ></span><i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
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

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <li>
                            <a href="./company.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="./company_tables.php"><i class="fa fa-table fa-fw"></i> Published Jobs Tables</a>
                        </li>
                        <li class="bg-primary">
                            <a style="color:white" href="#"><i class="fa fa-table fa-fw"></i> Invoices</a>
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
                    <h1 class="page-header">Invoices</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary" >
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    <?php
                                        require_once '../db_config/config.php';
                                        require_once './query_boxes/company_all_invoice_count.php';
                                    ?>  </div>
                                    <div>All Invoices</div>
                                </div>
                            </div>
                        </div>
                        <!--div class="panel-footer" onclick="">
                           <small>View All Invoices <span class="fa fa-arrow-right"></span></small>
                        </div-->
                        
                    </div>
                </div>
                
                
            </div>
             <!-- /.row -->
             <div class="row">
                
                
        <!--Update company Profile model-->
        <div>
           <div class="modal fade" id="update_company_profile_modal" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><font style="font-family:arial">&times;</font></button>
                        <h3 class="modal-title">Profile <small>on <?=date('Y-n-j') ?></small></h3>
                    </div>
                    <div class="modal-body">
                        <form action="./query_boxes/company_update_profile.php" autocomplete="on" method="post">
                            Company Id
                            <div class="form-group">
                                <input type="text" class="form-control" id="CompanyId"  name="CompanyId" value='<?=$_SESSION['userID']?>' readonly>
                            </div>
                            Company Name
                            <div class="form-group">
                                <input type="text" class="form-control" id="CompanyName"  name="CompanyName" value='<?=$_SESSION['userName']?>'>
                            </div>
                            Company Contact No 
                             <div class="form-group">
                                <input type="text" class="form-control" id="ContactNo" name="ContactNo" value='<?=$_SESSION['userMobile']?>'>
                            </div>
                            Company Address
                             <div class="form-group">
                                <input type="text" class="form-control" id="CompanyAdd" name="CompanyAdd" value='<?=$_SESSION['userAddress']?>'>
                            </div>
                            Company Email Address
                            <div class="form-group">
                                <input type="text" class="form-control" id="CompanyEmail" name="CompanyEmail" value='<?=$_SESSION['userEmail']?>'>
                            </div>
                                                    
                           
                            <div class="form-row text-right">
                                <div class="col-12">
                                <button type="submit" name="updateProfile" id="save" class="btn btn-primary">Update</button>
                               </div>
                            </div>
                      </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end Update company Profile modal-->
                 
                 
            <div id="Invoice" class="row">
                <div class="col-lg-12">
                   
                    <div class="panel panel-default">
                       <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Invoices
                            
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body" id="all">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Job ID</th>
                                                    <th>Job Title</th>
                                                    
                                                    <th>Payment</th>
                                                    <th>Pay</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php
                                                        require_once('../db_config/config.php');
                                                        require_once('./query_boxes/company_all_invoice.php');
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
                
             
                    
                   
                        
                        

                              
                            
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    
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
