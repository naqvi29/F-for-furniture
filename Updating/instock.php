<?php
$title = "In Stock Collection | Ready for Delivery! | Distinctive Bedstore";
include('header.php');
include('connect.php');
?>
<div class="container-xxl product_heading">
    <h2>Quick Delivery Sofas</h2>
    <hr>
</div>
<section class="bedstore_sofas">
    <div class="container-xxl">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <select class="form-select" name="" id="p_show">
                    <option value="" selected disabled>Order by</option>
                    <option value="atoz">Alphabetically: A to Z</option>
                    <option value="ztoa">Alphabetically: Z to A</option>
                </select>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <select class="form-select" name="" id="p_price">
                    <option value="">Price</option>
                    <option value="low">Price: low to high</option>
                    <option value="high">Price: high to low</option>
                </select>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <select class="form-select" name="" id="p_seats">
                    <option value="" selected disabled>Seats</option>
                    <option value="2">2 Seats</option>
                    <option value="3">3 Seats</option>
                    <option value="4">4 Seats</option>
                </select>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#p_show').on('change', function() {
            var value = $(this).val();
            //alert(value);
            $.ajax({
                url: 'action.php',
                type: 'POST',
                data: value,
                beforeSend: function() {
                    $('.bedstore_products .row').html("<span>Loading...</span>");
                },
                success: function(data) {
                    $('.bedstore_products .row').html(data);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#p_seats').on('change', function() {
            var value = $(this).val();
            //alert(value);
            $.ajax({
                url: 'action.php',
                type: 'POST',
                data: value,
                beforeSend: function() {
                    $('.bedstore_products .row').html("<span>Loading...</span>");
                },
                success: function(data) {
                    $('.bedstore_products .row').html(data);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#p_price').on('change', function() {
            var value = $(this).val();
            //alert(value);
            $.ajax({
                url: 'action.php',
                type: 'POST',
                data: value,
                beforeSend: function() {
                    $('.bedstore_products .row').html("<span>Loading...</span>");
                },
                success: function(data) {
                    $('.bedstore_products .row').html(data);
                }
            });
        });
    });
</script>
<section class="bedstore_products">
    <div class="container-xxl">
        <div class="row g-4">
            <?php

            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $no_of_records_per_page = 12;
            $offset = ($pageno - 1) * $no_of_records_per_page;

            $total_pages_sql = "SELECT COUNT(*) FROM products WHERE p_cat = 10;";
            $result = mysqli_query($conn, $total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);
            
            $sql = "SELECT * FROM products WHERE p_cat = 10 LIMIT $offset, $no_of_records_per_page";
            $res_data = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($res_data)) {
            ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="product-details.php?id=<?php echo $row['p_id'] ?>">
                        <div class="card">
                            <img src="./uploaded-images/<?php echo $row['p_image']; ?>" class="card-img-top" alt="...">
                            <div class="card-footer">
                                <h5 class="card-title"><?php echo $row['p_name']; ?></h5>
                                <p class="card-text">From &euro; <?php echo $row['p_price']; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
        <?php
        $query = "SELECT * FROM products WHERE p_cat = 10";
        $res = mysqli_query($conn, $query);
        $row = mysqli_num_rows($res);
        if ($row > 12) {
        ?>
            <div class="container d-flex justify-content-center mt-5">
                <nav class="Page navigation">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="?pageno=1">First</a>
                        </li>
                        <li class="<?php if ($pageno <= 1) {
                                        echo 'disabled';
                                    } ?>">
                            <a class="page-link" href="<?php if ($pageno <= 1) {
                                                            echo '#';
                                                        } else {
                                                            echo "?pageno=" . ($pageno - 1);
                                                        } ?>">Prev</a>
                        </li>
                        <li class="<?php if ($pageno >= $total_pages) {
                                        echo 'disabled';
                                    } ?>">
                            <a class="page-link" href="<?php if ($pageno >= $total_pages) {
                                                            echo '#';
                                                        } else {
                                                            echo "?pageno=" . ($pageno + 1);
                                                        } ?>">Next</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a>
                        </li>
                    </ul>
                </nav>
            </div>
        <?php
        }
        mysqli_close($conn);
        ?>
    </div>
</section>
<section class="product_about_1">
    <div class="container-xxl">
        <div class="col-lg-12">
            <p>Add a touch of class and sophistication to your home with our beautiful, handcrafted bedstore sofas.
                Our bedstores built to the highest standards, using only the finest materials - meaning when you buy
                a bedstore style sofa from us, it lasts a lifetime.</p>
            <p>We've been making stunning bedstore sofas by hand for over ten years. We know that your sofa is more
                than just a piece of furniture; it's a statement. That's why every bedstorecrafted by us comes with
                a lifetime guarantee and the option for you to choose from a leather or velvet finish.</p>
            <p>Find and customise your perfect bedstore settee today at Distinctive Bedstores.</p>
        </div>
    </div>
