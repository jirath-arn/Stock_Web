@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-sm-6">
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>

        <div class="col-xl-6 col-lg-6 col-sm-6">
            <div id="chartCyecle" style="height: 370px; width: 100%;"></div>
        </div>
    </div>
</div>

<script type="application/javascript">
    var products = windowjs.products;
    var balances = windowjs.products_balance;
    var totals = windowjs.products_total;

    var data_balances = [];
    var data_totals = [];
    var data_percents = [];

    window.onload = function () {
        var percent = Object.values(totals).reduce((partial_sum, a) => partial_sum + a, 0);

        products.forEach(e => {
            data_balances.push({
                label: e.code_name + " " + e.product_name,
                y: balances[e.code_name]
            });
    
            data_totals.push({
                label: e.code_name + " " + e.product_name,
                y: totals[e.code_name],
                percent: totals[e.code_name] / percent * 100
            });

            data_percents.push({
                label: e.code_name + " " + e.product_name,
                y: (totals[e.code_name] / percent * 100).toFixed(2)
            });
        });

        var chartContainer = new CanvasJS.Chart("chartContainer", {
            exportEnabled: true,
            animationEnabled: true,
            title: {
                text: "จำนวนคงเหลือและทั้งหมด"
            }, 
            axisX: {
                title: "รายการสินค้า"
            },
            axisY: {
                title: "จำนวน",
                includeZero: true
            },
            toolTip: {
                shared: true
            },
            legend: {
                cursor: "pointer",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "จำนวนคงเหลือ",
                showInLegend: true,      
                yValueFormatString: "#,##0 ตัว",
                dataPoints: data_balances
            },
            {
                type: "column",
                name: "จำนวนเดิมทั้งหมด",
                showInLegend: true,
                yValueFormatString: "#,##0 ตัว",
                dataPoints: data_totals
            }]
        });

        var chartCyecle = new CanvasJS.Chart("chartCyecle", {
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            exportEnabled: true,
            animationEnabled: true,
            title: {
                text: "สัดส่วนรายการสินค้า"
            },
            data: [{
                type: "pie",
                startAngle: 25,
                toolTipContent: "<b>{label}</b>: {y} %",
                showInLegend: "true",
                legendText: "{label}",
                indexLabelFontSize: 16,
                indexLabel: "{label} - {y} %",
                dataPoints: data_percents
            }]
        });

        chartContainer.render();
        chartCyecle.render();

        function toggleDataSeries(e) {
            if(typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            e.chart.render();
        }
    }
</script>
@endsection