<?php $this->load->view('frontend/includes/links'); ?>
<?php $this->load->view('frontend/includes/header'); ?>
<?php if ($orderDetailsData) {
    $orderDetailsData['billing_data'] = json_decode($orderDetailsData['billing_data'], true);
} ?>

<style>
    .model-design .receipt-container {
        background: #ffffff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    .model-design .receipt-header {
        background-color: #007bff;
        color: white;
        padding: 20px;
        text-align: center;
    }

    .model-design .receipt-header h2 {
        margin: 0;
        font-size: 28px;
        font-weight: 700;
    }

    .model-design .order-details,
    .customer-details {
        padding: 30px;
    }

    .model-design .section-title {
        border-bottom: 2px solid #007bff;
        padding-bottom: 10px;
        margin-bottom: 20px;
        font-weight: 600;
        color: #007bff;
    }

    .model-design .details-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .model-design .details-row p {
        margin: 0;
        font-size: 16px;
    }

    .model-design .details-row strong {
        font-weight: 600;
    }

    .model-design .line-break {
        height: 1px;
        background-color: #ddd;
        margin: 20px 0;
    }

    .model-design .btn-custom {
        margin: 5px;
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 25px;
    }
</style>

<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Order Details</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Order-Details</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card order-summary-card">
                <div class="card-body">
                    <h5 class="card-title">Order Information</h5>
                    <p><strong>Order ID:</strong> #<?= $orderDetailsData['order_number'] ?></p>
                    <p><strong>Order Date:</strong> <?php echo date('d M Y, h:i A', strtotime($orderDetailsData['order_date'])); ?></p>
                    <p><strong>Status:</strong> <span class="badge bg-<?= ($orderDetailsData['order_status'] == 'pending') ? 'warning' : "success" ?> badge-status"><?= $orderDetailsData['order_status'] ?></span></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card order-summary-card">
                <div class="card-body">
                    <h5 class="card-title">Customer Information</h5>
                    <p><strong>Name:</strong> <?php echo $orderDetailsData['billing_data']['fullName']; ?></p>
                    <p><strong>Email:</strong> <?php echo $orderDetailsData['billing_data']['email']; ?></p>
                    <p><strong>Phone:</strong> <?php echo $orderDetailsData['billing_data']['phone']; ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Table -->
    <div class="card order-summary-card">
        <div class="card-body">
            <h5 class="card-title">Products</h5>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orderDetailsData['order_items'] as $order_items): ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="product-thumbnail me-3">
                                            <img src="<?php echo base_url($order_items['product_image']) ?>" alt="Product">
                                        </div>
                                        <span><?php echo $order_items['product_name'] ?></span>
                                    </div>
                                </td>
                                <td>₹<?php echo number_format($order_items['selected_quantity']) ?></td>
                                <td>₹<?php echo number_format($order_items['product_price']) ?></td>
                                <td>₹<?php echo number_format($order_items['total_price']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Grand Total:</th>
                            <th>₹<?php echo number_format($orderDetailsData['total_amount']) ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- Shipping Address & Payment Information -->
    <div class="row">
        <div class="col-md-6">
            <div class="card order-summary-card">
                <div class="card-body">
                    <h5 class="card-title">Shipping Address</h5>
                    <p><?= $orderDetailsData['shipping_address'] ?>,</p>
                    <p><?= $orderDetailsData['billing_data']['city'] ?>, <?= $orderDetailsData['billing_data']['state'] ?> - <?= $orderDetailsData['billing_data']['zipCode'] ?></p>
                    <p>Country</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card order-summary-card">
                <div class="card-body">
                    <h5 class="card-title">Payment Information</h5>
                    <p><strong>Payment Method:</strong> <?= $orderDetailsData['payment_method'] ?></p>
                    <p><strong>Transaction ID:</strong> <?= $orderDetailsData['transaction_id'] ?></p>
                    <p><strong>Status:</strong> <span class="badge bg-<?= ($orderDetailsData['payment_status'] == 'unpaid') ? 'warning' : "success" ?> badge-status"><?= $orderDetailsData['payment_status'] ?></span></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Orders Button -->
    <div class="text-center">
        <a href="<?php echo base_url('order'); ?>" class="btn btn-primary btn-back-orders">Back to My Orders</a>
        <button type="button" class="btn btn-info btn-back-orders" data-bs-toggle="modal" data-bs-target="#receiptModal">
            Show Order Receipt
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade model-design " id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" id="receipt-content">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header receipt-header">
                    <h2 class="modal-title" id="receiptModalLabel">Order Receipt</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Order Details -->
                    <div class="order-details">
                        <h5 class="section-title">Order Details</h5>
                        <div class="details-row">
                            <p><strong>Order Number:</strong></p>
                            <p>#<?= $orderDetailsData['order_number'] ?></p>
                        </div>
                        <div class="details-row">
                            <p><strong>Transaction ID:</strong></p>
                            <p><?= $orderDetailsData['transaction_id'] ?></p>
                        </div>

                        <div class="details-row">
                            <p><strong>Order Date:</strong></p>
                            <p><?php echo date('d M Y, h:i A', strtotime($orderDetailsData['order_date'])); ?></p>
                        </div>
                        <div class="details-row">
                            <p><strong>Payment Method:</strong></p>
                            <p><?= $orderDetailsData['payment_method'] ?></p>
                        </div>
                        <div class="details-row">
                            <p><strong>Order Status:</strong></p>
                            <p><?= $orderDetailsData['order_status'] ?></p>
                        </div>
                        <div class="details-row">
                            <p><strong>Total Amount:</strong></p>
                            <p>₹<?= number_format($orderDetailsData['total_amount']) ?></p>
                        </div>
                    </div>

                    <!-- Line Break -->
                    <div class="line-break"></div>

                    <!-- Customer Information -->
                    <div class="customer-details">
                        <h5 class="section-title">Customer Information</h5>
                        <div class="details-row">
                            <p><strong>Recipient Name:</strong></p>
                            <p><?= $orderDetailsData['billing_data']['fullName'] ?></p>
                        </div>
                        <div class="details-row">
                            <p><strong>Address:</strong></p>
                            <p><?= $orderDetailsData['shipping_address'] ?><br><?= $orderDetailsData['billing_data']['city'] ?>, <?= $orderDetailsData['billing_data']['state'] ?>, <?= $orderDetailsData['billing_data']['zipCode'] ?></p>
                        </div>

                        <div class="details-row">
                            <p><strong>Phone Number:</strong></p>
                            <p>+91 <?= $orderDetailsData['billing_data']['phone'] ?></p>
                        </div>
                        <div class="details-row">
                            <p><strong>Email Address:</strong></p>
                            <p><?= $orderDetailsData['billing_data']['email'] ?></p>
                        </div>
                        <div class="details-row">
                            <p><strong>Delivery Date:</strong></p>
                            <p><?php echo date('d M Y, h:i A', strtotime($orderDetailsData['delivery_date'])); ?></p>
                        </div>
                    </div>
                </div>


                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button onclick="generatePDF()" class="btn btn-primary btn-custom">
                        <i class="fas fa-print"></i> Print Receipt
                    </button>
                    <button type="button" class="btn btn-secondary btn-custom" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('frontend/includes/footer'); ?>

<?php if ($this->session->flashdata('success_message')): ?>
    <script type="text/javascript">
        toastr.success("<?php echo $this->session->flashdata('success_message'); ?>");
    </script>
<?php endif; ?>
<script>
    function generatePDF() {
        const receiptContent = document.getElementById('receipt-content');
        const options = {
            margin: [20, 20, 20, 20],
            filename: "order_receipt.pdf",
            image: {
                type: "jpeg",
                quality: 0.98
            },
            html2canvas: {
                scale: 2,
                logging: true,
                useCORS: true
            },
            jsPDF: {
                unit: "mm",
                format: "a4",
                orientation: "portrait"
            },
        };
        html2pdf().from(receiptContent).set(options).save();
    }
</script>