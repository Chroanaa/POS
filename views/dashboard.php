<?php
include("../Model/dashboardController.php");
$widgetData = getWidgetData();
$recentOrders = getRecentOrder();
// default dates
$end = date("Y-m-d");
$start = date("Y-m-d",strtotime($end . "-7 days"));
$graphData = getChartData($start, $end);
$barData = getBarData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700,300">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.1.2/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Epilogue:wght@400&family=Finger+Paint&display=swap">
    <link rel="stylesheet" href="../chatbox.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../global.css ?=time()?>" type="text/css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <a href="POS page.php" style = "font-size:20px; text-decoration:underline">Go to POS</a>
    <div class="container-fluid">
        <div class="row mainContainer">
            <div class="col-4">
                <div class="widgetContainer widgetSale">
                    <p class="widgetValue">$<?=$widgetData['sales_amt']?></p>
                    <p class="widgetHeader">SALE AMOUNT</p>
                </div>
            </div>
            <div class="col-4">
            <div class="widgetContainer widgetQuantity">
                    <p class="widgetValue"><?=$widgetData['qty']?></p>
                    <p class="widgetHeader">Quantity Ordered</p>
                </div>
            </div>
            <div class="col-4">
            <div class="widgetContainer widgetTotalOrder">
                    <p class="widgetValue"><?=$widgetData['orders']?></p>
                    <p class="widgetHeader">Total Orders</p>
                </div>
            </div>
        </div>
        <div class="row mainContainer">
            <div class="col-md-5 widgetSecond">
                <p class="header">LAST 5 ORDERS</p>
                <?php 
                 if (count($recentOrders)) { ?>
                 <table class="table">  
                   <thead>
                       <tr>
                        <th>Order #</th>
                        <th>Total Amount</th>
                        <th>Date</th>
                       </tr>
                   </thead>
                   <tbody>
                   </tbody>
                   <?php
                    foreach($recentOrders as $order) {
                        ?>
                        <tr>
                            <td ><?=$order['id']?></td>
                            <td ><?=number_format($order['total_amount'],2)?></td>
                            <td><?=date('F d/y h:i:s A', strtotime($order['date_Created']))?></td>
                        </tr>
                        <?php } } else { ?>
                            <p class="noData">No recent Orders</p>
                            <?php } ?>
                        </table>
                            
            </div>
            <div class="col-md-7 chartContainer">
              
                <p class="chartTitle">Daily sales</p>
                <div class="alignRight">
                    <button class="btn btn-sm btn-default" id="daterange">Pick Date Range</button>

                </div>
                <figure class="highcharts-figure">
                    <div id="container"></div>
                
<div id="chatModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
<i class = "bi bi-robot"></i>
    
<span class="close" style = "font-size: 50px; ">&times; </span>
</div>
    <div id="chatbox">
      <!-- Chat messages will be appended here -->
    </div>
    <form id="chatForm">
      <input id="userInput" type="text" placeholder="Type your message...">
      <button type="submit" class = "send"><i class="bi bi-send-fill"></i></button>
      <button type="button" class="clear"><i class="bi bi-trash-fill"></i></button>
    </form>
  </div>
</div>
<button onclick="showModal()" class = "openChatButton" draggable="true"><i class = "bi bi-robot"></i><i class="bi bi-caret-right-fill" ></i></button>
                   
                </figure>
            </div>
        <div  style="display: flex; justify-content: center; align-items: center; width: 2000px;  margin-right:100px;">
            <figure class="highcharts-figure" style="text-align:right; width: 100%; ">
                <div id="barChart" style="width: 100%;"></div>
            </figure>
        </div>
        </div>
    </div>
</body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/series-label.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    const apiKey = "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";
    const modal = document.querySelector(".modal");
    const close = document.querySelector(".close");
    const send = document.querySelector(".send");
    const form = document.querySelector("#chatForm");
    const chatbox = document.querySelector("#chatbox");
    const input = document.querySelector("#userInput");
    const clear = document.querySelector(".clear");
    const openChatButton = document.querySelector(".openChatButton");
    const currentDate = () => {
         let date = new Date();
  let time = date.toLocaleTimeString();
  let monthYearDay = date.toLocaleDateString("default", {
    month: "long",
    year: "numeric",
    day: "numeric",
  });
  let FullDate = ` ${time}`;
  return FullDate;
    }
    let chartData  = null
    let graphData = <?=$graphData?>;
    let barData = <?=$barData?>;
    const splineChart = (graphData) => {
    const charts = Highcharts.chart('container', {
        chart: {
            type: 'spline'
        },
        title: {
            text: 'SALES REPORT'
        },
        xAxis: {
            categories: graphData.categories,
            accessibility: {
                description: 'Date'
            }
        },
        yAxis: {
            title: {
                text: 'Sales (in USD)'
            },
            
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:.1f} PHP</b>'
        },
        plotOptions: {
            spline: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: true
            }
        },
        series: [{
            name: 'Sales',
            data: graphData.series
        }]
    });
    chartData = charts.series[0].data.map((point, index) => {
            return {
                month: charts.xAxis[0].categories[index],
                value: point.y
            };
        });
};

