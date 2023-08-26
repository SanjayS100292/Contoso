<?php
session_start();
include "custHeader.php";
include "connection.php";
$rid = $_GET['rid'];
$qryRoom = "SELECT * FROM `tblroom` WHERE `roomId`='$rid'";
$resRoom = mysqli_query($con, $qryRoom);
$rowRoom = mysqli_fetch_array($resRoom);
$hid = $rowRoom['hid'];
$uid = $_SESSION['uid'];
$uname = $_SESSION['uname'];
$qry = "SELECT * FROM `tblservice` WHERE `hid`='$hid' ";
$res = mysqli_query($con, $qry);
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <!-- <h2>Pump</h2> -->
            <h2>Services</h2>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">



            <div class="row gy-4 mt-1">
                <div class="col-lg-6" style="margin: auto;">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row gy-4 mb-3 ">
                            
                            <div class="col-lg-12 form-group text-center">
                                <textarea type="text" name="" class="form-control" id="phone" readonly><?php echo $rowRoom['roomDesc'] ?></textarea>
                            </div>
                            <div class="col-lg-12 form-group text-center">
                                <input type="text" name="" class="form-control" value="Cost: <?php echo $rowRoom['roomRent'] ?>" id="phone" readonly>
                            </div>
                            <div class="col-lg-12 form-group text-center">
                                <input type="datetime-local" name="boDate" class="form-control" id="bookingDate" title="Booking Date" required>
                            </div>
                            <div class="col-lg-12 form-group text-center">
                                <p>* Please Select The Required Services.</p>
                                <?php while ($row = mysqli_fetch_array($res)) { ?>
                                    <h4><input type="checkbox" name="service[]" class="" value="<?php echo $row['servId'] ?>" id="phone"> <?php echo "$row[servName]" ?></h4>
                                    <?php echo " - $row[servDesc] -Rs $row[servRate]" ?>
                                <?php  } ?>
                            </div>
                        </div>
                        <div class="text-center"><button type="submit" name="submit" class="btn btn-warning">Submit</button></div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php
if (isset($_POST['submit'])) {
    $boDate = $_POST['boDate'];
    $qryIns = "INSERT INTO `tblrequest`(`roomId`,`cId`,`reqDate`,`bokDate`,`status`) VALUES ('$rid','$uid',(SELECT SYSDATE()),'$boDate','Waiting for response')";
    if (mysqli_query($con, $qryIns) == TRUE) {
        // $qryUp = "UPDATE `tblroom` SET `roomStatus`='Booked' WHERE `roomId`='$rid'";
        // mysqli_query($con, $qryUp);
        $name = $_POST['service'];
        $flag = TRUE;
        foreach ($name as $ser) {
            $qrySer = "INSERT INTO `tblservicebook` (`reqId`,`servid`) VALUES ((SELECT MAX(`reqId`) FROM `tblrequest`), '$ser')";
            if (mysqli_query($con, $qrySer) == TRUE) {
                continue;
            } else {
                $flag = FALSE;
            }
        }
        $qryRoomRate = "SELECT `roomRent` FROM `tblroom` WHERE `roomId`='$rid'";
        $resRoomRate = mysqli_query($con, $qryRoomRate);
        $rowRoomRate = mysqli_fetch_array($resRoomRate);
        $roomRate = $rowRoomRate[0];
        $serRate = 0;

        foreach ($name as $se) {
            $qrySerRate = "SELECT `servRate` FROM `tblservice` WHERE `servId`='$se'";
            $reSerRate = mysqli_query($con, $qrySerRate);
            $rowSerRate = mysqli_fetch_array($reSerRate);
            $sRate =  $rowSerRate[0];
            $serRate += $sRate;
        }
        $totalRate = $roomRate + $serRate;
        $qryTotalAmount = "UPDATE `tblrequest` SET `totalAmount` = '$totalRate' WHERE `reqId` = (SELECT MAX(`reqId`) FROM `tblrequest`)";
        mysqli_query($con, $qryTotalAmount);
        if ($flag) {
            echo "<script>alert('Booking Successful');location='payment.php?rate=$totalRate'</script>";
        } else {
            echo "<script>alert('Error Occured');location='custViewBooking.php'</script>";
        }
    }
}
include "userFooter.php";
?>
<script>
    // Get the input field by its ID
    const bookingDateInput = document.getElementById('bookingDate');

    // Add an event listener for 'input' event (fires when the value is changed)
    bookingDateInput.addEventListener('input', function () {
        // Get the selected date from the input field
        const selectedDate = new Date(bookingDateInput.value);
        // Get the current date
        const currentDate = new Date();

        // Set the time of the current date to midnight to only compare the dates
        currentDate.setHours(0, 0, 0, 0);

        // If the selected date is before the current date, reset the input value to an empty string
        if (selectedDate < currentDate) {
            bookingDateInput.value = '';
        }
    });
</script>