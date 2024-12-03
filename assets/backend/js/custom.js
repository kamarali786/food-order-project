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