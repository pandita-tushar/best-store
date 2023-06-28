<?php
include 'inc/connect.php';
include 'inc/security.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>WMS - Manage Stock Reciepts</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <?php include 'nav_bar.php'; ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php include 'side_bar.php'; ?>
    <!-- End Sidebar -->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Manage Stock Receipts</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Manage Stock Receipts</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <div class="col-4">
                                    <form class="d-flex" method="post" action="">
                                        <!-- <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search"> -->
                                        <input type="date" name="date" class="form-control me-2">
                                        <button class="btn btn-outline-success" name="submit" type="submit">Search</button>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                    </div>
                                    <div class="col-6 mb-1" align="right">
                                        <?php
                                        if (isset($_GET['msg'])) {
                                            echo $_GET['msg'];
                                        }
                                        ?>
                                        <!-- <a href='stock_purchase_add.php' class='btn btn-primary'>Add Record</a> -->
                                    </div>

                                    <div class="table-responsive mt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <!-- <th scope="col">Stock ID</th> -->
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Date of Purchase</th>
                                                    <th scope="col">Quantity</th>
                                                    <!-- <th scope="col">Cost</th> -->
                                                    <th scope="col">Total Cost</th>
                                                    <!-- <th scope="col">Status</th> -->
                                                    <!-- <th scope="col">Actions</th> -->

                                                </tr>
                                            </thead>
                                            <?php
                                            if (isset($_POST['submit'])) {
                                                // $search = mysqli_escape_string($conn, $_POST['search']);
                                                $date = $_POST['date'];

                                                $sql = "SELECT * FROM stock_receipts LEFT JOIN product_master ON stock_receipts.pid = product_master.pid WHERE date = '$date' ORDER BY cast(stock_receipts.sid as int)";
                                                
                                            } else {
                                                $sql = "SELECT * FROM stock_receipts LEFT JOIN product_master ON stock_receipts.pid = product_master.pid ORDER BY cast(stock_receipts.sid as int)";
                                            }
                                            $rs = mysqli_query($conn, $sql);
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($rs)) {
                                                $sr_id = $row['sr_id'];
                                                $sid = $row['sid'];
                                                $pid = $row['pid'];
                                            ?>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"> <?php echo $i; ?> </th>
                                                        <!-- <td> <?php echo $row['sid'] ?> </td> -->
                                                        <td> <?php echo $row['p_name'] ?> </td>
                                                        <td> <?php echo $row['date'] ?> </td>
                                                        <td> <?php echo $row['p_qty'] ?> </td>
                                                        <td> <?php echo $row['t_cost'] ?> </td>
                                                    <!-- <td align="centre">  <a href=<?php echo "stock_receipt_delete.php?sr_id=$sr_id" ?>><img src="assets/img/delete-icon.png" height="30" width="30" alt=""></a></td> -->
                                                    <?php
                                                    $i++;
                                                }
                                                    ?>
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                    </div>
        </section>
    </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>