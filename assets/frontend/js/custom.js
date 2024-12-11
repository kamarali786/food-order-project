// disable up and down key
// allow only number in add to cart

$(document).ready(function () {
	$(".add-to-cart-main #quantity").on("keydown", function (event) {
		if (event.key === "ArrowUp" || event.key === "ArrowDown") {
			event.preventDefault();
		}
	});

	$(".add-to-cart-main #quantity").on("input", function () {
		let value = $(this).val();
		// Replace non-integer characters with an empty string
		if (!Number.isInteger(parseFloat(value))) {
			$(this).val(Math.floor(value || 0));
		}
	});

	// Prevent typing non-numeric characters
	$(".add-to-cart-main #quantity").on("keypress", function (event) {
		if (event.which < 48 || event.which > 57) {
			event.preventDefault();
		}
	});
});

function showProductOnCart(productId) {
	$.ajax({
		url: "addToCart",
		type: "POST",
		data: {
			product_id: productId,
		},
		dataType: "json",
		beforeSend: function () {
			$("#spinner").css({
				visibility: "visible",
				opacity: "1",
			});
		},
		success: function (response) {
			$("#spinner").css({
				visibility: "hidden",
				opacity: "0",
			});
			if (response.success) {
				$(".add-to-cart-model-body-main").html(response.productAddToCartData);
				$(".add-to-cart-model-body-main .selected-product-quantity-main").on(
					"input",
					function () {
						let value = $(this).val();
						if (!Number.isInteger(parseFloat(value))) {
							$(this).val(Math.floor(value || 0));
						}
					}
				);
				$(".add-to-cart-model-body-main .selected-product-quantity-main").on(
					"keypress",
					function (event) {
						if (event.which < 48 || event.which > 57) {
							event.preventDefault();
						}
					}
				);
				$("#addToCartModel").modal("show");
			} else {
				toastr.error(response.message);
			}
		},
		error: function () {
			$("#spinner").css({
				visibility: "hidden",
				opacity: "0",
			});
			toastr.error("An error occurred while adding the product to the cart.");
		},
	});
}

function addToCartProduct() {
	let productId = $("input[name=prodcut_id]").val();
	let availableProductQuantity = $(
		"input[name=available_product_quantity]"
	).val();
	let selectedProductQuantity = $(
		"input[name=selected_product_quantity]"
	).val();

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
			$("#spinner").css({
				visibility: "visible",
				opacity: "1",
			});
		},
		success: function (response) {
			$("#spinner").css({
				visibility: "hidden",
				opacity: "0",
			});
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
			$("#spinner").css({
				visibility: "hidden",
				opacity: "0",
			});
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
			$("#spinner").css({
				visibility: "visible",
				opacity: "1",
			});
		},
		success: function (response) {
			$("#spinner").css({
				visibility: "hidden",
				opacity: "0",
			});
			if (response.success) {
				// Update Cart Total Item Count
				$(".total-selected-item-on-cart").text(response.cartItemCount);
				// Remove Prodcut From Cart
				$("#productDelete" + productId).remove("");
				toastr.success(response.message);
			} else {
				toastr.error(response.message);
			}
		},
		error: function () {
			$("#spinner").css({
				visibility: "hidden",
				opacity: "0",
			});
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
				$("#spinner").css({
					visibility: "visible",
					opacity: "1",
				});
			},
			success: function (response) {
				$("#spinner").css({
					visibility: "hidden",
					opacity: "0",
				});
				if (response.success) {
					if (response.cartItemData) {
						$("#productDelete" + productId)
							.find(".cart-item-total-price-of-product")
							.text("₹" + response.cartItemData);
					}
					toastr.success(response.message);
				} else {
					toastr.error(response.message);
				}
			},
			error: function () {
				$("#spinner").css({
					visibility: "hidden",
					opacity: "0",
				});
				toastr.error("An error occurred while update product to the cart.");
			},
		});
	});
});

//  validation of registration and login
$(document).ready(function () {
	var isRegisterForm = $("#auth-form").attr("action").includes("register");

	$("#auth-form").on("submit", function (e) {
		e.preventDefault();

		$(".error").remove();

		var fname = $("#fname").val();
		var lname = $("#lname").val();
		var email = $("#email").val();
		var password = $("#password").val();
		var confirmPassword = $("#confirmPassword").val();

		var isValid = true;

		var namePattern = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;

		if (isRegisterForm && fname === "") {
			isValid = false;
			$("#fname").after(
				'<div class="error text-danger pt-1">First name is required</div>'
			);
		} else if (isRegisterForm && !namePattern.test(fname)) {
			isValid = false;
			$("#fname").after(
				'<div class="error text-danger pt-1">Invalid first name format</div>'
			);
		}

		if (isRegisterForm && lname === "") {
			isValid = false;
			$("#lname").after(
				'<div class="error text-danger pt-1">Last name is required</div>'
			);
		} else if (isRegisterForm && !namePattern.test(lname)) {
			isValid = false;
			$("#lname").after(
				'<div class="error text-danger pt-1">Invalid last name format</div>'
			);
		}

		var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		if (email === "" || !emailPattern.test(email)) {
			isValid = false;
			$("#email").after(
				'<div class="error text-danger pt-1">Please enter a valid email</div>'
			);
		}

		var passwordPattern =
			/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&_]{8,}$/;
		if (password === "") {
			isValid = false;
			$("#password-messeage").after(
				'<div class="error text-danger pt-1">Password is required</div>'
			);
		} else if (password.length < 8) {
			isValid = false;
			$("#password-messeage").after(
				'<div class="error text-danger pt-1">Password must be at least 8 characters long</div>'
			);
		} else if (!passwordPattern.test(password)) {
			isValid = false;
			$("#password-messeage").after(
				'<div class="error text-danger pt-1">Password must include at least one letter, one digit, and one special character</div>'
			);
		}

		if (isRegisterForm && confirmPassword !== password) {
			isValid = false;
			$("#confirmPassword").after(
				'<div class="error text-danger">Passwords do not match</div>'
			);
		}

		if (isValid) {
			this.submit();
		}
	});
});

