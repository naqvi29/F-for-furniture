<?php
$title = "Checkout | Distinctive Bedstore";
include('header.php');
include('connect.php');
if(!isset($_SESSION)){
    session_start();
}
?>
<div class="container-fluid my-3">
    <h2 class="checkout_heading">checkout</h2>
</div>
<?php
$amount = $_GET['id'];
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#checkout_form').submit(function(e) {
            e.preventDefault();
            var fname = $('input#fname').val();
            var lname = $('input#lname').val();
            var country = $('#country').val();
            var street = $('input#street').val();
            var town = $('input#town').val();
            var email = $('input#email').val();
            var phone = $('input#phone').val();
            // rgex for inputs
            var rgexfname = /^[a-zA-Z-' ]*$/;
            var rgexlname = /^[a-zA-Z-' ]*$/;
            var rgexemail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var rgexphone = /\+?\d{1,4}?[-.\s]?\(?\d{1,3}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}/g;
            var rgexcnum = /^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14})$/;
            var rgexcname = /^[a-zA-Z-' ]*$/;
            var rgexcvc = /^[0-9]{3,4}$/;
            if (fname == "") {
                $('input#fname').focus();
                $('#fname_error').html("Please enter your first name");
                $('input#fname').css('border', '1px solid red');
            } else if (!rgexfname.test(fname)) {
                $('input#fname').focus();
                $('#fname_error').html("Only letters and white space are allowed");
                $('input#fname').css('border', '1px solid red');
            } else {
                $('#fname_error').html("");
                $('input#fname').css('border', '1px solid green');
            }
            if (lname == "") {
                $('input#lname').focus();
                $('#lname_error').html("Please enter your last name");
                $('input#lname').css('border', '1px solid red');
            } else if (!rgexlname.test(lname)) {
                $('input#lname').focus();
                $('#lname_error').html("Only letters and white space are allowed");
                $('input#lname').css('border', '1px solid red');
            } else {
                $('#lname_error').html("");
                $('input#lname').css('border', '1px solid green');
            }
            if (country == "") {
                $('#country').focus();
                $('#country_error').html("Please select your country");
                $('#country').css('border', '1px solid red');
            } else if (country != "") {
                $('#country_error').html("");
                $('#country').css('border', '1px solid Green');
            }
            if (street == "") {
                $('input#street').focus();
                $('#street_error').html("Please enter your address");
                $('input#street').css('border', '1px solid red');
            } else if (street != "") {
                $('#street_error').html("");
                $('input#street').css('border', '1px solid Green');
            }
            if (town == "") {
                $('input#town').focus();
                $('#town_error').html("Please enter your town or city name");
                $('input#town').css('border', '1px solid red');
            } else if (town != "") {
                $('#town_error').html("");
                $('input#town').css('border', '1px solid Green');
            }
            if (email == "") {
                $('input#email').focus();
                $('#email_error').html("Please enter your email");
                $('input#email').css('border', '1px solid red');
            } else if (!rgexemail.test(email)) {
                $('input#email').focus();
                $('#email_error').html("Email is not valid");
                $('input#email').css('border', '1px solid red');
            } else {
                $('#email_error').html("");
                $('input#email').css('border', '1px solid green');
            }
            if (phone == "") {
                $('input#phone').focus();
                $('#phone_error').html("Please enter your phone number");
                $('input#phone').css('border', '1px solid red');
            } else if (!rgexphone.test(phone)) {
                $('input#phone').focus();
                $('#phone_error').html("Phone number is not valid");
                $('input#phone').css('border', '1px solid red');
            } else {
                $('#phone_error').html("");
                $('input#phone').css('border', '1px solid green');
            }
            var notchecked = !$('input[name="flexRadioDefault"]').is(':checked');
            var checked = $('input[name="flexRadioDefault"]:checked').val();
            if (notchecked) {
                $('#exampleModal').modal('show');
            } else if (checked == 'Card') {
                var cnum = $('input#cnum').val();
                var cname = $('input#cname').val();
                var cexp = $('input#cexp').val();
                var cvc = $('input#cvc').val();
                if (cnum == "") {
                    $('input#cnum').focus();
                    $('#cnum_error').html("Please enter your card number");
                    $('input#cnum').css('border', '1px solid red');
                } else if (!rgexcnum.test(cnum)) {
                    $('input#cnum').focus();
                    $('#cnum_error').html("Card number is not valid");
                    $('input#cnum').css('border', '1px solid red');
                } else {
                    $('#cnum_error').html("");
                    $('input#cnum').css('border', '1px solid green');
                }
                if (cname == "") {
                    $('input#cname').focus();
                    $('#cname_error').html("Please enter your full name");
                    $('input#cname').css('border', '1px solid red');
                } else if (!rgexcname.test(cname)) {
                    $('input#cname').focus();
                    $('#cname_error').html("Only letters and white space are allowed");
                    $('input#cname').css('border', '1px solid red');
                } else {
                    $('#cname_error').html("");
                    $('input#cname').css('border', '1px solid green');
                }
                if (cvc == "") {
                    $('input#cvc').focus();
                    $('#cvc_error').html("Please enter your cvc code");
                    $('input#cvc').css('border', '1px solid red');
                } else if (!rgexcvc.test(cvc)) {
                    $('input#cvc').focus();
                    $('#cvc_error').html("Please enter correct cvc code");
                    $('input#cvc').css('border', '1px solid red');
                } else {
                    $('#cvc_error').html("");
                    $('input#cvc').css('border', '1px solid green');
                }
                if (cexp == "") {
                    $('input#cexp').focus();
                    $('#cexp_error').html("Please enter your card expiry");
                    $('input#cexp').css('border', '1px solid red');
                } else {
                    $('#cexp_error').html("");
                    $('input#cexp').css('border', '1px solid green');
                }
            }
            if (fname != "" && lname != "" && country != "" && street != "" && town != "" && email != "" && phone != "") {
                if (checked == "COD") {
                    $.ajax({
                        type: "POST",
                        url: "checkout-complete.php",
                        data: $(this).serializeArray(),
                        success: function() {
                            $('#checkout_form').trigger('reset');
                            $('#staticBackdrop').modal('show');
                        }
                    });
                } else if (checked == "Card" && cnum != "" && cname != "" && cexp != "" && cvc != "") {
                    $.ajax({
                        type: "POST",
                        url: "checkout-complete.php",
                        data: $(this).serializeArray(),
                        success: function() {
                            $('#checkout_form').trigger('reset');
                            $('#staticBackdrop').modal('show');
                        }
                    });
                }
            }
        });
    });
