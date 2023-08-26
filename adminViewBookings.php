<?php
session_start();
include "hotelHeader.php";
include "connection.php";
$uid = $_SESSION['uid'];
$uname = $_SESSION['uname'];
$qry = "SELECT * FROM `tblrequest`rq, `tblroom`r, `tblcustomer`c WHERE rq.`roomId`=r.`roomId` AND rq.`cId`=c.`cId` AND rq.`status`='Waiting for response' AND r.`hid`='$uid' ORDER BY rq.`reqId` DESC";
$res = mysqli_query($con, $qry);
$qry1 = "SELECT * FROM `tblrequest`rq, `tblroom`r, `tblcustomer`c WHERE rq.`roomId`=r.`roomId` AND rq.`cId`=c.`cId` AND rq.`status`='Booked' AND r.`hid`='$uid' ORDER BY rq.`reqId` DESC";
$res1 = mysqli_query($con, $qry1);
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <!-- <h2>Pump</h2> -->
            <h2>Bookings</h2>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">


        <h5>NoN-Approved Bookings</h5>
            <div class="row gy-4 mt-1">
                <table class='table table-secondary table-striped table-hover text-center'>
                    <tr>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Contact</th>
                        <th>Address</th>
                       
                        <th>Description</th>
                        <th>Services</th>
                        <th>Booking Date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($res)) {
                        echo "<tr>
                            <td>$row[reqDate]</td>
                            <td>$row[cName]</td>
                            <td>$row[cContact]</td>
                            <td>$row[cAddress]</td>
                
                            <td>$row[roomDesc]</td>";
                    ?>
                        <td>
                            <?php
                            $rqid = $row['reqId'];
                            $qrySer = "SELECT * FROM `tblservicebook` sb, `tblservice`s WHERE sb.`reqId`='$rqid' AND sb.`servid`=s.`servId`";
                            $resSer = mysqli_query($con, $qrySer);
                            echo "<ul>";
                            while ($rowser = mysqli_fetch_array($resSer)) {
                                echo "
                                                <li>$rowser[servName]</li>
                                            ";
                            }
                            echo "</ul>";
                            ?>
                        </td>
                    <?php
                        echo "
                            <td>$row[bokDate]</td>
                            <td>$row[status]</td>
                            <td><a href='adminUpdateRoomNo.php?rqid=$row[reqId]&rid=$row[roomId]'>Appove</a></td>
                            </tr>";
                    }
                    ?>
                </table>
            </div>

            <h5>Approved Bookings</h5>
            <div class="row gy-4 mt-1">
                <table class='table table-secondary table-striped table-hover text-center'>
                    <tr>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Room No</th>
                        <th>Description</th>
                        <th>Services</th>
                        <th>Booking Date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($res1)) {
                        echo "<tr>
                            <td>$row[reqDate]</td>
                            <td>$row[cName]</td>
                            <td>$row[cContact]</td>
                            <td>$row[cAddress]</td>
                            <td>$row[roomNo]</td>
                            <td>$row[roomDesc]</td>";
                    ?>
                        <td>
                            <?php
                            $rqid = $row['reqId'];
                            $qrySer = "SELECT * FROM `tblservicebook` sb, `tblservice`s WHERE sb.`reqId`='$rqid' AND sb.`servid`=s.`servId`";
                            $resSer = mysqli_query($con, $qrySer);
                            echo "<ul>";
                            while ($rowser = mysqli_fetch_array($resSer)) {
                                echo "
                                                <li>$rowser[servName]</li>
                                            ";
                            }
                            echo "</ul>";
                            ?>
                        </td>
                    <?php
                        echo "
                            <td>$row[bokDate]</td>
                            <td>$row[status]</td>
                            <td><a href='adminUpdateRoomSts.php?rqid=$row[reqId]&rid=$row[roomId]'>Vacate</a></td>
                            </tr>";
                    }
                    ?>
                </table>
            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php
include "userFooter.php";
?>