<?php
$this->load->view('backend/includes/links.php');
$this->load->view('backend/includes/header.php');
?>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="col-xl-9">
                <h4 class="card-title mb-4 text-uppercase">
                    <?php echo !empty($editData) ? 'Edit' : 'Add'; ?> New category
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
                        <form action="<?php echo base_url('category/' . (!empty($editData) ? 'edit-category/' . $editData->category_id : 'add-category')) ?>" class="form-horizontal" enctype="multipart/form-data" method="post">
                            <!-- If editing, show existing data -->
                            <?php if (!empty($editData)): ?>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="category_name" class="form-control" id="horizontal-firstname-input" value="<?php echo $editData->category_name?>">
                                        <span class="text-danger"><?php echo $this->session->flashdata('categoryName_error');?></span>
                                    </div>
                                </div>

                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Current category Image</label>
                                    <div class="col-sm-6">
                                        <!-- Show existing category image if editing -->
                                        <img src="<?php echo base_url($editData->cate_image); ?>" alt="Current category" width="100" class="img-fluid category-img">
                                        <input name="file" type="file" class="form-control mt-2" id="horizontal-firstname-input">
                                        <p class="text-primary mt-1 fw-bolder">Note: Size of the image should be less than 1 MB</p>
                                        <?php if ($this->session->flashdata('file_error')) { ?>
                                            <span class="text-danger"><?php echo $this->session->flashdata('file_error');?></span> 
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
                                            <button class="btn btn-danger mt-2" type="button"><a href="<?php echo base_url('category'); ?>" class="text-white">Back</a></button>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <!-- For Adding New category -->
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="category_name" class="form-control" id="horizontal-firstname-input" value="<?php echo $this->session->flashdata('categoryName')?>">
                                        <span class="text-danger"><?php echo $this->session->flashdata('categoryName_error');?></span>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Choose category Image</label>
                                    <div class="col-sm-6">
                                        <input name="file" type="file" class="form-control" id="horizontal-firstname-input">
                                        <p class="text-primary mt-1 fw-bolder">Note: Size of the image should be less than 1 MB</p>
                                        <?php if ($this->session->flashdata('file_error')) { ?>
                                            <span class="text-danger"><?php echo $this->session->flashdata('file_error');?></span> 
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <div class="form-check mb-4">
                                            <input type="checkbox" class="form-check-input" id="horizontalLayout-check" name="status" checked>
                                            <label for="horizontalLayout-check" class="form-check-label" >Activate</label>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary mt-2" type="submit">Add category</button>
                                            <button class="btn btn-danger mt-2" type="button"><a href="<?php echo base_url('category'); ?>" class="text-white">Back</a></button>
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