const toDateRange = () => {
    $('#daterange').daterangepicker({
       maxDate: moment(),
    }, function(start, end, label) {
       let startF = start.format('YYYY-MM-DD');
       let endF = end.format('YYYY-MM-DD');
       $('#daterange').html(`${moment(start).format('LL')} to ${moment(end).format('LL')}`);
       $.get(`../Model/dashboardController.php?action=getGraphData&start=${startF}&end=${endF}`, function(data){
             splineChart(data);
             
       }, 'json');
    });
}

    const barChart = (Data) => {
    const charts = Highcharts.chart('barChart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'MOST BOUGHT PRODUCT'
        },
        xAxis: {
            categories: Data.products,
            accessibility: {
                description: 'Product'
            }
        },
        yAxis: {
            title: {
                text: 'Quantity Sold'
            },
            
        },
        tooltip: {
            pointFormat: '{series.name} of {point.category}: <b>{point.y}</b>'
        },
        plotOptions: {
            spline: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: true
            }
        },
        series: [{
            name: 'Sales',
            data: Data.quantity.map(Number)

        }]
    
    });
    bar = charts.series[0].data.map((point, index) => {
            return {
                month: charts.xAxis[0].categories[index],
                value: point.y
            };
        });
};

const chatbot = async (input) => {
    const response = await fetch("https://openrouter.ai/api/v1/chat/completions", {
        method: "POST",
        headers: {
            "Authorization": `Bearer ${apiKey}`,
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            "model": "google/gemma-7b-it:free",
            "messages": [
                {"role": "user", "content": input}
            ],
        })
    });

    const data = await response.json();
    return data.choices[0].message.content;
}

const showModal = () =>{
   modal.style.display = "flex";
   input.focus();
   chatbox.innerHTML += `
    <div class="message botMessage">
        <div class="bot">Hello! How can I help you today?</div>
        <p class="botTag">:Bot <span class="timestamp">${currentDate()}</span></p>
    </div>`;
   setTimeout(() => {
    openChatButton.style.display = 'none';
   }, 1000);
}
close.onclick = () => {
    const modal = document.querySelector('.modal-content');
  modalContent.style.animation = '1s cubic-bezier(0.25, 0.1, 0.25, 1) 0s 1 slideOutToRight forwards';
  openChatButton.style.display = 'block';
  if(modalContent.style.animation = '1s cubic-bezier(0.25, 0.1, 0.25, 1) 0s 1 slideOutToRight forwards') {
    setTimeout(() => {
      modal.style.display = 'none';
      modalConalContent.style.animation = '';
      openChatButton.style.display = 'block';
      chatbox.innerHTML = '';
    }, 1000);
  }
}

form.onsubmit = async (e) => {
    e.preventDefault();
    const timestamp = new Date().toLocaleTimeString();
    chatbox.innerHTML += `
    <div class="message userMessage">
      <div class="user">${input.value}</div>
      <p class="userTag">User: <span class="timestamp">${timestamp}</span></p>
    </div>`;

    chatbox.innerHTML += `
    <div class="message botMessage">
        <div class="bot typing">typing....</div>
        <p class="botTag">:Bot <span class="timestamp">${new Date().toLocaleTimeString()}</span></p>
    </div>`;
    const response = await chatbot(input.value);
    const formattedResponse = response.replace(/\n/g, '<br>');
    const typingElement = document.querySelector('.typing');
    typingElement.innerHTML = formattedResponse;
    typingElement.classList.remove('typing');
    
    input.value = "";
}
clear.onclick = () => {
    chatbox.innerHTML = "";
}

splineChart(graphData);
toDateRange();
barChart(barData);
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/css/bootstrap-dialog.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/js/bootstrap-dialog.min.js"></script>

</html>