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
                                <h3>Product List</h3>
                                <a class="btn btn-outline-primary mb-3"
                                    href=<?php echo base_url('product/add-product') ?>><i class="fa fa-plus me-1"></i>
                                    Add
                                    Product</a>
                            </div>

                            <form method="post">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>

                                            <th>Category Name</th>
                                            <th>Sub Category Name</th>
                                            <th>Product Name</th>
                                            <th>Product image</th>
                                            <th>Description</th>
                                            <th>Stock</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>MRP</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($productData) > 0): ?>
                                            <?php foreach ($productData as $product): ?>
                                                <tr>
                                                    <td><?php echo $product->product_id; ?></td>
                                                    <td><?php echo $product->category_name; ?></td>
                                                    <td><?php echo $product->subCategory_name; ?></td>

                                                    <td><?php echo $product->product_name; ?></td>
                                                    <td><img src="<?php echo base_url($product->product_image); ?>"
                                                            alt="Product Image" width="100"></td>
                                                    <td><?php echo $product->description ?></td>
                                                    <td><?php echo $product->stock ?></td>
                                                    <td><?php echo $product->quantity ?></td>
                                                    <td>₹<?php echo number_format($product->price, 2) ?></td>
                                                    <td>₹<?php echo number_format($product->mrp, 2) ?></td>
                                                    <td class="fw-bold text-primary">
                                                        <?php echo ($product->status == 1) ? 'Active' : 'Inactive'; ?></td>
                                                    <td>
                                                        <a class="btn btn-warning"
                                                            href="<?php echo base_url('product/get-product/' . $product->product_id); ?>">Edit</a>
                                                        <a id="delete-btn" class="btn btn-danger"
                                                            href="<?php echo base_url('product/delete-product/' . $product->product_id); ?>"
                                                            onclick="return deleted(this);">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="12" class="text-center">
                                                    <h2>No Product List Found</h2>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

</div>

<?php

$this->load->view('backend/includes/footer.php');

?>