</section>
<section class="product_about">
    <div class="container-xxl">
        <ul class="list-unstyled">
            <li><a href="#">our Bedstore Sofas</a></li>
            <li><a href="#">delivery &amp; guarantees</a></li>
            <li><a href="#">request swatches &amp; brochure</a></li>
            <li><a href="#">faq's</a></li>
        </ul>
    </div>
    <div class="container-xxl">
        <div class="col-lg-12">
            <p>A bedstore sofa is more than just something to sit on while you watch the television or take a nap on
                during a Sunday afternoon. A bedstore style sofa brings with it a sense of class, elegance and
                grandeur. </p>
            <p>Of course, your new bedstore will offer you the same benefits as an 'out of the box' sofa, but it's
                the traditional design and caring craftsmanship that goes into making these sofas that really set
                them apart. </p>
            <p>At Distinctive Bedstores, we have two primary commitments - to make the best sofas out there and to
                ensure all of our customers get exactly what they want. That's why alongside sticking to the tried
                and trusted sofa making methods that have stood us in good stead for over ten years, we also provide
                the option for you to customise your bedstore sofa - after all, this is the piece that could
                complete your home. </p>
            <p>Despite the traditional origins, a bedstore sofa can suit any type or style of home and room - no
                matter how traditional or modern. With the chance to choose from over 100 leather, fabric and even
                velvet finishes, along with the studding and piping options, you'll get exactly what you're looking
                for. We can even stain the feet of your brand new bedstore suite to ensure it matches the interior
                of your room down to a tee.</p>
        </div>
    </div>
</section>
<section class="trusted">
    <div class="container-xxl justify-content-center">
        <h2 class="text-center">trusted by our customers</h2>
        <div class="text-center">
            <i class="fa-solid fa-star"></i><span>Trustpilot</span>
        </div>
        <div class="text-center">
            <i class="fa-solid fa-star five"></i>
            <i class="fa-solid fa-star five"></i>
            <i class="fa-solid fa-star five"></i>
            <i class="fa-solid fa-star five"></i>
            <i class="fa-solid fa-star-half-stroke five"></i>
        </div>
        <div class="text-center">
            <span class="text_left">TrustScore <b>4.5</b></span>
            <span class="text_right"><b>613</b> reviews</span>
        </div>
    </div>
</section>
<section class="card_section">
    <div class="container-fluid container-xxl">
        <h2 class="text-center">why you'll love<br> distinctive bedstore</h2>
        <div class="row">
            <div class="col-lg-4">
                <img src="img/Polaroid_1.png" alt="">
                <h3 class="text-center">handmade in yorkshire</h3>
                <p class="text-center">
                    All of our sofas are handcrafted by our expert team based in Yorkshire. At Distinctive bedstores
                    we
                    pride ourselves on the personal touch. From manufacture to delivery - it's personal with us.
                </p>
            </div>
            <div class="col-lg-4">
                <img src="img/Polaroid_2.png" alt="">
                <h3 class="text-center">lifetime guarantee</h3>
                <p class="text-center">Here at Distinctive bedstores, because we are so confident in the quality and
                    build
                    of our sofas, we give a lifetime guarantee on all our sofas*</p>
            </div>
            <div class="col-lg-4">
                <img src="img/Polaroid_3.png" alt="">
                <h3 class="text-center">designed by us</h3>
                <p class="text-center">Our love of craft and design inspires us every day. Our expert designers care
                    about
                    every detail, from the studs to the wood finish. It's about creating amazing bedstore sofas that
                    stand
                    the test of time, whilst retaining iconic style.</p>
            </div>
        </div>
    </div>
</section>
<section class="british_design">
    <div class="container container-xxl">
        <div class="row">
            <div class="col-lg-6">
                <img src="img/Map_v2.0-1.png" alt="">
            </div>
            <div class="col-lg-6">
                <h2>BRITISH DESIGN, AND HANDCRAFTED EXCELLENCE LOVED BY CUSTOMER ALL OVER THE WORLD</h2>
                <p>At Distinctive bedstore, we have stores all around the world. We're on a mission to give the
                    world a
                    taste of the distinct nature of our products.</p>
            </div>
        </div>
    </div>
</section>
<?php
include('footer.php');
?>