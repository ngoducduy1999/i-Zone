/*
Template Name: Tapeli - Responsive Bootstrap 5 Admin Dashboard
Author: Zoyothemes
Version: 1.0.0
Website: https://zoyothemes.com/
File: dashboard init Js
*/

// =====================================
// Analytics Chart
// =====================================



// Conversion Chart
var options = {
    chart: {
        type: "area",
        fontFamily: 'inherit',
        height: 45,
        sparkline: {
            enabled: true
        },
        animations: {
            enabled: false
        },
    },
    dataLabels: {
        enabled: false,
    },
    fill: {
        opacity: .16,
        type: 'solid'
    },
    stroke: {
        width: 2,
        lineCap: "round",
        curve: "smooth",
    },
    series: [{
        name: "Profits",
        data: [27, 21, 18, 24, 29, 19, 23, 3, 20, 26, 12, 28, 25, 37, 12, 18, 21, 18, 24, 29, 19, 17, 10, 34, 9, 22, 8, 31, 18, 27],
    }],
    tooltip: {
        theme: 'light'
    },
    grid: {
        strokeDashArray: 4,
    },
    xaxis: {
        labels: {
            padding: 0,
        },
        tooltip: {
            enabled: false
        },
        axisBorder: {
            show: false,
        },
        type: 'datetime',
    },
    yaxis: {
        labels: {
            padding: 4
        },
    },
    labels: [
        '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19', '2020-07-20'
    ],
    colors: ["#ec8290"],
    legend: {
        show: false,
    },
};
var chart = new ApexCharts(document.querySelector("#conversion-visitors"), options);
chart.render();

