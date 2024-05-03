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
    <link rel="stylesheet" href="../global.css ?=time()?>" type="text/css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row mainContainer">
            <div class="col-4">
                <div class="widgetContainer widgetSale">
                    <p class="widgetValue">$65.00</p>
                    <p class="widgetHeader">SALE AMOUNT</p>
                </div>
            </div>
            <div class="col-4">
            <div class="widgetContainer widgetQuantity">
                    <p class="widgetValue">100</p>
                    <p class="widgetHeader">Quantity Ordered</p>
                </div>
            </div>
            <div class="col-4">
            <div class="widgetContainer widgetTotalOrder">
                    <p class="widgetValue">300</p>
                    <p class="widgetHeader">Total Orders</p>
                </div>
            </div>
        </div>
        <div class="row mainContainer">
            <div class="col-md-5 widgetSecond">
                <p class="header">LAST 5 ORDERS</p>
                <table class="table"> 
                    <thead>
                      <tr>
                        <th>ORDER #</th>
                        <th>TOTAL AMOUNT</th>
                        <th>DATE</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>$32</td>
                            <td>May 5, 2024</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>$32</td>
                            <td>May 5, 2024</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>$32</td>
                            <td>May 5, 2024</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-7 chartContainer">
              
                <p class="chartTitle">Daily sales</p>
                <div class="alignRight">
                    <button class="btn btn-sm btn-default" id="daterange">Pick Date Range</button>

                </div>
                <figure class="highcharts-figure">
                    <div id="container"></div>
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

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    const apiKey = "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";
    let chartData  = null
const visualize = () => {
    document.addEventListener('DOMContentLoaded', function () {
        const charts = Highcharts.chart('container', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'SALES REPORT'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Sales (in USD)'
                }
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y:.1f} USD</b>'
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
                name: 'Example Series',
                data: [1, 3, 2, 4, 5, 6, 7, 8, 1, 2, 3, 4]
            }]
        });
        chartData = charts.series[0].data.map((point, index) => {
                return {
                    month: charts.xAxis[0].categories[index],
                    value: point.y
                };
            });
    });
};
const toDateRange = () => {
    $('#daterange').daterangepicker();
}
// const chatbot = () => {
//     fetch("https://openrouter.ai/api/v1/chat/completions", {
//         method: "POST",
//         headers: {
//             "Authorization": `Bearer ${apiKey}`,
//             "Content-Type": "application/json"
//         },
//         body: JSON.stringify({
//             "model": "openchat/openchat-7b:free",
//             "messages": [
//                 {"role": "user", "content": ` ${JSON.stringify(chartData)} Based on the chart, which month had the highest number? `}
//             ],
//         })
//     })
//     .then(response => response.json())
//     .then(data => {console.log(data.choices[0].message.content)});
// };

visualize();
  toDateRange();
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/css/bootstrap-dialog.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/js/bootstrap-dialog.min.js"></script>

</html>