<?php include('session.php'); ?>
<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?php echo $urlweb; ?>/assets/"
  data-template="vertical-menu-template">

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title><?php echo $s0['instansi']; ?></title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="resource-type" content="document" />
  <meta http-equiv="content-type" content="text/html; charset=US-ASCII" />
  <meta http-equiv="content-language" content="en-us" />
  <meta name="author" content="topupin" />
  <meta name="contact" content="topupin.com" />
  <meta name="copyright" content="Copyright (c) topupin.com. All Rights Reserved." />
  <meta name="robots" content="index, nofollow">

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?php echo $urlwebs; ?>/upload/favicon.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo $urlweb; ?>/assets/vendor/fonts/fontawesome.css" />
  <link rel="stylesheet" href="<?php echo $urlweb; ?>/assets/vendor/fonts/tabler-icons.css" />
  <link rel="stylesheet" href="<?php echo $urlweb; ?>/assets/vendor/fonts/flag-icons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?php echo $urlweb; ?>/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?php echo $urlweb; ?>/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?php echo $urlweb; ?>/assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?php echo $urlweb; ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="<?php echo $urlweb; ?>/assets/vendor/libs/node-waves/node-waves.css" />
  <link rel="stylesheet" href="<?php echo $urlweb; ?>/assets/vendor/libs/typeahead-js/typeahead.css" />
  <link rel="stylesheet" href="<?php echo $urlweb; ?>/assets/vendor/libs/apex-charts/apex-charts.css" />
  <link rel="stylesheet" href="<?php echo $urlweb; ?>/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
  <link rel="stylesheet" href="<?php echo $urlweb; ?>/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
  <link rel="stylesheet" href="<?php echo $urlweb; ?>/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="<?php echo $urlweb; ?>/assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script src="<?php echo $urlweb; ?>/assets/vendor/js/template-customizer.js"></script>
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="<?php echo $urlweb; ?>/assets/js/config.js"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <?php include('sidebar.php'); ?>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="ti ti-menu-2 ti-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <?php include('top-menu.php'); ?>
          </div>

          <!-- Search Small Screens -->
          <div class="navbar-search-wrapper search-input-wrapper d-none">
            <input
              type="text"
              class="form-control search-input container-xxl border-0"
              placeholder="Search..."
              aria-label="Search..." />
            <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
              <span class="text-muted fw-light">Produk /</span> Produk Manual
              <span class="float-right" style="float: right;">
                <a href="<?php echo $urlweb; ?>/product_manual/?do=add" class="btn btn-primary" style="margin-top: -5px;"><i class="fa fa-plus"></i>&nbsp; Add Product</a>
              </span>
            </h4>
            <?php
            error_reporting(0);
            if (isset($_GET['do'])) {
              if (!empty($_GET['notif'])) {
                if ($_GET['notif'] == 1) {
                  echo '
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                          <span class="alert-icon text-success me-2">
                            <i class="ti ti-check ti-xs"></i>
                          </span>
                          <span><strong>Well Done!</strong> Product Manual Tersimpan!</span>
                        </div>
                      ';
                }
              }
              if (isset($_GET['catID'])) {
                $id = $_GET['catID'];
                $sql_2 = mysqli_query($conn, "SELECT * FROM `tb_produk` WHERE id = '$id'") or die(mysqli_error());
                $s2 = mysqli_fetch_array($sql_2);
              }
            ?>
              <div class="card">
                <div class="card-body">
                  <form role="form" class="form-group" action="<?php echo $urlweb; ?>/function/add-produkmanual.php" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-2">
                      <label>Kode Produk :</label>
                      <input class="form-control" name="productCode" type="text" value="<?php if (isset($_GET['catID'])) {
                                                                                          echo $s2['code'];
                                                                                        } ?>">
                    </div>
                    <div class="form-group mb-2">
                      <label>Nama Produk :</label>
                      <input class="form-control" name="title" type="text" value="<?php if (isset($_GET['catID'])) {
                                                                                    echo $s2['title'];
                                                                                  } ?>">
                      <input class="form-control" type="hidden" name="postID" value="<?php if (isset($_GET['catID'])) {
                                                                                        echo $s2['id'];
                                                                                      } ?>">
                    </div>
                    <?php if (!isset($_GET['catID'])) { ?>
                      <div class="form-group mb-2">
                        <label>Tipe Produk</label>
                        <select name="product_type" id="jenis" class="form-control" required>
                          <option value=""> Tipe Produk </option>
                          <option value="1"> Game</option>
                          <option value="2"> Akun Premium</option>
                          <option value="4"> E-Money</option>
                        </select>
                      </div>
                      <div class="form-group mb-2">
                        <label>Kategori Produk</label>
                        <select name="kategori" id="kategori" class="form-control" required>
                          <option value=""> Kategori Produk </option>
                        </select>
                      </div>
                    <?php } else { ?>
                      <input class="form-control" type="hidden" name="product_type" value="<?php if (isset($_GET['catID'])) {
                                                                                              echo $s2['product_type'];
                                                                                            } ?>">
                    <?php } ?>
                    <div class="form-group mb-2">
                      <label>Harga Modal :</label>
                      <input class="form-control" type="text" name="harga_modal" id="example2" value="<?php if (isset($_GET['catID'])) {
                                                                                                        echo $s2['harga_modal'];
                                                                                                      } ?>" <?php if (isset($_GET['catID'])) {
                                                                                                                                                                          if ($s2['jenis'] == 0) {
                                                                                                                                                                            echo 'readonly';
                                                                                                                                                                          }
                                                                                                                                                                        } ?>>
                    </div>
                    <div class="form-group mb-2">
                      <label>Harga Jual :</label>
                      <input class="form-control" type="text" name="harga_jual" id="example3" name="harga_jual" value="<?php if (isset($_GET['catID'])) {
                                                                                                                          echo $s2['harga_jual'];
                                                                                                                        } ?>" required>
                    </div>
                    <div class="form-group mb-2">
                      <label>Harga Reseller :</label>
                      <input class="form-control" type="text" name="harga_reseller" id="example4" name="harga_reseller" value="<?php if (isset($_GET['catID'])) {
                                                                                                                                  echo $s2['harga_reseller'];
                                                                                                                                } ?>" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Publikasi</button>
                    <a href="<?php echo $urlweb; ?>/product_manual/" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
            <?php } else { ?>
              <!-- Invoice List Table -->
              <div class="card">
                <div class="card-header py-2">
                  <ul class="nav nav-pills card-header-pills" role="tablist">
                    <li class="nav-item">
                      <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#game" aria-controls="game" aria-selected="true"> Game </button>
                    </li>
                    <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#premium" aria-controls="premium" aria-selected="true"> Akun Premium </button>
                    </li>
                    <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#emoney" aria-controls="emoney" aria-selected="true"> Saldo E-Money </button>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content p-0">
                    <div class="tab-pane fade show active" id="game" role="tabpanel">
                      <div class="card-datatable table-responsive">
                        <table id="default-datatable" class="invoice-list-table table border-top">
                          <thead>
                            <tr class="bg-info">
                              <th class="text-center" style="vertical-align: middle;">#</th>
                              <th class="text-center" style="vertical-align: middle;">Image</th>
                              <th class="text-center" style="vertical-align: middle;">Kode</th>
                              <th class="text-center" style="vertical-align: middle;">Judul</th>
                              <th class="text-center" style="vertical-align: middle;">kategori</th>
                              <th class="text-center" style="vertical-align: middle;">Harga</th>
                              <th class="text-center" style="vertical-align: middle;">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $sql_1 = mysqli_query($conn, "SELECT * FROM `tb_produk` WHERE jenis = 10 AND product_type = 1 ORDER BY id ASC") or die(mysqli_error());
                            $no = 0;
                            while ($s1 = mysqli_fetch_array($sql_1)) {
                              $no++;
                              $jenis = $s1['jenis'];
                              $sql_2 = mysqli_query($conn, "SELECT * FROM `tb_tripayapi` WHERE id = '$jenis'") or die(mysqli_error());
                              $s2 = mysqli_fetch_array($sql_2);
                            ?>
                              <tr>
                                <td class="text-center" style="vertical-align: middle; font-size: 14px;"><?php echo $no; ?></td>
                                <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                  <img src="<?php echo $urlwebs; ?>/upload/<?php echo $s1['image']; ?>" style="display: block; margin: 0 auto; width: 100px; height: auto;">
                                </td>
                                <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s1['code']; ?></td>
                                <td class="text-left" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s1['title']; ?></td>
                                <td class="text-left" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s1['kategori']; ?></td>
                                <td class="text-right" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                  Harga Modal : Rp. <?php echo number_format($s1['harga_modal']); ?><br>
                                  Harga JUal : Rp. <?php echo number_format($s1['harga_jual']); ?><br>
                                  Harga Reseller : Rp. <?php echo number_format($s1['harga_reseller']); ?>
                                </td>
                                <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px; width: 10%;">
                                  <a href="<?php echo $urlweb; ?>/product_manual/?do=add&catID=<?php echo $s1['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                  <a href="<?php echo $urlweb; ?>/function/del-produkmanual.php?id=<?php echo $s1['id']; ?>&abc=<?php echo $s1['product_type']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?');"><i class="fa fa-trash"></i></a>
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="premium" role="tabpanel">
                      <div class="card-datatable table-responsive">
                        <table id="default-datatable1" class="invoice-list-table table border-top">
                          <thead>
                            <tr class="bg-info">
                              <th class="text-center" style="vertical-align: middle;">#</th>
                              <th class="text-center" style="vertical-align: middle;">Gambar</th>
                              <th class="text-center" style="vertical-align: middle;">Kode</th>
                              <th class="text-center" style="vertical-align: middle;">Judul</th>
                              <th class="text-center" style="vertical-align: middle;">Kategori</th>
                              <th class="text-center" style="vertical-align: middle;">Harga</th>
                              <th class="text-center" style="vertical-align: middle;">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $sql_1 = mysqli_query($conn, "SELECT * FROM `tb_produk` WHERE jenis = 10 AND product_type = 2 ORDER BY id ASC") or die(mysqli_error());
                            $no = 0;
                            while ($s1 = mysqli_fetch_array($sql_1)) {
                              $no++;
                              $jenis = $s1['jenis'];
                              $sql_2 = mysqli_query($conn, "SELECT * FROM `tb_tripayapi` WHERE id = '$jenis'") or die(mysqli_error());
                              $s2 = mysqli_fetch_array($sql_2);
                            ?>
                              <tr>
                                <td class="text-center" style="vertical-align: middle; font-size: 14px;"><?php echo $no; ?></td>
                                <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                  <img src="<?php echo $urlwebs; ?>/upload/<?php echo $s1['image']; ?>" style="display: block; margin: 0 auto; width: 100px; height: auto;">
                                </td>
                                <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s1['code']; ?></td>
                                <td class="text-left" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s1['title']; ?></td>
                                <td class="text-left" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s1['kategori']; ?></td>
                                <td class="text-right" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                  Harga Modal : Rp. <?php echo number_format($s1['harga_modal']); ?><br>
                                  Harga Jual : Rp. <?php echo number_format($s1['harga_jual']); ?><br>
                                  Harga Reseller : Rp. <?php echo number_format($s1['harga_reseller']); ?>
                                </td>
                                <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px; width: 10%;">
                                  <a href="<?php echo $urlweb; ?>/product_manual/?do=add&catID=<?php echo $s1['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                  <a href="<?php echo $urlweb; ?>/function/del-produkmanual.php?id=<?php echo $s1['id']; ?>&abc=<?php echo $s1['product_type']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?');"><i class="fa fa-trash"></i></a>
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="emoney" role="tabpanel">
                      <div class="card-datatable table-responsive">
                        <table id="default-datatable2" class="invoice-list-table table border-top">
                          <thead>
                            <tr class="bg-info">
                              <th class="text-center" style="vertical-align: middle;">#</th>
                              <th class="text-center" style="vertical-align: middle;">Gambar</th>
                              <th class="text-center" style="vertical-align: middle;">Kode</th>
                              <th class="text-center" style="vertical-align: middle;">Judul</th>
                              <th class="text-center" style="vertical-align: middle;">Kategori</th>
                              <th class="text-center" style="vertical-align: middle;">Harga</th>
                              <th class="text-center" style="vertical-align: middle;">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $sql_1 = mysqli_query($conn, "SELECT * FROM `tb_prepaid` WHERE jenis = 10 AND product_type = 4 ORDER BY id ASC") or die(mysqli_error());
                            $no = 0;
                            while ($s1 = mysqli_fetch_array($sql_1)) {
                              $no++;
                              $jenis = $s1['jenis'];
                              $sql_2 = mysqli_query($conn, "SELECT * FROM `tb_tripayapi` WHERE id = '$jenis'") or die(mysqli_error());
                              $s2 = mysqli_fetch_array($sql_2);
                            ?>
                              <tr>
                                <td class="text-center" style="vertical-align: middle; font-size: 14px;"><?php echo $no; ?></td>
                                <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                  <img src="<?php echo $urlwebs; ?>/upload/<?php echo $s1['image']; ?>" style="display: block; margin: 0 auto; width: 100px; height: auto;">
                                </td>
                                <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s1['code']; ?></td>
                                <td class="text-left" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s1['title']; ?></td>
                                <td class="text-left" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s1['kategori']; ?></td>
                                <td class="text-right" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                  Harga Modal : Rp. <?php echo number_format($s1['harga_modal']); ?><br>
                                  Harga Jual : Rp. <?php echo number_format($s1['harga_jual']); ?><br>
                                  Harga Reseller : Rp. <?php echo number_format($s1['harga_reseller']); ?>
                                </td>
                                <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px; width: 10%;">
                                  <a href="<?php echo $urlweb; ?>/product_manual/?do=add&catID=<?php echo $s1['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                  <a href="<?php echo $urlweb; ?>/function/del-produkmanual.php?id=<?php echo $s1['id']; ?>&abc=<?php echo $s1['product_type']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?');"><i class="fa fa-trash"></i></a>
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
              <div
                class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                <div>
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , <?php echo $s0['instansi']; ?> All Rights Reserved.
                </div>
              </div>
            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="<?php echo $urlweb; ?>/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/vendor/libs/popper/popper.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/vendor/js/bootstrap.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/vendor/libs/node-waves/node-waves.js"></script>

  <script src="<?php echo $urlweb; ?>/assets/vendor/libs/hammer/hammer.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/vendor/libs/i18n/i18n.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/vendor/libs/typeahead-js/typeahead.js"></script>

  <script src="<?php echo $urlweb; ?>/assets/vendor/js/menu.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/js/jquery.priceformat.min.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="<?php echo $urlweb; ?>/assets/vendor/libs/apex-charts/apexcharts.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/vendor/libs/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/vendor/libs/datatables-buttons/datatables-buttons.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/vendor/libs/datatables-buttons/buttons.html5.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/vendor/libs/datatables-buttons/buttons.print.js"></script>

  <!-- Main JS -->
  <script src="<?php echo $urlweb; ?>/assets/js/main.js"></script>
  <script>
    $(document).ready(function() {
      //Default data table
      $('#default-datatable').DataTable();
      $('#default-datatable1').DataTable();
      $('#default-datatable2').DataTable();
      $('#example2').priceFormat({
        prefix: '',
        thousandsSeparator: '.',
        centsLimit: 0
      });

      $('#example3').priceFormat({
        prefix: '',
        thousandsSeparator: '.',
        centsLimit: 0
      });

      $('#example4').priceFormat({
        prefix: '',
        thousandsSeparator: '.',
        centsLimit: 0
      });
      $("#jenis").change(function() {
        url = "<?php echo $urlweb; ?>/select_jenis.php?id=" + $(this).val();
        $('#kategori').load(url);
        //console.log(url);
        return false;
      });
    });
  </script>
</body>

</html>