var dungLuongId;
var mauSacId;
// lấy màu sắc, dung lượng
document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.tp-size-variation-btn');
    const colorButtons = document.querySelectorAll('.tp-color-variation-btn');
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            buttons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            dungLuongId = parseInt(button.getAttribute('data-dung-luong-id'));
        });
    });
    colorButtons.forEach(button => {
        button.addEventListener('click', () => {
            colorButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            mauSacId = parseInt(button.getAttribute('data-mau-sac-id'));
        });
    });
});
// thêm sản phẩm vào giỏ hàng
function addToCart(id) {
    var quantityInput = document.querySelector('.tp-cart-input');
    var quantity = parseInt(quantityInput.value);
    if (quantity < 1) {
        alert("Số lượng sản phẩm không được nhỏ hơn 1");
        return;
    }
    if (mauSacId === undefined) {
        alert("Vui lòng chọn màu sắc sản phẩm!");
        return;
    }
    if (dungLuongId === undefined) {
        alert("Vui lòng chọn dung lượng sản phẩm!");
        return;
    }
    $.ajax({
        url: "/Add-Cart/" + id,
        type: "GET",
        data: {
            quantity: quantity,
            mauSacId: mauSacId,
            dungLuongId: dungLuongId,
        }
    })
        .done((response) => {
            RenderCartDrop(response);
            alertify.success('Đã thêm vào giỏ hàng!');
        })
        .fail((jqXHR, textStatus, errorThrown) => {
            alertify.error('Thêm vào giỏ hàng thất bại!');
            console.error("Error adding to cart:", textStatus, errorThrown);
        });
}
// xóa sản phẩm khỏi giỏ hàng, giỏ hàng drop
$('#change-item-cart').off("click", ".cartmini__del i").on("click", ".cartmini__del i", function () {
    console.log("clicked");
    $.ajax({
        url: "/Delete-Item-Cart/" + $(this).data("idbt"),
        type: "GET",
    })
        .done((response) => {
            RenderCartDrop(response);
            alertify.success('Xóa thành công!');
            cartIndex();
        });
});
// hiển thị lại giỏ hàng, giỏ hàng drop sidebar
function RenderCartDrop(response) {
    if ($("#change-item-cart")) {
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        let totalQuantity = $("#total-quantity-cart").val();
        if (totalQuantity) {
            $("#total-quantity-show").text(totalQuantity);
            $("#total-quantity-show span").text(totalQuantity);
        }
    }
    bindCartEvents();
}
// hiển thị giỏ hàng
function RenderListCart(response) {
    if ($("#list-cart")) {
        $("#list-cart").empty();
        $("#list-cart").html(response);
        let totalQuantity = $("#total-quantity-list-cart").val();
        if (totalQuantity) {
            $("#total-quantity-show").text(totalQuantity);
            $("#total-quantity-show span").text(totalQuantity);
        }
    }
    bindCartEvents();
}
// danh sach san pham gio hang drop sideber
function cartIndex() {
    if ($("#list-cart")) {
        $.ajax({
            url: "/Cart-List",
            type: "GET",
        })
            .done((response) => {
                RenderListCart(response);
            });
    }
}
// danh sach san pham gio hang
function cartDropIndex() {
    if ($("#change-item-cart")) {
        $.ajax({
            url: "/Cart-List-Drop",
            type: "GET",
        })
            .done((response) => {
                RenderCartDrop(response);
            });
    }
}
// xóa sản phẩm khỏi giỏ hàng
function DeleteItemCart(idbt) {
    console.log(idbt);
    $.ajax({
        url: "/Delete-Item-List-Cart/" + idbt,
        type: "GET",
    })
        .done((response) => {
            RenderListCart(response);
            alertify.success('Xóa thành công!');
            cartDropIndex();
        });
}

