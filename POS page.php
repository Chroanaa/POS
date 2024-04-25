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
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/css/bootstrap-dialog.min.css">
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
                    <!---- ADD ORDER TO CHECKOUT ---->
                    <div class="col-4 productColContainer" data-pid="31">
                        <div class="productResultContainer">
                         <img src="images/gabe.jpg" width="100%" class = "productImage" alt="">
                        <div class="productInfoContainer">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="productName">
                                       Toblerone
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="productPrice">
                                        1000
                                    </p>
                                </div>
                            </div>
                         </div>
                        </div> 
                        
                    </div>
                       
                    <div class="col-4 productColContainer" data-pid="32">
                        <div class="productResultContainer">
                         <img src="images/gabe.jpg" width="100%" class = "productImage" alt="" >
                        <div class="productInfoContainer">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="productName">
                                       Chocolate
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="productPrice">
                                        2000
                                    </p>
                                </div>
                            </div>
                         </div>
                        </div> 
                        
                    </div>
                       
                    <div class="col-4 productColContainer" data-pid="33" name="Hersheys">
                        <div class="productResultContainer">
                         <img src="images/gabe.jpg" width="100%" class = "productImage" alt="">
                        <div class="productInfoContainer">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="productName">
                                       Hersheys
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="productPrice">
                                        3000
                                    </p>
                                </div>
                            </div>
                         </div>
                        </div> 
                        
                    </div>
                       
                    <div class="col-4 productColContainer" data-pid="34">
                        <div class="productResultContainer">
                         <img src="images/gabe.jpg" width="100%" class = "productImage" alt="">
                        <div class="productInfoContainer">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="productName">
                                       Kisses (Wala ka non Trias)
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="productPrice">
                                        priceless
                                    </p>
                                </div>
                            </div>
                         </div>
                        </div> 
                        
                    </div>
                       
                    <div class="col-4 productColContainer" data-pid="35">
                        <div class="productResultContainer">
                         <img src="images/gabe.jpg" width="100%" class = "productImage" alt="">
                        <div class="productInfoContainer">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="productName">
                                       Choconut
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="productPrice">
                                        1000
                                    </p>
                                </div>
                            </div>
                         </div>
                        </div> 
                        
                    </div>
                       
                    <div class="col-4 productColContainer" data-pid="36">
                        <div class="productResultContainer">
                         <img src="images/gabe.jpg" width="100%" class = "productImage" alt="">
                        <div class="productInfoContainer">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="productName">
                                       Puto
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="productPrice">
                                        1000
                                    </p>
                                </div>
                            </div>
                         </div>
                        </div> 
                        
                    </div>
                       
                    <div class="col-4 productColContainer" data-pid="37">
                        <div class="productResultContainer">
                         <img src="images/gabe.jpg" width="100%" class = "productImage" alt="">
                        <div class="productInfoContainer">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="productName">
                                       Pancit canton
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="productPrice">
                                        1400
                                    </p>
                                </div>
                            </div>
                         </div>
                        </div> 
                        
                    </div>
                       
                    <div class="col-4 productColContainer" data-pid="38">
                        <div class="productResultContainer">
                         <img src="images/gabe.jpg" width="100%" class = "productImage" alt="">
                        <div class="productInfoContainer">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="productName">
                                       Lucky me
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="productPrice">
                                        500
                                    </p>
                                </div>
                            </div>
                         </div>
                        </div> 
                        
                    </div>
                       
                    <div class="col-4 productColContainer" data-pid="39">
                        <div class="productResultContainer">
                         <img src="images/gabe.jpg" width="100%" class = "productImage" alt="">
                        <div class="productInfoContainer">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="productName">
                                        Skyflakes
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="productPrice">
                                        200
                                    </p>
                                </div>
                            </div>
                         </div>
                        </div> 
                        
                    </div>
                    </div>
                    
                </div>
                      <!---- Products column-row ---->

            </div>
            <div class="col-4 posOrderContainer" data-pid="40">
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/js/bootstrap-dialog.min.js"></script>

</html>