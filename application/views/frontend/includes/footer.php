<!-- Footer Start -->
<div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5 ">
                <div class="col-lg-5 col-md-6">
                    <img src="<?php echo !empty($setting['logo']) ? base_url($setting['logo']):""?>" alt="Logo" width="100" height="60">
                    <p><?php echo !empty($setting['about'])?$setting['about']:""?></p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="<?php echo $setting['x_url'];?>"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="<?php echo $setting['fb_url'];?>"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="<?php echo $setting['yt_url'];?>"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href="<?php echo $setting['insta_url'];?>"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p><i class="fa fa-map-marker-alt me-3"></i><?php echo !empty($setting['address'])?$setting['address']:""?></p>
                    <p><i class="fa fa-phone-alt me-3"></i><?php echo !empty($setting['phone_number'])?$setting['phone_number']:""?></p>
                    <p><i class="fa fa-envelope me-3"></i><?php echo !empty($setting['email'])?$setting['email']:""?></p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
        </div>
        <div class="container-fluid copyright mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('assets/frontend/lib/wow/wow.min.js')?>"></script>
    <script src="<?php echo base_url('assets/frontend/lib/easing/easing.min.js')?>"></script>
    <script src="<?php echo base_url('assets/frontend/lib/waypoints/waypoints.min.js')?>"></script>
    <script src="<?php echo base_url('assets/frontend/lib/owlcarousel/owl.carousel.min.js')?>"></script>
    <script src="<?php echo base_url('assets/frontend/js/main.js')?>"></script>

</body>

</html>