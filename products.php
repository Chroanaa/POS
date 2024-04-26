<?php 
include ('connection.php'); 
function getProducts(){
    $conn = $GLOBALS['conn'];
try{
    $stmt = $conn->prepare("SELECT * FROM products");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 return $rows;
}catch(PDOException $e){
    echo "Couldn't fetch the data: " . $e->getMessage();
}
}
getProducts();
?>