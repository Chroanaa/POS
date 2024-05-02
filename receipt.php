<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="global.css?v=<?= time()?>" type="text/css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="receiptContainer">
        <div>
            <h1 style="font-size: 16px; color:#828282; text-align:right; border-bottom:1px solid #cccccc; padding-bottom:10px;">
                ORIGINAL RECEIPT
            </h1>
            <div>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <h3 style="font-size: 16px;">CUSTOMER DETAILS: </h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="font-weight: bold;margin-left:9px;font-size:13px">Name:</span> <span>James</span> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="font-weight: bold;margin-left:9px;font-size:13px">Address:</span> <span>Fairview</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="font-weight: bold;margin-left:9px;font-size:13px">Contact:</span> <span>212312312</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 20px;">

                            </td>
                        </tr>
                        <tr>
                          <td width = "50%">
                            <table>
                                <tbody>
                                    <tr>
                                    <td><h3 style="font-size: 23px; color:#ff5c85">IMS NI GABE</h3></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-weight: bold;margin-left:9px;font-size:13px">Address: </span> <span>Philippines</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-weight: bold;margin-left:9px;font-size:13px">City: </span> <span>Manila</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-weight: bold;margin-left:9px;font-size:13px">Postal: </span> <span>1126</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tbody>
                                    <tr>
                                        <td><h3 style="font-size: 15px";>DETAILS: </h3></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-weight: bold;margin-left:9px;font-size:13px">Receipt #: </span> <span>22233</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-weight: bold;margin-left:9px;font-size:13px">Receipt date: </span><span>May 2,2024 11:00:00</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        </tr>
                        <tr>
                            <td height = "25px"></td>
                        </tr>
                        
                    </tbody>
                </table>
                <div>
                <h3 style="font-size:15px;">ITEMS:</h3>

                </div>
                <table>
                    <tbody>
                       
                            <table style = "width:100%">
                                <tbody>
                                    <tr>
                                        <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 10%; font-weight:bold; text-align:center;">#</td>
                                        <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 10%; font-weight:bold; text-align:center;">Product name</td>
                                        <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 30%; font-weight:bold; text-align:center;">Ordered Quantity</td>
                                        <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 30%; font-weight:bold; text-align:center;">Price</td>
                                        <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 30%; font-weight:bold; text-align:center;">Amount</td>

                                    </tr>
                                    <tr>
                                        <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 15%; text-align:center; font-size:15px">1</td>
                                        <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 15%; text-align:center; font-size:15px">Coffee</td>
                                        <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 15%; text-align:center; font-size:15px">4</td>
                                        <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 15%; text-align:center; font-size:15px">$15</td>
                                        <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 15%; text-align:center; font-size:15px">$60</td>
                                    </tr>
                                    <tr>
                                        <td height ="25px"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style = "border: 1px solid #cccccc;  width: 10%; font-weight:bold; text-align:center">TOTAL: </td>
                                        <td style = "border: 1px solid #cccccc;  width: 10%; font-weight:bold; text-align:center">$60</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style = "border: 1px solid #cccccc;  width: 10%; font-weight:bold; text-align:center">TENDERED: </td>
                                        <td style = "border: 1px solid #cccccc;  width: 10%; font-weight:bold; text-align:center">$60</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style = "border: 1px solid #cccccc;  width: 10%; font-weight:bold; text-align:center">CHANGE: </td>
                                        <td style = "border: 1px solid #cccccc;  width: 10%; font-weight:bold; text-align:center">$0.00</td>
                                    </tr>

                                </tbody>
                            </table> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>