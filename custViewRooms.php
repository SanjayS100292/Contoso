<?php
session_start();
include "custHeader.php";
include "connection.php";
$uid = $_SESSION['uid'];
$uname = $_SESSION['uname'];
if (isset($_POST['submit'])) {
    $filter = $_POST['filter'];
    $qry = "SELECT * FROM `tblroom`r ,`hotels` h  WHERE r.`hid`=h.`hid` AND (`roomNo`='$filter' OR `roomDesc`LIKE'%$filter%' OR `district`LIKE'%$filter%')";
} else {
    $qry = "SELECT * FROM `tblroom`r ,`hotels` h WHERE r.`hid`=h.`hid`";
}
$res = mysqli_query($con, $qry);
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <!-- <h2>Pump</h2> -->
            <h2>Rooms</h2>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">



            <!-- <div class="row gy-4 mt-1">
                <form action="" method="post">
                    <div class="row col-6 mt-1 d-flex">
                        <div class="col-10">
                            <select name="filter" class="form-control" id="">
                                <option value="" selected disabled>Select Category</option>
                                <option value="Helmet">Helmet</option>
                                <option value="Jacket">Jacket</option>
                                <option value="Gloves">Gloves</option>
                                <option value="Boots">Boots</option>
                                <option value="Riding Kits">Riding Kits</option>
                                <option value="Bike Touring Accessories">Bike Touring Accessories</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <input type="submit" value="Filter" class="btn btn-dark" name='submit'>
                        </div>
                    </div>
                </form>
                <table class='table table-secondary table-striped table-hover text-center'>
                    <tr>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Description</th>
                        <th>Image</th>
                    </tr>
                  
                </table>
            </div> -->

            <div class="row gy-4 mt-3">
                <form action="" method="post">
                    <div class="row col-6 mt-1 d-flex">
                        <div class="col-10">
                            <input name="filter" class="form-control" id="">
                        </div>
                        <div class="col-2">
                            <input type="submit" value="Filter" class="btn btn-dark" name='submit'>
                        </div>
                    </div>
                </form>
                <div class="w3-services-grids py-lg-4 text-center" style="padding: 20px;">
                    <div class="fea-gd-vv row">
                        <?php
                        while ($row = mysqli_fetch_array($res)) {
                        ?>
                            <div class="col-lg-4 col-md-7 bg-light p-3" style="margin-bottom: 30px">
                                <div class="feature-gd icon-yellow">
                                    <div class="icon">
                                        <i><img src="<?php echo $row['img'] ?>" style="
									width: 300px;
                                    height: 200px;
									padding-right: 26px;
									padding-bottom: 5px;
								" /></i>
                                    </div>
                                    <div class="info" style="margin-top: 10px">
                                        <h1><?php echo $row['hotel'] ?></h1>
                                        <h5><?php echo $row['roomDesc'] ?></h5>
                                        <h5><?php echo $row['district'] ?></h5>
                                        <h5>RS.<?php echo $row['roomRent'] ?></h5>
                                        <hr>
                                        <ul>
                                            <div class="snipcart-details top_brand_home_details">
                                                <form action="#" method="post">
                                                    <fieldset>
                                                        <a href="custBookRoom.php?rid=<?php echo $row['roomId'] ?>"><input type="button" name="submit" value="Book" class="btn btn-primary" /></a>
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }

                        ?>

                    </div>
                </div>
            </div>


        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php
include "userFooter.php";
?>