// Cập nhập số lượng sản phẩm
function UpdateItemCart(idbt, quantity) {
    $.ajax({
        url: "/Update-Item-Cart/" + idbt,
        type: "GET",
        data: {
            'quantity': quantity
        }
    }).done((response) => {
        $("#list-cart").empty().html(response);
        alertify.success('Cập nhật thành công!');
        bindCartEvents();
    }).fail((xhr, status, error) => {
        console.error('Update failed:', error);
        alertify.error('Cập nhật thất bại. Vui lòng thử lại.');
    });
}


function bindCartEvents() {
    // Gán lại sự kiện cho input số lượng
    document.querySelectorAll('.cart-quantity').forEach(input => {
        input.oninput = function () {
            let quantity = parseInt(this.value);
            let idbt = this.closest('tr').dataset.id;
            let maxQuantity = parseInt(this.getAttribute('data-max-quantity'));

            if (isNaN(quantity) || quantity < 1) {
                quantity = 1;
                this.value = quantity;
            } else if (quantity > maxQuantity) {
                alertify.error(`Số lượng không được lớn hơn ${maxQuantity}`);
                quantity = maxQuantity;
            }
            this.value = quantity;
            UpdateItemCart(idbt, quantity);
            cartDropIndex();
            cartIndex();
        };
    });
    // Xử lý nút "+"
    document.querySelectorAll('.cart-plus').forEach(button => {
        button.onclick = function (event) {
            event.stopPropagation();
            let input = this.closest('.tp-product-quantity').querySelector('.cart-quantity');
            let quantity = parseInt(input.value) || 0;
            let maxQuantity = parseInt(input.getAttribute('data-max-quantity'));
            let idbt = this.closest('tr').dataset.id;
            console.log('out if ' + quantity);
            if (quantity < maxQuantity) {
                // quantity++;
                if (quantity >= maxQuantity) {
                    quantity = maxQuantity
                    input.value = maxQuantity;
                }
                input.value = quantity;
                UpdateItemCart(idbt, quantity);
            }
            if (quantity > maxQuantity) {
                quantity = maxQuantity;
                alertify.error(`Số lượng không được lớn hơn ${maxQuantity}`);
                input.value = maxQuantity;
            }
            if (quantity >= maxQuantity) {
                input.value = maxQuantity;
                quantity = maxQuantity;
                alertify.warning(`Sản phẩm chỉ còn ${maxQuantity}`);
            }
            cartDropIndex();
            cartIndex();
        };
    });
    // Xử lý nút "-"
    document.querySelectorAll('.cart-minus').forEach(button => {
        button.onclick = function (event) {
            event.stopPropagation();
            let input = this.closest('.tp-product-quantity').querySelector('.cart-quantity');
            let quantity = parseInt(input.value) || 0;
            console.log(quantity);
            // quantity--;
            input.value = quantity;
            let idbt = this.closest('tr').dataset.id;
            UpdateItemCart(idbt, quantity);
            cartDropIndex();
            cartIndex();
        };
    });
}
// giảm giá sản phẩm
function discount() {
    const discountCode = document.getElementById('discount-code').value;
    if (discountCode == "") {
        alertify.error('Vui lòng nhập mã giảm giá.');
        return;
    }
    console.log(discountCode);
    $.ajax({
        url: `/Discount-Cart/${discountCode}`,
        type: "GET",
    }).done((response) => {
        $("#list-cart").empty();
        $("#list-cart").html(response);
        alertify.success('Đã giảm giá!');
        bindCartEvents();
    }).fail((xhr, status, error) => {
        console.error('Update failed:', error);
        let errorMessage;
        if (xhr.status === 404) {
            errorMessage = 'Mã giảm giá không hợp lệ.';
        } else if (xhr.status === 400) {
            errorMessage = 'Mã giảm giá đã hết hạn.';
        } else {
            errorMessage = 'Vui lòng thử lại sau.';
        }
        alertify.error(errorMessage);
    });
}
// khi load lại trang gọi lại sự kiện thay đổi 
document.addEventListener('DOMContentLoaded', bindCartEvents);