<?php

//fetchrate.php

$connect = new PDO('mysql:host=localhost;dbname=manpower', 'root', '');

if(isset($_POST['index'], $_POST['job_id']))
{
    $ID=$_POST['job_id'];
    $rate=$_POST['index'];
 $query = "
 INSERT INTO ratings(job_id, rating) 
 VALUES (:job_id, :rating)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':job_id'  => $_POST['job_id'],
   ':rating'   => $_POST['index']
  )
 );
 $result = $statement->fetchAll();

    $queryupdate= "UPDATE supplier_job SET jobRatings=(SELECT ROUND(AVG(rating)) FROM ratings WHERE job_id='$ID') WHERE jobType='$ID' ";
    $statementupdate= $connect->prepare($queryupdate);
    $statementupdate->execute();

 if(isset($result))
 {
  echo 'done';
 }
}


?>
