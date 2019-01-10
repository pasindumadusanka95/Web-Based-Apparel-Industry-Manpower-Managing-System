<?php

//fetchrate.php

$connect = new PDO('mysql:host=localhost;dbname=manpower', 'root', '');

$query = "
SELECT DISTINCT jobType from supplier_job;
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
    $rating = count_rating($row['jobType'], $connect);
    $color = '';
    $output .= '
 <h5 class="text-primary">'.$row['jobType'].'</h5> 
 <ul class="list-inline" data-rating="'.$rating.'" title="Average Rating - '.$rating.'">
 ';

    for($count=1; $count<=5; $count++)
    {
        if($count <= $rating)
        {
            $color = 'color:#ffcc00;';
        }
        else
        {
            $color = 'color:#ccc;';
        }
        $output .= '<li title="'.$count.'" jobType="'.$row['jobType'].'-'.$count.'" data-index="'.$count.'"  data-job_id="'.$row['jobType'].'" data-rating="'.$rating.'" class="rating list-inline-item" style="cursor:pointer; '.$color.' font-size:16px;">&#9733;</li>';
    }
    $output .= '
 </ul>
 ';
}
echo $output;

function count_rating($job_id, $connect)
{
    $output = 0;
    $query = "SELECT AVG(rating) as rating FROM ratings WHERE job_id = '".$job_id."'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $total_row = $statement->rowCount();
    if($total_row > 0)
    {
        foreach($result as $row)
        {
            $output = round($row["rating"]);
        }
    }
    return $output;
}


?>
