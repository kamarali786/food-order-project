      </div>
      <!-- END layout-wrapper -->

      <!-- Right Sidebar -->
      <div class="right-bar">
          <div data-simplebar class="h-100">
              <div class="rightbar-title d-flex align-items-center px-3 py-4">

                  <h5 class="m-0 me-2">Settings</h5>

                  <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                      <i class="mdi mdi-close noti-icon"></i>
                  </a>
              </div>

              <!-- Settings -->
              <hr class="mt-0" />
              <h6 class="text-center mb-0">Choose Layouts</h6>

              <div class="p-4">
                  <div class="mb-2">
                      <img src="assets/backend/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
                  </div>

                  <div class="form-check form-switch mb-3">
                      <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                      <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                  </div>

                  <div class="mb-2">
                      <img src="assets/backend/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
                  </div>
                  <div class="form-check form-switch mb-3">
                      <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
                      <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                  </div>

                  <div class="mb-2">
                      <img src="assets/backend/images/layouts/layout-3.jpg" class="img-thumbnail" alt="layout images">
                  </div>
                  <div class="form-check form-switch mb-3">
                      <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch">
                      <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                  </div>

                  <div class="mb-2">
                      <img src="assets/backend/images/layouts/layout-4.jpg" class="img-thumbnail" alt="layout images">
                  </div>
                  <div class="form-check form-switch mb-5">
                      <input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
                      <label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                  </div>


              </div>

          </div> <!-- end slimscroll-menu-->
      </div>
      <!-- /Right-bar -->

      <!-- Right bar overlay-->
      <div class="rightbar-overlay"></div>

      <!-- JAVASCRIPT -->
      <script src="<?php echo base_url("assets/backend/libs/jquery/jquery.min.js") ?>"></script>
      <script src="<?php echo base_url("assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
      <script src="<?php echo base_url("assets/backend/libs/metismenu/metisMenu.min.js") ?>"></script>
      <script src="<?php echo base_url("assets/backend/libs/simplebar/simplebar.min.js") ?>"></script>
      <script src="<?php echo base_url("assets/backend/libs/node-waves/waves.min.js") ?>"></script>
      <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>


      <!-- apexcharts -->
      <!-- <script src="<?php //echo base_url("assets/backend/libs/apexcharts/apexcharts.min.js") 
                        ?>"></script> -->

      <!-- dashboard init -->
      <!-- <script src="<?php //echo base_url("assets/backend/js/pages/dashboard.init.js") 
                        ?>"></script> -->
      <script src="<?php echo base_url("assets/backend/js/pages/datatables.init.js") ?>"></script>

      <!-- App js -->
      <script src="<?php echo base_url("assets/backend/js/app.js") ?>"></script>

      <!-- SweetAlert2 JS -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.8/dist/sweetalert2.min.js"></script>

      <!-- Custom JS (ensure it doesn't conflict with SweetAlert2) -->
      <script src="<?php echo base_url("assets/backend/js/custom.js") ?>"></script>


      </body>

      </html>