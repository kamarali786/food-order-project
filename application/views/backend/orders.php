<?php
$this->load->view('backend/includes/links.php');
$this->load->view('backend/includes/header.php');
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>

                            <div class="d-flex justify-content-between mb-3 mt-3">
                                <h3>Orders List</h3>
                            </div>

                            <form method="post">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order ID</th>
                                            <th>Order Number</th>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Total Amount</th>
                                            <th>Order Status</th>
                                            <th>Payment Status</th>
                                            <th>Order Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($orders)): ?>
                                            <?php foreach ($orders as $index => $order): ?>
                                                <tr>
                                                    <?php $order['billing_data'] = json_decode($order['billing_data'], true); ?>

                                                    <td><?= $index + 1; ?></td>
                                                    <td><?= $order['order_id']; ?></td>
                                                    <td>#<?= $order['order_number']; ?></td>
                                                    <td><?= $order['billing_data']['fullName']; ?></td>
                                                    <td><?= $order['billing_data']['email']; ?></td>
                                                    <td><?= $order['billing_data']['phone']; ?></td>
                                                    <td>₹<?= number_format($order['total_amount'], 2); ?></td>
                                                    <td>
                                                        <form method="post" action="<?= base_url('orders/update-status'); ?>">
                                                            <input type="hidden" name="order_id" value="<?= $order['order_id']; ?>">
                                                            <select name="order_status" class="order-status form-control form-control-sm" data-order-id="<?= $order['order_id']; ?>">
                                                                <option value="Pending" <?= $order['order_status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                                                <option value="Processing" <?= $order['order_status'] == 'Processing' ? 'selected' : ''; ?>>Processing</option>
                                                                <option value="Completed" <?= $order['order_status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                                                                <option value="Cancelled" <?= $order['order_status'] == 'Cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                                                            </select>
                                                        </form>
                                                    </td>
                                                    <td><?= ucfirst($order['payment_status']); ?></td>
                                                    <td><?= date('d M Y, h:i A', strtotime($order['order_date'])); ?></td>
                                                    <td>
                                                        <a class="btn btn-info btn-sm" href="<?= base_url('orders/view/' . $order['order_id']); ?>">View</a>
                                                        <a class="btn btn-danger btn-sm" href="<?= base_url('orders/delete/' . $order['order_id']); ?>" onclick="return deleted(this);">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="10" class="text-center">No orders found</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$this->load->view('backend/includes/footer.php');
?>