document.addEventListener("DOMContentLoaded", function() {
      // Truy xuất dữ liệu từ window.contactData
      var totalResolved = window.contactData.totalResolved;
      var totalPending = window.contactData.totalPending;
  
      // Định nghĩa biểu đồ
      var options = {
          series: [{
              name: 'Tổng số',
              data: [totalResolved, totalPending] // Số liệu tổng
          }],
          chart: {
              height: 400,
              type: 'bar'
          },
          plotOptions: {
              bar: {
                  borderRadius: 10,
                  columnWidth: '50%'
              }
          },
          colors: ['#00E396', '#FF4560'], // Đặt màu sắc riêng cho từng cột
          dataLabels: {
              enabled: true,
              formatter: function (val) {
                  return val + " liên hệ"; // Hiển thị số lượng trên cột
              }
          },
          xaxis: {
              categories: ['Đã phản hồi', 'Chưa phản hồi'], // Nhãn cột
          },
          yaxis: {
              title: {
                  text: 'Số lượng'
              }
          }
      };
  
      // Tạo và hiển thị biểu đồ
      var chart = new ApexCharts(document.querySelector("#total_contact_chart"), options);
      chart.render();
  
});
