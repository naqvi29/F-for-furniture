<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Distinctive</title>


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
    <?php
    $email_error = '';
    $pass_error = '';

    if (isset($_POST['submit'])) {

        include('connect.php');

        $email = $_POST['email'];
        $pass = $_POST['pass'];


        if (empty($email)) {
            $email_error = "Please enter your email";
        }
        if (empty($pass)) {
            $pass_error = "Please enter your password";
        }

        if ($email_error == '' && $pass_error == '') {

            /* User Credentials */

            $email = $conn->real_escape_string($_POST['email']);
            $pass = $conn->real_escape_string(md5($_POST['pass']));

            $query = "SELECT * FROM `users` WHERE user_email = '$email' AND user_password = '$pass'";
            $result = mysqli_query($conn, $query);
            $num = mysqli_num_rows($result);

            if ($num == 1) {
                $row = mysqli_fetch_array($result);
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['useremail'] = $email;
                $_SESSION['userid'] = $row['user_id'];
                $_SESSION['username'] = $row['user_name'];
                echo "<script>alert('log in successfully'); document.location.href='index.php'</script>";
            } else {
                echo "<script>alert('Invalid Credentials');</script>";
            }
        }
    }
    ?>


    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>LOGIN</h2>
                        <form method="post">
                            <div class="group-input">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email">
                                <span class="text-danger" style="font-weight: 600;"><?php echo $email_error; ?></span>
                            </div>
                            <div class="group-input">
                                <label for="pass">Password</label>
                                <input type="password" id="pass" name="pass">
                                <span class="text-danger" style="font-weight: 600;"><?php echo $pass_error; ?></span>
                            </div>
                            <!-- <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Save Password
                                        <input type="checkbox" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="#" class="forget-pass">Forget your Password</a>
                                </div>
                            </div> -->
                            <button type="submit" name="submit" class="site-btn login-btn">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="register.php" class="or-login">Or Create An Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include('footer.php');
    ?>