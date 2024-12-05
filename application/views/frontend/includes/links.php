<?php
  $query = $this->db->order_by('id')->get('settings');

  $setting = [];

  if ($query) {

      $result =  $query->result();

      foreach ($result as $row) {
          $setting[$row->key] =  $row->value;
      }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo !empty($setting['site_name'])?$setting['site_name']:""?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <base href="<?php echo base_url(); ?>">
    <!-- Favicon -->
    <link href=<?php echo !empty($setting['fav_icon']) ? base_url($setting['fav_icon']) : "";?> rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url('assets/frontend/lib/animate/animate.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/lib/owlcarousel/assets/owl.carousel.min.css')?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url('assets/frontend/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/css/style.css')?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>