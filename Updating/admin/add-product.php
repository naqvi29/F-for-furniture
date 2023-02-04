<?php include('../connect.php'); 
  require('auth.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Cartzilla | Add New Product</title>
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
  <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css" />
  <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Main Theme Styles + Bootstrap-->
  <link rel="stylesheet" media="screen" href="css/theme.min.css">
  <!-- Body-->

<body class="handheld-toolbar-enabled">
  <main class="page-wrapper">
    <!-- Dashboard Navbar-->
    <header class="bg-light shadow-sm navbar-sticky">
      <div class="navbar navbar-expand-lg navbar-light">
        <div class="container"><a class="navbar-brand d-none d-sm-block flex-shrink-0 me-4 order-lg-1" href="../index.php"><img src="../img/distinctive-chesterfields.svg" width="142" alt="Cartzilla"></a><a class="navbar-brand d-sm-none me-2 order-lg-1" href="../index.php"><img src="img/logo-icon.png" width="74" alt="Cartzilla"></a>
          <!-- Toolbar-->
          <div class="navbar-toolbar d-flex align-items-center order-lg-3">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>
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
                  <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active" href="add-product.php"><i class="fa-solid fa-upload opacity-60 me-2"></i>Add New Product</a></li>
                  <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="registered-users.php"><i class="fa-solid fa-user opacity-60 me-2"></i>Users</a></li>
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
                <h2 class="h3 py-2 me-2 text-center text-sm-start">Add New Product</h2>
              </div>
              <?php
              if (isset($_POST['submit'])) {
                $p_name = $_POST['p_name'];
                $p_brand = $_POST['p_brand'];
                $p_price = $_POST['p_price'];
                $p_desc = $_POST['p_desc'];
                $p_image = $_FILES['p_image']['name'];
                $tmp_img = $_FILES['p_image']['tmp_name'];
                $folder = "../uploaded-images/" . $p_image;
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
              <form method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-6 mb-3 pb-2">
                    <label class="form-label" for="unp-product-name">Product name</label>
                    <input class="form-control" type="text" name="p_name" id="p_name">
                  </div>
                  <div class="col-sm-6 mb-3 pb-2">
                    <label class="form-label" for="unp-product-name">Product Brand</label>
                    <select name="p_brand" class="form-select" id="p_brand">
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
                </div>
                <div class="file-drop-area mb-3">
                  <div class="file-drop-icon fa-solid fa-cloud-arrow-up"></div><span class="file-drop-message">Drag and drop here to upload product screenshot</span>
                  <input class="file-drop-input" type="file" name="p_image" id="p_image">
                  <button class="file-drop-btn btn btn-primary btn-sm mb-2" type="button">Or select file</button>
                  <div class="form-text">1000 x 800px ideal size for hi-res displays</div>
                </div>
                <div class="mb-3 py-2">
                  <label class="form-label" for="unp-product-description">Product description</label>
                  <textarea class="form-control" name="p_desc" id="p_desc" rows="6"></textarea>
                </div>
                <div class="row">
                  <div class="col-sm-6 mb-3">
                    <label class="form-label" for="unp-standard-price">Product price</label>
                    <div class="input-group"><span class="input-group-text"><i class="fa-solid fa-euro-sign"></i></span>
                      <input class="form-control" type="text" name="p_price" id="p_price">
                    </div>
                  </div>
                  <div class="col-sm-6 mb-3">
                    <label class="form-label" for="color">Product color</label>
                    <div class="input-group">
                      <select name="p_color" class="form-select" id="p_color">
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
                  </div>
                  <div class="col-sm-6 mb-3">
                    <label class="form-label" for="color">Product category</label>
                    <div class="input-group">
                      <select name="p_cat" class="form-select" id="p_cat">
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
                  </div>
                  <div class="col-sm-6 mb-3">
                    <label class="form-label" for="color">Product status</label>
                    <div class="input-group">
                      <select name="status" class="form-select" id="status">
                        <option value="">Select</option>
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6 mb-3">
                    <label class="form-label" for="color">Product size</label>
                    <div class="input-group">
                      <select name="p_size" class="form-select" id="p_size">
                        <option value="">Select</option>
                        <option value="1">Extra Small</option>
                        <option value="2">Small</option>
                        <option value="3">Medium</option>
                        <option value="4">Large</option>
                        <option value="5">Extra Large</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6 mb-3">
                    <label class="form-label" for="color">Product seats</label>
                    <div class="input-group">
                      <select name="p_seats" class="form-select" id="p_seats">
                        <option value="">Select</option>
                        <option value="5">1 Seat</option>
                        <option value="0">2 Seats</option>
                        <option value="1">3 Seats</option>
                        <option value="2">4 Seats</option>
                        <option value="3">5 Seats</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="mb-3 py-2">
                  <label class="form-label" for="unp-product-tags">Product tags</label>
                  <textarea class="form-control" rows="4" name="p_tags" id="p_tags"></textarea>
                  <div class="form-text">Up to 10 keywords that describe your item. Tags should all be in lowercase and separated by commas.</div>
                </div>
                <button class="btn btn-primary d-block w-100" type="submit" name="submit"><i class="fa-solid fa-arrow-up-from-bracket fs-lg me-2"></i>Upload Product</button>
              </form>
            </div>
          </section>
        </div>
      </div>
    </div>
  </main>
  <!-- Footer-->
  <footer class="footer bg-dark pt-5">
    <div class="container pt-2 pb-3">
      <div class="row">
        <div class="col-md-6 text-center text-md-start mb-4">
          <div class="text-nowrap mb-3"><a class="d-inline-block align-middle mt-n2 me-2" href="#"><img class="d-block" src="img/footer-logo-light.png" width="117" alt="Cartzilla"></a><span class="d-inline-block align-middle h5 fw-light text-white mb-0">Marketplace</span></div>
          <p class="fs-sm text-white opacity-70 pb-1">High quality items created by our global community.</p>
          <h6 class="d-inline-block pe-3 me-3 border-end border-light"><span class="text-primary">65,478 </span><span class="fw-normal text-white">Products</span></h6>
          <h6 class="d-inline-block pe-3 me-3 border-end border-light"><span class="text-primary">2,521 </span><span class="fw-normal text-white">Members</span></h6>
          <h6 class="d-inline-block me-3"><span class="text-primary">897 </span><span class="fw-normal text-white">Vendors</span></h6>
          <div class="widget mt-4 text-md-nowrap text-center text-md-start"><a class="btn-social bs-light bs-twitter me-2 mb-2" href="#"><i class="ci-twitter"></i></a><a class="btn-social bs-light bs-facebook me-2 mb-2" href="#"><i class="ci-facebook"></i></a><a class="btn-social bs-light bs-dribbble me-2 mb-2" href="#"><i class="ci-dribbble"></i></a><a class="btn-social bs-light bs-behance me-2 mb-2" href="#"><i class="ci-behance"></i></a><a class="btn-social bs-light bs-pinterest me-2 mb-2" href="#"><i class="ci-pinterest"></i></a></div>
        </div>
        <!-- Mobile dropdown menu (visible on screens below md)-->
        <div class="col-12 d-md-none text-center mb-4 pb-2">
          <div class="btn-group dropdown d-block mx-auto mb-3">
            <button class="btn btn-outline-light border-light dropdown-toggle" type="button" data-bs-toggle="dropdown">Categories</button>
            <ul class="dropdown-menu my-1">
              <li><a class="dropdown-item" href="#">Photos</a></li>
              <li><a class="dropdown-item" href="#">Graphics</a></li>
              <li><a class="dropdown-item" href="#">UI Design</a></li>
              <li><a class="dropdown-item" href="#">Web Themes</a></li>
              <li><a class="dropdown-item" href="#">Fonts</a></li>
              <li><a class="dropdown-item" href="#">Add-Ons</a></li>
            </ul>
          </div>
          <div class="btn-group dropdown d-block mx-auto">
            <button class="btn btn-outline-light border-light dropdown-toggle" type="button" data-bs-toggle="dropdown">For members</button>
            <ul class="dropdown-menu my-1">
              <li><a class="dropdown-item" href="#">Licenses</a></li>
              <li><a class="dropdown-item" href="#">Return policy</a></li>
              <li><a class="dropdown-item" href="#">Payment methods</a></li>
              <li><a class="dropdown-item" href="#">Become a vendor</a></li>
              <li><a class="dropdown-item" href="#">Become an affiliate</a></li>
              <li><a class="dropdown-item" href="#">Marketplace benefits</a></li>
            </ul>
          </div>
        </div>
        <!-- Desktop menu (visible on screens above md)-->
        <div class="col-md-3 d-none d-md-block text-center text-md-start mb-4">
          <div class="widget widget-links widget-light pb-2">
            <h3 class="widget-title text-light">Categories</h3>
            <ul class="widget-list">
              <li class="widget-list-item"><a class="widget-list-link" href="#">Photos</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Graphics</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">UI Design</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Web Themes</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Fonts</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Add-Ons</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 d-none d-md-block text-center text-md-start mb-4">
          <div class="widget widget-links widget-light pb-2">
            <h3 class="widget-title text-light">For members</h3>
            <ul class="widget-list">
              <li class="widget-list-item"><a class="widget-list-link" href="#">Licenses</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Return policy</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Payment methods</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Become a vendor</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Become an affiliate</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Marketplace benefits</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Second row-->
    <div class="pt-5 bg-darker">
      <div class="container">
        <div class="widget w-100 mb-4 pb-3 text-center mx-auto" style="max-width: 28rem;">
          <h3 class="widget-title text-light pb-1">Subscribe to newsletter</h3>
          <form class="subscription-form validate" action="https://studio.us12.list-manage.com/subscribe/post?u=c7103e2c981361a6639545bd5&amp;amp;id=29ca296126" method="post" name="mc-embedded-subscribe-form" target="_blank" novalidate>
            <div class="input-group flex-nowrap"><i class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
              <input class="form-control rounded-start" type="email" name="EMAIL" placeholder="Your email" required>
              <button class="btn btn-primary" type="submit" name="subscribe">Subscribe*</button>
            </div>
            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;" aria-hidden="true">
              <input class="subscription-form-antispam" type="text" name="b_c7103e2c981361a6639545bd5_29ca296126" tabindex="-1">
            </div>
            <div class="form-text text-light opacity-50">*Receive early discount offers, updates and new products info.</div>
            <div class="subscription-status"></div>
          </form>
        </div>
        <hr class="hr-light mb-3">
        <div class="d-md-flex justify-content-between pt-4">
          <div class="pb-4 fs-xs text-light opacity-50 text-center text-md-start">© All rights reserved. Made by <a class="text-light" href="https://createx.studio/" target="_blank" rel="noopener">Createx Studio</a></div>
          <div class="widget widget-links widget-light pb-4">
            <ul class="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
              <li class="widget-list-item ms-4"><a class="widget-list-link fs-ms" href="#">Help Center</a></li>
              <li class="widget-list-item ms-4"><a class="widget-list-link fs-ms" href="#">Affiliates</a></li>
              <li class="widget-list-item ms-4"><a class="widget-list-link fs-ms" href="#">Support</a></li>
              <li class="widget-list-item ms-4"><a class="widget-list-link fs-ms" href="#">Terms &amp; Conditions</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
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
  <!-- Main theme script-->
  <script src="js/theme.min.js"></script>
</body>

</html>