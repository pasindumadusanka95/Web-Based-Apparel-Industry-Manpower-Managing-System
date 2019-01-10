<?php
session_start();
if(isset($_GET['id'])){
    require_once('../db_config/config.php');
    $userID=$_SESSION['userID'];
    $invID=$_GET['id'];
    $queryJob="SELECT * FROM invoice,supplier_job WHERE invoice.invoiceID='$invID' AND supplier_job.jobID=invoice.jobID LIMIT 1";
    $resultJob=mysqli_query($conn,$queryJob);

    if(mysqli_num_rows($resultJob)>0){
        $rowJob=mysqli_fetch_assoc($resultJob);
        require_once __DIR__ . '/vendor/autoload.php';

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML("<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
        <html xmlns='http://www.w3.org/1999/xhtml'>

        <head>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

            <title>Invoice ID: ".$rowJob['invoiceID']."</title>

            <link rel='stylesheet' type='text/css' href='css/style.css' />
            <link rel='stylesheet' type='text/css' href='css/print.css' media='print' />
            <script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
            <script type='text/javascript' src='js/example.js'></script>

        </head>

        <body>

            <div id='page-wrap' style='border:1px solid black;padding:10px'>
                <div style='text-align:center'>INVOICE</div>


                <div id='identity'>

                    <textarea id='address'>A & S Manpower Solutions
No.23-B Magalla
Thangalla

Phone: (+94) 766897230</textarea>



                </div>

                <div style='clear:both'></div>

                <div id='customer'>
                    <br>

                    <table id='meta'>
                        <tr>
                            <td class='meta-head'>Customer ID</td>
                            <td><div class='due'>".$rowJob['userID']."</div></td>
                        </tr>
                        <tr>
                            <td class='meta-head'>Invoice #</td>
                            <td><textarea>".$rowJob['invoiceID']."</textarea></td>
                        </tr>
                        <tr>

                            <td class='meta-head'>Date</td>
                            <td><textarea id='date'>".$rowJob['jobEnd']."</textarea></td>
                        </tr>
                        <tr>
                            <td class='meta-head'>Amount Due</td>
                            <td><div class='due'>Rs. ".$rowJob['price']."</div></td>
                        </tr>

                    </table>

                </div>

                <table id='items'>

                  <tr>
                      <th>Item ID</th>
                      <th>Item</th>
                      <th>Quantity</th>
                      <th>Unit Price</th>
                      <th>Price</th>
                  </tr>

                  <tr class='item-row'>
                      <td class='description'><textarea>".$rowJob['jobID']."</textarea></td>
                      <td class='description'><textarea>".$rowJob['jobTitle']."</textarea></td>
                      <td><textarea class='qty'>".$rowJob['jobCount']."</textarea></td>
                      <td><textarea class='qty'>None</textarea></td>
                      <td><textarea class='qty'>Rs. ".$rowJob['price']."</textarea></td>
                  </tr>

                  <tr>
                      <td colspan='2' class='blank'> </td>
                      <td colspan='2' class='total-line'>Subtotal</td>
                      <td class='total-value'><div id='subtotal'>Rs. ".$rowJob['price']."</div></td>
                  </tr>
                  <tr>

                      <td colspan='2' class='blank'> </td>
                      <td colspan='2' class='total-line'>Total</td>
                      <td class='total-value'><div id='total'>Rs. ".$rowJob['price']."</div></td>
                  </tr>
                  <tr>
                      <td colspan='2' class='blank'> </td>
                      <td colspan='2' class='total-line'>Amount Paid</td>

                      <td class='total-value'><textarea id='paid'>Rs. ".$rowJob['price']."</textarea></td>
                  </tr>
                  <tr>
                      <td colspan='2' class='blank'> </td>
                      <td colspan='2' class='total-line balance'>Balance Due</td>
                      <td class='total-value balance'><div class='due'>0</div></td>
                  </tr>

                </table>

                <div id='terms'>
                  <h5>Terms</h5>
                  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
                </div>

            </div>

        </body>

        </html>");
        $mpdf->Output();
   
    }
}
   


?>