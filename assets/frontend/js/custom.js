// Disbled Updown Key In Add To Cart
$(document).ready(function () {
	$("#quantity").on("keydown", function (event) {
		if (event.key === "ArrowUp" || event.key === "ArrowDown") {
			event.preventDefault();
		}
	});
});

function showProductOnCart(productId) {
	$.ajax({
		url: "addToCart",
		type: "POST",
		data: { product_id: productId },
		dataType: "json",
		beforeSend: function () {
			$("#spinner").css({ visibility: "visible", opacity: "1" });
		},
		success: function (response) {
			$("#spinner").css({visibility: "hidden", opacity: "0"});
			if (response.success) {
				$(".add-to-cart-model-body-main").html(response.productAddToCartData);
				$("#addToCartModel").modal("show");
			} else {
				toastr.error(response.message);
			}
		},
		error: function () {
			$("#spinner").css({visibility: "hidden", opacity: "0"});
			toastr.error("An error occurred while adding the product to the cart.");
		},
	});
}

function addToCartProduct() {
	let productId = $("input[name=prodcut_id]").val();
	let availableProductQuantity = $("input[name=available_product_quantity]").val();
	let selectedProductQuantity = $("input[name=selected_product_quantity]").val();

	// Check Quantity Greater The 1
	if (selectedProductQuantity < 1) {
		$("input[name=selected_product_quantity]").addClass("is-invalid");
		toastr.error("Please Select Proper Quantity");
        return false;
	} else {
		$("input[name=selected_product_quantity]").removeClass("is-invalid");
	}

	let data = {
		productId: productId,
		availableProductQuantity: availableProductQuantity,
		selectedProductQuantity: selectedProductQuantity,
	};

	$.ajax({
		url: BASE_URL + "SiteController/addToCartProduct",
		type: "POST",
		data: data,
		dataType: "json",
        beforeSend: function () {
			$("#spinner").css({ visibility: "visible", opacity: "1" });
		},
		success: function (response) {
            $("#spinner").css({visibility: "hidden", opacity: "0"});
			if (response.success) {
				$("#addToCartModel").modal("hide");
				toastr.success(response.message);

                // Redirect To Cart
                setTimeout(function () {
                    window.location.href = BASE_URL + "cart";
                }, 1000);
			} else {
				toastr.error(response.message);
				$("input[name=selected_product_quantity]").addClass("is-invalid");
			}
		},
		error: function () {
            $("#spinner").css({visibility: "hidden", opacity: "0"});
			toastr.error("An error occurred while adding the product to the cart.");
		},
	});
}

function deleteItemFromCart(productId) {
	let data = {
		productId: productId,
	};
	$.ajax({
		url: BASE_URL + "SiteController/deleteItemFromCart",
		type: "POST",
		data: data,
		dataType: "json",
        beforeSend: function () {
			$("#spinner").css({ visibility: "visible", opacity: "1" });
		},
		success: function (response) {
            $("#spinner").css({visibility: "hidden", opacity: "0"});
			if (response.success) {
                // Update Cart Total Item Count
                $('.total-selected-item-on-cart').text(response.cartItemCount);

                // Remove Prodcut From Cart
				$("#productDelete" + productId).remove("");
				toastr.success(response.message);
			} else {
				toastr.error(response.message);
			}
		},
		error: function () {
            $("#spinner").css({visibility: "hidden", opacity: "0"});
			toastr.error("An error occurred while adding the product to the cart.");
		},
	});
}

// Update Cart Quantity
$(document).ready(function () {
	$(".add-to-cart-main #quantity").change(function () {
		var productId = $(this).data("product-id");
		var actualStock = $(this).data("actual-stock");
		var updatedProductQuantity = $(this).val();
		
        if (updatedProductQuantity <= 0 || updatedProductQuantity > actualStock) {
			$(this).addClass("is-invalid");

			if (updatedProductQuantity <= 0) {
				toastr.error("Please select a proper quantity");
			} else if (updatedProductQuantity > actualStock) {
				toastr.error("Stock limit exceeded!");
			}
            return false;
		} else {
			$(this).removeClass("is-invalid");
		}

		let data = {
			productId: productId,
			updatedProductQuantity: updatedProductQuantity,
		};
		$.ajax({
			url: BASE_URL + "SiteController/updateProductQuantityCart",
			type: "POST",
			data: data,
			dataType: "json",
            beforeSend: function () {
                $("#spinner").css({ visibility: "visible", opacity: "1" });
            },
			success: function (response) {
                $("#spinner").css({visibility: "hidden", opacity: "0"});
				if (response.success) {
                    if(response.cartItemData) {
                        $('#productDelete' + productId).find('.cart-item-total-price-of-product').text('₹' + response.cartItemData);
                    }
					toastr.success(response.message);
				} else {
					toastr.error(response.message);
				}
			},
			error: function () {
                $("#spinner").css({visibility: "hidden", opacity: "0"});
				toastr.error("An error occurred while update product to the cart.");
			},
		});
	});
});