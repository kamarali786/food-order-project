<?php
$this->load->view('backend/includes/links.php');
$this->load->view('backend/includes/header.php');
?>
<div class="main-content">
    <div class="page-content order-details">
        <div class="container-fluid">

            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <?php if ($orderItems): ?>
                            <div class="container">
                                <h3 class="page-title">Order Details</h3>
                                <!-- Order Information -->
                                <div class="order-summary">
                                    <h4>Order ID: <?= $orderItems['order_id']; ?></h4>
                                    <h4>Order Number: #<?= $orderItems['order_number']; ?></h4>
                                    <p><strong>Order Date:</strong> <?= date('d M Y, h:i A', strtotime($orderItems['order_date'])); ?></p>
                                    <p><strong>Status:</strong>
                                        <span class="badge <?= ($orderItems['order_status'] == 'pending') ? 'badge-warning' : 'badge-success'; ?>">
                                            <?= ucfirst($orderItems['order_status']); ?>
                                        </span>
                                    </p>
                                </div>
    
                                <!-- Customer Information -->
                                <div class="customer-info">
                                    <h5>Customer Information</h5>
                                    <?php $orderItems['billing_data']  = json_decode($orderItems['billing_data'], true); ?>
                                    <p><strong>Name:</strong> <?= $orderItems['billing_data']['fullName']; ?></p>
                                    <p><strong>Email:</strong> <?= $orderItems['billing_data']['email']; ?></p>
                                    <p><strong>Phone:</strong> <?= $orderItems['billing_data']['phone']; ?></p>
                                    <p><strong>Address:</strong> <?= $orderItems['shipping_address']; ?></p>
                                </div>
                                
                                <!-- Products in the Order -->
                                <div class="order-products">
                                    <h5>Products in the Order</h5>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($orderItems['order_items'] as $item): ?>
                                                <tr>
                                                    <td><img style="height: 50px; width: 50px;" src="<?= $item['product_image']?>" alt="Customer Image" /></td>
                                                    <td><?= $item['product_name']; ?></td>
                                                    <td><?= $item['selected_quantity']; ?></td>
                                                    <td><?= number_format($item['product_price'], 2); ?> INR</td>
                                                    <td><?= number_format($item['total_price'], 2); ?> INR</td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                </div>
    
                                <!-- Order Total -->
                                <div class="order-total">
                                    <h5>Total Amount: <?= number_format($orderItems['total_amount'], 2); ?> INR</h5>
                                </div>
    
                                <!-- Actions -->
                                <div class="action-buttons">
                                    <a href="<?= base_url('orders'); ?>" class="btn btn-secondary">Back to Orders</a>
                                    <a href="<?= base_url('orders/print_order/' . $orderItems['order_id']); ?>" class="btn btn-primary">Print Order</a>
                                </div>
                            </div>
                        <?php else: ?>
                            <p class="no-orders-message">Order not found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    </div>
    <?php
    $this->load->view('backend/includes/footer.php');
    ?>
                                

