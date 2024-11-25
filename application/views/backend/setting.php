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
                            <?php echo form_open('settings/save'); ?>
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
                            <h3 class="mb-4 font-monospace"><i class="fa fa-cog"></i> General Setting</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="form row-email-input" class="form-label">Company Name </label>
                                        <input type="text" class="form-control" id="form-email-input" name="site_name"
                                            placeholder="Enter Name" value="<?php echo set_value(
                                                                                'site_name',
                                                                                $this->session->flashdata('site_name') ? $this->session->flashdata('site_name_data') : (!empty($setting['site_name']) ? $setting['site_name'] : '')
                                                                            ); ?>">
                                        <label for="form row-email-input" class="text-danger mt-1">
                                            <?php echo $this->session->flashdata('site_name'); ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="form row-email-input" class="form-label">Company Email </label>
                                        <input type="email" class="form-control" id="form-email-input" name="email"
                                            placeholder="Enter name" value="<?php echo set_value(
                                                                                'site_name',
                                                                                $this->session->flashdata('email_data') ? $this->session->flashdata('email_data') : (!empty($setting['email']) ? $setting['email'] : '')
                                                                            ); ?>"> <label for="form row-email-input" class="text-danger mt-1">
                                            <?php echo $this->session->flashdata('email'); ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="form row-password-input" class="form-label">Company Contact
                                            No</label>
                                        <input type="tel" pattern="[0-9]{10}" class="form-control"
                                            id="form row-password-input" name="phone_number" placeholder="Phone number"
                                            value="<?php echo set_value(
                                                        'phone_number',
                                                        $this->session->flashdata('phone_number_data') ? $this->session->flashdata('phone_number_data') : (!empty($setting['phone_number']) ? $setting['phone_number'] : '')
                                                    ); ?>"> <label for="form row-email-input" class="text-danger mt-1">
                                            <?php echo $this->session->flashdata('phone_number'); ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="form row-password-input" class="form-label">About</label>
                                        <input type="text" class="form-control" id="form row-password-input"
                                            name="about" placeholder="about your site"
                                            value="<?php echo set_value(
                                                        'about',
                                                        $this->session->flashdata('about_data') ? $this->session->flashdata('about_data') : (!empty($setting['about']) ? $setting['about'] : '')
                                                    ); ?>"> <label for="form row-email-input" class="text-danger mt-1">
                                            <?php echo $this->session->flashdata('about'); ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="form row-password-input" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="form row-password-input"
                                            name="address" placeholder="Enter Address"
                                            value="<?php echo set_value(
                                                        'address',
                                                        $this->session->flashdata('address_data') ? $this->session->flashdata('address_data') : (!empty($setting['address']) ? $setting['address'] : '')
                                                    ); ?>"> <label for="form row-email-input" class="text-danger mt-1">
                                            <?php echo $this->session->flashdata('address'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="form row-input city" class="form-label">Choose Logo</label>
                                        <div class="my-4">
                                            <img src="<?php echo !empty($setting['logo']) ? base_url($setting["logo"]) : "" ?>" class="rounded img-thumbnail border-warning" height="100" width="100" alt="logo"></span>
                                        </div>
                                        <input type="file" class="form-control" id="form row-input city" name="logo">
                                    </div>
                                    <label for="form row-email-input" class="text-danger mt-1">
                                        <?php echo $this->session->flashdata('logo_error'); ?>
                                    </label>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="form row-input city" class="form-label">Choose Fav icon</label>
                                            <div class="my-4">
                                                <img src="<?php echo !empty($setting["fav_icon"]) ? base_url($setting["fav_icon"]) : "" ?>" class="rounded img-thumbnail border-warning"   height="100" width="100" alt="logo">
                                            </div>
                                            <input type="file" class="form-control" id="form row-input city"
                                                name="fav_icon">
                                        </div>
                                        <label for="form row-email-input" class="text-danger mt-1">
                                            <?php echo $this->session->flashdata('fav_icon_error'); ?>
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
                                        placeholder="Facebook.com" name="fb_url"
                                        value="<?php echo set_value(
                                                    'fb_url',
                                                    $this->session->flashdata('fb_url_data') ? $this->session->flashdata('fb_url_data') : (!empty($setting['fb_url']) ? $setting['fb_url'] : '')
                                                ); ?>"> <label for="form row-email-input" class="text-danger mt-1">
                                        <?php echo $this->session->flashdata('fb_url'); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">X URL</label>
                                <div class="col-sm-9">
                                    <input type="url" class="form-control" id="horizontal-firstname-input"
                                        placeholder="twitter.com" name="x_url"
                                        value="<?php echo set_value(
                                                    'x_url',
                                                    $this->session->flashdata('x_url_data') ? $this->session->flashdata('x_url_data') : (!empty($setting['x_url']) ? $setting['x_url'] : '')
                                                ); ?>"> <label for="form row-email-input" class="text-danger mt-1">
                                        <?php echo $this->session->flashdata('x_url'); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Instagram
                                    URL</label>
                                <div class="col-sm-9">
                                    <input type="url" class="form-control" id="horizontal-firstname-input"
                                        placeholder="instagram.com" name="insta_url"
                                        value="<?php echo set_value(
                                                    'insta_url',
                                                    $this->session->flashdata('insta_url_data') ? $this->session->flashdata('insta_url_data') : (!empty($setting['insta_url']) ? $setting['insta_url'] : '')
                                                ); ?>"> <label for="form row-email-input" class="text-danger mt-1">
                                        <?php echo $this->session->flashdata('insta_url'); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Youtube
                                    URL</label>
                                <div class="col-sm-9">
                                    <input type="url" class="form-control" id="horizontal-firstname-input"
                                        placeholder="youtube.com" name="yt_url"
                                        value="<?php echo set_value(
                                                    'yt_url',
                                                    $this->session->flashdata('yt_url_data') ? $this->session->flashdata('yt_url_data') : (!empty($setting['yt_url']) ? $setting['yt_url'] : '')
                                                ); ?>"> <label for="form row-email-input" class="text-danger mt-1">
                                        <?php echo $this->session->flashdata('yt_url'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!--end card body-->
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary w-lg">Save</button>
                    <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-danger w-lg">Back</a>
                </div>
            </form>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<?php $this->load->view('backend/includes/footer.php');
?>