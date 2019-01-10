<?php
    /*Company Function*/
    
    /*View all locations*/

    $queryJob="SELECT * FROM locations";
    $resultJob=mysqli_query($conn,$queryJob);

    if(mysqli_num_rows($resultJob)>0){
        while($rowJob=mysqli_fetch_assoc($resultJob)){
            $date=date("y-m-d");
            echo "<tr>
                    <td>".$rowJob['locID']."</td>
                    <td>".$rowJob['locName']."</td>
                    <td>".$rowJob['locStreet']."</td>
                    <td>".$rowJob['locVillage']."</td>
                    <td>".$rowJob['locCity']."</td>
                    
                </tr>";