<?php
include('connect.php');
session_start();
if (isset($_POST['quantity'])) {
    $item_id = $_GET['id'];
    $user_id = $_SESSION['userid'];
    $qty = $_POST['quantity'];
    if (!isset($_SESSION['useremail'])) {
        header("Location: login.php");
    } else {
        $check_query = "SELECT * FROM `cart` WHERE `user_id` = '$user_id' AND `item_id` = '$item_id' AND `order_status` = 'Pending'";
        $check_query_run = mysqli_query($conn, $check_query);
        $num_rows = mysqli_num_rows($check_query_run);
        if ($num_rows > 0) {

            echo "<script>alert('Product already exists in your cart'); 
            window.history.back();</script>";
        } else {
            $item_id = $_GET['id'];
            $user_id = $_SESSION['userid'];
            $qty = $_POST['quantity'];

            $sql = "INSERT INTO `cart`(`user_id`, `item_id`, `qty`, `order_status`) VALUES ('$user_id','$item_id','$qty','Pending')";
            $result = mysqli_query($conn, $sql);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}
if (isset($_POST['add_to_cart'])) {
    $item_id = $_GET['id'];
    $user_id = $_SESSION['userid'];
    if (!isset($_SESSION['useremail'])) {
        header("Location: login.php");
    } else {
        $check_query = "SELECT * FROM `cart` WHERE `user_id` = '$user_id' AND `item_id` = '$item_id' AND `order_status` = 'Pending'";
        $check_query_run = mysqli_query($conn, $check_query);
        $num_rows = mysqli_num_rows($check_query_run);
        if ($num_rows > 0) {

            echo "<script>alert('Product already exists in your cart');
            window.history.back();</script>";
        } else {
            $item_id = $_GET['id'];
            $user_id = $_SESSION['userid'];

            $sql = "INSERT INTO `cart`(`user_id`, `item_id`, `qty`, `order_status`) VALUES ('$user_id','$item_id',1,'Pending')";
            $result = mysqli_query($conn, $sql);
?>
            <script type="text/javascript">
                window.addEventListener('load', function() {
                    $('#exampleModal').modal('show');
                    $('.close-modal-btn').on('click', function() {
                        window.history.back();
                    });
                });
            </script>
<?php
        }
    }
}
?>
<!-- Success Modal CSS End -->
<style>
    .modal-dialog {
        color: #636363;
        width: 325px;
        font-size: 14px;
    }

    .modal-dialog .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
    }

    .modal-dialog .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
    }

    .modal-dialog .modal-footer .close-modal-btn {
        background-color: #1ab394;
        display: block;
        width: 100%;
        color: #fff;
        text-align: center;
    }

    #exampleModal .checkmark-circle {
        width: 150px;
        height: 150px;
        position: relative;
        display: inline-block;
        vertical-align: top;
    }

    .checkmark-circle .background {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: #1ab394;
        position: absolute;
    }

    #exampleModal .checkmark-circle .checkmark {
        border-radius: 5px;
    }

    #exampleModal .checkmark-circle .checkmark.draw:after {
        -webkit-animation-delay: 300ms;
        -moz-animation-delay: 300ms;
        animation-delay: 300ms;
        -webkit-animation-duration: 1s;
        -moz-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-timing-function: ease;
        -moz-animation-timing-function: ease;
        animation-timing-function: ease;
        -webkit-animation-name: checkmark;
        -moz-animation-name: checkmark;
        animation-name: checkmark;
        -webkit-transform: scaleX(-1) rotate(135deg);
        -moz-transform: scaleX(-1) rotate(135deg);
        -ms-transform: scaleX(-1) rotate(135deg);
        -o-transform: scaleX(-1) rotate(135deg);
        transform: scaleX(-1) rotate(135deg);
        -webkit-animation-fill-mode: forwards;
        -moz-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
    }

    #exampleModal .checkmark-circle .checkmark:after {
        opacity: 1;
        height: 75px;
        width: 37.5px;
        -webkit-transform-origin: left top;
        -moz-transform-origin: left top;
        -ms-transform-origin: left top;
        -o-transform-origin: left top;
        transform-origin: left top;
        border-right: 15px solid #fff;
        border-top: 15px solid #fff;
        border-radius: 2.5px !important;
        content: '';
        left: 35px;
        top: 80px;
        position: absolute;
    }

    @-webkit-keyframes checkmark {
        0% {
            height: 0;
            width: 0;
            opacity: 1;
        }

        20% {
            height: 0;
            width: 37.5px;
            opacity: 1;
        }

        40% {
            height: 75px;
            width: 37.5px;
            opacity: 1;
        }

        100% {
            height: 75px;
            width: 37.5px;
            opacity: 1;
        }
    }

    @-moz-keyframes checkmark {
        0% {
            height: 0;
            width: 0;
            opacity: 1;
        }

        20% {
            height: 0;
            width: 37.5px;
            opacity: 1;
        }

        40% {
            height: 75px;
            width: 37.5px;
            opacity: 1;
        }

        100% {
            height: 75px;
            width: 37.5px;
            opacity: 1;
        }
    }

    @keyframes checkmark {
        0% {
            height: 0;
            width: 0;
            opacity: 1;
        }

        20% {
            height: 0;
            width: 37.5px;
            opacity: 1;
        }

        40% {
            height: 75px;
            width: 37.5px;
            opacity: 1;
        }

        100% {
            height: 75px;
            width: 37.5px;
            opacity: 1;
        }
    }
</style>
<!-- Success Modal CSS End -->
<!-- Modal Start-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h1 style="text-align:center;">
                    <div class="checkmark-circle">
                        <div class="background"></div>
                        <div class="checkmark draw"></div>
                    </div>
                    <h1>
                        <p class="text-center mt-3">Item added in your cart. Please check your cart for further process.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close-modal-btn" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/responsive-style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>