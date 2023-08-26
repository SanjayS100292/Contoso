<?php
session_start();
include "adminHeader.php";
include "connection.php";

$qryAct = "SELECT * FROM `tbllogin`l, `tblcustomer`c WHERE l.`uid`=c.`cId` AND l.`usertype`='Customer' AND l.`status`='Active'";
$resAct = mysqli_query($con, $qryAct);
$actCount = mysqli_num_rows($resAct);
$qryRej = "SELECT * FROM `tbllogin`l, `tblcustomer`c WHERE l.`uid`=c.`cId` AND l.`usertype`='Customer' AND l.`status`='Rejected'";
$resRej = mysqli_query($con, $qryRej);
$rejCount = mysqli_num_rows($resRej);
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <!-- <h2>Pump</h2> -->
            <h2>Customers</h2>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4 mt-3">
                <div class="col-lg-12" style="margin: auto;">
                    <?php
                    if ($actCount > 0) {
                    ?>
                        <h3 class="text-center">Active Customers</h3>
                        <table class='table table-secondary table-striped table-hover text-center'>
                            <tr>
                                <th>Id.</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>District</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $i = 0;
                            while ($row = mysqli_fetch_array($resAct)) {
                                $i++;
                                echo "<tr>
                            <td>$i</td>
                            <td>$row[cName]</td>
                            <td>$row[cEmail]</td>
                            <td>$row[cContact]</td>
                            <td>$row[cDistrict]</td>
                            <td>$row[cAddress]</td>
                            <td><a href='adminUpdateStatus.php?id=$row[logid]&status=Rejected&url=adminCustomer.php'>Reject</a></td>
                            </tr>";
                            }
                            ?>
                        </table>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row gy-4 mt-3">
                <div class="col-lg-12" style="margin: auto;">
                    <?php
                    if ($rejCount > 0) {
                    ?>
                        <h3 class="text-center">Rejected Customers</h3>
                        <table class='table table-secondary table-striped table-hover text-center'>
                            <tr>
                                <th>Id.</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>District</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $i = 0;
                            while ($row = mysqli_fetch_array($resRej)) {
                                $i++;
                                echo "<tr>
                                <td>$i</td>
                                <td>$row[cName]</td>
                                <td>$row[cEmail]</td>
                                <td>$row[cContact]</td>
                                <td>$row[cDistrict]</td>
                                <td>$row[cAddress]</td>
                            <td><a href='adminUpdateStatus.php?id=$row[logid]&status=Active&url=adminCustomer.php'>Approve</a></td>
                            </tr>";
                            }
                            ?>
                        </table>
                    <?php
                   
                    }
                    ?>
                </div>
            </div>
            <?php $sql = "SELECT count(*) AS total_customers FROM tblcustomer";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $totalcustomer = $row['total_customers'];
        echo "<h1>Total Customers: " . $totalcustomer;
    } else {

        echo "Failed to retrieve total revenue.";
    } ?>
        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php
include "commonFooter.php";
?>