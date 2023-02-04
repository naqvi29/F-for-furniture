<?php
include('connect.php');

// if (isset($_POST['9'])) {
//     $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id LIMIT 9";
//     $result = mysqli_query($conn, $query);
// }
// if (isset($_POST['18'])) {
//     $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id LIMIT 18";
//     $result = mysqli_query($conn, $query);
// }
// if (isset($_POST['27'])) {
//     $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id LIMIT 27";
//     $result = mysqli_query($conn, $query);
// }
// if (isset($_POST['36'])) {
//     $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id LIMIT 36";
//     $result = mysqli_query($conn, $query);
// }
if (isset($_POST['low'])) {
    $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id ORDER BY p_price ASC";
    $result = mysqli_query($conn, $query);
}
if (isset($_POST['high'])) {
    $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id ORDER BY p_price DESC";
    $result = mysqli_query($conn, $query);
}
if (isset($_POST['atoz'])) {
    $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id ORDER BY p_name ASC";
    $result = mysqli_query($conn, $query);
}
if (isset($_POST['ztoa'])) {
    $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id ORDER BY p_name DESC";
    $result = mysqli_query($conn, $query);
}
if(isset($_POST['default'])){
    $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id";
    $result = mysqli_query($conn, $query);
}
?>
<div class="product-list">
    <div class="row">
        <?php
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
        ?>

    </div>
</div>