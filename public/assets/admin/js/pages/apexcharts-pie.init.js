/*
Template Name: Tapeli - Responsive Bootstrap 5 Admin Dashboard
Author: Zoyothemes
Version: 1.0.0
Website: https://zoyothemes.com/
File: Apexcharts Pie Charts
*/

//
// Simple Pie Chart
//
document.addEventListener("DOMContentLoaded", function() {

   
var options = {
    series: dataKhuyenMai,
    chart: {
        height: 400,
        type: "pie",
        parentHeightOffset: 0,
    },
    labels: labelsKhuyenMai,
    legend: {
        position: "bottom",
    },
    colors: ["#537AEF", "#522c8f", "#5be7bd", "#963b68", "#001b2f"],
    responsive: [
        {
            breakpoint: 480,
            options: {
                chart: {
                    width: 200,
                },
                legend: {
                    position: "bottom",
                },
            },
        },
    ],
};
var chart = new ApexCharts(
    document.querySelector("#simple_pie_chart"),
    options
);
chart.render();


    
});

