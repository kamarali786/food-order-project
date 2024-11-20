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
                                <h3>Sub Category List</h3>
                                <a class="btn btn-outline-primary mb-3" href=<?php echo base_url('subCategory/add-subCategory') ?>><i class="fa fa-plus me-1"></i> Add
                                    Sub Category</a>
                            </div>

                            <form method="post">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <th>Sub Category Name</th>
                                            <th>Sub Category image</th>
                                            <th>Description</th>
                                            <th>Status</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($subCategoryData) > 0): ?>
                                            <?php foreach ($subCategoryData as $subCategory): ?>
                                                <tr>
                                                    <td><?php echo $subCategory->subCategory_id; ?></td>
                                                    <td><?php echo $subCategory->category_name; ?></td>
                                                    
                                                    <td><?php echo $subCategory->subCategory_name; ?></td>
                                                    <td><img src="<?php echo base_url($subCategory->subcate_image); ?>" alt="subCategory" width="100"></td>
                                                    <td><?php echo $subCategory->description?></td>
                                                    <td class="fw-bold text-primary"><?php echo ($subCategory->status == 1) ? 'Active' : 'Inactive'; ?></td>
                                                    <td>
                                                        <a class="btn btn-warning" href="<?php echo base_url('subCategory/get-subCategory/' . $subCategory->subCategory_id); ?>">Edit</a>
                                                        <a class="btn btn-danger" href="<?php echo base_url('subCategory/delete-subCategory/' . $subCategory->subCategory_id); ?>" onclick="return deleted(this);">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="7" class="text-center">
                                                    <h2>No Sub Category Found</h2>
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