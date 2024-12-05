function addToCartProduct(productId) {
    $.ajax({
        url: 'addToCart',
        type: 'POST',
        data: {product_id: productId},
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                $('.add-to-cart-model-body-main').html(response.productAddToCartData);
                $('#addToCartModel').modal('show');
            } else {
                toastr.error(response.message);
            }
        },
        error: function() {
            toastr.error(response.message);
        }
    });
}

