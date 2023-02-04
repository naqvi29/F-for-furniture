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

    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>
    <?php
    $admin_email_error = '';
    $admin_pass_error = '';
    if (isset($_POST['submit'])) {

        require('../connect.php');

        $admin_email = $_POST['admin_email'];
        $admin_pass = $_POST['admin_pass'];


        if (empty($admin_email)) {
            $admin_email_error = "Please enter your email";
        }
        if (empty($admin_pass)) {
            $admin_pass_error = "Please enter your password";
        }

        if ($admin_email_error == '' && $admin_pass_error == '') {

            $admin_email = mysqli_real_escape_string($conn, $_POST['admin_email']);
            $admin_pass = mysqli_real_escape_string($conn, $_POST['admin_pass']);

            $query = "SELECT * FROM `admintable` WHERE `admin_email` = '$admin_email' AND `admin_password` = '$admin_pass';";
            $result = mysqli_query($conn, $query);
            $num = mysqli_num_rows($result);

            if ($num == 1) {
                session_start();
                $_SESSION['admin_logged'] = true;
                $_SESSION['admin_email'] = "$admin_email";
                echo "<script>document.location.href='index.php'</script>";
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
                        <h2>ADMIN LOGIN</h2>
                        <form method="post">
                            <div class="group-input">
                                <label for="email">Email</label>
                                <input type="email" id="admin_email" name="admin_email">
                                <span class="text-danger" style="font-weight: 600;"><?php echo $admin_email_error; ?></span>
                            </div>
                            <div class="group-input">
                                <label for="pass">Password</label>
                                <input type="password" id="admin_pass" name="admin_pass">
                                <span class="text-danger" style="font-weight: 600;"><?php echo $admin_pass_error; ?></span>
                            </div>
                            <button type="submit" name="submit" class="site-btn login-btn">Log In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>