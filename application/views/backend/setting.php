<?php
$this->load->view('backend/includes/links.php');
$this->load->view('backend/includes/header.php');
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form action="<?php echo base_url('setting/add-setting') ?>" method="POST" enctype="multipart/form-data">

                <div class="col-xl-9">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-4 font-monospace"><i class="fa fa-cog"></i> General Setting</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="form row-email-input" class="form-label">Company Name </label>
                                        <input type="text" class="form-control" id="form-email-input"
                                            name="key[site_name]" placeholder="Enter Name" value="">
                                        <label for="form row-email-input" class="text-danger mt-1">
                                            <?php echo $this->session->flashdata('key[site_name]'); ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="form row-email-input" class="form-label">Company Email </label>
                                        <input type="email" class="form-control" id="form-email-input" name="key[email]"
                                            placeholder="Enter name" value="">
                                        <label for="form row-email-input" class="text-danger mt-1">
                                            <?php echo $this->session->flashdata('key[email]'); ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="form row-password-input" class="form-label">Company Contact
                                            No</label>
                                        <input type="tel" pattern="[0-9]{10}" class="form-control"
                                            id="form row-password-input" name="key[phone_number]"
                                            placeholder="Phone number" value="">
                                        <label for="form row-email-input" class="text-danger mt-1">
                                            <?php echo $this->session->flashdata('key[phone_number]'); ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="form row-password-input" class="form-label">About</label>
                                        <input type="text" class="form-control" id="form row-password-input"
                                            name="key[about]" placeholder="about your site" value="">
                                        <label for="form row-email-input" class="text-danger mt-1">
                                            <?php echo $this->session->flashdata('key[about]'); ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="form row-password-input" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="form row-password-input"
                                            name="key[address]" placeholder="Enter Address" value="">
                                        <label for="form row-email-input" class="text-danger mt-1">
                                            <?php echo $this->session->flashdata('key[address]'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="form row-input city" class="form-label">Choose Logo</label>
                                        <input type="file" class="form-control" id="form row-input city"
                                            name="key[logo]">
                                    </div>
                                    <label for="form row-email-input" class="text-danger mt-1">
                                        <?php echo  $this->session->flashdata('logo_error');?>
                                    </label>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="form row-input city" class="form-label">Choose Fav icon</label>
                                            <input type="file" class="form-control" id="form row-input city"
                                            name="key[fav_icon]">
                                        </div>
                                        <label for="form row-email-input" class="text-danger mt-1">
                                            <?php echo  $this->session->flashdata('fav_error');?>
                                        </label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end card body-->
                    </div>

                    <div class=" card">
                        <div class="card-body">
                            <h3 class="mb-5 font-monospace"><i class="fa fa-user"></i> Social Media Setting</h3>
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Facebook URL
                                </label>
                                <div class="col-sm-9">
                                    <input type="url" class="form-control" id="horizontal-firstname-input"
                                        placeholder="Facebook.com" name="key[fb_url]" value="">
                                    <label for="form row-email-input" class="text-danger mt-1">
                                        <?php echo $this->session->flashdata('key[fb_url]'); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">X URL</label>
                                <div class="col-sm-9">
                                    <input type="url" class="form-control" id="horizontal-firstname-input"
                                        placeholder="twitter.com" name="key[x_url]" value="">
                                    <label for="form row-email-input" class="text-danger mt-1">
                                        <?php echo $this->session->flashdata('key[x_url]'); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Instagram
                                    URL</label>
                                <div class="col-sm-9">
                                    <input type="url" class="form-control" id="horizontal-firstname-input"
                                        placeholder="instagram.com" name="key[insta_url]" value="">
                                    <label for="form row-email-input" class="text-danger mt-1">
                                        <?php echo $this->session->flashdata('key[insta_url]'); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Youtube
                                    URL</label>
                                <div class="col-sm-9">
                                    <input type="url" class="form-control" id="horizontal-firstname-input"
                                        placeholder="youtube.com" name="key[yt_url]" value="">
                                    <label for="form row-email-input" class="text-danger mt-1">
                                        <?php echo $this->session->flashdata('key[yt_url]'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!--end card body-->
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary w-lg">Save</button>
                    <a href="<?php echo base_url('dashboard') ?>" class="btn btn-danger w-lg">Back</a>
                </div>
            </form>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<?php
$this->load->view('backend/includes/footer.php');
?>