<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="<?php echo base_url('dashboard') ?>" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="<?php echo !empty(str_contains($_SERVER['PHP_SELF'], "banner")) ? 'mm-active' : ""; ?>">
                    <a href="<?php echo base_url('banner') ?>" class="waves-effect">
                        <i class="fa fa-images"></i><span class="badge rounded-pill bg-info float-end"><?php echo modulesCount('bannerCount'); ?></span>
                        <span key="t-dashboards">Banner</span>
                    </a>
                </li>
                <?php $pattern = '/\bcategory\b/';?>
                <li class="<?php echo !empty(str_contains($_SERVER['PHP_SELF'], $pattern)) ? 'mm-active' : ""; ?>">
                    <a href="<?php echo base_url('category') ?>" class="waves-effect">
                        <i class="fa fa-list-alt"></i><span class="badge rounded-pill bg-info float-end"><?php echo modulesCount('categoryCount'); ?></span>
                        <span key="t-dashboards">Category</span>
                    </a>
                </li>
                <li class="<?php echo !empty(str_contains($_SERVER['PHP_SELF'], "sub")) ? 'mm-active' : ""; ?>">
                    <a href="<?php echo base_url('sub-category') ?>" class="waves-effect">
                        <i class="fa fa-layer-group"></i><span class="badge rounded-pill bg-info float-end"><?php echo modulesCount('subCategoryCount'); ?></span>
                        <span key="t-dashboards">Sub Category</span>
                    </a>
                </li>
                <li class="<?php echo !empty(str_contains($_SERVER['PHP_SELF'], "product")) ? 'mm-active' : ""; ?>">
                    <a href="<?php echo base_url('product') ?>" class="waves-effect">
                        <i class="bx bx-list-ul"></i><span class="badge rounded-pill bg-info float-end"><?php echo modulesCount('productCount'); ?></span>
                        <span key="t-dashboards">Product</span>
                    </a>
                </li>
                <li class="<?php echo !empty(str_contains($_SERVER['PHP_SELF'], "setting")) ? 'mm-active' : ""; ?>">
                    <a href="<?php echo base_url('setting') ?>" class="waves-effect">
                        <i class="fa fa-cog"></i></span>
                        <span key="t-dashboards">Setting</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->