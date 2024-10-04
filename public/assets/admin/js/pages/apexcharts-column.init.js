document.addEventListener("DOMContentLoaded", function() {
  
    // Tạo dữ liệu cho biểu đồ
    var combinedDataInStock = [];
    var combinedDataLowStock = [];
    var combinedDataOutOfStock = [];

    // Sử dụng vòng lặp để ánh xạ dữ liệu
    for (var i = 0; i < labelsSanPham.length; i++) {
        // Lấy dữ liệu từ các mảng khác nhau
        var inStockValue = dataInStock[i] !== undefined ? dataInStock[i] : 0; // Nếu không có, dùng 0
        var lowStockValue = dataLowStock[i - dataInStock.length] !== undefined ? dataLowStock[i - dataInStock.length] : 0; // Lấy dữ liệu cho 'sắp hết hàng'
        var outOfStockValue = dataOutOfStock[i] !== undefined ? dataOutOfStock[i] : 0; // Nếu không có, dùng 0

        combinedDataInStock.push(inStockValue);
        combinedDataLowStock.push(lowStockValue);
        combinedDataOutOfStock.push(outOfStockValue);
    }

    // Định nghĩa options cho biểu đồ
    var options = {
        series: [{
            name: 'Còn hàng',
            data: combinedDataInStock // Số lượng sản phẩm còn hàng
        }, {
            name: 'Sắp hết hàng',
            data: combinedDataLowStock // Số lượng sản phẩm sắp hết hàng
        }, {
            name: 'Hết hàng',
            data: combinedDataOutOfStock // Số lượng sản phẩm hết hàng
        }],
        chart: {
            height: 400,
            type: 'bar',
            parentHeightOffset: 0,
        },
        plotOptions: {
            bar: {
                borderRadius: 10,
                columnWidth: '50%',
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: 0
        },
        grid: {
            row: {
                colors: ['#fff', '#f2f2f2']
            }
        },
        xaxis: {
            labels: {
                rotate: -45
            },
            categories: labelsSanPham, // Tên sản phẩm
            tickPlacement: 'on'
        },
        yaxis: {
            title: {
                text: 'Số lượng',
            },
            min: 0, // Đặt giá trị tối thiểu cho trục Y
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "horizontal",
                shadeIntensity: 0.25,
                inverseColors: true,
                opacityFrom: 0.85,
                opacityTo: 0.85,
                stops: [50, 0, 100]
            },
        }
    };

    var chart = new ApexCharts(document.querySelector("#rotated_column_chart"), options);
    chart.render();
});