// Monthly Sales
document.addEventListener("DOMContentLoaded", function() {
    // Dữ liệu doanh thu theo tháng từ controller

    var options = {
        chart: {
            type: "bar",
            height: 307,
            parentHeightOffset: 0,
            toolbar: {
                show: false
            },
        },
        colors: ["#537AEF"],
        series: [{
            name: 'Doanh thu',
            data: doanhThuData // Sử dụng dữ liệu doanh thu từ controller (dạng số)
        }],
        fill: {
            opacity: 1,
        },
        plotOptions: {
            bar: {
                columnWidth: "50%",
                borderRadius: 4,
                borderRadiusApplication: 'end',
                borderRadiusWhenStacked: 'last',
                dataLabels: {
                    position: 'top',
                    orientation: 'vertical',
                }
            },
        },
        grid: {
            strokeDashArray: 4,
            padding: {
                top: -20,
                right: 0,
                bottom: -4
            },
            xaxis: {
                lines: {
                    show: true
                }
            }
        },
        xaxis: {
            categories: thangLabels, // Sử dụng nhãn tháng từ controller
            axisTicks: {
                color: "#f0f4f7",
            },
        },
        yaxis: {
            title: {
                text: 'Doanh thu (₫)',  // Thêm ký hiệu ₫ vào tiêu đề trục y
                style: {
                    fontSize: '12px',
                    fontWeight: 600,
                }
            },
            labels: {
                formatter: function (value) {
                    return value.toLocaleString() + ' ₫'; // Định dạng số và thêm ký hiệu ₫
                }
            },
        },
        tooltip: {
            y: {
                formatter: function(value) {
                    return value.toLocaleString() + ' ₫'; // Định dạng tooltip với ₫
                }
            },
            theme: 'light'
        },
        legend: {
            position: 'top',
            show: true,
            horizontalAlign: 'center',
        },
        stroke: {
            width: 0
        },
        dataLabels: {
            enabled: false,
        },
        theme: {
            mode: 'light'
        },
    };

    var chartOne = new ApexCharts(document.querySelector('#monthly-sales'), options);
    chartOne.render();


// Cấu hình biểu đồ
var options = {
    chart: {
        type: "area",
        fontFamily: 'inherit',
        height: 45,
        sparkline: {
            enabled: true
        },
        animations: {
            enabled: false
        },
    },
    dataLabels: {
        enabled: false,
    },
    fill: {
        opacity: .16,
        type: 'solid'
    },
    stroke: {
        width: 2,
        lineCap: "round",
        curve: "smooth",
    },
    series: [{
        name: "Doanh thu theo ngày",
        data: doanhThuNgayData // Sử dụng dữ liệu doanh thu theo ngày từ biến toàn cục
    }],
    tooltip: {
        theme: 'light'
    },
    grid: {
        strokeDashArray: 4,
    },
    xaxis: {
        labels: {
            padding: 0,
        },
        tooltip: {
            enabled: false
        },
        axisBorder: {
            show: false,
        },
        categories: ngayLabels // Sử dụng nhãn ngày từ biến toàn cục
    },
    yaxis: {
        labels: {
            padding: 4
        },
    },
    colors: ["#537AEF"],
    legend: {
        show: false,
    },
};

// Tạo và hiển thị biểu đồ

var chart = new ApexCharts(document.querySelector("#website-visitors"), options);
chart.render();

var options = {
    series: [
        {   name: 'Người dùng mới',
            data: nguoiDungNgayData, // Dữ liệu số lượng người dùng hoạt động mỗi ngày
        },
    ],
    chart: {
        height: 45, // Tăng chiều cao biểu đồ để dễ nhìn
        type: "bar",
        sparkline: {
            enabled: true,
        },
        animations: {
            enabled: false
        },
    },
    colors: ["#537AEF"],
    plotOptions: {
        bar: {
            columnWidth: "50%", // Tăng chiều rộng của các thanh để dễ nhìn
            borderRadius: 3,
        },
    },
    dataLabels: {
        enabled: false,
    },
    fill: {
        opacity: 1,
    },
    grid: {
        strokeDashArray: 4,
    },
    labels: nguoiDungNgayLabels, // Nhãn các ngày
    xaxis: {
        crosshairs: {
            width: 1,
        },
    },
    yaxis: {
        labels: {
            padding: 4,
            formatter: function(value) {
                return Math.round(value); // Hiển thị số lượng người dùng dạng số nguyên
            }
        },
    },
    tooltip: {
        theme: 'light',
        y: {
            formatter: function(value) {
                return value + ''; // Tooltip hiển thị rõ số người dùng
            }
        },
    },
    legend: {
        show: false,
    },
};

var chartOne = new ApexCharts(document.querySelector('#active-users'), options);
chartOne.render();
var options = {
    series: [
        {   name: 'Đơn hàng',
            data: donNgayData, // Dữ liệu số lượng người dùng hoạt động mỗi ngày
        },
    ],
    chart: {
        height: 45, // Tăng chiều cao biểu đồ để dễ nhìn
        type: "bar",
        sparkline: {
            enabled: true,
        },
        animations: {
            enabled: false
        },
    },
    colors: ["#537AEF"],
    plotOptions: {
        bar: {
            columnWidth: "50%", // Tăng chiều rộng của các thanh để dễ nhìn
            borderRadius: 3,
        },
    },
    dataLabels: {
        enabled: false,
    },
    fill: {
        opacity: 1,
    },
    grid: {
        strokeDashArray: 4,
    },
    labels: donNgayLabels, // Nhãn các ngày
    xaxis: {
        crosshairs: {
            width: 1,
        },
    },
    yaxis: {
        labels: {
            padding: 4,
            formatter: function(value) {
                return Math.round(value); // Hiển thị số lượng người dùng dạng số nguyên
            }
        },
    },
    tooltip: {
        theme: 'light',
        y: {
            formatter: function(value) {
                return value + ''; // Tooltip hiển thị rõ số người dùng
            }
        },
    },
    legend: {
        show: false,
    },
};

var chartOne = new ApexCharts(document.querySelector('#session-visitors'), options);
chartOne.render();

});




