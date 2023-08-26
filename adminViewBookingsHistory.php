<?php
session_start();
include "adminHeader.php";
include "connection.php";
$uid = $_SESSION['uid'];
$uname = $_SESSION['uname'];
if(isset($_GET['submit'])){
    $sDate = $_GET['sDate'];
    $eDate = $_GET['eDate'];
    $qry = "SELECT * FROM `tblrequest` rq JOIN `tblroom` r ON rq.`roomId` = r.`roomId` JOIN `tblcustomer` c ON rq.`cId` = c.`cId` JOIN `hotels` h ON r.`hid` = h.`hid` WHERE rq.`status` = 'Vacated' AND (rq.`reqDate` BETWEEN '$sDate' AND '$eDate') ORDER BY rq.`reqId` DESC;";
}else{
    $qry = "SELECT * FROM `tblrequest` rq JOIN `tblroom` r ON rq.`roomId` = r.`roomId` JOIN `tblcustomer` c ON rq.`cId` = c.`cId` JOIN `hotels` h ON r.`hid` = h.`hid` WHERE rq.`status` = 'Vacated' ORDER BY rq.`reqId` DESC;";
}
$res = mysqli_query($con, $qry);

?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <!-- <h2>Pump</h2> -->
            <h2>Bookings History</h2>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">


            <form action="" class="d-flex">
                <input type="date" name="sDate" class="form-control" id="">
                <input type="date" name="eDate" class="form-control" id="">
                <input type="submit" value="Filter" name="submit" class="btn btn-primary">
            </form>
            <div class="row gy-4 mt-1">
                <table class='table table-secondary table-striped table-hover text-center'>
                    <tr>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Contact</th>
                        <th width="25%">Address</th>
                        <th>Room No</th>
                        <th>Hotel</th>
                        <th>Description</th>
                        <th>Services</th>
                        <th>Booking Date</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($res)) {
                        echo "<tr>
                            <td>$row[reqDate]</td>
                            <td>$row[cName]</td>
                            <td>$row[cContact]</td>
                            <td>$row[cAddress]</td>
                            <td>$row[roomNo]</td>
                            <td>$row[hotel]</td>
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