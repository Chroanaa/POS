<?php 
include("connection.php");
include("saleController.php");
date_default_timezone_set('Asia/Manila');
if(isset($_GET['action'])){
    if($_GET['action'] == 'getGraphData'){
        echo getChartData($_GET['start'], $_GET['end']);
    }
}
function getChartData($start, $end){
    $date_amt = [];
while($start < $end) {
    $start = date('Y-m-d', strtotime($start . ' +1 day'));
 $sales = getSales($start, $start);
 $date_amt[$start] = array_sum(array_column($sales, 'total_amount'));

}
 return json_encode([
    'categories' => array_keys($date_amt),
    'series' => array_values($date_amt)
 ]);

}

function getRecentOrder($limit = 5){
    $conn = $GLOBALS['pos_conn'];
    $inv_conn = $GLOBALS['conn'];
    $stmt = $conn->prepare("SELECT * from sales where date_Created ORDER BY date_Created DESC LIMIT $limit");
    $stmt->execute();
    $sales = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $sales;
}

function getWidgetData(){
    $conn = $GLOBALS["pos_conn"];

    $qty = 0;
    $orders = 0;
    $sales_amt = 0.00;   
  $stmt = $conn->prepare("SELECT SUM(i.quantity) AS total_quantity, SUM(s.total_amount) AS total_amount, COUNT(s.id) AS total_sales_count
                        FROM salesitems AS i
                        JOIN sales AS s ON i.id = s.id;");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$qty = $result['total_quantity'];
$sales_amt = $result['total_amount'];
$orders = $result['total_sales_count'];

return [
    'sales_amt' => $sales_amt,
    'qty' => $qty,
    'orders' => $orders
];     
}
function getSales($start, $end){
        $conn = $GLOBALS['pos_conn'];
    $stmt = $conn->prepare("SELECT * from sales where date_Created >=  '$start 00:00:00' AND date_Created <= '$end 23:59:59' ");
    $stmt->execute();
    $sales = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // get customer data
     return $sales;
  
}
function getBarData(){
    $conn = $GLOBALS["pos_conn"];
    $products = [];
    $quantity = [];
    $date = [];
    $trends = [];
   
    $trends[] = getTrends();
  
    foreach($trends as $trend){
        foreach($trend as $item){
            $products[] = $item['product_name'];
            $quantity[] = $item['quantity'];
        }
    }
    $data = [
        'products' => $products,
        'quantity' => $quantity,

    ];
    return json_encode($data);
   }
                        


function getTrends(){
    $conn = $GLOBALS["pos_conn"];
    $stmt = $conn->prepare("SELECT p.product_name, SUM(s.quantity) AS quantity
                            FROM salesitems s
                            JOIN inventory.products p ON s.product_id = p.id
                            GROUP BY p.product_name;
");
    $stmt->execute();
    $sales = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $sales;
    }
?>