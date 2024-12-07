<?php $this->load->view('frontend/includes/links');
$this->load->view('frontend/includes/header'); ?>

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($banners as $index => $bann): ?>
                <div class="carousel-item <?= ($index == 0) ? "active" : ""; ?>">
                    <img class="w-100" src="<?php echo $bann->bann_image ?>" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown"><?php echo $bann->banner_label; ?></h1>
                                    <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                    <a href="" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="assets/frontend/img/about.jpg">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="display-5 mb-4">Best Organic Fruits And Vegetables</h1>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et
                    eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
                <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Feature Start -->
<div class="container-fluid bg-light bg-icon my-5 py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
            style="max-width: 500px;">
            <h1 class="display-5 mb-3">Our Features</h1>
            <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="assets/frontend/img/icon-1.png" alt="">
                    <h4 class="mb-3">Natural Process</h4>
                    <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero
                        dolor duo.</p>
                    <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="assets/frontend/img/icon-2.png" alt="">
                    <h4 class="mb-3">Organic Products</h4>
                    <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero
                        dolor duo.</p>
                    <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="assets/frontend/img/icon-3.png" alt="">
                    <h4 class="mb-3">Biologically Safe</h4>
                    <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero
                        dolor duo.</p>
                    <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->


<!-- Product Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s"
                    style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Popular Products</h1>
                    <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    <?php if (!empty($categories)): ?>
                        <?php $isFirst = true;
                        $i = 0; ?>
                        <?php foreach ($categories as $category): ?>
                            <?php if (!empty($grouped_data[$category->category_id])):
                                $i++; ?>
                                <li class="nav-item me-2">
                                    <a class="btn btn-outline-primary product-category-main border-2 <?php echo $isFirst ? 'active' : ''; ?>"
                                        data-bs-toggle="pill"
                                        href="#category-<?php echo $category->category_id; ?>">
                                        <?php echo $category->category_name ?>
                                    </a>
                                </li>
                                <?php $isFirst = false;
                                if ($i == 4) {
                                    break;
                                } ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <?php if (!empty($categories)): ?>
                <?php $isFirst = true; ?>
                <?php foreach ($categories as $category): ?>
                    <?php if (!empty($grouped_data[$category->category_id])): ?>
                        <div id="category-<?php echo $category->category_id; ?>"
                            class="tab-pane fade <?php echo $isFirst ? 'show active' : ''; ?> p-0">
                            <div class="row g-4">
                                <?php foreach ($grouped_data[$category->category_id] as $product): ?>
                                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp product-main" data-wow-delay="0.1s">
                                        <div class="product-item">
                                            <div class="position-relative bg-light overflow-hidden">
                                                <a class="text-body" href="<?php echo base_url('products/detail/' . $product['product_id']) ?>">
                                                    <img class="img-fluid w-100" style="height: 250px; width: 130px;"
                                                        src="<?php echo base_url($product['product_image']); ?>"
                                                        alt="<?php echo $product['product_name']; ?>">
                                                </a>
                                                <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                                    MOST
                                                </div>
                                            </div>
                                            <div class="text-center p-4">
                                                <a class="d-block h5 mb-2" href="#">
                                                    <?php echo $product['product_name']; ?>
                                                </a>
                                                <span class="text-primary me-1">₹<?php echo number_format($product['price']); ?></span>
                                                <span class="text-body text-decoration-line-through">₹<?php echo number_format($product['mrp']); ?></span>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="w-50 text-center border-end py-2">
                                                    <a class="text-body" href="<?php echo base_url('products/detail/' . $product['product_id']) ?>">
                                                        <i class="fa fa-eye text-primary me-2"></i>View detail
                                                    </a>
                                                </small>
                                                <small class="w-50 text-center py-2">
                                                    <?php if ($product['stock'] > 0) { ?>
                                                        <a class="text-body" onclick="showProductOnCart(<?php echo $product['product_id']; ?>);">
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
                        <?php $isFirst = false; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>


<!-- Firm Visit Start -->
<div class="container-fluid bg-primary bg-icon mt-5 py-6">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-md-7 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-5 text-white mb-3">Visit Our Firm</h1>
                <p class="text-white mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet
                    diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat
                    amet. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.</p>
            </div>
            <div class="col-md-5 text-md-end wow fadeIn" data-wow-delay="0.5s">
                <a class="btn btn-lg btn-secondary rounded-pill py-3 px-5" href="">Visit Now</a>
            </div>
        </div>
    </div>
</div>
<!-- Firm Visit End -->


<!-- Testimonial Start -->
<div class="container-fluid bg-light bg-icon py-6 mb-5">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
            style="max-width: 500px;">
            <h1 class="display-5 mb-3">Customer Review</h1>
            <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item position-relative bg-white p-5 mt-4">
                <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita
                    erat ipsum et lorem et sit.</p>
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
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita
                    erat ipsum et lorem et sit.</p>
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
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita
                    erat ipsum et lorem et sit.</p>
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
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita
                    erat ipsum et lorem et sit.</p>
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


<!-- Blog Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
            style="max-width: 500px;">
            <h1 class="display-5 mb-3">Latest Blog</h1>
            <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid" src="assets/frontend/img/blog-1.jpg" alt="">
                <div class="bg-light p-4">
                    <a class="d-block h5 lh-base mb-4" href="">How to cultivate organic fruits and vegetables in own
                        firm</a>
                    <div class="text-muted border-top pt-4">
                        <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                        <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>01 Jan, 2045</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <img class="img-fluid" src="assets/frontend/img/blog-2.jpg" alt="">
                <div class="bg-light p-4">
                    <a class="d-block h5 lh-base mb-4" href="">How to cultivate organic fruits and vegetables in own
                        firm</a>
                    <div class="text-muted border-top pt-4">
                        <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                        <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>01 Jan, 2045</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <img class="img-fluid" src="assets/frontend/img/blog-3.jpg" alt="">
                <div class="bg-light p-4">
                    <a class="d-block h5 lh-base mb-4" href="">How to cultivate organic fruits and vegetables in own
                        firm</a>
                    <div class="text-muted border-top pt-4">
                        <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                        <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>01 Jan, 2045</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->
<?php $this->load->view('frontend/includes/footer'); ?>