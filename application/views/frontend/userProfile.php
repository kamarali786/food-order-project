<?php
$this->load->view('frontend/includes/links');
$this->load->view('frontend/includes/header');
?>
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">User Profile</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">User-profile</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container text-center my-5 ">
    <div class="profile-image-section col-xl-3">
        <img src="<?= !empty($user->image) ? $user->image : base_url('assets/frontend/img/users/blank-profile-picture.webp') ?>" alt="Profile Picture" class="rounded-circle profile-img" style="width: 150px; height: 150px; object-fit: cover;">
        <h3 class="mt-3 profile-name"><?= $user->fname ?? 'John' ?> <?= $user->lname ?? 'Doe' ?></h3>
    </div>
</div>

<div class="container my-5">
    <div class="row col-lg-12 row justify-content-center">
        <div class="col-lg-10 userProfile">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="mb-0 label">Update Profile Details</h5>
                </div>
                <div class="card-body">
                    <form id="user-profile" action="<?= base_url('user-profile') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row col-md-12">
                            <!-- Full Name -->
                             <!-- First Name -->
                             <div class="col-md-6 mb-3">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" name="fname" id="fname" class="form-control" value="<?= set_value('fname', $this->session->flashdata('fname') ?? $user->fname);?>" placeholder="Enter First Name">
                            </div>
                            <!-- Last Name -->
                            <div class="col-md-6 mb-3">
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" name="lname" id="lname" class="form-control" value="<?= set_value('lname', $this->session->flashdata('lname') ?? $user->lname);?>" placeholder="Enter Last Name">
                            </div>
                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" value="<?= set_value('email', $this->session->flashdata('email') ?? $user->email);?>" readonly>
                            </div>
                            <!-- Phone -->
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" name="phone" id="phone" class="form-control" value="<?= set_value('phone', $this->session->flashdata('phone') ?? $user->phone);?>" placeholder="Enter Phone Number">
                            </div>
                            <!-- Address -->
                            <div class="col-md-12 mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" id="address" class="form-control" rows="3" placeholder="Enter Address"><?= set_value('address', $this->session->flashdata('address') ?? $user->address);?></textarea>
                            </div>
                            <!-- City -->
                            <div class="col-md-6 mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" name="city" id="city" class="form-control" value="<?= set_value('city', $this->session->flashdata('city') ?? $user->city);?>" placeholder="Enter City">
                            </div>
                            <!-- State -->
                            <div class="col-md-6 mb-3">
                                <label for="state" class="form-label">State</label>
                                <input type="text" name="state" id="state" class="form-control" value="<?= set_value('state', $this->session->flashdata('state') ?? $user->state);?>" placeholder="Enter State">
                            </div>
                            <!-- Country -->
                            <div class="col-md-6 mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" name="country" id="country" class="form-control" value="<?= set_value('country', $this->session->flashdata('country') ?? $user->country);?>" placeholder="Enter Country">
                            </div>
                            <!-- Profile Picture -->
                            <div class="col-md-6 mb-3">
                                <label for="profile_picture" class="form-label">Profile Picture</label>
                                <input type="file" name="image" id="profile_picture" class="form-control">
                            </div>
                        </div>
                        <!-- Save Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Save Changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
$this->load->view('frontend/includes/footer');
?>
<?php if($this->session->flashdata('success_message')): ?>
    <script type="text/javascript">
        toastr.success("<?php echo $this->session->flashdata('success_message'); ?>");
    </script>
<?php endif; ?>