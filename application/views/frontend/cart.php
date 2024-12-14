<?php $this->load->view('frontend/includes/links');
$this->load->view('frontend/includes/header'); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Shopping Cart</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Shopping Cart</li>
            </ol>
        </nav>
    </div>
</div>

<section class="h-100">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100 add-to-cart-main">
            <div class="col-10">
                <?php if (isset($cartData) && !empty($cartData)) { ?>
                    <?php foreach ($cartData as $item) { ?>
                        <div class="card rounded-3 mb-4" id="productDelete<?php echo $item['product_id'] ?>">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img
                                            src="<?= base_url($item['product_image']) ?>"
                                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal mb-2"><?= $item['product_name'] ?></p>
                                        <p><span class="text-muted">Price: </span> <span class="text-success">₹<?php echo number_format($item['price']) ?> </span></p>
                                        <p><span class="text-muted">Quantity: </span> <span class="text-success"><?php echo $item['quantity'] ?> </span></p>
                                        <p><span class="text-muted">Product Stock: </span> <span class="text-success" id="stock"><?php echo $item['stock'] ?> </span></p>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                        <input id="quantity"
                                            min="0"
                                            name="quantity"
                                            data-product-id="<?php echo $item['product_id']; ?>"
                                            data-actual-stock="<?php echo $item['stock'] ?>"
                                            value="<?php echo $item['selected_quantity'] ?>"
                                            type="number"
                                            step="1"
                                            class="form-control form-control-sm" />

                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <h5 class="mb-0 cart-item-total-price-of-product">₹<?php echo number_format($item['total_price']) ?></h5>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <a type="button" class="text-danger" onclick="deleteItemFromCart(<?php echo $item['product_id'] ?>)"><i class="fas fa-trash fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="card">
                        <div class="card-body">
                            <a style="float: right;" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-block btn-lg" href="<?= base_url('checkout');?>">Proceed to Pay</a>
                            <a href="<?php echo base_url('products') ?>" style="float: left;" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-block btn-lg">Continue Shopping</a>
                        </div>
                    </div>
                <?php } else { // If cartData is empty 
                ?>
                    <div class=" dataNotFound card rounded-3 mb-4">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <p><strong>No Data Found!</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('frontend/includes/footer'); ?>