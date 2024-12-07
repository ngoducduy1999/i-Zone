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
            if (quantity < maxQuantity) {
                // // quantity++;
                // if (quantity >= maxQuantity) {
                //     quantity = maxQuantity
                //     input.value = maxQuantity;
                // }
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
                UpdateItemCart(idbt, quantity);
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

// yêu thích sản phẩm, xóa khỏi yêu thích trang chi tiết sản phẩm
function Love(productId, index) {
    const icon = document.getElementById(`wishlist-icon-${index}`);
    console.log(productId, index);
    // Kiểm tra xem biểu tượng hiện tại có phải là trái tim không
    if (icon.innerHTML.includes('M12 21.35')) {
        $.ajax({
                url: "/Add-To-Love/" + productId,
                type: "GET",
            })
            .done((response) => {
                alertify.success('Xóa khỏi yêu thích!');
                // Nếu đã là trái tim, chuyển về biểu tượng ban đầu
                icon.innerHTML = `
                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z"
                            fill="currentColor" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z"
                            fill="currentColor" />
                    </svg>
                `;
                $("#favorite-count").empty().html(response);
                $("#favorite-count span").empty().html(response);
            })
            .fail((jqXHR, textStatus, errorThrown) => {
                alertify.error('Vui lòng thử lại sau!');
                console.error("Error adding to cart:", textStatus, errorThrown);
            });
        console.log('không yeu thích');

    } else {
        console.log('yêu thích');
        $.ajax({
                url: "/Add-To-Love/" + productId,
                type: "GET",
            })
            .done((response) => {
                // RenderCartDrop(response);
                // $("#change-item-cart").empty();
                // $("#change-item-cart").html(response);
                alertify.success('Đã thêm vào yêu thích!');
                // Nếu không, chuyển sang trái tim
                icon.innerHTML = `
                    <svg width="20" height="19" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c2.04 0 3.99.81 5.5 2.09C15.51 3.81 17.46 3 19.5 3 22.58 3 25 5.42 25 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"
                            fill="currentColor"/>
                    </svg>
                `;
                $("#favorite-count").empty().html(response);
                $("#favorite-count span").empty().html(response);
            })
            .fail((jqXHR, textStatus, errorThrown) => {
                alertify.error('Vui lòng thử lại sau!');
                console.error("Error adding to cart:", textStatus, errorThrown);
            });
    }
}

function deleteLove(id) {
    $.ajax({
            url: "/Delete-From-Love/" + id,
            type: "GET",
        })
        .done((response) => {
            $("#loved-loves-list").empty().html(response);
            const itemCount = $("#loved-loves-list tr").length;
            $("#favorite-count").empty().html(itemCount);
            $("#favorite-count span").empty().html(itemCount);
            alertify.success('Xóa khỏi yêu thích!');
        }).fail(() => {
            alertify.error('Có lỗi xảy ra, vui lòng thử lại sau!');
        });
}

function PleaseLogin(){
    console.log('chưa đăng nhập');
    alertify.error('Vui lòng đăng nhập!');
}

function DeleteDiscount(){
    $.ajax({
        url: "/DeleteDiscount",
        type: "GET",
    })
    .done((response) => {
        alertify.success('Đã xóa giảm giá!');
        RenderListCart(response)
    }).fail(() => {
        alertify.error('Có lỗi xảy ra, vui lòng thử lại sau!');
    });
}