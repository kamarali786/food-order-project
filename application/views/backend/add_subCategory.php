<?php
$this->load->view('backend/includes/links.php');
$this->load->view('backend/includes/header.php');
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="col-xl-9">
                <h4 class="card-title mb-4 text-uppercase">
                    <?php echo !empty($editData) ? 'Edit' : 'Add'; ?> New Sub Category
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
                        <form action="<?php echo base_url('subCategory/' . (!empty($editData) ? 'edit-subCategory/' . $editData->subCategory_id : 'add-subCategory')) ?>" class="form-horizontal" enctype="multipart/form-data" method="post">
                            <!-- If editing, show existing data -->
                            <?php if (!empty($editData)): ?>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Choose Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="category_id">
                                            <?php if ($categoryData): ?>
                                                <?php foreach ($categoryData as $category): ?>
                                                    <option value="<?php echo $category->category_id; ?>"
                                                        <?php echo ($category->category_id == $editData->category_id) ? 'selected' : ''; ?>>
                                                        <?php echo $category->category_name; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <span class="text-danger"><?php echo $this->session->flashdata('category_error'); ?></span>
                                    </div>

                                </div>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Sub Category name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="subCategory_name" class="form-control" id="horizontal-firstname-input" value="<?php echo set_value('subCategory_name', $this->session->flashdata('subCategoryName') ?? $editData->subCategory_name);?>">
                                        <span class="text-danger"><?php echo $this->session->flashdata('subCategoryName_error'); ?></span>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" name="description" class="form-control" id="horizontal-firstname-input"><?php echo set_value('description', $this->session->flashdata('description_value') ?? $editData->description);?></textarea>
                                        <span class="text-danger"><?php echo $this->session->flashdata('description_error'); ?></span>
                                    </div>
                                </div>

                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Current Sub Category Image</label>
                                    <div class="col-sm-6">
                                        <!-- Show existing subCategory image if editing -->
                                        <img src="<?php echo base_url($editData->subcate_image); ?>" alt="Current subCategory" width="100" class="img-fluid subCategory-img">
                                        <input name="file" type="file" class="form-control mt-2" id="horizontal-firstname-input">
                                        <p class="text-primary mt-1 fw-bolder">Note: Size of the image should be less than 1 MB</p>
                                        <?php if ($this->session->flashdata('file_error')) { ?>
                                            <p class="text-danger" style="color:red"><?php echo $this->session->flashdata('file_error'); ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <div class="form-check mb-4">
                                            <input type="checkbox" class="form-check-input" id="horizontalLayout-check" name="status" <?php echo ($editData->status == 1) ? "checked" : ""; ?>>
                                            <label for="horizontalLayout-check" class="form-check-label" >Activate</label>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary mt-2" type="submit">Save Changes</button>
                                            <button class="btn btn-danger mt-2" type="button"><a href="<?php echo base_url('sub-category'); ?>" class="text-white">Back</a></button>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <!-- For Adding New subCategory -->
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Choose Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="category_id">
                                            <?php if ($categoryData):
                                                foreach ($categoryData as $category): ?>
                                                    <option value="<?php echo $category->category_id ?>"><?php echo $category->category_name ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <span class="text-danger"><?php echo $this->session->flashdata('category_error'); ?></span>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Sub Category name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="subCategory_name" class="form-control" id="horizontal-firstname-input" value="<?php echo $this->session->flashdata('subCategory_name') ?>">
                                        <span class="text-danger"><?php echo $this->session->flashdata('subCategoryName_error'); ?></span>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="description" class="form-control" id="horizontal-firstname-input"><?php echo $this->session->flashdata('description') ?></textarea>
                                        <span class="text-danger"><?php echo $this->session->flashdata('description_error'); ?></span>
                                    </div>
                                    <div class="row my-4">
                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Choose Sub Category Image</label>
                                        <div class="col-sm-6">
                                            <input name="file" type="file" class="form-control" id="horizontal-firstname-input">
                                            <p class="text-primary mt-1 fw-bolder">Note: Size of the image should be less than 1 MB</p>
                                            <?php if ($this->session->flashdata('file_error')) { ?>
                                                <p class="text-danger"><?php echo $this->session->flashdata('file_error') ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-9">
                                            <div class="form-check mb-4">
                                                <input type="checkbox" class="form-check-input" id="horizontalLayout-check" name="status" checked>
                                                <label for="horizontalLayout-check" class="form-check-label">Activate</label>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary mt-2" type="submit">Add Sub Category</button>
                                                <button class="btn btn-danger mt-2" type="button"><a href="<?php echo base_url('sub-category'); ?>" class="text-white">Back</a></button>
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