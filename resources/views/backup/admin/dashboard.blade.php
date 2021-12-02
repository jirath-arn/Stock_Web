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
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>

    var product = JSON.parse('<?php echo json_encode($data[0]); ?>');
    var total = JSON.parse('<?php echo json_encode($data[2]); ?>');
    var balance = JSON.parse('<?php echo json_encode($data[1]); ?>');
    var data_balance = [];
    var data_total = [];
    var data_percent = [];
    
    window.onload = function () {
        
        function percent(product,total){
            let total_InStock = 0;
            for (var i = 0; i < product.length; i++) {
                total_InStock += total[i];
            }
            return total_InStock;
        }
        var percent = percent(product,total);

        function addData(product,total,balance) {
            for (var i = 0; i < product.length; i++) {
                data_balance.push({
                    label: product[i].code_name +" "+ product[i].product_name,
                    y: balance[i]
                });
    
                data_total.push({
                    label: product[i].code_name +" "+ product[i].product_name,
                    y: total[i],
                    percent : total[i] / percent * 100
                });

                data_percent.push({
                    label: product[i].code_name +" "+ product[i].product_name,
                    y : (total[i] / percent * 100).toFixed(2)
                });
            }
            console.log(data_total);
        }

        
        
        var chart1 = new CanvasJS.Chart("chartContainer", {
            exportEnabled: true,
            animationEnabled: true,
            title:{
                text: "จำนวนคงเหลือ - จำนวนเดิม"
            },
            subtitles: [{
                text: "--------"
            }], 
            axisX: {
                title: "เปรียบเทียบ"
            },
            axisY: {
                title: "จำนวน",
                titleFontColor: "#4F81BC",
                lineColor: "#4F81BC",
                labelFontColor: "#4F81BC",
                tickColor: "#4F81BC",
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
                dataPoints:data_balance              
            },
            {
                type: "column",
                name: "จำนวนเดิมทั้งหมด",
                
                showInLegend: true,
                yValueFormatString: "#,##0 ตัว",
                dataPoints: data_total
            }]
        });
        
        
        var chart2 = new CanvasJS.Chart("chartCyecle", {
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            exportEnabled: true,
            animationEnabled: true,
            title: {
                text: "แสดงสัดส่วนสินค้าในระบบ"
            },
            data: [{
                type: "pie",
                startAngle: 25,
                toolTipContent: "<b>{label}</b>: {y} %",
                showInLegend: "true",
                legendText: "{label}",
                indexLabelFontSize: 16,
                indexLabel: "{label} - {y} %",
                dataPoints: data_percent
                
            }]
    });
       
        
        
        
    
        addData(product,total,balance);
        chart1.render();
        chart2.render();

        function toggleDataSeries(e) {
            if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            e.chart.render();
        }
    }

    
    </script>
@endsection
