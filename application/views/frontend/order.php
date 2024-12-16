<?php $this->load->view('frontend/includes/links'); ?>
<?php $this->load->view('frontend/includes/header'); ?>
<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Order Page</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Order</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Orders Page Section -->
<div class="container my-5">
    <h2 class="text-center mb-4">Your Orders</h2>

    <!-- Orders List -->
    <div class="row">
        <!-- Loop through each order -->
        <?php if (!empty($orders)): ?>
            <?php foreach ($orders as $order): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-lg border-0 rounded">
                        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                            <h5 class="mb-0">Order #<?php echo $order['order_number']; ?></h5>
                            <span class="badge bg-<?php echo ($order['order_status'] == 'completed') ? 'success' : 'warning'; ?>">
                                <?php echo ucfirst($order['order_status']); ?>
                            </span>
                        </div>
                        <div class="card-body">
                            <!-- Order Summary -->
                            <div class="order-summary mb-4">
                                <h6><strong>Ordered On:</strong> <?php echo date('d M Y, h:i A', strtotime($order['order_date'])); ?></h6>
                                <h6><strong>Total Amount:</strong> ₹<?php echo number_format($order['total_amount'], 2); ?></h6>
                                <h6><strong>Payment Method:</strong> <?php echo ucfirst($order['payment_method']); ?></h6>
                                <h6><strong>Delivery Date:</strong> <?php echo date('d M Y, h:i A', strtotime($order['delivery_date'])); ?></h6>
                            </div>

                            <!-- Payment Status Icon -->
                            <div class="d-flex justify-content-between align-items-center">
                                <span><strong>Status:</strong> <?php echo ucfirst($order['order_status']); ?></span>
                                <div>
    
                                    <?php if ($order['order_status'] == 'completed'): ?>
                                        <i class="fas fa-check-circle text-success"></i>
                                    <?php elseif ($order['order_status'] == 'pending'): ?>
                                        <i class="fas fa-spinner text-warning"></i>
                                    <?php elseif ($order['order_status'] == 'canceled'): ?>
                                        <i class="fas fa-times-circle text-danger"></i>
                                    <?php else: ?>
                                        <i class="fas fa-question-circle text-secondary"></i>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>

                        <!-- Action Buttons -->
                        <div class="card-footer text-center">
                            <a href="<?= base_url('order/details/' . $order['order_id']); ?>" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i> View Details
                            </a>
                            <?php if ($order['order_status'] == 'completed'): ?>
                                <a href="<?= base_url('reorder/' . $order['order_id']); ?>" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-redo-alt"></i> Reorder
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-md-12">
                <div class="alert alert-info text-center">o
                    <strong>No orders found!</strong> You haven't placed any orders yet.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php $this->load->view('frontend/includes/footer'); ?>
<?php if ($this->session->flashdata('success_message')): ?>
    <script type="text/javascript">
        toastr.success("<?php echo $this->session->flashdata('success_message'); ?>");
    </script>
<?php endif; ?>