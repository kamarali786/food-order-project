<div class="row">
    <div class="col-md-5 text-center">
        <img src="<?php echo base_url($product->product_image); ?>" alt="Product Image" class="img-fluid rounded shadow-sm">
    </div>
    <div class="col-md-7">
        <h4 class="text-primary"><?php echo $product->product_name; ?></h4>
        <p class="text-muted"><?php echo $product->description; ?></p>
        <p><strong>Price:</strong> ₹<?php echo $product->price; ?></p>
        <p><strong>Available Stock:</strong> <?php echo $product->stock; ?></p>
        <div class="d-flex align-items-center">
            <label class="me-2">Quantity:</label>
            <input type="number" class="form-control w-25 text-center" value="1" min="1">
        </div>
    </div>
</div>