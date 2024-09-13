/*
Template Name: Tapeli - Responsive Bootstrap 5 Admin Dashboard
Author: Zoyothemes
Version: 1.0.0
Website: https://zoyothemes.com/
File: Datatable init Js
*/

$(document).ready(function () {

    // Default Datatable
    $('#datatable').DataTable();

    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
        buttons: ['copy', 'print']
    });

    // Key Tables
    $("#key-table").DataTable({ 
        keys: true 
    });

    // Responsive Datatable
    $("#responsive-datatable").DataTable();

    // Multi Selection Datatable
    $('#selection-datatable').DataTable({
        select: {
            style: 'multi'
        }
    });

    // Alternative Pagination Datatable
    $("#alternative-page-datatable").DataTable({ 
        "pagingType": "full_numbers", 
    });

    // Scroll Vertical Datatable
    $("#scroll-vertical-datatable").DataTable({ 
        scrollY: "350px", 
        scrollCollapse: true, 
        paging: false 
    });

    // Scroll Horizontal Datatable
    $('#scroll-horizontal-datatable').DataTable({ 
        scrollX: true
    });

    // Complex headers with column visibility Datatable
    $("#complex-header-datatable").DataTable({ 
        "columnDefs": [ {
            "visible": false,
            "targets": -1
        } ]
    });

    // Row created callback Datatable
    $("#row-callback-datatable").DataTable({ 
        "createdRow": function ( row, data, index ) {
            if ( data[5].replace(/[\$,]/g, '') * 1 > 150000 ) {
                $('td', row).eq(5).addClass('text-danger');
            }
        }
    }),

    // State Saving Datatable
    $("#state-saving-datatable").DataTable({ 
        stateSave: true
    });

    // Fixed Columns Datatable
    $("#fixed-columns-datatable").DataTable({ 
        scrollY: 300, 
        scrollX: true, 
        scrollCollapse: true, 
        paging: false, 
        fixedColumns: true 
    });

    // Fixed Header Database
    $('#fixed-header-datatable').DataTable( {
        responsive: true,
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

    $("#datatable_length select[name*='datatable_length']").addClass('form-select form-select-sm');
    $("#datatable_length select[name*='datatable_length']").removeClass('custom-select custom-select-sm');
    $(".dataTables_length label").addClass('form-label');
});
$("#datatable_length select[name*='datatable_length']").addClass('form-select form-select-sm');

$('#datatable').DataTable({
    "lengthMenu": [10, 30, 50, 100], // Thay đổi số lượng tùy chọn
    "pagingType": "full_numbers",    // Phân trang đầy đủ
    "language": {
        "lengthMenu": "Hiển thị _MENU_ mục mỗi trang", // Tùy chỉnh text
        "zeroRecords": "Không tìm thấy dữ liệu",
        "info": "Trang _PAGE_ của _PAGES_",
        "infoEmpty": "Không có dữ liệu",
        "infoFiltered": "(lọc từ _MAX_ mục)",
        "search": "Tìm kiếm:",
        "paginate": {
            "first": "Đầu",
            "last": "Cuối",
            "next": "Tiếp",
            "previous": "Trước"
        }
    }
});

// $(document).ready(function() {
//     var table = $('#fixed-header-datatable').DataTable( {
//         responsive: true,
//     } );
 
//     new $.fn.dataTable.FixedHeader( table );
// } );
    