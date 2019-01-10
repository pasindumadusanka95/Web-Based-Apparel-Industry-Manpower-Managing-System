	<?php
        session_start();

    
    ?>
    <!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="#">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Job Listing</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="../css/css-worker/linearicons.css">
			<link rel="stylesheet" href="../css/css-worker/font-awesome.min.css">
			<link rel="stylesheet" href="../css/css-worker/bootstrap.css">
			<link rel="stylesheet" href="../css/css-worker/magnific-popup.css">
			<link rel="stylesheet" href="../css/css-worker/nice-select.css">					
			<link rel="stylesheet" href="../css/css-worker/animate.min.css">
			<link rel="stylesheet" href="../css/css-worker/owl.carousel.css">
			<link rel="stylesheet" href="../css/css-worker/main.css">
            
            <!-- JS-->
            <script type="text/javascript" src="../js/show_div.js"></script>
            
		</head>
		<body>

        <header id="header" id="home" style="background-color: rgba(0,0,0,0.7);height:60px">
            <div class="container">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                        <a href="index.html"><img style="width:20%" src="" alt="" title="" /></a>
                    </div>
                    <nav id="nav-menu-container">
                        
                        <ul class="nav-menu">
                            <li class="menu-active"><a href="./worker.php"><i class="lnr lnr-home"></i></a></li>
                           
                            <li class="menu-dropdown"><a href="#" data-target="#update_worker_profile_modal" data-toggle="modal"><i class='lnr lnr-user'></i></a>
                                
                            </li>
                              <li><a href="./query_boxes/logout.php">Log Out</a></li>
                        </ul>
                    </nav><!-- #nav-menu-container -->
                </div>
            </div>
        </header><!-- #header -->



        <!-- start banner Area -->
			<section class="banner-area relative" id="home" >
				<div class="overlay overlay-bg" style="background-image:url('../img/banner/banner_image.jpg')"></div>
				<div class="container" style="height:500px" style="background-image:url('../img/banner/banner_image.jpg')">
					<div class="row fullscreen d-flex align-items-center justify-content-center" style="background-color:white">
						<div class="banner-content col-lg-12" style="padding:0;">
								<h1 style="text-align:left;color:white;padding:5px">We have 1500+ Manpower jobs</h1>
							<form action="./worker.php" class="serach-form-area" method="get">
								<div class="row justify-content-center form-wrap" style="background-color: rgba(0,0,0,0.3);border-radius: 2px;border:0">

									<div class="col-lg-4 form-cols">
										<input id="keyword" type="text" class="form-control" name="keyword" placeholder="what are you looking for?">
									</div>
									<div class="col-lg-3 form-cols">
										<div class="default-select" id="select_area">
											<select class="form-control" id="select_area" name="select_area">
												<option value="1">Select area</option>
												<option value="Homagama">Homagama</option>
												<option value="Maharagama">Maharagama</option>
												<option value="Ranala">Ranala</option>
												<option value="Pannipitiya">Pannipitiya</option>
											</select>
										</div>
									</div>
									<div class="col-lg-3 form-cols">
										<div class="default-select" id="select_category">
											<select class="form-control" id="select_category" name="select_category">
												<option value="1">Select Nature</option>
												<option value="Full Time">Full Time</option>
												<option value="Part Time">Part Time</option>
												
											</select>
										</div>										
									</div>
									<div class="col-lg-2 form-cols">
									    <input style="width:100%" type="submit" name="search" id="search" class="btn btn-primary" onclick="hide_div('normal');hide_div('full_jobs');hide_div('recent_jobs');hide_div('part_jobs');show_div('showtable')" value="Search">
                                       <!-- <li class="btn btn-primary" input type="submit"><a onclick="hide_div('normal');hide_div('full_jobs');hide_div('recent_jobs');hide_div('part_jobs');show_div('showtable')">Search</a></li>-->
									</div>								
								</div>
							</form>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			
			<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-8 post-list">
							<ul class="nav nav-pills">
                               
								<li class="btn btn-primary" style="margin-right:2px"><a onclick="hide_div('normal');hide_div('full_jobs');hide_div('part_jobs');show_div('recent_jobs');">Recent</a></li>
								<li class="btn btn-primary" style="margin-right:2px"><a onclick="hide_div('normal');hide_div('part_jobs');hide_div('recent_jobs');show_div('full_jobs');">Full Time</a></li>
								<li class="btn btn-primary"><a onclick="hide_div('normal');hide_div('full_jobs');hide_div('recent_jobs');show_div('part_jobs');">part Time</a></li>
							</ul>
                            
                            <?php
                                    require_once('../db_config/config.php');
                                    require_once('./query_boxes/worker_accepted_job.php');
                            ?>


                            <div id="showtable" style="margin-top:5px">
                                <h2>Search Results of <small><?=$_GET['keyword']?></small></h2>
                                <?php
                                require_once('../db_config/config.php');
                                require_once('./query_boxes/supplier_jobs_view_by_search.php');
                                ?>
                            </div>

								
                                <div id="normal" style="margin-top:5px">
                                    <h2>All Jobs</h2>
                                    <?php
                                        require_once('../db_config/config.php');
                                        require_once('./query_boxes/supplier_jobs_accept.php');
                                    ?>
                                </div>
                                <div id="full_jobs" style="display:none;margin-top:5px">
                                    <h2>Full Time Jobs</h2>
                                    <?php
                                        require_once('../db_config/config.php');
                                       require_once('./query_boxes/supplier_jobs_accept_full.php');
                                    ?>
                                </div>
                                <div id="part_jobs" style="display:none;margin-top:5px">
                                    <h2>Part Time Jobs</h2>
                                    <?php
                                        require_once('../db_config/config.php');
                                       require_once('./query_boxes/supplier_jobs_accept_part.php');
                                    ?>
                                </div>
                                <div id="recent_jobs" style="display:none;margin-top:5px">
                                    <h2>Recent Jobs</h2>
                                    <?php
                                        require_once('../db_config/config.php');
                                        require_once('./query_boxes/supplier_jobs_accept_recent.php');
                                    ?>
                                </div>

						</div>
						<div class="col-lg-4 sidebar">
							<div class="single-slidebar">
								<h4>Jobs by Location</h4>
								<ul>
									<?php
                                        require_once('../db_config/config.php');
                                        require_once('./query_boxes/supplier_jobs_view_by_location.php');
                                    
                                    ?>
								</ul>
							</div>

							<div class="single-slidebar">
								<h4>Top Favourite job posts</h4>
								<div class="active-relatedjob-carusel">					<?php
                                        require_once('../db_config/config.php');
                                        require_once('./query_boxes/supplier_jobs_view_by_rating.php');
                                    
                                    ?>											
								</div>
							</div>							

							<div class="single-slidebar">
								<h4>Jobs by Category</h4>
								<ul>
                                    
                                    <?php
                                        require_once('../db_config/config.php');
                                        require_once('./query_boxes/supplier_jobs_view_by_type.php');
                                    
                                    ?>
                                    
								</ul>
							</div>


						</div>
					</div>
				</div>	
			</section>


        <div>
            <div class="modal fade" id="update_worker_profile_modal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            
                            <h3 class="modal-title"><?=$_SESSION['userName']?> <small> Profile</small></h3>
                            <button type="button" class="close" data-dismiss="modal"><font style="font-family:arial">&times;</font></button>
                        </div>
                        <div class="modal-body">
                            <form action="./query_boxes/worker_update_profile.php" autocomplete="on" method="post">
                                Worker ID
                                <div class="form-group">
                                    <input type="text" class="form-control" id="workerID"  name="workerID" value='<?=$_SESSION['userID']?>' readonly>
                                </div>
                                Name
                                <div class="form-group">
                                    <input type="text" class="form-control" id="workerName"  name="workerName" value='<?=$_SESSION['userName']?>'>
                                </div>
                                Contact No
                                <div class="form-group">
                                    <input type="text" class="form-control" id="workerPhone" name="workerPhone" value='<?=$_SESSION['userMobile']?>'>
                                </div>
                                NIC
                                <div class="form-group">
                                    <input type="text" class="form-control" id="workerNIC" name="workerNIC" value='<?=$_SESSION['userNIC']?>'>
                                </div>
                                Email Address
                                <div class="form-group">
                                    <input type="text" class="form-control" id="workerEmail" name="workerEmail" value='<?=$_SESSION['userEmail']?>'>
                                </div>


                                <div class="form-row">
                                    <div class="col-12">
                                        <button style="width:100%" type="submit" name="updateProfile" id="save" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
			<!-- End post Area -->


			<script src="../js/js-worker/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="../js/js-worker/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="../js/js-worker/easing.min.js"></script>			
			<script src="../js/js-worker/hoverIntent.js"></script>
			<script src="../js/js-worker/superfish.min.js"></script>	
			<script src="../js/js-worker/jquery.ajaxchimp.min.js"></script>
			<script src="../js/js-worker/jquery.magnific-popup.min.js"></script>	
			<script src="../js/js-worker/owl.carousel.min.js"></script>			
			<script src="../js/js-worker/jquery.sticky.js"></script>
			<script src="../js/js-worker/jquery.nice-select.min.js"></script>			
			<script src="../js/js-worker/parallax.min.js"></script>		
			<script src="../js/js-worker/mail-script.js"></script>	
			<script src="../js/js-worker/main.js"></script>	
		</body>
	</html>