// Audiences Daily Chart
var options = {
    series: [
        {
            name: 'Fri',
            data: [{
                y: 18,
                x: "12 AM",
            },
            {
                y: 6,
                x: "3 AM",
            },
            {
                y: 12,
                x: "6 AM",
            },
            {
                y: 8,
                x: "9 AM",
            },
            {
                y: 15,
                x: "12 PM",
            },
            {
                y: 15,
                x: "3 PM",
            },
            {
                y: 10,
                x: "6 PM",
            },
            {
                y: 6,
                x: "9 PM",
            }],
        },
        {
            name: 'Thu',
            data: [{
                y: 6,
                x: "12 AM",
            },
            {
                y: 12,
                x: "3 AM",
            },
            {
                y: 15,
                x: "6 AM",
            },
            {
                y: 18,
                x: "9 AM",
            },
            {
                y: 15,
                x: "12 PM",
            },
            {
                y: 6,
                x: "3 PM",
            },
            {
                y: 9,
                x: "6 PM",
            },
            {
                y: 6,
                x: "9 PM",
            }],
        },
        {
            name: 'Wed',
            data: [{
                y: 6,
                x: "12 AM",
            },
            {
                y: 14,
                x: "3 AM",
            },
            {
                y: 8,
                x: "6 AM",
            },
            {
                y: 17,
                x: "9 AM",
            },
            {
                y: 6,
                x: "12 PM",
            },
            {
                y: 9,
                x: "3 PM",
            },
            {
                y: 12,
                x: "6 PM",
            },
            {
                y: 16,
                x: "9 PM",
            }],
        },
        {
            name: 'Tue',
            data: [{
                y: 12,
                x: "9 AM",
            },
            {
                y: 6,
                x: "3 AM",
            },
            {
                y: 14,
                x: "6 AM",
            },
            {
                y: 9,
                x: "9 AM",
            },
            {
                y: 6,
                x: "12 PM",
            },
            {
                y: 18,
                x: "3 PM",
            },
            {
                y: 12,
                x: "6 PM",
            },
            {
                y: 6,
                x: "9 PM",
            }],
        },
        {
            name: 'Mon',
            data: [{
                y: 6,
                x: "12 AM",
            },
            {
                y: 12,
                x: "3 AM",
            },
            {
                y: 12,
                x: "6 AM",
            },
            {
                y: 10,
                x: "9 AM",
            },
            {
                y: 15,
                x: "12 PM",
            },
            {
                y: 9,
                x: "3 PM",
            },
            {
                y: 6,
                x: "6 PM",
            },
            {
                y: 9,
                x: "9 PM",
            }],
        },
        {
            name: 'Sun',
            data: [{
                y: 8,
                x: "12 AM",
            },
            {
                y: 11,
                x: "3 AM",
            },
            {
                y: 11,
                x: "6 AM",
            },
            {
                y: 6,
                x: "9 AM",
            },
            {
                y: 10,
                x: "12 PM",
            },
            {
                y: 15,
                x: "3 PM",
            },
            {
                y: 10,
                x: "6 PM",
            },
            {
                y: 9,
                x: "9 PM",
            }],
        },
        {
            name: 'Sat',
            data: [{
                y: 8,
                x: "12 AM",
            },
            {
                y: 8,
                x: "3 AM",
            },
            {
                y: 10,
                x: "6 AM",
            },
            {
                y: 7,
                x: "9 AM",
            },
            {
                y: 18,
                x: "12 PM",
            },
            {
                y: 8,
                x: "3 PM",
            },
            {
                y: 15,
                x: "6 PM",
            },
            {
                y: 8,
                x: "9 PM",
            }],
        },
    ],
    chart: {
        height: 345,
        type: 'heatmap',
        parentHeightOffset: 0,
        toolbar: {
            show: false
        },
    },
    plotOptions: {
        heatmap: {
          radius: 10,
          enableShades: true,
          shadeIntensity: 2
        }
    },
    grid: {
        show: false,
    },
    dataLabels: {
        enabled: false
    },
    colors: ["#537AEF"],
    legend: {
        show: true,
        position: "top",
        horizontalAlign: "center",
    },

};
var chart = new ApexCharts(document.querySelector("#audiences-daily"), options);
chart.render();



