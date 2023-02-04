<?php
$title = "Cart | Distinctive Bedstore";
include('connect.php');
include('header.php');
?>
<section class="cart_first">
    <div class="container-fluid container-xxl">
        <div class="row">
            <div class="col-lg-4">
                <h2 class="text-start">basket</h2>
            </div>
            <div class="col-lg-8">
                <a href=""><img src="img/Finance-Options-Available-4-1.png" class="img-fluid" alt=""></a>
            </div>
        </div>
        <?php if ($num_row == 0) {
        ?>
            <p class="empty_text">Your basket is currently empty.</p>
        <?php
        } ?>

    </div>
</section>
<section class="cart_btn container-xxl">
    <a href="shop.php" class="btn">return to shop</a>
</section>
<?php
if ($num_row > 0) {
?>
    <section class="cart_product">
        <div class="container-fluid container-xxl">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require('connect.php');

                                $user_id = $_SESSION['userid'];
                                $cart_query = "SELECT it.p_id,it.p_name,it.p_price,it.p_image,qty,order_status,id FROM cart ut INNER JOIN products it ON it.p_id=ut.item_id WHERE ut.user_id='$user_id' AND order_status = 'Pending'";
                                $cart_query_run = mysqli_query($conn, $cart_query);
                                $num_row = mysqli_num_rows($cart_query_run);
                                $sum = 0;
                                while ($row = mysqli_fetch_assoc($cart_query_run)) {
                                    $item_id = $row['p_id'];
                                    $qty = $row['qty'];
                                    $price = $row['p_price'];
                                    $total = $price * $qty;
                                    $sum = $sum + $total;
                                ?>
                                    <tr>
                                        <td class="cart-pic first-row"><img src="./uploaded-images/<?php echo $row['p_image']; ?>" alt=""></td>
                                        <td class="cart-title first-row">
                                            <h5><?php echo $row['p_name']; ?></h5>
                                        </td>
                                        <td class="p-price first-row">&euro; <?php echo $row['p_price']; ?></td>
                                        <td class="qua-col first-row">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" min="1" onkeydown="return false" value="<?php echo $qty; ?>">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-price first-row">&euro; <?php echo $total; ?></td>
                                        <td class="close-td first-row"><a href="remove-cart-item.php?id=<?php echo $item_id; ?>" class="fa-solid fa-xmark"></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <table class="table table-responsive">
                        <tbody>
                            <tr class="border-bottom">
                                <th class="p-3">Subtotal</th>
                                <td class="ps-4">&euro; <?php echo $sum; ?></td>
                            </tr>

                            <tr>
                                <th class="p-3">Total</th>
                                <td class="ps-4">&euro; <?php echo $sum; ?> <script> document.write(total);</script></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="checkout.php?id=<?php echo $sum; ?>" class="proceed_btn">proceed to checkout</a>
                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script type="text/javascript">
                    $(document).ready(function() {

                        $('input[name="shipping"]').click(function() {
                            var shipping = $('input[name="shipping"]:checked').val();
                            if(shipping == 49){
                                var total = "<?php echo $sum;?>";
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </section>
<?php
}
?>
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
<?php 
    include('footer.php');
?>