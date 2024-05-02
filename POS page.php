<?php
include ('Model/products.php');
$products = getProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device"  al-scale=1.0">
    <title>POS</title>
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="global.css?v=<?= time()?>" type="text/css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container-fluid">
        <!---- Products column-row ---->
        <div class="row">
            <div class="col-8" >
                <div class="searchInputContainer">
                    <input type="text" class="searchInput" placeholder="Search Product" >
                </div>
                
                <div class="searchResultContainer">
                    <div class="row">
                        <!---- Product Result Container ---->
                        <?php 
           foreach($products as $product){ ?>
                   <div class="col-4 productColContainer" data-pid="<?= $product['id']?>" >
                    <div class="productResultContainer">
                        <img src="<?= $product['img']?>" width="100%"  class = "productImage" alt="">
                        <div class="productInfoContainer">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="productName">
                                        <?= $product['product_name']?>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="productPrice">
                                        $<?= $product['price']?>
                                       <span>Stock:   <?=$product['stock']?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> 
                    
                </div>
                <?php } ?>
            </div>
        </div>
        
        <!----Add to cart Container ---->
    </div>
    <div class="col-4 posOrderContainer" >
        <div class="pos_header" >
            <div class="setting alignRight" style="text-align: right !important;">
                <a href="javascript:void(0);"><i class="fa fa-gear"></i></a>
            </div>
            <p class="logo">IMS</p>
            <p class="timeAndDate"></p>
        </div>
        <div class="pos_items_container">
            <div class="pos_items">
                <p class="noData">NO ITEMS</p>
            </div>
            <div class="item_total_container">
                <p class="item_total">
                    <span class="item_total--label">TOTAL</span>
                    <span class="item_total--value">$0.00</span>
                </p>
            </div>
            <div class = "checkoutBtnContainer">
                <a href="javascript:void(0)" class="checkoutBtn">CHECKOUT</a>
            </div>
        </div>
    </div>
    
</div>
</body>
<script>
    let productsJson = <?= json_encode($products)?>;
    let products = {};
    productsJson.forEach(product => {
        products[product.id] = {
            id: product.id,
            product_name: product.product_name,
            price: product.price,
            img: product.img,
            stock:product.stock
        };
    });
    
    </script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/css/bootstrap-dialog.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/js/bootstrap-dialog.min.js"></script>

</html>