<?php
$query = $this->db->order_by('id')->get('settings');

$data = [];

if ($query) {

    $result =  $query->result();

    foreach ($result as $row) {
        $data[$row->key] =  $row->value;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Foody - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <base href="<?php echo base_url(); ?>">

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo !empty($data['fav_icon']) ? base_url($data['fav_icon']) : "" ?>">

    <!-- Bootstrap Css -->
    <link href="<?php echo base_url("assets/backend/css/bootstrap.min.css"); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="<?php echo base_url("assets/backend/css/icons.min.css"); ?>" rel="stylesheet" type="text/css" />

    <!-- App Css-->
    <link href="<?php echo base_url("assets/backend/css/app.min.css"); ?>" id="app-style" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/backend/css/custom.css"); ?>" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- DataTables Responsive CSS CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">

    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.8/dist/sweetalert2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>


<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">