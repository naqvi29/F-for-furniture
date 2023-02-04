<?php
$title = "Shop | Distinctive Bedstore";
require('header.php'); ?>

<div class="container-fluid container-xxl my-3">
    <h2 class="section-title">shop</h2>
</div>
<section class="product-shop spad">
    <div class="container-fluid container-xxl">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                <div class="filter-widget">
                    <form action="" method="post">
                        <h4 class="fw-title">Categories</h4>
                        <div class="fw-brand-check">
                            <div class="bc-item">
                                <input type="radio" name="p_cat[]" value="1" id="radio">
                                Bedstore Sofas
                            </div>
                            <div class="bc-item">
                                <input type="radio" name="p_cat[]" value="2" id="radio">
                                Corner Sofas
                            </div>
                            <div class="bc-item">
                                <input type="radio" name="p_cat[]" value="3" id="radio">
                                Sofas
                            </div>
                            <div class="bc-item">
                                <input type="radio" name="p_cat[]" value="4" id="radio">
                                Chairs
                            </div>
                            <div class="bc-item">
                                <input type="radio" name="p_cat[]" value="9" id="radio">
                                Sofa Beds
                            </div>
                            <div class="bc-item">
                                <input type="radio" name="p_cat[]" value="5" id="radio">
                                Stools & Chaise Lounges
                            </div>
                            <div class="bc-item">
                                <input type="radio" name="p_cat[]" value="10" id="radio">
                                In Stock
                            </div>
                        </div>
                        <input type="submit" name="category" value="filter" class="mt-3 filter-btn">
                    </form>
                </div>
                <div class="filter-widget">
                    <form action="" name="search" method="post">
                        <h4 class="fw-title">Brand</h4>
                        <div class="fw-brand-check">
                            <div class="bc-item">
                                <input type="radio" name="brand_name[]" value="1" id="radio">
                                InterWood
                            </div>
                            <div class="bc-item">
                                <input type="radio" name="brand_name[]" value="2" id="radio">
                                Chenone homes
                            </div>
                            <div class="bc-item">
                                <input type="radio" name="brand_name[]" value="3" id="radio">
                                Habitt
                            </div>
                            <div class="bc-item">
                                <input type="radio" name="brand_name[]" value="4" id="radio">
                                Index Furniture
                            </div>
                        </div>
                        <input type="submit" name="search" value="filter" class="mt-3 filter-btn">
                    </form>
                </div>
                <div class="filter-widget">
                    <form action="" name="color" method="post">
                        <h4 class="fw-title">Color</h4>
                        <div class="fw-color-choose">
                            <div class="cs-item">
                                <input type="radio" id="cs-black" class="radio" value="Black" name="p_color[]">
                                <label class="cs-black" for="cs-black">Black</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-blue" class="radio" value="Blue" name="p_color[]">
                                <label class="cs-blue" for="cs-blue">Blue</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-green" class="radio" value="Gray" name="p_color[]">
                                <label class="cs-green" for="cs-green">Gray</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-green" class="radio" value="Green" name="p_color[]">
                                <label class="cs-green" for="cs-green">Green</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-magenta" class="radio" value="Magenta" name="p_color[]">
                                <label class="cs-magenta" for="cs-magenta">Magenta</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-orange" class="radio" value="Orange" name="p_color[]">
                                <label class="cs-orange" for="cs-orange">Orange</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-pink" class="radio" value="Pink" name="p_color[]">
                                <label class="cs-pink" for="cs-pink">Pink</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-purple" class="radio" value="Purple" name="p_color[]">
                                <label class="cs-purple" for="cs-purple">Purple</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-red" class="radio" value="Red" name="p_color[]">
                                <label class="cs-red" for="cs-red">Red</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-silver" class="radio" value="Silver" name="p_color[]">
                                <label class="cs-silver" for="cs-silver">Silver</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-yellow" class="radio" value="Yellow" name="p_color[]">
                                <label class="cs-yellow" for="cs-yellow">Yellow</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-white" class="radio" value="White" name="p_color[]">
                                <label class="cs-white" for="cs-white">White</label>
                            </div>
                        </div>
                        <input type="submit" value="Filter" name="color" class="mt-3 filter-btn">
                    </form>
                </div>
                <div class="filter-widget">
                    <form action="" method="post">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                            <div class="sc-item">
                                <input type="radio" id="s-size" value="1" name="p_size[]">
                                <label for="s-size">XS</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="s-size" value="2" name="p_size[]">
                                <label for="s-size">S</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="m-size" value="3" name="p_size[]">
                                <label for="m-size">M</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="l-size" value="4" name="p_size[]">
                                <label for="l-size">L</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="xs-size" value="5" name="p_size[]">
                                <label for="xs-size">XL</label>
                            </div>
                        </div>
                        <input type="submit" value="Filter" name="size" class="mt-3 filter-btn">
                    </form>
                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="product-show-option">
                    <div class="row">
                        <div class="col-lg-8 col-md-4">
                            <div class="select-option">
                                <select class="sort-by" id="fetchdata">
                                    <option value="" disabled selected>Sort by</option>
                                    <option value="default">Default Sorting</option>
                                    <option value="low">Price: low to high</option>
                                    <option value="high">Price: high to low</option>
                                    <option value="atoz">Alphabetically: A to Z</option>
                                    <option value="ztoa">Alphabetically: Z to A</option>
                                </select>
                                <!-- <select class="p-show" id="fetchnumber" name="fetchnumber">
                                    <option value="" disabled selected>Show:</option>
                                    <option value="9">Show: 09</option>
                                    <option value="18">Show: 18</option>
                                    <option value="27">Show: 27</option>
                                    <option value="36">Show: 36</option>
                                </select> -->
                            </div>
                        </div>
                        <?php
                        $query = "SELECT * FROM products";
                        $res = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($res);
                        ?>
                        <div class="col-lg-4 col-md-4 text-left">
                            <p>Showing <?php echo $row; ?> Product</p>
                        </div>
                    </div>
                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#fetchnumber').on('change', function() {
                            var value = $(this).val();
                            //alert(value);
                            $.ajax({
                                url: 'fetch.php',
                                type: 'POST',
                                data: value,
                                beforeSend: function() {
                                    $('.product-list').html("<span>Loading...</span>");
                                },
                                success: function(data) {
                                    $('.product-list').html(data);
                                }
                            });
                        });
                    });
                </script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#fetchdata').on('change', function() {
                            var value = $(this).val();
                            //alert(value);
                            $.ajax({
                                url: 'fetch.php',
                                type: 'POST',
                                data: value,
                                beforeSend: function() {
                                    $('.product-list').html("<span>Loading...</span>");
                                },
                                success: function(data) {
                                    $('.product-list').html(data);
                                }
                            });
                        });
                    });
                </script>
                <div class="product-list">
                    <div class="row">
                        <?php
                        if (isset($_REQUEST['category'])) {
                            $category_name = $_REQUEST['p_cat'];
                            foreach ($_REQUEST['p_cat'] as $category_name) {
                                $array[] = mysqli_real_escape_string($conn, $category_name);
                            }
                            $category = implode("',", $array);
                            $sql = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id WHERE p_cat IN ('$category')";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) == 0) {
                                echo '<script>alert("Sorry! no product found");</script>';
                                $sql = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="pi-pic">
                                                <img src="./uploaded-images/<?php echo $row['p_image'] ?>" alt="">
                                                <div class="icon">
                                                    <i class="icon_heart_alt"></i>
                                                </div>
                                                <ul>
                                                    <li class="w-icon active"><button type="submit" name="add_to_cart" class="fa-solid fa-cart-shopping"></i></button></li>
                                                    <li class="quick-view"><a type="button" id="openmodelbtna" data-pid="<?php echo $row['p_id']; ?>">+ Quick View</a></li>
                                                </ul>
                                            </div>
                                            <div class="pi-text">
                                                <div class="catagory-name"><?php echo $row['cat_name'] ?></div>
                                                <a href="product-details.php?id=<?php echo $row['p_id'] ?>">
                                                    <h5><?php echo $row['p_name'] ?></h5>
                                                </a>
                                                <div class="product-price">
                                                    &euro; <?php echo $row['p_price'] ?>
                                                    <!-- <span>$35.00</span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            } else {
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="pi-pic">
                                                <img src="./uploaded-images/<?php echo $row['p_image'] ?>" alt="">
                                                <div class="icon">
                                                    <i class="icon_heart_alt"></i>
                                                </div>
                                                <ul>
                                                    <li class="w-icon active"><button type="submit" name="add_to_cart" class="fa-solid fa-cart-shopping"></i></button></li>
                                                    <li class="quick-view"><a type="button" id="openmodelbtna" data-pid="<?php echo $row['p_id']; ?>">+ Quick View</a></li>
                                                </ul>
                                            </div>
                                            <div class="pi-text">
                                                <div class="catagory-name"><?php echo $row['cat_name'] ?></div>
                                                <a href="product-details.php?id=<?php echo $row['p_id'] ?>">
                                                    <h5><?php echo $row['p_name'] ?></h5>
                                                </a>
                                                <div class="product-price">
                                                    &euro; <?php echo $row['p_price'] ?>
                                                    <!-- <span>$35.00</span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                        } elseif (isset($_REQUEST['size'])) {
                            $size_alphabet = $_REQUEST['p_size'];
                            foreach ($_REQUEST['p_size'] as $size_alphabet) {
                                $array[] = mysqli_real_escape_string($conn, $size_alphabet);
                            }
                            $size = implode("',", $array);
                            $sql = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id WHERE p_size IN ('$size')";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) == 0) {
                                echo '<script>alert("Sorry! no product found");</script>';
                                $sql = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="pi-pic">
                                                <img src="./uploaded-images/<?php echo $row['p_image'] ?>" alt="">
                                                <div class="icon">
                                                    <i class="icon_heart_alt"></i>
                                                </div>
                                                <ul>
                                                    <li class="w-icon active"><button type="submit" name="add_to_cart" class="fa-solid fa-cart-shopping"></i></button></li>
                                                    <li class="quick-view"><a type="button" id="openmodelbtna" data-pid="<?php echo $row['p_id']; ?>">+ Quick View</a></li>
                                                </ul>
                                            </div>
                                            <div class="pi-text">
                                                <div class="catagory-name"><?php echo $row['cat_name'] ?></div>
                                                <a href="product-details.php?id=<?php echo $row['p_id'] ?>">
                                                    <h5><?php echo $row['p_name'] ?></h5>
                                                </a>
                                                <div class="product-price">
                                                    &euro; <?php echo $row['p_price'] ?>
                                                    <!-- <span>$35.00</span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            } else {
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="pi-pic">
                                                <img src="./uploaded-images/<?php echo $row['p_image'] ?>" alt="">
                                                <div class="icon">
                                                    <i class="icon_heart_alt"></i>
                                                </div>
                                                <ul>
                                                    <li class="w-icon active"><button type="submit" name="add_to_cart" class="fa-solid fa-cart-shopping"></i></button></li>
                                                    <li class="quick-view"><a type="button" id="openmodelbtna" data-pid="<?php echo $row['p_id']; ?>">+ Quick View</a></li>
                                                </ul>
                                            </div>
                                            <div class="pi-text">
                                                <div class="catagory-name"><?php echo $row['cat_name'] ?></div>
                                                <a href="product-details.php?id=<?php echo $row['p_id'] ?>">
                                                    <h5><?php echo $row['p_name'] ?></h5>
                                                </a>
                                                <div class="product-price">
                                                    &euro; <?php echo $row['p_price'] ?>
                                                    <!-- <span>$35.00</span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php

                                }
                            }
                        } elseif (isset($_REQUEST['color'])) {
                            $color_name = $_REQUEST['p_color'];
                            foreach ($_REQUEST['p_color'] as $color_name) {
                                $array[] = mysqli_real_escape_string($conn, $color_name);
                            }
                            $color = implode("',", $array);
                            $sql = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id WHERE p_color IN ('$color')";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) == 0) {
                                echo '<script>alert("Sorry! no product found");</script>';
                                $sql = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="pi-pic">
                                                <img src="./uploaded-images/<?php echo $row['p_image'] ?>" alt="">
                                                <div class="icon">
                                                    <i class="icon_heart_alt"></i>
                                                </div>
                                                <ul>
                                                    <li class="w-icon active"><button type="submit" name="add_to_cart" class="fa-solid fa-cart-shopping"></i></button></li>
                                                    <li class="quick-view"><a type="button" id="openmodelbtna" data-pid="<?php echo $row['p_id']; ?>">+ Quick View</a></li>
                                                </ul>
                                            </div>
                                            <div class="pi-text">
                                                <div class="catagory-name"><?php echo $row['cat_name'] ?></div>
                                                <a href="product-details.php?id=<?php echo $row['p_id'] ?>">
                                                    <h5><?php echo $row['p_name'] ?></h5>
                                                </a>
                                                <div class="product-price">
                                                    &euro; <?php echo $row['p_price'] ?>
                                                    <!-- <span>$35.00</span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            } else {
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="pi-pic">
                                                <img src="./uploaded-images/<?php echo $row['p_image'] ?>" alt="">
                                                <div class="icon">
                                                    <i class="icon_heart_alt"></i>
                                                </div>
                                                <ul>
                                                    <li class="w-icon active"><button type="submit" name="add_to_cart" class="fa-solid fa-cart-shopping"></i></button></li>
                                                    <li class="quick-view"><a type="button" id="openmodelbtna" data-pid="<?php echo $row['p_id']; ?>">+ Quick View</a></li>
                                                </ul>
                                            </div>
                                            <div class="pi-text">
                                                <div class="catagory-name"><?php echo $row['cat_name'] ?></div>
                                                <a href="product-details.php?id=<?php echo $row['p_id'] ?>">
                                                    <h5><?php echo $row['p_name'] ?></h5>
                                                </a>
                                                <div class="product-price">
                                                    &euro; <?php echo $row['p_price'] ?>
                                                    <!-- <span>$35.00</span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                        } elseif (isset($_REQUEST['search'])) {
                            $brand_name = $_REQUEST['brand_name'];
                            foreach ($_REQUEST['brand_name'] as $brand_name) {
                                $array[] = mysqli_real_escape_string($conn, $brand_name);
                            }
                            $brand = implode("',", $array);
                            $sql = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id WHERE p_brand IN ('$brand')";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) == 0) {
                                echo '<script>alert("Sorry! no product found");</script>';
                                $sql = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="pi-pic">
                                                <img src="./uploaded-images/<?php echo $row['p_image'] ?>" alt="">
                                                <div class="icon">
                                                    <i class="icon_heart_alt"></i>
                                                </div>
                                                <ul>
                                                    <li class="w-icon active"><button type="submit" name="add_to_cart" class="fa-solid fa-cart-shopping"></i></button></li>
                                                    <li class="quick-view"><a type="button" id="openmodelbtna" data-pid="<?php echo $row['p_id']; ?>">+ Quick View</a></li>
                                                </ul>
                                            </div>
                                            <div class="pi-text">
                                                <div class="catagory-name"><?php echo $row['cat_name'] ?></div>
                                                <a href="product-details.php?id=<?php echo $row['p_id'] ?>">
                                                    <h5><?php echo $row['p_name'] ?></h5>
                                                </a>
                                                <div class="product-price">
                                                    &euro; <?php echo $row['p_price'] ?>
                                                    <!-- <span>$35.00</span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            } else {
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="pi-pic">
                                                <img src="./uploaded-images/<?php echo $row['p_image'] ?>" alt="">
                                                <div class="icon">
                                                    <i class="icon_heart_alt"></i>
                                                </div>
                                                <ul>
                                                    <li class="w-icon active"><button type="submit" name="add_to_cart" class="fa-solid fa-cart-shopping"></i></button></li>
                                                    <li class="quick-view"><a type="button" id="openmodelbtna" data-pid="<?php echo $row['p_id']; ?>">+ Quick View</a></li>
                                                </ul>
                                            </div>
                                            <div class="pi-text">
                                                <div class="catagory-name"><?php echo $row['cat_name'] ?></div>
                                                <a href="product-details.php?id=<?php echo $row['p_id'] ?>">
                                                    <h5><?php echo $row['p_name'] ?></h5>
                                                </a>
                                                <div class="product-price">
                                                    &euro; <?php echo $row['p_price'] ?>
                                                    <!-- <span>$35.00</span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                        } else {
                            ?>
                            <?php
                            $sql = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <div class="col-lg-4 col-sm-6">
                                    <form action="add-to-cart.php?id=<?php echo $row['p_id']; ?>" method="post">
                                        <div class="product-item">
                                            <div class="pi-pic">
                                                <img src="./uploaded-images/<?php echo $row['p_image'] ?>" alt="">
                                                <div class="icon">
                                                    <i class="icon_heart_alt"></i>
                                                </div>
                                                <ul>
                                                    <li class="w-icon active"><button type="submit" name="add_to_cart" class="fa-solid fa-cart-shopping"></i></button></li>
                                                    <li class="quick-view"><a type="button" id="openmodelbtna" data-pid="<?php echo $row['p_id']; ?>">+ Quick View</a></li>
                                                </ul>
                                            </div>
                                            <div class="pi-text">
                                                <div class="catagory-name"><?php echo $row['cat_name'] ?></div>
                                                <a href="product-details.php?id=<?php echo $row['p_id'] ?>">
                                                    <h5><?php echo $row['p_name'] ?></h5>
                                                </a>
                                                <div class="product-price">
                                                    &euro; <?php echo $row['p_price'] ?>
                                                    <!-- <span>$35.00</span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                        <?php
                            }
                        }
                        ?>

                    </div>
                    <!-- modal -->
                    <div class="modal-quick-view modal" id="pmodal" tabindex="-1" aria-labelledby="pmodal" aria-hidden="true">
                        <div class="modal-dialog modal-xl" id="out">

                        </div>
                    </div>
                    <!-- modal -->
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    //Modal Close Button

    $(document).on("click", ".closedmodal", function() {
        $("#pmodal").hide();
    });


    $(document).on("click", "#openmodelbtna", function(e) {

        var pid = $(this).data("pid");
        //  alert(pid);
        $("#pmodal").show();

        var element = this;

        $.ajax({
            url: "product-modal.php",
            type: "POST",
            data: {
                id: pid
            },
            success: function(data) {
                $("#out").html(data);
            }
        });



    });
</script>
<?php
include('footer.php');
?>