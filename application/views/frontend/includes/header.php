<!-- get setting data and print -->
<?php $query = $this->db->order_by('id')->get('settings');
$setting = [];
if ($query) {
    $result =  $query->result();
    foreach ($result as $row) {
        $setting[$row->key] =  $row->value;
    }
} ?>

<!-- set user href  -->

<?php
$user_data = $this->session->userdata('user');
if ($user_data) {
    $href = base_url('default_controller');
} else {
    $href = base_url('login');
}

?>

<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" role="status"></div>
</div>

<!-- Navbar Start -->
<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small><i class="fa fa-map-marker-alt me-2"></i><?php echo !empty($setting['address']) ? $setting['address'] : "" ?></small>
            <small class="ms-4"><i class="fa fa-envelope me-2"></i><?php echo !empty($setting['email']) ? $setting['email'] : "" ?></small>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small>Follow us:</small>
            <a class="text-body ms-3" href="<?php echo $setting['fb_url']; ?>"><i class="fab fa-facebook-f"></i></a>
            <a class="text-body ms-3" href="<?php echo $setting['x_url']; ?>"><i class="fab fa-twitter"></i></a>
            <a class="text-body ms-3" href="<?php echo $setting['insta_url']; ?>"><i class="fab fa-instagram"></i></a>
            <a class="text-body ms-3" href="<?php echo $setting['yt_url']; ?>"><i class="fab fa-youtube"></i></a>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
            <div style="width: 600px; height: 120px; overflow: hidden; display: flex;">
                <img src="<?php echo !empty($setting['logo']) ? base_url($setting['logo']) : ''; ?>" alt="site_logo" style="max-width: 100%; max-height: 100%; object-fit: contain;">
            </div>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?php echo base_url('/') ?>" class="nav-item nav-link active">Home</a>
                <a href="<?php echo base_url('about-us') ?>" class="nav-item nav-link">About Us</a>
                <a href="<?php echo base_url('products') ?>" class="nav-item nav-link">Products</a>
                <a href="<?php echo base_url('contact-us') ?>" class="nav-item nav-link">Contact Us</a>
            </div>

            <div class="d-none d-lg-flex ms-2">
                <div class="user-dropdown">
                    <button class="dropdown-button btn-sm-square rounded-circle ms-3"><small class="fa fa-user text-white"></small></button>
                    <div class="dropdown-content">
                        <a href="/profile">Profile</a>
                        <?php if (isset($href) && ($href == 'http://localhost/food/login')): ?>
                            <a href="<?php echo base_url('login') ?>">Log In</a>
                                <?php else: ?>
                                <a href="<?= base_url('user-logout') ?>">Logout</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <a class="btn-sm-square rounded-circle ms-3 position-relative" style="background-color: #ff4500;" href="<?php echo base_url('cart') ?>">
                        <small class="fa fa-shopping-cart"></small>
                        <!-- Cart Item Count -->
                        <?php $cartItemCount = $this->session->userdata('cart');
                        if (!empty($cartItemCount) || (!$cartItemCount <= 0)) { ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <span class="total-selected-item-on-cart"><?php echo count($cartItemCount); ?></span>
                            </span>
                        <?php } ?>
                    </a>
                </div>
            </div>
        </nav>
    </div>

