<?php $this->load->view('frontend/includes/links');
$this->load->view('frontend/includes/header'); ?>
<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Shopping Cart</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Shopping Cart</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center" style="margin-top: 140px;">
        <div class="col-md-5">
            <div class="card shadow p-4">
                <h3 class="text-center mb-4 text-primary">Create Your Account</h3>
                <p class="text-center text-dark">Register to continue enjoying delicious food!</p>
                <form id="auth-form" action="<?= base_url('register') ?>" method="post">
                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" value="<?= set_value('fname', $this->session->userdata('fname')) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" value="<?= set_value('lname', $this->session->userdata('lname')) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="<?= set_value('email', $this->session->userdata('email')) ?>">
                    </div>
                    <div class="mb-3 ">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group" id="password-messeage">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" value="<?= set_value('password', $this->session->userdata('password')) ?>">
                            <button type="button" class="btn btn-outline-success" id="togglePassword">
                                <i class="bi bi-eye-slash" id="eyeIcon"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Enter Confrim password" value="<?= set_value('confirmPassword', $this->session->userdata('confirmPassword')) ?>">
                    </div>
                    <div class="d-flex justify-content-end align-items-center mb-3">
                        <!-- <div>
                            <input type="checkbox" id="remember" class="form-check-input">
                            <label for="remember" class="form-check-label">Remember Me</label>
                        </div> -->
                    </div>
                    <button type="submit" class="btn btn-custom btn-primary w-100">Register</button>
                </form>
                <p class="text-center text-dark mt-3">
                    Already have an account? <a href="<?= base_url('login') ?>" class="text-decoration-none text-primary">Login Here</a>
                </p>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('frontend/includes/footer') ?>
<?php if ($this->session->flashdata('error_message')):?>
    <script type="text/javascript">
        toastr.error("<?php echo $this->session->flashdata('error_message'); ?>");
    </script>
<?php endif; ?>