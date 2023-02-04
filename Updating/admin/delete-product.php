<?php
include('../connect.php');

$id = $_GET['id'];

$query = "DELETE FROM products WHERE `p_id`= '$id'";

$result = mysqli_query($conn, $query);

if (!$result) {
    echo "<script>alert('Error : " . mysqli_error($con) . "');</script>";
} else {
    echo '<script>
        window.location.href = "view-products.php";
        alert("Product Deleted"); 
        </script>';
}
?>