// Sparkline Bounce Rate
var options = {
    chart: {
        type: "line",
        height: 24,
        parentHeightOffset: 0,
        toolbar: {
            show: false
        },
        animations: {
            enabled: false
        },
        sparkline: {
            enabled: true
        },
    },
    series: [{
        data: [5, 17, 1, 24, 4, 10, 18, 20, 13]
    }],
    colors: ["#537AEF"],
    tooltip: {
        enabled: false,
    },
    stroke: {
        width: 2,
        lineCap: "round",
    },
};
var chartOne = new ApexCharts(document.querySelector('#sparkline-bounce-1'), options);
chartOne.render();


// Sparkline 2
var options = {
    chart: {
        type: "line",
        height: 24,
        parentHeightOffset: 0,
        toolbar: {
            show: false
        },
        animations: {
            enabled: false
        },
        sparkline: {
            enabled: true
        },
    },
    series: [{
        data: [27, 8, 33, 41, 16, 13, 30, 4, 37]
    }],
    colors: ["#537AEF"],
    tooltip: {
        enabled: false,
    },
    stroke: {
        width: 2,
        lineCap: "round",
    },
};
var chartOne = new ApexCharts(document.querySelector('#sparkline-bounce-2'), options);
chartOne.render();



// Sparkline 3
var options = {
    chart: {
        type: "line",
        height: 24,
        parentHeightOffset: 0,
        toolbar: {
            show: false
        },
        animations: {
            enabled: false
        },
        sparkline: {
            enabled: true
        },
    },
    series: [{
        data: [10, 13, 10, 4, 17, 3, 23, 22, 19]
    }],
    colors: ["#537AEF"],
    tooltip: {
        enabled: false,
    },
    stroke: {
        width: 2,
        lineCap: "round",
    },
};
var chartOne = new ApexCharts(document.querySelector('#sparkline-bounce-3'), options);
chartOne.render();


// Sparkline 4
var options = {
    chart: {
        type: "line",
        height: 24,
        parentHeightOffset: 0,
        toolbar: {
            show: false
        },
        animations: {
            enabled: false
        },
        sparkline: {
            enabled: true
        },
    },
    series: [{
        data: [26, 9, 26, 6, 18, 5, 31, 30, 27]
    }],
    colors: ["#537AEF"],
    tooltip: {
        enabled: false,
    },
    stroke: {
        width: 2,
        lineCap: "round",
    },

};
var chartOne = new ApexCharts(document.querySelector('#sparkline-bounce-4'), options);
chartOne.render();


// Sparkline 5
var options = {
    chart: {
        type: "line",
        height: 24,
        parentHeightOffset: 0,
        toolbar: {
            show: false
        },
        animations: {
            enabled: false
        },
        sparkline: {
            enabled: true
        },
    },
    series: [{
        data: [29, 6, 19, 16, 25, 24, 10, 31, 26, 16]
    }],
    colors: ["#537AEF"],
    tooltip: {
        enabled: false,
    },
    stroke: {
        width: 2,
        lineCap: "round",
    },
};
var chartOne = new ApexCharts(document.querySelector('#sparkline-bounce-5'), options);
chartOne.render();


// Sparkline 6
var options = {
    chart: {
        type: "line",
        height: 24,
        parentHeightOffset: 0,
        toolbar: {
            show: false
        },
        animations: {
            enabled: false
        },
        sparkline: {
            enabled: true
        },
    },
    series: [{
        data: [17, 9, 4, 11, 2, 20, 5, 22, 15, 11],
    }],
    colors: ["#537AEF"],
    tooltip: {
        enabled: false,
    },
    stroke: {
        width: 2,
        lineCap: "round",
    },
};
var chartOne = new ApexCharts(document.querySelector('#sparkline-bounce-6'), options);
chartOne.render();

// Sparkline 7
var options = {
    chart: {
        type: "line",
        height: 24,
        parentHeightOffset: 0,
        toolbar: {
            show: false
        },
        animations: {
            enabled: false
        },
        sparkline: {
            enabled: true
        },
    },
    series: [{
        data: [29, 18, 10, 22, 6, 26, 17, 28, 22, 17],
    }],
    colors: ["#537AEF"],
    tooltip: {
        enabled: false,
    },
    stroke: {
        width: 2,
        lineCap: "round",
    },
};
var chartOne = new ApexCharts(document.querySelector('#sparkline-bounce-7'), options);
chartOne.render();