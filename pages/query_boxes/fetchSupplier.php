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
    
    $query = "SELECT * FROM notification WHERE userType=$userType ORDER BY id DESC LIMIT 5";
    $result = mysqli_query($connection, $query);
    $output = '';
 
     if(mysqli_num_rows($result) > 0)
     {
      while($row = mysqli_fetch_array($result))
      {
          
          $output .="<a class='dropdown-item'>
                <!-- Message Start -->
                <div class='media'>
                  <img src='../dist/admin/dist/img/user1-128x128.jpg' alt='User Avatar' class='img-size-50 mr-3 img-circle'>
                  <div class='media-body'>
                    <h3 class='dropdown-item-title'>
                      ".$row['notificationID']."
                      <span class='float-right text-sm text-danger'><i class='fa fa-star'></i></span>
                    </h3>
                    <p class='text-sm'>".$row['notification']."</p>
                    <p class='text-sm text-muted'><i class='fa fa-clock-o mr-1'></i> On ".$row['time']."</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
          <div class='dropdown-divider'></div>";
          
         
      }
     }
     else
     {
      $output .= '<li><a class="text-bold text-italic">No Notification Found</a></li>';
     }

     $query_1 = "SELECT * FROM notification WHERE status=0 AND userType=$userType ORDER BY id";
     $result_1 = mysqli_query($connection, $query_1);
     $count = mysqli_num_rows($result_1);
     $data = array(
      'notification'   => $output,
      'unseen_notification' => $count
     );
     echo json_encode($data);
    }
?>
