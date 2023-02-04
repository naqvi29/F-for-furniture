<?php
$title = "Add New Product"; 
include('header.php');
include('connect.php'); 
?>

<?php
$statusMsg = '';
if (isset($_POST['submit'])) {
    $p_name = $_POST['p_name'];
    $p_brand = $_POST['p_brand'];
    $p_price = $_POST['p_price'];
    $p_desc = $_POST['p_desc'];
    $p_image = $_FILES['p_image']['name'];
    $tmp_img = $_FILES['p_image']['tmp_name'];
    $folder = "./uploaded-images/" . $p_image;
    $p_tags = $_POST['p_tags'];
    $p_cat = $_POST['p_cat'];
    $p_color = $_POST['p_color'];
    $status = $_POST['status'];
    $p_size = $_POST['p_size'];
    $p_seats = $_POST['p_seats'];

    $imgformat = ['jpg', 'jpeg', 'png', 'webp'];

    if ($imgformat) {
        move_uploaded_file($tmp_img, $folder);
        $sql = "INSERT INTO products (p_name, p_brand, p_price, p_desc, p_image, p_tags, p_cat, p_color, status, p_size, p_seats)
        VALUES ('$p_name', '$p_brand', '$p_price', '$p_desc', '$p_image', '$p_tags', '$p_cat', '$p_color', '$status', '$p_size', '$p_seats' );";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Product Added');</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
<div class="container">
    <div class="col-lg-12">
        <div class="contact-form">
            <div class="leave-comment">
                <h4>ADD PRODUCT</h4>
                <form method="POST" class="comment-form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" class="form_data" name="p_name" id="p_name" placeholder="Product Name">
                        </div>
                        <div class="col-lg-6">
                            <label for="">choose brand</label>
                            <select name="p_brand" id="p_brand">
                                <option value="">Select</option>
                                <?php
                                $sql = "SELECT * FROM brands";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {

                                ?>
                                    <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brand_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="p_price" id="p_price" placeholder="product price">
                        </div>
                        <div class="col-lg-6">
                            <textarea class="form_data" name="p_desc" id="p_desc" placeholder="Product Description"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <input type="file" name="p_image" id="p_image">
                            <span class="text-danger"><?php echo $statusMsg ?></span>
                        </div>
                        <div class="col-lg-6">
                            <textarea class="form_data" name="p_tags" id="p_tags" placeholder="Product Tags"></textarea>
                        </div>
                        <div class="col-lg-6">
                            <label for="">choose category</label>
                            <select name="p_cat" id="p_cat">
                                <option value="">Select</option>
                                <?php
                                $sql = "SELECT * FROM categories";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {

                                ?>
                                    <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Choose color</label>
                            <select name="p_color" id="p_color">
                                <option value="">Select</option>
                                <?php
                                $sql = "SELECT * FROM colors";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {

                                ?>
                                    <option value="<?php echo $row['color_name']; ?>"><?php echo $row['color_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Status</label>
                            <select name="status" id="status">
                                <option value="">Select</option>
                                <option value="0">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Size</label>
                            <select name="p_size" id="p_size">
                                <option value="">Select</option>
                                <option value="1">Extra Small</option>
                                <option value="2">Small</option>
                                <option value="3">Medium</option>
                                <option value="4">Large</option>
                                <option value="5">Extra Large</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Seats</label>
                            <select name="p_seats" id="p_seats">
                                <option value="">Select</option>
                                <option value="0">2 Seats</option>
                                <option value="1">3 Seats</option>
                                <option value="2">4 Seats</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <button type="submit" name="submit" id="submit" class="site-btn">Send message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>