// validation of user profile page
$(document).ready(function () {
	$("#user-profile").on("submit", function (e) {
		e.preventDefault();
		$(".error").remove();

		var fname = $("#fname").val();
		var lname = $("#lname").val();
		var phone = $("#phone").val();
		var address = $("#address").val();
		var city = $("#city").val();
		var state = $("#state").val();
		var country = $("#country").val();
		var alphabeticRegex = /^[a-zA-Z\s]*$/;
		var isValid = true;

		var namePattern = /^[a-zA-Z]+([\'\,\.\-]?[a-zA-Z ])*$/;
		// first name validation
		if (fname === "") {
			isValid = false;
			$("#fname").addClass("is-invalid");
		} else if (!namePattern.test(fname)) {
			isValid = false;
			$("#fname").after(
				'<div class="error text-danger pt-1">Invalid first name format</div>'
			);
		} else {
			$("#fname").removeClass("is-invalid");
		}
		// last name validation
		if (lname === "") {
			isValid = false;
			$("#lname").addClass("is-invalid");
		} else if (!namePattern.test(lname)) {
			isValid = false;
			$("#lname").after(
				'<div class="error text-danger pt-1">Invalid last name format</div>'
			);
		} else {
			$("#lname").removeClass("is-invalid");
		}
		// phone number validation
		if (phone === "") {
			isValid = false;
			$("#phone").addClass("is-invalid");
		} else if (phone.length > 10 || phone.length < 10) {
			isValid = false;
			$("#phone").addClass("is-invalid");
			$("#phone").after(
				'<div class="error text-danger pt-1">Invalid phone Number format</div>'
			);
		} else {
			$("#phone").removeClass("is-invalid");
		}
		// address validation
		if (address === "") {
			isValid = false;
			$("#address").addClass("is-invalid");
		} else if (address.length < 10) {
			isValid = false;
			$("#address").addClass("is-invalid");
			$("#address").after(
				'<div class="error text-danger pt-1">Address Must be greather than 10 character</div>'
			);
		} else {
			$("#address").removeClass("is-invalid");
		}

		// city validation
		if (city === "") {
			isValid = false;
			$("#city").addClass("is-invalid");
		} else if (!alphabeticRegex.test(city)) {
			isValid = false;
			$("#city").addClass("is-invalid");
			$("#city").after(
				'<div class="error text-danger pt-1">Only Character Allow</div>'
			);
		} else {
			$("#city").removeClass("is-invalid");
		}

		// state validation
		if (state === "") {
			isValid = false;
			$("#state").addClass("is-invalid");
		} else if (!alphabeticRegex.test(state)) {
			isValid = false;
			$("#state").addClass("is-invalid");
			$("#state").after(
				'<div class="error text-danger pt-1">Only Character Allow</div>'
			);
		} else {
			$("#state").removeClass("is-invalid");
		}

		// country validation
		if (country === "") {
			isValid = false;
			$("#country").addClass("is-invalid");
		} else if (!alphabeticRegex.test(country)) {
			isValid = false;
			$("#country").addClass("is-invalid");
			$("#country").after(
				'<div class="error text-danger pt-1">Only Character Allow</div>'
			);
		} else {
			$("#country").removeClass("is-invalid");
		}
		// image validation

		var profilePicture = $("#profile_picture")[0];
		var profilePicture = profilePicture.files[0];
		const maxSize = 2 * 1024 * 1024;
		const allowedTypes = ["image/jpeg", "image/png", "image/gif", "image/jpg"];

		console.log(profilePicture);
		if (profilePicture) {
			if (!allowedTypes.includes(profilePicture.type)) {
				isValid = false;
				$("#profile_picture").addClass("is-invalid");
				$("#profile_picture").after(
					'<div class="error text-danger pt-1">Only JPG, PNG, and GIF images are allowed</div>'
				);
			} else if (maxSize > profilePicture.maxSize) {
				isValid = false;
				$("#profile_picture").addClass("is-invalid");
				$("#profile_picture").after(
					'<div class="error text-danger pt-1">Image size must not exceed 2MB</div>'
				);
			}
		}
		if (isValid) {
			this.submit();
		}
	});
});

//show password in register and login form
$(document).ready(function () {
	$("#togglePassword").on("click", function () {
		var passwordField = $("#password");
		var eyeIcon = $("#eyeIcon");
		if (passwordField.attr("type") === "password") {
			passwordField.attr("type", "text");
			eyeIcon.removeClass("bi-eye-slash").addClass("bi-eye");
		} else {
			passwordField.attr("type", "password");
			eyeIcon.removeClass("bi-eye").addClass("bi-eye-slash");
		}
	});
});
