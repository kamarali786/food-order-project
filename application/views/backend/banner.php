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
                                <h3>Banner List</h3>
                                <a class="btn btn-outline-primary mb-3" href=<?php echo base_url('banner/add-banner')?>><i class="fa fa-plus me-1"></i> Add
                                Banner</a>
                            </div>
                            
                            <form method="post">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Banner image</th>
                                            <th>Banner Label</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($BannerData) > 0): ?>
                                            <?php foreach ($BannerData as $banner): ?>
                                                <tr>
                                                    <td><?php echo $banner->banner_id; ?></td>
                                                    <td><img src="<?php echo base_url($banner->bann_image); ?>" alt="Banner" width="100"></td>
                                                    <td><?php echo $banner->banner_label; ?></td>
                                                    <td class="fw-bold text-primary"><?php echo ($banner->status == 1) ? 'Active' : 'Inactive'; ?></td>
                                                    <td>
                                                        <a class="btn btn-warning" href="<?php echo base_url('banner/get-banner/' . $banner->banner_id); ?>">Edit</a>
                                                        <a class="btn btn-danger" href="<?php echo base_url('banner/delete-banner/' . $banner->banner_id); ?>" onclick="return deleted(this);">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4" class="text-center"><h2>No Banners found</h2></td>
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
                            
                                        