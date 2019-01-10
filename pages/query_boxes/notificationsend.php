<!DOCTYPE html>
<html>
 <head>
  <title>Manpower Notification </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br /><br />
  <div class="container">
   <nav class="navbar navbar-inverse">
    <div class="container-fluid">
     <div class="navbar-header">
      <a class="navbar-brand" href="#">Notification Management</a>
     </div>
     <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
       <ul class="dropdown-menu"></ul>
      </li>
     </ul>
    </div>
   </nav>
   <br />
   <h2 align="center">Manpower Notifications</h2>
   <br />
   <form method="post" id="comment_form">
    <div class="form-group">
     <label>Enter Notification ID</label>
     <input value=12 type="text" name="notificationID" id="notificationID" class="form-control">
    </div>
       <div class="form-group">
     <label>Enter User Type</label>
     <input type="text" name="userType" value=3 id="userType" class="form-control">
    </div>
    <div class="form-group">
     <label>Enter Notification</label>
     <input value="leaved" name="notification" id="notification" class="form-control" rows="5">
    </div>
    <div class="form-group">
     <input type="submit" name="post" id="post" class="btn btn-info" value="Post" />
    </div>
   </form>
      
      <script>document.getElementById('comment_form').submit()</script>
   
  </div>
 </body>
</html>
