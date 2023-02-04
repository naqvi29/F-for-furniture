<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sig Up | Distinctive Bedstore</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>

    <div id="preloder">
        <div class="loader"></div>
    </div>

    <script>
        function register() {
            var form_element = document.getElementsByClassName('form_data');

            var form_data = new FormData();

            for (var count = 0; count < form_element.length; count++) {
                form_data.append(form_element[count].name, form_element[count].value);
            }

            document.getElementById('submit').disabled = true;

            var ajax_request = new XMLHttpRequest();

            ajax_request.open('POST', 'register_validate.php');

            ajax_request.send(form_data);

            ajax_request.onreadystatechange = function() {
                if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                    document.getElementById('submit').disabled = false;

                    var response = JSON.parse(ajax_request.responseText);

                    if (response.success != '') {
                        document.getElementById('signup_form').reset();

                        alert(response.success);
                        document.location.href = "login.php";

                        document.getElementById('username_error').innerHTML = '';
                        document.getElementById('email_error').innerHTML = '';
                        document.getElementById('pass_error').innerHTML = '';
                        document.getElementById('con_pass_error').innerHTML = '';
                    } else {

                        document.getElementById('username_error').innerHTML = response.username_error;
                        document.getElementById('email_error').innerHTML = response.email_error;
                        document.getElementById('pass_error').innerHTML = response.pass_error;
                        document.getElementById('con_pass_error').innerHTML = response.con_pass_error;
                    }


                }
            }
        }
    </script>


    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>REGISTRATION</h2>
                        <form id="signup_form" method="POST">
                            <div class="group-input">
                                <label for="username">Username</label>
                                <input type="text" class="form_data" id="username" name="username">
                                <span class="text-danger" style="font-weight: 600;" id="username_error"></span>
                            </div>
                            <div class="group-input">
                                <label for="email">Email</label>
                                <input type="email" class="form_data" id="email" name="email">
                                <span class="text-danger" style="font-weight: 600;" id="email_error"></span>
                            </div>
                            <div class="group-input">
                                <label for="pass">Password</label>
                                <input type="password" class="form_data" id="pass" name="pass">
                                <span class="text-danger" style="font-weight: 600;" id="pass_error"></span>
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Confirm Password</label>
                                <input type="password" class="form_data" id="con-pass" name="con-pass">
                                <span class="text-danger" style="font-weight: 600;" id="con_pass_error"></span>
                            </div>
                            <button type="submit" name="submit" id="submit" onclick="register(); return false;" class="site-btn register-btn">SIGN UP</button>
                        </form>
                        <div class="switch-login">
                            <a href="login.php" class="or-login">Or Sign In</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <?php
            include('footer.php');
        ?>