</script>

<section class="checkout-section spad">
    <div class="container-fluid p-3">
        <form action="" method="POST" class="checkout-form" id="checkout_form">
            <div class="row">
                <div class="col-lg-6">
                    <h4>Biiling Details</h4>
                    <div class="row">
                        <input type="text" name="amount" hidden value="<?php echo $amount; ?>">
                        <div class="col-lg-6">
                            <label for="fir">First Name<span id="fname_error">*</span></label>
                            <input type="text" id="fname" name="fname">
                        </div>
                        <div class="col-lg-6">
                            <label for="last">Last Name<span id="lname_error">*</span></label>
                            <input type="text" id="lname" name="lname">
                        </div>
                        <div class="col-lg-12">
                            <label for="cun-name">Company Name ( optional )</label>
                            <input type="text" id="company" name="company">
                        </div>
                        <?php

                        $array = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

                        ?>
                        <div class="col-lg-12">
                            <label for="cun">Country<span id="country_error">*</span></label>
                            <select name="country" id="country">
                                <option value="">Select</option>
                                <?php
                                foreach ($array as $countries) {
                                ?>
                                    <option value="<?php echo $countries; ?>"><?php echo $countries; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label for="street">Street Address<span id="street_error">*</span></label>
                            <input type="text" id="street" name="street" class="street-first" placeholder="House number and street name">
                            <input type="text" name="apartment" placeholder="Apartment, suite, unit, etc. (optional)">
                        </div>
                        <div class="col-lg-12">
                            <label for="zip">Postcode / ZIP (optional)</label>
                            <input type="tel" id="zip" name="zip">
                        </div>
                        <div class="col-lg-12">
                            <label for="town">Town / City<span id="town_error">*</span></label>
                            <input type="text" id="town" name="town">
                        </div>
                        <div class="col-lg-6">
                            <label for="email">Email Address<span id="email_error">*</span></label>
                            <input type="email" id="email" name="email">
                        </div>
                        <div class="col-lg-6">
                            <label for="phone">Phone<span id="phone_error">*</span></label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                        <div class="col-lg-12">
                            <h2 class="payment_heading">payment options</h2>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="COD">
                                <h2 class="h6 pb-3 mb-2"><i class="fa-solid fa-hand-holding-dollar fs-lg me-2 mt-n1 align-middle"></i>Cash
                                    On Delivery (COD)</h2>
                                <p>You will receive the parcel in 3-5 working days. Please be in touch with our
                                    delivery person for a better experience
                                    Happy Shopping! :)</p>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="Card">
                                <h2 class="h6 pb-3 mb-2"><i class="fa-regular fa-credit-card fs-lg me-2 mt-n1 align-middle"></i>Credit
                                    Card</h2>
                                <div class="credit-card-form row">
                                    <div class="mb-3 col-sm-6">
                                        <label for="fir">Card Number<span id="cnum_error">*</span></label>
                                        <input type="tel" name="cnum" id="cnum" placeholder="">
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="fir">Full Name<span id="cname_error">*</span></label>
                                        <input type="text" name="cname" id="cname" placeholder="">
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="fir">Card Expiry<span id="cexp_error">*</span></label>
                                        <input type="month" value="2023-01" name="cexp" id="cexp">
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="fir">CVC<span id="cvc_error">*</span></label>
                                        <input type="tel" name="cvc" id="cvc">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="col site-btn place-btn">Place Order</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="place-order position-sticky">
                        <h4>Your Order</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li>Product <span>Total</span></li>
                                <?php
                                $cart_query = "SELECT it.p_id,it.p_name,it.p_price,it.p_image,qty,order_status,id FROM cart ut INNER JOIN products it ON it.p_id=ut.item_id WHERE ut.user_id='$user_id' AND order_status = 'Pending'";
                                $cart_query_run = mysqli_query($conn, $cart_query);
                                $sum = 0;
                                while ($row = mysqli_fetch_array($cart_query_run)) {
                                    $qty = $row['qty'];
                                    $price = $row['p_price'];
                                    $name = $row['p_name'];
                                    $total = $price * $qty;
                                    $sum = $sum + $total;
                                ?>
                                    <li class="fw-normal"><?php echo $name; ?> x <?php echo $qty; ?> <span>&euro; <?php echo $price; ?></span></li>
                                <?php
                                }
                                ?>
                                <li class="total-price text-light">Total <span>&euro; <?php echo $sum; ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="img/complete.webp" style="width: 18.5rem;" alt="">
                <h5 class="text-center">Congrats!</h5>
                <p class="text-center">Your order has been completed.</p>
            </div>
            <div class="modal-footer">
                <a href="shop.php" class="btn">Close</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal HTML -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>
                <h4 class="modal-title w-100">Alert!</h4>
            </div>
            <div class="modal-body">
                <p class="text-center">Please select payment method.</p>
                <p>Please check your email to see order details.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close-modal-btn" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<style>
    #staticBackdrop .modal-body h5 {
        text-align: center;
        font-size: 26px;
        margin: 0px 0 10px;
    }

    #staticBackdrop .modal-footer .btn {
        display: block;
        width: 100%;
        color: #fff;
        background: #e7ab3c;
        border: 1px solid #e7ab3c;
    }

    #staticBackdrop .modal-dialog .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
    }

    #exampleModal .modal-dialog {
        color: #636363;
        width: 325px;
        font-size: 14px;
    }

    #exampleModal .modal-dialog .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
    }

    #exampleModal .modal-dialog .modal-header {
        border-bottom: none;
        position: relative;
    }

    #exampleModal .modal-dialog h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -15px;
    }

    #exampleModal .modal-dialog .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
    }

    #exampleModal .modal-dialog .modal-footer .close-modal-btn {
        background-color: #ef513a;
        display: block;
        width: 100%;
        color: #fff;
        text-align: center;
    }

    #exampleModal .modal-dialog .icon-box {
        color: #fff;
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: -70px;
        width: 95px;
        height: 95px;
        border-radius: 50%;
        z-index: 9;
        background: #ef513a;
        padding: 15px;
        text-align: center;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    #exampleModal .modal-dialog .icon-box i {
        font-size: 58px;
        position: relative;
        top: 3px;
    }
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<?php
include('footer.php');
?>