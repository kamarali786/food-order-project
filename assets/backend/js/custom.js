function deleted(link) {
	Swal.fire({
		title: "Are you sure?",
		text: "You won't be able to revert this!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, delete it!",
		cancelButtonText: "Cancel",
		allowOutsideClick: false,
		allowEscapeKey: false,
	}).then((result) => {
		if (result.isConfirmed) {
			window.location.href = link.href;
		} else {
			Swal.fire("Cancelled", "Your item is safe :)", "error");
		}
	});
	return false;
}

$(document).ready(function () {
	$("#categorySelect").change(function () {
		var cate_id = $(this).val();
		if (cate_id) {
			$.ajax({
				url: "sub-category-id",
				method: "POST",
				data: { cate_id: cate_id },
				success: function (data) {
					$(".subcate").html(data);
					console.log(data);
				},
				error: function () {
					alert("Error fetching subcategories.");
				},
			});
		} else {
			$(".subcate").html("");
		}
	});
});

// change order status
$(document).ready(function () {
	$(".order-status").on("change", function () {
		const orderStatus = $(this).val();
		const orderId = $(this).data("order-id");
		$.ajax({
			url: BASE_URL + "OrdersController/changeOrderStatus",
			type: "POST",
			data: {
				order_id: orderId,
				orderStatus: orderStatus,
			},
			dataType: "json",
			success: function (response) {
				if (response.success == 1) {
					toastr.success(response.message);
				} else {
					toastr.error("Something went wrong!");
				}
			},
			error: function (xhr, status, error) {
				console.error("Failed to update order status:", error);
			},
		});
	});
});
