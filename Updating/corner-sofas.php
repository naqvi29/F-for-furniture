<?php
$title = "Bedstore Corner Sofas | Distinctive Bedstore";
include('header.php'); ?>
<div class="container-xxl product_heading">
    <div class="row">
        <div class="col-lg-6">
            <h2>Bedstore Corner sofas</h2>
        </div>
        <div class="col-lg-6">
            <p>We have adapted a number of our best-selling models into corner units, combining the elegance of our traditional Chesterfield models, with subtle contemporary alterations. Boasting the same quality as our standard Chesterfield pieces, we have introduced several corner options to our collection, available as right and left facing corner units, in up to 8 different styles and size variations. Make a stylish statement, with super spacious seating, available in over 120 luxury leathers and fabrics.

            </p>
        </div>
    </div>
</div>
<section class="bedstore_products">
    <div class="container-fluid container-xxl">
        <div class="row g-4">
            <?php

            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $no_of_records_per_page = 12;
            $offset = ($pageno - 1) * $no_of_records_per_page;

            $total_pages_sql = "SELECT COUNT(*) FROM products WHERE p_cat = 2;";
            $result = mysqli_query($conn, $total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);

            $sql = "SELECT * FROM products WHERE p_cat = 2 LIMIT $offset, $no_of_records_per_page";
            $res_data = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($res_data)) {
            ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="product-details.php?id=<?php echo $row['p_id'] ?>">
                        <div class="card">
                            <img src="./uploaded-images/<?php echo $row['p_image']; ?>" class="card-img-top" alt="product">
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
        $query = "SELECT * FROM products WHERE p_cat = 2";
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
<section class="product_about mt-5">
    <div class="container-xxl mb-5">
        <ul class="list-unstyled">
            <li><a href="#">our Bedstore Sofas</a></li>
            <li><a href="#">delivery &amp; guarantees</a></li>
            <li><a href="#">request swatches &amp; brochure</a></li>
            <li><a href="#">faq's</a></li>
        </ul>
    </div>
</section>
<section class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-start d-flex justify-content-around">
                <i class="fa-solid fa-envelope-open-text"></i>
                <h2 class="ps-4">signup to our newsletter</h2>
            </div>
            <div class="col-lg-6">
                <div class="newslatter-item">
                    <form action="#" class="subscribe-form">
                        <input type="text" placeholder="Enter Your Mail" />
                        <button type="button">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>