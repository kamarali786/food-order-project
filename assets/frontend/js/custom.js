// Show Product Data In Cart Model
function showProductOnCart(productId) {
	$.ajax({
		url: "addToCart",
		type: "POST",
		data: { product_id: productId },
		dataType: "json",
		success: function (response) {
			if (response.success) {
				$(".add-to-cart-model-body-main").html(response.productAddToCartData);
				$("#addToCartModel").modal("show");
			} else {
				toastr.error(response.message);
			}
		},
		error: function () {
			toastr.error(response.message);
		},
	});
}

function addToCartProduct() {
    
    let productId = $("input[name=prodcut_id]").val();
    let availableProductQuantity = $("input[name=available_product_quantity]").val();
    let selectedProductQuantity = $("input[name=selected_product_quantity]").val();

    // Check Quantity Greater The 1
    if(selectedProductQuantity < 1) {
        toastr.error('Please Select Proper Quantity');
        return 0;        
    } 

    let data = {
        productId: productId,
        availableProductQuantity: availableProductQuantity,
        selectedProductQuantity: selectedProductQuantity
    };

    $.ajax({
        url: BASE_URL + "SiteController/addToCartProduct",
        type: "POST",
        data: data,
        dataType: "json",
        success: function (response) {
            if (response.success) {
                toastr.success(response.message);
            } else {
                toastr.error(response.message);
                $("input[name=selected_product_quantity]").addClass('is-invalid');
            }
        },
        error: function () {
            toastr.error("An error occurred while adding the product to the cart.");
        }
    });
}
