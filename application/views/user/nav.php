<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?=base_url()?>user_assets/assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?=base_url()?>user_assets/css/styles.css" rel="stylesheet" />
        <script
  src="https://code.jquery.com/jquery-3.6.3.js"
  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>
       
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="<?=base_url()?>">V Collection</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?=base_url()?>">Home</a></li>

                        <?php
                        foreach ($cat_list as $row)
                         {
                        ?>
                         <li class="nav-item"><a class="nav-link" href="<?=base_url()?>in/view_products?cat_id=<?=$row['category_id']?>"><?=$row['category_name']?></a></li>
                        <?php
                        }?>
                        
                        
                    </ul>

                    



                        <?php
                        if(!isset($_SESSION['user_tbl']))
                        {?>
                            <a href="<?=base_url()?>in/login" style="text-decoration: none;color:black;">Login/SignUp</a>
                            <?php
                        }

                        if(isset($_SESSION['user_tbl']))
                        {
                        ?>
                    <form class="d-flex" action="<?=base_url()?>in/cart">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?=$cart_qty?></span>
                        </button>
                    </form>
                    <a href="<?=base_url()?>in/logout"style="text-decoration: none;margin-left: 30px;color: black;font-weight: bold;"onclick="return confirm('Are you sure ..?')">LogOut</a>

                    <?php
                }
                ?>
                </div>
            </div>
        </nav>