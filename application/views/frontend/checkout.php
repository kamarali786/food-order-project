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
    <form action="<?php echo base_url('checkout') ?>" method="POST" id="checkout">
        <div class="row">
            <div class="col-md-8 checkout billing-infomation-section" style="display: block;">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-5 card-header">Billing Information</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter Name" value="<?= set_value('fullName', (!empty($userData->fname) && !empty($userData->lname)) ? $userData->fname . ' ' . $userData->lname : $this->session->flashdata('fullName')); ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Contact Number" value="<?= set_value('phone', $this->session->flashdata('phone') ?? $userData->phone); ?>" placeholder="Enter Phone Number">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?= set_value('email', $this->session->flashdata('email') ?? $userData->email);?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="address">Biling / shiping Address (Area and Street)</label>
                                <textarea id="address" name="address" class="form-control" rows="5" placeholder="Enter biling Address"><?= set_value('address', $this->session->flashdata('address') ?? $userData->address); ?></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="city">City/District/Town</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="<?= set_value('city', $this->session->flashdata('city') ?? $userData->city); ?>" placeholder="Enter City">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="state">state</label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" value="<?= set_value('state', $this->session->flashdata('state') ?? $userData->state); ?>" placeholder="Enter State">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="country">country</label>
                                <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" value="<?= set_value('country', $this->session->flashdata('country') ?? $userData->country); ?>" placeholder="Enter Country">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="zipCode">Zip Code</label>
                                <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="Enter Zip code" value="<?= set_value('zipCode', $this->session->flashdata('zipCode') ?? ""); ?>" placeholder="Enter Zipcode">
                            </div>
                        </div>
                        <button type="button" class="btn btn-checkout procees-to-payment-btn">Proceed to Payment</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 checkout order-summery-section" style="display: block;">
                <div class="order-summary">
                    <h4 class="card-header">Order Summary</h4>
                    <div class="order-items-container">
                        <ul class="list-group">
                            <?php if (!empty($cartData)): $grandTotal = 0;
                                foreach ($cartData as $cartItems): ?>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div class="d-flex">
                                            <div class="product-thumbnail me-3">
                                                <img src="<?= base_url($cartItems['product_image']) ?>" alt="Product">
                                            </div>
                                            <div>
                                                <p class="mb-0"><?php echo $cartItems['product_name'] ?></p>
                                                <small class="text-muted">x <?php echo $cartItems['selected_quantity'] ?></small>
                                            </div>
                                        </div>
                                        <span>₹<?= number_format($cartItems['total_price']);
                                                $grandTotal += $cartItems['total_price'] ?></span>

                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span class="checkout card-header" style="font-weight: 900; font-size: larger;">Total :</span>
                        <p class="total-price">₹<?php echo number_format($grandTotal); ?></p>
                        <?php $this->session->set_flashdata('total_amount', $grandTotal); ?>
                    </div>
                </div>
            </div>
            <div class="payment-container payment-method-section" style="display: none;">
                <h3 class="payment-header">Select Payment Method</h3>
                <div class="mb-3 payment-method">
                    <label class="d-flex align-items-center">
                        <input type="radio" name="paymentMethod" value="credit_card">
                        <span>Credit/Debit Card</span>
                    </label>
                </div>
                <div class="mb-3 payment-method">
                    <label class="d-flex align-items-center">
                        <input type="radio" name="paymentMethod" value="paypal">
                        <span>PayPal</span>
                    </label>
                </div>
                <div class="mb-3 payment-method">
                    <label class="d-flex align-items-center">
                        <input type="radio" name="paymentMethod" value="net_banking">
                        <span>Net Banking</span>
                    </label>
                </div>
                <div class="mb-3 payment-method">
                    <label class="d-flex align-items-center">
                        <input type="radio" name="paymentMethod" value="upi">
                        <span>UPI/QR Code</span>
                    </label>
                </div>
                <div class="mb-3 payment-method">
                    <label class="d-flex align-items-center">
                        <input type="radio" name="paymentMethod" value="cash_on_delivery">
                        <span>Cash on Delivery</span>
                    </label>
                </div>
                <button type="submit" class="submit-btn">Proceed to Payment</button>
            </div>
        </div>
    </form>
</div>

<?php
$this->load->view('frontend/includes/footer');
?>