<!-- <h1>index.php for  admin</h1> -->
<!DOCTYPE html>
<html lang="en">
  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CI ECOM</title>
    
    <link rel="stylesheet" href="<?=base_url()?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/vendors/css/vendor.bundle.base.css">
    
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
     
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="<?=base_url()?>admin"><img src="<?=base_url()?>assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="<?=base_url()?>admin"><img src="<?=base_url()?>assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          
         
         <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
           
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>admin">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

             <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>admin/add_category">
                <span class="menu-title">Add category</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>admin/add_product">
                <span class="menu-title">Add Product</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>admin/product_list">
                <span class="menu-title">Product list</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            
            
            
           
            
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          	