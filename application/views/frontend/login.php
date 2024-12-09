<?php $this->load->view('frontend/includes/links');
$this->load->view('frontend/includes/header'); ?>
<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown"> Login Page</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Login</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center" style="margin-top: 140px;">
        <div class="col-md-5">
            <div class="card shadow p-4">
                <h3 class="text-center mb-4 text-primary">Welcome Back!</h3>
                <p class="text-center text-dark">Login to continue enjoying delicious food!</p>
                <form id="auth-form" action="<?= base_url('login')?>" method = "post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group" id="password-messeage">
                            <input type="password" class="form-control" id="password" placeholder="Enter your password">
                            <button type="button" class="btn btn-outline-success" id="togglePassword">
                                <i class="bi bi-eye-slash" id="eyeIcon"></i> 
                            </button>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end align-items-center mb-3">
                        <!-- <div>
                            <input type="checkbox" id="remember" class="form-check-input">
                            <label for="remember" class="form-check-label">Remember Me</label>
                        </div> -->
                        <a href="#" class="text-decoration-none text-primary">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-custom btn-primary w-100">Login</button>
                </form>
                <p class="text-center mt-3 text-dark">
                    Don't have an account? <a href="<?= base_url('register')?>" class="text-decoration-none text-primary">Register Now</a>
                </p>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('frontend/includes/footer')?>