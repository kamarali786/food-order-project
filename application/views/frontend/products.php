<?php
$this->load->view('frontend/includes/links');
$this->load->view('frontend/includes/header');
?>
<!-- Page Header Start -->
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
<!-- Page Header End -->
<!-- Product Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-4">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Our Products</h1>
                    <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
            </div>
            <div class="col-lg-8 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    <!-- "All Products" tab (default) -->
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary product-category-main border-2 active"
                            data-bs-toggle="pill" href="#all-products">
                            All Products
                        </a>
                    </li>

                    <!-- Category tabs -->
                    <?php if (!empty($categories)): ?>
                        <?php $isFirst = false;
                        $i = 0 ?>
                        <?php foreach ($categories as $category): ?>
                            <?php if (!empty($products_data[$category->category_id])):
                                $i++; ?>
                                <li class="nav-item me-2">
                                    <a class="btn btn-outline-primary product-category-main border-2"
                                        data-bs-toggle="pill"
                                        href="#category-<?php echo $category->category_id; ?>">
                                        <?php echo $category->category_name ?>
                                    </a>
                                </li>
                                <?php if ($i == 4) {
                                    break;
                                } ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <!-- Show All Products by default -->
            <div id="all-products" class="tab-pane fade show active p-0">
                <div class="row g-4">
                    <?php foreach ($products_data as $categoryId => $products): ?>
                        <?php foreach ($products as $product): ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp product-main" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <a class="d-block h5 mb-2" href="<?php echo base_url('products/detail/' . $product['product_id']) ?>">
                                            <img class="img-fluid w-100" style="height: 250px; width: 130px;"
                                                src="<?php echo base_url($product['product_image']); ?>"
                                                alt="<?php echo $product['product_name']; ?>">
                                        </a>
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="<?php echo base_url('products/detail/' . $product['product_id']) ?>">
                                            <?php echo $product['product_name']; ?>
                                        </a>
                                        <span class="text-primary me-1">₹<?php echo $product['mrp']; ?></span>
                                        <span class="text-body text-decoration-line-through">₹<?php echo $product['price']; ?></span>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href="<?php echo base_url('products/detail/' . $product['product_id']) ?>">
                                                <i class="fa fa-eye text-primary me-2"></i>View detail
                                            </a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <?php if ($product['stock'] > 0) { ?>
                                                <a class="text-body" onclick="addToCartProduct(<?php echo $product['product_id']; ?>);">
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
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Category-wise products -->
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <?php if (!empty($products_data[$category->category_id])): ?>
                        <div id="category-<?php echo $category->category_id; ?>"
                            class="tab-pane fade p-0">
                            <div class="row g-4">
                                <?php foreach ($products_data[$category->category_id] as $product): ?>
                                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp product-main" data-wow-delay="0.1s">
                                        <div class="product-item">
                                            <div class="position-relative bg-light overflow-hidden">
                                                <a class="d-block h5 mb-2" href="<?php echo base_url('products/detail/' . $product['product_id']) ?>">
                                                    <img class="img-fluid w-100" style="height: 250px; width: 130px;"
                                                        src="<?php echo base_url($product['product_image']); ?>"
                                                        alt="<?php echo $product['product_name']; ?>">
                                                </a>
                                            </div>
                                            <div class="text-center p-4">
                                                <a class="d-block h5 mb-2" href="<?php echo base_url('products/detail/' . $product['product_id']) ?>">
                                                    <?php echo $product['product_name']; ?>
                                                </a>
                                                <span class="text-primary me-1">₹<?php echo $product['mrp']; ?></span>
                                                <span class="text-body text-decoration-line-through">₹<?php echo $product['price']; ?></span>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="w-50 text-center border-end py-2">
                                                    <a class="text-body" href="<?php echo base_url('products/detail/' . $product['product_id']) ?>">
                                                        <i class="fa fa-eye text-primary me-2"></i>View detail
                                                    </a>
                                                </small>
                                                <small class="w-50 text-center py-2">
                                                    <?php if ($product['stock'] > 0) { ?>
                                                        <a class="text-body" onclick="addToCartProduct(<?php echo $product['product_id']; ?>);">
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
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</div>
<!-- Product End -->


<!-- Firm Visit Start -->
<div class="container-fluid bg-primary bg-icon mt-5 py-6">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-md-7 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-5 text-white mb-3">Visit Our Firm</h1>
                <p class="text-white mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.</p>
            </div>
            <div class="col-md-5 text-md-end wow fadeIn" data-wow-delay="0.5s">
                <a class="btn btn-lg btn-secondary rounded-pill py-3 px-5" href="">Visit Now</a>
            </div>
        </div>
    </div>
</div>
<!-- Firm Visit End -->


<!-- Testimonial Start -->
<div class="container-fluid bg-light bg-icon py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Customer Review</h1>
            <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item position-relative bg-white p-5 mt-4">
                <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                <div class="d-flex align-items-center">
                    <img class="flex-shrink-0 rounded-circle" src="assets/frontend/img/testimonial-1.jpg" alt="">
                    <div class="ms-3">
                        <h5 class="mb-1">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-item position-relative bg-white p-5 mt-4">
                <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                <div class="d-flex align-items-center">
                    <img class="flex-shrink-0 rounded-circle" src="assets/frontend/img/testimonial-2.jpg" alt="">
                    <div class="ms-3">
                        <h5 class="mb-1">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-item position-relative bg-white p-5 mt-4">
                <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                <div class="d-flex align-items-center">
                    <img class="flex-shrink-0 rounded-circle" src="assets/frontend/img/testimonial-3.jpg" alt="">
                    <div class="ms-3">
                        <h5 class="mb-1">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-item position-relative bg-white p-5 mt-4">
                <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                <div class="d-flex align-items-center">
                    <img class="flex-shrink-0 rounded-circle" src="assets/frontend/img/testimonial-4.jpg" alt="">
                    <div class="ms-3">
                        <h5 class="mb-1">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<?php
$this->load->view('frontend/includes/footer');
?>