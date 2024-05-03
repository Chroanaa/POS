<?php 
include("../Model/connection.php");
date_default_timezone_set('Asia/Manila');

function getSales($date){
        $conn = $GLOBALS['pos_conn'];
    $inv_conn = $GLOBALS['conn'];
    $stmt = $conn->prepare("SELECT * from sales where date_Created LIKE ?");
    $dateWithWildcards = "%$date%";
    $stmt->execute([$dateWithWildcards]);
    $sales = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // get customer data
     var_dump($sales);
   
}
$date = "2024-05-03";
getSales($date);
?>