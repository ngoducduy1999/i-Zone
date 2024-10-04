/*
Template Name: Tapeli - Responsive Bootstrap 5 Admin Dashboard
Author: Zoyothemes
Version: 1.0.0
Website: https://zoyothemes.com/
File: Apexcharts Bar Chart
*/

// 
//  Bar Chart
// 

// Basic Bar Chart
document.addEventListener("DOMContentLoaded", function() {

    var options = {
        series: [{
            data: dataDanhMuc
        }],
        chart: {
            type: 'bar',
            height: 400,
            width: '100%',
            parentHeightOffset: 0,
            toolbar: {
                show: true,
            }
        },
       
        plotOptions: {
            bar: {
                borderRadius: 5,
                borderRadiusApplication: 'end',
                horizontal: true,
                barHeight: '70%',
                distributed: true
            }
        },
        dataLabels: {
            enabled: false
        },
        tooltip: {
            enabled: true,
            theme: 'dark',
            y: {
                formatter: function (val) {
                    return val + " Sản phẩm";
                }
            }
        },
        legend: {
            show: true,
            position: 'top',
            horizontalAlign: 'center',
            labels: {
                colors: '#333',
                useSeriesColors: true
            }
        },
        colors: ['#537AEF', '#F39C12', '#E74C3C'],
        stroke: {
            width: 2,
            colors: ['#fff']
        },
        xaxis: {
            categories: labelsDanhMuc,
        }
    };
    var chart = new ApexCharts(document.querySelector("#basic_bar_chart"), options);
    chart.render();
    
});

