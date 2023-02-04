<?php
include('connect.php');
if (isset($_POST['low'])) {
    $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id WHERE p_cat = 1 ORDER BY p_price ASC";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
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
} elseif (isset($_POST['high'])) {
    $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id WHERE p_cat = 1 ORDER BY p_price DESC";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
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
} elseif (isset($_POST['atoz'])) {
    $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id WHERE p_cat = 1 ORDER BY p_name ASC";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
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
} elseif (isset($_POST['ztoa'])) {
    $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id WHERE p_cat = 1 ORDER BY p_name DESC";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
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
}
if (isset($_POST['2'])) {
    $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id WHERE p_cat = 1 AND p_seats LIKE 0";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo "<script>alert('Sorry! No product found');</script>";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
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
    }
} elseif (isset($_POST['3'])) {
    $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id WHERE p_cat = 1 AND p_seats LIKE 1";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo "<script>alert('Sorry! No product found');     
        document.location.href='bedstore-sofas.php';</script>";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
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
    }
} elseif (isset($_POST['4'])) {
    $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id WHERE p_cat = 1 AND p_seats LIKE 2";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        ?>
            <script>
                alert('Sorry! No product found');
                
            </script>
        <?php
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
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
    }
}
?>