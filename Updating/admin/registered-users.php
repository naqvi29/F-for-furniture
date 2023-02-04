<?php include('../connect.php');
require('auth.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard | Registered Users</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Cartzilla - Bootstrap E-commerce Template">
    <meta name="keywords" content="bootstrap, shop, e-commerce, market, modern, responsive,  business, mobile, bootstrap, html5, css3, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="../favicon/site.webmanifest">
    <link rel="mask-icon" href="../favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css" />
    <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
    <!-- Body-->

<body class="handheld-toolbar-enabled">
    <!-- Sign in / sign up modal-->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link fw-medium active" href="#signin-tab" data-bs-toggle="tab" role="tab" aria-selected="true"><i class="ci-unlocked me-2 mt-n1"></i>Sign in</a></li>
                        <li class="nav-item"><a class="nav-link fw-medium" href="#signup-tab" data-bs-toggle="tab" role="tab" aria-selected="false"><i class="ci-user me-2 mt-n1"></i>Sign up</a></li>
                    </ul>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body tab-content py-4">
                    <form class="needs-validation tab-pane fade show active" autocomplete="off" novalidate id="signin-tab">
                        <div class="mb-3">
                            <label class="form-label" for="si-email">Email address</label>
                            <input class="form-control" type="email" id="si-email" placeholder="johndoe@example.com" required>
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="si-password">Password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="si-password" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 d-flex flex-wrap justify-content-between">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="si-remember">
                                <label class="form-check-label" for="si-remember">Remember me</label>
                            </div><a class="fs-sm" href="#">Forgot password?</a>
                        </div>
                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign in</button>
                    </form>
                    <form class="needs-validation tab-pane fade" autocomplete="off" novalidate id="signup-tab">
                        <div class="mb-3">
                            <label class="form-label" for="su-name">Full name</label>
                            <input class="form-control" type="text" id="su-name" placeholder="John Doe" required>
                            <div class="invalid-feedback">Please fill in your name.</div>
                        </div>
                        <div class="mb-3">
                            <label for="su-email">Email address</label>
                            <input class="form-control" type="email" id="su-email" placeholder="johndoe@example.com" required>
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="su-password">Password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="su-password" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="su-password-confirm">Confirm password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="su-password-confirm" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <main class="page-wrapper">
        <!-- Dashboard Navbar-->
        <header class="bg-light shadow-sm navbar-sticky">
            <div class="navbar navbar-expand-lg navbar-light">
                <div class="container"><a class="navbar-brand d-none d-sm-block flex-shrink-0 me-4 order-lg-1" href="index.html"><img src="../img/distinctive-chesterfields.svg" width="142" alt="Cartzilla"></a><a class="navbar-brand d-sm-none me-2 order-lg-1" href="index.html"><img src="img/logo-icon.png" width="74" alt="Cartzilla"></a>
                    <!-- Toolbar-->
                    <div class="navbar-toolbar d-flex align-items-center order-lg-3">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>
                        <a class="navbar-tool d-none d-lg-flex" href="dashboard-favorites.html"><span class="navbar-tool-tooltip">Favorites</span>
                            <div class="navbar-tool-icon-box"><i class="navbar-tool-icon fa-regular fa-heart"></i></div>
                        </a>
                        <div class="navbar-tool dropdown ms-2"><a class="navbar-tool-icon-box border dropdown-toggle" href="dashboard-sales.html"><img src="img/marketplace/account/avatar-sm.png" width="32" alt="Createx Studio"></a><a class="navbar-tool-text ms-n1" href="dashboard-sales.html"><small>Createx Std.</small>$1,375.00</a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div style="min-width: 14rem;">
                                    <h6 class="dropdown-header">Account</h6><a class="dropdown-item d-flex align-items-center" href="dashboard-settings.html"><i class="ci-settings opacity-60 me-2"></i>Settings</a><a class="dropdown-item d-flex align-items-center" href="dashboard-purchases.html"><i class="ci-basket opacity-60 me-2"></i>Purchases</a><a class="dropdown-item d-flex align-items-center" href="dashboard-favorites.html"><i class="fa-regular fa-heart opacity-60 me-2"></i>Favorites<span class="fs-xs text-muted ms-auto">4</span></a>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Seller Dashboard</h6><a class="dropdown-item d-flex align-items-center" href="dashboard-sales.html"><i class="ci-dollar opacity-60 me-2"></i>Sales<span class="fs-xs text-muted ms-auto">$1,375.00</span></a><a class="dropdown-item d-flex align-items-center" href="dashboard-products.html"><i class="ci-package opacity-60 me-2"></i>Products<span class="fs-xs text-muted ms-auto">5</span></a><a class="dropdown-item d-flex align-items-center" href="dashboard-add-new-product.html"><i class="ci-cloud-upload opacity-60 me-2"></i>Add New Product</a><a class="dropdown-item d-flex align-items-center" href="dashboard-payouts.html"><i class="ci-currency-exchange opacity-60 me-2"></i>Payouts</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item d-flex align-items-center" href="account-signin.html"><i class="ci-sign-out opacity-60 me-2"></i>Sign Out</a>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-tool ms-4"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="marketplace-cart.html"><span class="navbar-tool-label">3</span><i class="navbar-tool-icon fa-solid fa-cart-shopping"></i></a></div>
                    </div>
                    <div class="collapse navbar-collapse me-auto order-lg-2" id="navbarCollapse">
                        <!-- Categories dropdown-->
                        <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle ps-lg-0" href="#" data-bs-toggle="dropdown"><i class="fa-solid fa-bars align-middle mt-n1 me-2"></i>Categories</a>
                                <ul class="dropdown-menu py-1">
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Photos</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item product-title fw-medium"><a href="marketplace-category.html">All Photos<i class="ci-arrow-right fs-xs ms-1"></i></a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Abstract</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Animals</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Architecture</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Beauty &amp; Fashion</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Business</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Education</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Food &amp; Drink</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Holidays</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Industrial</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">People</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Sports</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Technology</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Graphics</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item product-title fw-medium"><a href="#">All Graphics<i class="ci-arrow-right fs-xs ms-1"></i></a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Icons</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Illustartions</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Patterns</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Textures</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Web Elements</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">UI Design</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item product-title fw-medium"><a href="marketplace-category.html">All UI Design<i class="ci-arrow-right fs-xs ms-1"></i></a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">PSD Templates</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Sketch Templates</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Adobe XD Templates</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Figma Templates</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Web Themes</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item product-title fw-medium"><a href="marketplace-category.html">All Web Themes<i class="ci-arrow-right fs-xs ms-1"></i></a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">WordPress Themes</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Bootstrap Themes</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">eCommerce Templates</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Muse Templates</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Plugins</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Fonts</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item product-title fw-medium"><a href="marketplace-category.html">All Fonts<i class="ci-arrow-right fs-xs ms-1"></i></a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Blackletter</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Display</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Non Western</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Sans Serif</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Script</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Serif</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Slab Serif</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Symbols</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Add-Ons</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item product-title fw-medium"><a href="marketplace-category.html">All Add-Ons<i class="ci-arrow-right fs-xs ms-1"></i></a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Photoshop Add-Ons</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Illustrator Add-Ons</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Sketch Plugins</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Procreate Brushes</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">InDesign Palettes</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Lightroom Presets</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Other Software</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- Primary menu-->
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="index.html">Back to main demo</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </header>
        <!-- Dashboard header-->
        <div class="page-title-overlap bg-accent pt-4">
            <div class="container d-flex flex-wrap flex-sm-nowrap justify-content-center justify-content-sm-between align-items-center pt-2">
                <div class="d-flex align-items-center pb-3">
                    <div class="img-thumbnail rounded-circle position-relative flex-shrink-0" style="width: 6.375rem;"><img class="rounded-circle" src="img/avatar.png" alt="Createx Studio"></div>
                    <div class="ps-3">
                        <h3 class="text-light fs-lg mb-0">Admin Dashboard</h3><span class="d-block text-light fs-ms opacity-60 py-1">Distinctive Bedstore</span>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="text-sm-end me-5">
                        <div class="text-light fs-base">Total Products</div>
                        <?php
                        require('../connect.php');
                        $sql = "SELECT `p_id` FROM `products`";
                        $result = mysqli_query($conn, $sql);
                        $num_row = mysqli_num_rows($result);

                        ?>
                        <h3 class="text-light"><?php echo $num_row; ?></h3>
                    </div>
                    <div class="text-sm-end me-5">
                        <div class="text-light fs-base">Total Categories</div>
                        <?php
                        require('../connect.php');
                        $sql = "SELECT `cat_id` FROM `categories`";
                        $result = mysqli_query($conn, $sql);
                        $num_row = mysqli_num_rows($result);

                        ?>
                        <h3 class="text-light"><?php echo $num_row; ?></h3>
                    </div>
                    <div class="text-sm-end me-5">
                        <div class="text-light fs-base">Total Users</div>
                        <?php
                        require('../connect.php');
                        $sql = "SELECT `user_id` FROM `users`";
                        $result = mysqli_query($conn, $sql);
                        $num_row = mysqli_num_rows($result);

                        ?>
                        <h3 class="text-light"><?php echo $num_row; ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-5 pb-3">
            <div class="bg-light shadow-lg rounded-3 overflow-hidden">
                <div class="row">
                    <!-- Sidebar-->
                    <aside class="col-lg-4 pe-xl-5">
                        <!-- Account menu toggler (hidden on screens larger 992px)-->
                        <div class="d-block d-lg-none p-4"><a class="btn btn-outline-accent d-block" href="#account-menu" data-bs-toggle="collapse"><i class="fa-solid fa-bars me-2"></i>Account menu</a></div>
                        <!-- Actual menu-->
                        <div class="h-100 border-end mb-2">
                            <div class="d-lg-block collapse" id="account-menu">
                                <div class="bg-secondary p-4">
                                    <h3 class="fs-sm mb-0 text-muted">Account</h3>
                                </div>
                                <ul class="list-unstyled mb-0">
                                    <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="dashboard-settings.html"><i class="fa-solid fa-gear opacity-60 me-2"></i>Settings</a></li>
                                    <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="dashboard-purchases.html"><i class="fa-solid fa-basket-shopping opacity-60 me-2"></i>Purchases</a></li>
                                    <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="dashboard-favorites.html"><i class="fa-regular fa-heart opacity-60 me-2"></i>Favorites<span class="fs-sm text-muted ms-auto">4</span></a></li>
                                </ul>
                                <div class="bg-secondary p-4">
                                    <h3 class="fs-sm mb-0 text-muted">Seller Dashboard</h3>
                                </div>
                                <?php
                                $count_product_query = "SELECT * FROM products WHERE status LIKE 0";
                                $count_product_run = mysqli_query($conn, $count_product_query);
                                $row = mysqli_num_rows($count_product_run);
                                ?>
                                <ul class="list-unstyled mb-0">
                                    <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="dashboard-sales.html"><i class="fa-solid fa-euro-sign opacity-60 me-2"></i>Sales<span class="fs-sm text-muted ms-auto">$1,375.00</span></a></li>
                                    <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="index.php"><i class="fa-solid fa-cube opacity-60 me-2"></i>Products<span class="fs-sm text-muted ms-auto"><?php echo $row; ?></span></a></li>
                                    <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="add-product.php"><i class="fa-solid fa-upload opacity-60 me-2"></i>Add New Product</a></li>
                                    <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active" href="registered-users.php"><i class="fa-solid fa-user opacity-60 me-2"></i>Users</a></li>
                                    <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="dashboard-logout.php"><i class="fa-solid fa-right-from-bracket opacity-60 me-2"></i>Sign out</a></li>
                                </ul>
                                <hr>
                            </div>
                        </div>
                    </aside>
                    <!-- Content-->
                    <section class="col-lg-8 pt-lg-4 pb-4 mb-3">
                        <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
                            <!-- Title-->
                            <div class="d-sm-flex flex-wrap justify-content-between align-items-center pb-2">
                                <h2 class="h3 py-2 me-2 text-center text-sm-start">Registered Users</h2>
                            </div>

                            <div class="table-responsive">
                                <table class="table fs-sm mb-0 text-center">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>User Name</th>
                                            <th>User Email</th>
                                            <th>User Password</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('../connect.php');

                                        $query = "SELECT * FROM `users`";

                                        $result = mysqli_query($conn, $query);

                                        if (!$result) {
                                            echo "<script>alert(`Error :" . mysqli_error($conn) . "`);</script>";
                                        }
                                        ?>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['user_id']; ?></td>
                                                <td><?php echo $row['user_name']; ?></td>
                                                <td><?php echo $row['user_email']; ?></td>
                                                <td><?php echo $row['user_password']; ?></td>
                                                <td><a href="delete-user.php?id=<?php echo $row['user_id'] ?>" class="btn btn-sm btn-danger">Delete</a></td>
                                                <td><a href="edit-user.php?id=<?php echo $row['user_id']; ?>" class="btn btn-sm btn-success">Edit</a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
    <!-- Toolbar for handheld devices (Marketplace)-->
    <div class="handheld-toolbar">
        <div class="d-table table-layout-fixed w-100"><a class="d-table-cell handheld-toolbar-item" href="dashboard-favorites.html"><span class="handheld-toolbar-icon"><i class="fa-regular fa-heart"></i></span><span class="handheld-toolbar-label">Favorites</span></a><a class="d-table-cell handheld-toolbar-item" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" onclick="window.scrollTo(0, 0)"><span class="handheld-toolbar-icon"><i class="fa-solid fa-bars"></i></span><span class="handheld-toolbar-label">Menu</span></a><a class="d-table-cell handheld-toolbar-item" href="marketplace-cart.html"><span class="handheld-toolbar-icon"><i class="fa-solid fa-cart-shopping"></i><span class="badge bg-primary rounded-pill ms-1">3</span></span><span class="handheld-toolbar-label">$56.00</span></a></div>
    </div>
    <!-- Back To Top Button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon ci-arrow-up"> </i></a>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="vendor/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>
</body>

</html>