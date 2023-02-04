<?php include('connect.php');
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/responsive-style.css">
</head>

<body>

    <!-- <div id="preloder">
    <div class="loader"></div>
  </div> -->    
    <header class="header-section">
        <div class="header-top">
            <div class="container-fluid container-xxl">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class="fa-solid fa-envelope"></i>
                        <a href="mailto:info@gmail.com" class="__cf_email__"><?php if (isset($_SESSION['loggedin'])) {
                                                                                    echo $_SESSION['useremail'];
                                                                                } else {
                                                                                    echo "";
                                                                                } ?></a>
                    </div>
                    <div class="phone-service">
                        <i class="fa-solid fa-phone"></i>
                        <a href="tel:+92 300 0000000">+92 300 0000000</a>
                    </div>
                </div>
                <div class="ht-right">
                    <a href="login.php" class="login-panel"><i class="fa fa-user"></i>Login</a>
                </div>
            </div>
        </div>
        <div class="container-fluid container-xxl">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="index.php">
                                <img src="img/distinctive-chesterfields.svg" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                    </div>

                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="cart-icon">
                                <a href="#">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span><?php
                                            if (isset($_SESSION['useremail'])) {
                                                $user_id = $_SESSION['userid'];
                                                $cart_query = "SELECT it.p_id,it.p_name,it.p_price,it.p_image,qty,order_status,id FROM cart ut INNER JOIN products it ON it.p_id=ut.item_id WHERE ut.user_id='$user_id' AND order_status = 'Pending'";
                                                $cart_query_run = mysqli_query($conn, $cart_query);
                                                $num_row = mysqli_num_rows($cart_query_run);
                                                echo $num_row;
                                            } else if (!isset($_SESSION['useremail'])) {
                                                echo 0;
                                            }
                                            ?></span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <?php
                                                $user_id = $_SESSION['userid'];
                                                $cart_query = "SELECT it.p_id,it.p_name,it.p_price,it.p_image,qty,order_status,id FROM cart ut INNER JOIN products it ON it.p_id=ut.item_id WHERE ut.user_id='$user_id' AND order_status = 'Pending' LIMIT 3";
                                                $cart_query_run = mysqli_query($conn, $cart_query);
                                                $num_row = mysqli_num_rows($cart_query_run);
                                                if (!isset($_SESSION['useremail'])) {
                                                    echo "<p>Login and add something to your cart to get started.</p>";
                                                } elseif (isset($_SESSION['useremail']) && $num_row == 0) {
                                                    echo "<h4>CART SUMMARY</h4><p>Your cart is empty.</p>";
                                                } else {
                                                    $sum = 0;
                                                    while ($row = mysqli_fetch_assoc($cart_query_run)) {
                                                        $item_id = $row['p_id'];
                                                        $qty = $row['qty'];
                                                        $price = $row['p_price'];
                                                        $total = $price * $qty;
                                                        $sum = $sum + $total;
                                                ?>
                                                        <tr>
                                                            <td class="si-pic">
                                                                <img src="./uploaded-images/<?php echo $row['p_image'] ?>" alt="" />
                                                            </td>
                                                            <td class="si-text">
                                                                <div class="product-selected">
                                                                    <p><?php echo $price; ?> x <?php echo $qty; ?></p>
                                                                    <h6><?php echo $row['p_name'] ?></h6>
                                                                </div>
                                                            </td>
                                                            <td class="si-close">
                                                                <a href="remove-cart-item.php?id=<?php echo $item_id; ?>" class="fa-solid fa-xmark"></a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>
                                            <?php
                                            $num_rows = mysqli_num_rows($cart_query_run);
                                            if (!isset($_SESSION['useremail'])) {
                                                echo "&euro; 0.00";
                                            } elseif ($num_rows == 0) {
                                                echo "&euro; 0.00";
                                            } else {
                                                echo "&euro; $sum";
                                            } ?></h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="cart.php" class="primary-btn view-card">VIEW CART</a>
                                        <?php
                                        if (isset($_SESSION['useremail'])) {
                                        ?>
                                            <a href="checkout.php?id=<?php echo $sum; ?>" class="primary-btn checkout-btn">CHECK OUT</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">$150.00</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="fa-solid fa-bars"></i>
                        <span>All Categories</span>
                        <ul class="depart-hover">
                            <?php
                            $sql = "SELECT * FROM categories WHERE `cat_id` = 1";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            ?>
                            <li><a href="bedstore-sofas.php"><?php echo ucwords($row['cat_name']); ?></a></li>
                            <?php
                            $sql = "SELECT * FROM categories WHERE `cat_id` = 2";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            ?>
                            <li><a href="corner-sofas.php"><?php echo ucwords($row['cat_name']); ?></a></li>
                            <?php
                            $sql = "SELECT * FROM categories WHERE `cat_id` = 3";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            ?>
                            <li><a href="sofas.php"><?php echo ucwords($row['cat_name']); ?></a></li>
                            <?php
                            $sql = "SELECT * FROM categories WHERE `cat_id` = 4";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            ?>
                            <li><a href="chairs.php"><?php echo ucwords($row['cat_name']); ?></a></li>
                            <?php
                            $sql = "SELECT * FROM categories WHERE `cat_id` = 9";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            ?>
                            <li><a href="sofa-beds.php"><?php echo ucwords($row['cat_name']); ?></a></li>
                            <?php
                            $sql = "SELECT * FROM categories WHERE `cat_id` = 5";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            ?>
                            <li><a href="stools&lounges.php"><?php echo ucwords($row['cat_name']); ?></a></li>
                            <?php
                            $sql = "SELECT * FROM categories WHERE `cat_id` = 10";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            ?>
                            <li><a href="instock.php"><?php echo ucwords($row['cat_name']); ?></a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li>
                            <a href="#">Popular</a>
                            <ul class="dropdown">
                                <li><a href="#">Leather Sofas</a></li>
                                <li><a href="#">Tan Leather Sofas</a></li>
                                <li><a href="#">Grey Leather Sofas</a></li>
                                <li><a href="#">Velvet Bedstore Sofas</a></li>
                                <li><a href="#">Brown Leather Sofas</a></li>
                                <li><a href="#">Pink Velvet Sofas</a></li>
                                <li><a href="#">Blue Velvet Sofas</a></li>
                                <li><a href="#">Green Velvet Sofas</a></li>
                                <li><a href="#">Grey Velvet Sofas</a></li>
                            </ul>
                        </li>
                        <li><a href="#">News</a></li>
                        <li><a href="contact.php#contact_section">Contact</a></li>
                        <li>
                            <a href="#">Help</a>
                            <ul class="dropdown">
                                <li><a href="#">Delivery</a></li>
                                <li><a href="#">Faq's</a></li>
                                <li><a href="#">Finance Options</a></li>
                                <li><a href="#">Guarantee</a></li>
                                <li><a href="#">Guardman Protection Plan</a></li>
                                <li><a href="#">Leather Buying Guide</a></li>
                                <li><a href="#">Sofa Measuring Guide</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>