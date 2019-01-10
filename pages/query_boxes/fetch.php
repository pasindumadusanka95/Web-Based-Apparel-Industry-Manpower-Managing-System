<?php
//fetch.php;
session_start();
if(isset($_POST["view"]))
{
    $connection = mysqli_connect("localhost","root","","manpower");
    if($_POST["view"] != ''){
        $update_query = "UPDATE notification SET status=1 WHERE status=0";
        mysqli_query($connection, $update_query);
    }
    $userType=$_SESSION["userType"];
    $userID=$_SESSION['userID'];
    $userName=$_SESSION['userName'];
    
    $query = "SELECT * FROM notification WHERE userType=$userType AND notificationID='$userID' ORDER BY notificationID DESC LIMIT 5";
    $result = mysqli_query($connection, $query);
    $output = '';
 
     if(mysqli_num_rows($result) > 0)
     {
      while($row = mysqli_fetch_array($result))
      {
       $output .= '
       <li>
        <a href="#">
         <small><em>'.$userName.'</em></small>
         <small><em>'.$row["notification"].'</em></small>
        </a>
       </li>
       <li class="divider"></li>
       ';
      }
     }
     else
     {
      $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
     }

     $query_1 = "SELECT * FROM notification WHERE status=0";
     $result_1 = mysqli_query($connection, $query_1);
     $count = mysqli_num_rows($result_1);
     $data = array(
      'notification'   => $output,
      'unseen_notification' => $count
     );
     echo json_encode($data);
    }
?>
