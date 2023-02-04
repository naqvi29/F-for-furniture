<?php
include('../connect.php');
$pid = $_POST["id"];
$sql = "SELECT * FROM `products` INNER JOIN categories ON products.p_cat = cat_id INNER JOIN brands ON products.p_brand = brand_id WHERE `p_id` = '$pid';";
$result = mysqli_query($conn, $sql) or die("SQL FAILED");
$output = "";

if (mysqli_num_rows($result) > 0) {

  while ($row = mysqli_fetch_assoc($result)) {
?>
    <div class='modal-content'>
      <div class='modal-header'>
        <h4 class='modal-title product-title'><a href='../product-details.php?id=<?php echo $row['p_id'] ?>' data-bs-toggle='tooltip' data-bs-placement='right' title='Go to product page'><?php echo $row["p_name"]; ?><i class='fa-solid fa-angle-right fs-lg ms-2'></i></a></h4>
        <button class='btn-close closedmodal' type='button' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
        <div class='row'>
          <div class='col-lg-7 pe-lg-0'>
            <div class='product-gallery'>
              <div class='product-gallery-preview order-sm-2'>
                <div class='product-gallery-preview-item active' id='first'><img class='image-zoom' src='../uploaded-images/<?php echo $row['p_image']; ?>' data-zoom='../uploaded-images/<?php echo $row['p_image']; ?>' alt='Product image'>
                  <div class='image-zoom-pane'></div>
                </div>
              </div>
            </div>
          </div>
          <div class='col-lg-5 pt-4 pt-lg-0 image-zoom-pane'>
            <div class='product-details ms-auto pb-3'>
              <div class='mb-3'><span class='h3 fw-normal text-accent me-1'>&euro;&nbsp;<?php echo $row["p_price"]; ?></span>
              </div>
              <h5 class='h6 mb-3 pb-2 border-bottom'><i class='fa-solid fa-circle-exclamation text-danger fs-lg align-middle mt-n1 me-2'></i>Product info</h5>
              <div class="row">
                <div class="col-sm-4">
                  <div class='fs-sm mb-4'><span class='text-success fw-medium me-1'>Size:</span><span class='text-muted'>
                      <?php $size = $row["p_size"];
                      if ($size == 1) {
                        echo "XS";
                      } elseif ($size == 2) {
                        echo "S";
                      } elseif ($size == 3) {
                        echo "M";
                      } elseif ($size == 4) {
                        echo "L";
                      } elseif ($size == 5) {
                        echo "XL";
                      }
                      ?></span></div>
                </div>
                <div class="col-sm-4">
                  <div class='fs-sm mb-4'><span class='text-success fw-medium me-1'>Color:</span><span class='text-muted'><?php echo $row["p_color"]; ?></span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class='fs-sm mb-4'><span class='text-success fw-medium me-1'>Seats:</span><span class='text-muted'>
                      <?php $seats = $row["p_seats"];
                      if ($seats == 0) {
                        echo "2 Seats";
                      } elseif ($seats == 1) {
                        echo "3 Seats";
                      } elseif ($seats == 2) {
                        echo "4 Seats";
                      } elseif ($seats == 3) {
                        echo "5 Seats";
                      } elseif ($seats == 4) {
                        echo "1 Seat";
                      }
                      ?></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class='fs-sm mb-4'><span class='text-success fw-medium me-1'>Brand:</span><span class='text-muted'><?php echo $row["brand_name"]; ?></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class='fs-sm mb-4'><span class='text-success fw-medium me-1'>Category:</span><span class='text-muted'><?php echo $row["cat_name"]; ?></span>
                  </div>
                </div>
              </div>
              <div class='fs-sm mb-4'><span class='text-success fw-medium me-1'>Tags:</span><span class='text-muted'><?php echo $row["p_tags"]; ?></span>
              </div>
              <div class='fs-sm mb-4'><span class='text-success fw-medium me-1'>Status:</span><span class='text-muted'>
                  <?php $status = $row["status"];
                  if ($status == 0) {
                    echo "Active";
                  } elseif ($status == 1) {
                    echo "Inactive";
                  }
                  ?></span>
              </div>
              <div class='fs-sm mb-4'><span class='text-success fw-medium me-1'>Description:</span><span class='text-muted'><?php echo $row["p_desc"]; ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
  }
} else {
  echo 0;
}
