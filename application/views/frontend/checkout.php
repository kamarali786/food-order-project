<?php
$this->load->view('frontend/includes/links');
$this->load->view('frontend/includes/header');
?>
<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Checkout</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Checkout</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container" style="margin-top: 100px;">
    <div class="row">
        <!-- Checkout Form -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body checkout">
                    <h4 class="mb-5 card-header">Billing Information</h4>
                    <form action="process_checkout.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="address">Shipping Address</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="zipcode">Zip Code</label>
                                <input type="text" class="form-control" id="zipcode" name="zipcode" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="payment-method">Payment Method</label>
                                <select class="form-control" id="payment-method" name="payment-method" required>
                                    <option value="credit-card">Credit Card</option>
                                    <option value="paypal">PayPal</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-checkout">Proceed to Payment</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-md-4">
    <div class="order-summary">
        <h4>Order Summary</h4>
        <div class="order-items-container">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between">
                    <div class="d-flex">
                        <div class="product-thumbnail me-3">
                            <img src="product_image.jpg" alt="Product">
                        </div>
                        <div>
                            <p class="mb-0">Product Name</p>
                            <small class="text-muted">x1</small>
                        </div>
                    </div>
                    <span>₹1000</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div class="d-flex">
                        <div class="product-thumbnail me-3">
                            <img src="product_image.jpg" alt="Product">
                        </div>
                        <div>
                            <p class="mb-0">Product Name</p>
                            <small class="text-muted">x1</small>
                        </div>
                    </div>
                    <span>₹1000</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div class="d-flex">
                        <div class="product-thumbnail me-3">
                            <img src="product_image.jpg" alt="Product">
                        </div>
                        <div>
                            <p class="mb-0">Product Name</p>
                            <small class="text-muted">x1</small>
                        </div>
                    </div>
                    <span>₹1000</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div class="d-flex">
                        <div class="product-thumbnail me-3">
                            <img src="product_image.jpg" alt="Product">
                        </div>
                        <div>
                            <p class="mb-0">Product Name</p>
                            <small class="text-muted">x2</small>
                        </div>
                    </div>
                    <span>₹2000</span>
                </li>
                <!-- Add more products here -->
            </ul>
        </div>
        <hr>
        <div class="d-flex justify-content-between">
            <p>Total</p>
            <p class="total-price">₹3000</p>
        </div>
    </div>
</div>

    </div>
</div>

<?php
$this->load->view('frontend/includes/footer');
?>
