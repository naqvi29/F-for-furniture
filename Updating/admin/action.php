<?php
include('../connect.php');
if (isset($_POST['low'])) {
    $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id INNER JOIN brands ON products.p_brand = brand_id WHERE status LIKE 0 ORDER BY p_price ASC";
    $result = mysqli_query($conn, $query);
}
if (isset($_POST['high'])) {
    $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id INNER JOIN brands ON products.p_brand = brand_id WHERE status LIKE 0 ORDER BY p_price DESC";
    $result = mysqli_query($conn, $query);
}
if (isset($_POST['atoz'])) {
    $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id INNER JOIN brands ON products.p_brand = brand_id WHERE status LIKE 0 ORDER BY p_name ASC";
    $result = mysqli_query($conn, $query);
}
if (isset($_POST['ztoa'])) {
    $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id INNER JOIN brands ON products.p_brand = brand_id WHERE status LIKE 0 ORDER BY p_name DESC";
    $result = mysqli_query($conn, $query);
}
if(isset($_POST['default'])){
    $query = "SELECT * FROM products INNER JOIN categories ON products.p_cat = cat_id INNER JOIN brands ON products.p_brand = brand_id WHERE status LIKE 0";
    $result = mysqli_query($conn,$query);
}
while ($row = mysqli_fetch_assoc($result)) {
?>
    <div class="d-block d-sm-flex align-items-center py-4 border-bottom"><a class="d-block mb-3 mb-sm-0 me-sm-4 ms-sm-0 mx-auto" style="width: 12.5rem;"><img class="rounded-3" src="../uploaded-images/<?php echo $row['p_image'] ?>" alt="Product"></a>
        <div class="text-center text-sm-start">
            <h3 class="h6 product-title mb-2"><a type="button" data-pid="<?php echo $row['p_id']; ?>" id="openmodelbtna"><?php echo $row['p_name'] ?></a></h3>
            <div class="d-inline-block text-accent">&euro;&nbsp;<small><?php echo $row['p_price'] ?></small></div>
            <div class="d-inline-block text-muted fs-ms border-start ms-2 ps-2">Category: <span class="fw-medium"><?php echo $row['cat_name'] ?></span></div>
            <div class="d-inline-block text-muted fs-ms border-start ms-2 ps-2">Brand: <span class="fw-medium"><?php echo $row['brand_name'] ?></span></div>
            <div class="d-inline-block text-muted fs-ms border-start ms-2 ps-2">Color: <span class="fw-medium"><?php echo $row['p_color'] ?></span></div>
            <div class="d-inline-block text-muted fs-ms border-start ms-2 ps-2">Size: <span class="fw-medium"><?php echo $row['p_size'] ?></span></div>
            <div class="d-flex justify-content-center justify-content-sm-start pt-3">
                <button class="btn bg-faded-accent btn-icon me-2" type="button" id="openmodelbtna" data-pid="<?php echo $row['p_id']; ?>" data-bs-toggle="tooltip" title="View Details"><i class="fa-solid fa-eye text-accent"></i></button>
                <a href="edit-product.php?id=<?php echo $row['p_id'] ?>" class="btn bg-faded-info btn-icon me-2" type="button" data-bs-toggle="tooltip" title="Edit"><i class="fa-regular fa-pen-to-square text-info"></i></a>
                <a href="delete-product.php?id=<?php echo $row['p_id'] ?>" class="btn bg-faded-danger btn-icon" type="button" data-bs-toggle="tooltip" title="Delete"><i class="fa-regular fa-trash-can text-danger"></i></a>
            </div>
        </div>
    </div>
<?php
}
?>