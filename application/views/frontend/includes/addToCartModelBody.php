<div class="row">
    <div class="col-md-5 text-center">
        <img src="<?php echo base_url($product->product_image); ?>" alt="Product Image" class="img-fluid rounded shadow-md mb-3">
    </div>
    <div class="col-md-7">
        <h4 class="text-primary fw-bold"><?php echo $product->product_name; ?></h4>
        <hr class="text-muted">
        <p class="text-muted"><?php echo $product->description; ?></p>
        <hr class="text-muted">
        <p><strong>Price:</strong> <span class="text-success">₹<?php echo $product->price; ?></span></p>
        <hr class="text-muted">
        <p><strong>Available Stock:</strong>
            <?php if ($product->stock > 0) { ?>
                <span class="text-success"><?php echo $product->stock; ?> in stock</span>
            <?php } else { ?>
                <span class="text-danger">Out of Stock</span>
            <?php } ?>
        </p>
        <hr class="text-muted">
        <div class="d-flex align-items-center mb-3">
            <label class="me-3 fw-bold">Quantity:</label>
            <input type="number" name="selected_product_quantity" class="form-control w-25 text-center shadow-sm" value="" min="1" max="100">
        </div>
        <input type="hidden" name="available_product_quantity" id="available_product_quantity" value="<?php echo $product->stock; ?>">
        <input type="hidden" name="prodcut_id" id="prodcut_id" value="<?php echo $product->product_id; ?>">
    </div>
</div>