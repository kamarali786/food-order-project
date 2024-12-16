<?php
$this->load->view('frontend/includes/links');
$this->load->view('frontend/includes/header');
?>
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Products</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Products</li>
            </ol>
        </nav>
    </div>
</div>

<h1 class="display-5 section-header mb-3 d-flex justify-content-center text-primary animated slideInDown">Product Detail</h1>

<div class="container my-5">
    <div class="row">
        <!-- Product Image and Gallery -->
        <div class="col-lg-6 mb-4">
            <!-- Main Image -->
            <div class="mb-4 card shadow-sm rounded">
                <img src="<?php echo base_url($product->product_image); ?>" alt="Product Image" class="product-image img-fluid rounded">
            </div>
            <!-- Image Gallery (Optional) -->
            <!-- 
            <div class="product-gallery d-flex justify-content-between gap-2">
                <img src="path_to_product_image_1.jpg" alt="Thumbnail 1" class="img-fluid rounded" >
                <img src="path_to_product_image_2.jpg" alt="Thumbnail 2" class="img-fluid rounded" >
                <img src="path_to_product_image_3.jpg" alt="Thumbnail 3" class="img-fluid rounded" >
            </div>
            -->
        </div>

        <!-- Product Details -->
        <div class="col-lg-6">
            <div class="product-card p-4 bg-white shadow-sm rounded">
                <h2 class="mb-3 text-primary"><?php echo $product->product_name; ?></h2>

                <h4 class="text-muted mb-3">Product Description</h4>
                <p class="text-muted"><?php echo $product->description; ?></p>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <span class="product-price display-6 text-success">₹<?php echo number_format($product->price, 2); ?></span>
                        <span class="old-price ms-2 text-decoration-line-through text-muted">₹<?php echo number_format($product->mrp, 2); ?></span>
                    </div>
                    <span class="badge bg-success text-white"><?php echo ($product->stock > 0) ? "In Stock" : "Out of Stock"; ?></span>
                </div>

                <?php if ($product->stock > 0): ?>
                    <a class="btn btn-primary w-100 py-3 rounded-pill" onclick="showProductOnCart(<?php echo $product->product_id; ?>);">
                        <i class="fa fa-shopping-bag me-2"></i> Add to Cart
                    </a>
                <?php else: ?>
                    <button class="btn btn-danger w-100 py-3 rounded-pill" disabled>
                        <i class="fa fa-times-circle me-2"></i> Out of Stock
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Related Products Section -->
    <div class="row mt-5">
        <h3 class="mb-3 d-flex justify-content-center text-primary animated slideInDown">Related Product</h4>
            <h3 class="mb-3 d-flex justify-content-center text-primary animated slideInDown section-header">
                </h4>

                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <?php foreach ($related_products as $related_product): ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <a class="d-block h5 mb-2" href="<?php echo base_url('products/detail/' . $related_product->product_id) ?>">
                                            <img class="img-fluid w-100" style="height: 250px; width: 130px;" src="<?php echo base_url($related_product->product_image) ?>" alt="">
                                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">Relate</div>
                                        </a>
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="<?php echo base_url('products/detail/' . $product->product_id) ?>"><?php echo $related_product->product_name ?></a>
                                        <span class="text-primary me-1">₹<?php echo number_format($related_product->price, 2) ?></span>
                                        <span class="text-body text-decoration-line-through">₹<?php echo number_format($related_product->mrp, 2) ?></span>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <?php if ($related_product->stock > 0) { ?>
                                                <a class="text-body" onclick="showProductOnCart(<?php echo $related_product->product_id; ?>);">
                                                    <i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart
                                                </a>
                                            <?php } else { ?>
                                                <a style="color:red"><strong>Out Of Stock</strong></a>
                                            <?php } ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
    </div>


</div>

<?php
$this->load->view('frontend/includes/footer');
?>