// Hàm thêm sản phẩm vào giỏ hàng và chuyển hướng
function addToCartAndRedirect(productId, cartIndexUrl) {
    addToCart(productId)
        .then(() => {
            console.log("Thêm vào giỏ hàng thành công, chuyển hướng...");
            window.location.href = cartIndexUrl; // Chuyển hướng đến giỏ hàng
        })
        .catch(error => {
            console.error("Có lỗi xảy ra:", error);
            alert("Không thể thêm sản phẩm vào giỏ hàng. Vui lòng thử lại.");
        });
}