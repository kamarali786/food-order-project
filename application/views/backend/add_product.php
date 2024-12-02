<?php
$this->load->view('backend/includes/links.php');
$this->load->view('backend/includes/header.php');
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="col-xl-9">
                <h4 class="card-title mb-4 text-uppercase">
                    <?php echo !empty($editData) ? 'Edit' : 'Add'; ?> New Product
                </h4>

                <!-- Flash message for errors -->
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-body">
                        <!-- Dynamic form action for Add or Edit -->
                        <form action="<?php echo base_url('product/' . (!empty($editData) ? 'edit-product/' . $editData->subCategory_id : 'add-product')) ?>" class="form-horizontal" enctype="multipart/form-data" method="post">
                            <!-- If editing, show existing data -->
                            <?php if (!empty($editData)): ?>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Choose Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="Category_id" id="categorySelect">
                                            <?php if ($CategoryData):
                                                foreach ($CategoryData as $Category): ?>
                                                    <option value="<?php echo $Category->category_id?>"><?php echo $Category->category_name ?>

                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <span class="text-danger"><?php echo $this->session->flashdata('subCategory_error'); ?></span>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Choose subCategory</label>
                                    <div class="col-sm-9">
                                        <select class="form-select subcate" name="subCategory_id">

                                        </select>
                                        <span class="text-danger"><?php echo $this->session->flashdata('subCategory_error'); ?></span>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="product_name" class="form-control" id="horizontal-firstname-input" value="<?php echo set_value('product_name', $this->session->flashdata('product_name') ?? $editData->product_name); ?>">
                                        <span class="text-danger"><?php echo $this->session->flashdata('productName_error'); ?></span>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" name="description" class="form-control" id="horizontal-firstname-input"><?php echo set_value('description', $this->session->flashdata('description') ?? $editData->description); ?></textarea>
                                        <span class="text-danger"><?php echo $this->session->flashdata('description_error'); ?></span>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product stock</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="stock" class="form-control" id="horizontal-firstname-input" value="<?php echo set_value('product_name', $this->session->flashdata('stock') ?? $editData->stock); ?>">
                                        <span class="text-danger"><?php echo $this->session->flashdata('stock_error'); ?></span>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product Quantity (Kg,mg)</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="quantity" class="form-control" id="horizontal-firstname-input" value="<?php echo set_value('product_name', $this->session->flashdata('quantity') ?? $editData->quantity); ?>">
                                        <span class="text-danger"><?php echo $this->session->flashdata('quantity_error'); ?></span>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="price" class="form-control" id="horizontal-firstname-input" value="<?php echo set_value('product_name', $this->session->flashdata('price') ?? $editData->price); ?>">
                                        <span class="text-danger"><?php echo $this->session->flashdata('price_error'); ?></span>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product MRP</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="mrp" class="form-control" id="horizontal-firstname-input" value="<?php echo set_value('product_name', $this->session->flashdata('mrp') ?? $editData->mrp); ?>">
                                        <span class="text-danger"><?php echo $this->session->flashdata('mrp_error'); ?></span>
                                    </div>
                                </div>

                                <div class="row my-4 ">
                                    <label for="horizontal-firstname-input" class="  col-sm-3 col-form-label">Current Product Image</label>
                                    <div class="col-sm-6">
                                        <!-- Show existing subCategory image if editing -->
                                        <img src="<?php echo base_url($editData->product_image); ?>" alt="Current subCategory" width="100" class="mb-4 img-fluid subCategory-img">
                                        <input name="file" type="file" class="form-control mt-2" id="horizontal-firstname-input">
                                        <p class="text-primary mt-1 fw-bolder">Note: Size of the image should be less than 1 MB</p>
                                        <?php if ($this->session->flashdata('file_error')) { ?>
                                            <span class="text-danger"><?php echo $this->session->flashdata('file_error'); ?></span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <div class="form-check mb-4">
                                            <input type="checkbox" class="form-check-input" id="horizontalLayout-check" name="status" <?php echo ($editData->status == 1) ? "checked" : ""; ?>>
                                            <label for="horizontalLayout-check" class="form-check-label">Activate</label>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary mt-2" type="submit">Save Changes</button>
                                            <button class="btn btn-danger mt-2" type="button"><a href="<?php echo base_url('product'); ?>" class="text-white">Back</a></button>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <!-- For Adding New product -->
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Choose Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="subCategory_id" id="categorySelect">
                                            <?php if ($CategoryData):
                                                foreach ($CategoryData as $Category): ?>
                                                    <option value="<?php echo $Category->category_id ?>"><?php echo $Category->category_name ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <span class="text-danger"><?php echo $this->session->flashdata('subCategory_error'); ?></span>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Choose subCategory</label>
                                    <div class="col-sm-9">
                                        <select class="form-select subcate" name="subCategory_id">

                                        </select>
                                        <span class="text-danger"><?php echo $this->session->flashdata('subCategory_error'); ?></span>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="product_name" class="form-control" id="horizontal-firstname-input" value="<?php echo $this->session->flashdata('product_name') ?>">
                                        <span class="text-danger"><?php echo $this->session->flashdata('productName_error'); ?></span>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" name="description" class="form-control" id="horizontal-firstname-input"><?php echo $this->session->flashdata('description') ?></textarea>
                                        <span class="text-danger"><?php echo $this->session->flashdata('description_error'); ?></span>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product stock</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="stock" class="form-control" id="horizontal-firstname-input" value="<?php echo $this->session->flashdata('stock') ?>">
                                        <span class="text-danger"><?php echo $this->session->flashdata('stock_error'); ?></span>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product Quantity (Kg,mg)</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="quantity" class="form-control" id="horizontal-firstname-input" value="<?php echo $this->session->flashdata('quantity') ?>">
                                        <span class="text-danger"><?php echo $this->session->flashdata('quantity_error'); ?></span>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="price" class="form-control" id="horizontal-firstname-input" value="<?php echo $this->session->flashdata('price') ?>">
                                        <span class="text-danger"> <?php echo $this->session->flashdata('price_error'); ?></span>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product MRP</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="mrp" class="form-control" id="horizontal-firstname-input" value="<?php echo $this->session->flashdata('mrp') ?>">
                                        <span class="text-danger"><?php echo $this->session->flashdata('mrp_error'); ?></span>
                                    </div>
                                </div>

                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Choose Product Image</label>
                                    <div class="col-sm-6">
                                        <input name="file" type="file" class="form-control" id="horizontal-firstname-input">
                                        <p class="text-primary mt-1 fw-bolder">Note: Size of the image should be less than 1 MB</p>
                                        <?php if ($this->session->flashdata('file_error')) { ?>
                                            <span class="text-danger"><?php echo $this->session->flashdata('file_error') ?></span>
                                        <?php } ?>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-9">
                                            <div class="form-check mb-4">
                                                <input type="checkbox" class="form-check-input" id="horizontalLayout-check" name="status" checked>
                                                <label for="horizontalLayout-check" class="form-check-label">Activate</label>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary mt-2" type="submit">Add Product</button>
                                                <button class="btn btn-danger mt-2" type="button"><a href="<?php echo base_url('product'); ?>" class="text-white">Back</a></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                        </form>
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