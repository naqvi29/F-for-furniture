<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<?php
$title = "Product Search | Distinctive Bedstore";
include('header.php');
include('connect.php');
if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM `products` WHERE `p_name` LIKE '%$keyword%' OR `p_tags`  LIKE '%$keyword%'";
    $run = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($run);
?>
    <div class="container-xxl product_heading">
        <h2>Search Results</h2>
        <hr>
    </div>
    <section class="bedstore_products">
        <div class="container-xxl">
            <div class="row g-4">
                <?php
                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($run)) {
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
                } else {
                    ?>
                    <p>Sorry! No product found</p>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
<?php
}
?>

<?php
include('footer.php');
?>