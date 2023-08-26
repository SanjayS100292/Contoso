<?php
session_start();
include "hotelHeader.php";
include "connection.php";
$uid = $_SESSION['uid'];
$uname = $_SESSION['uname'];
$qry = "SELECT * FROM `tblrequest`rq, `tblroom`r, `tblcustomer`c WHERE rq.`roomId`=r.`roomId` AND rq.`cId`=c.`cId` AND rq.`status`='Waiting for response' AND r.`hid`='$uid' ORDER BY rq.`reqId` DESC";
$res = mysqli_query($con, $qry);
$row = mysqli_fetch_array($res);
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <!-- <h2>Pump</h2> -->
            <h2>HOTEL</h2>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">



            <div class="row gy-4 mt-1">
                <div class="col-lg-6" style="margin: auto;">
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3 ">
                        <input type="text" name="name" class="form-control" id="name" pattern="[a-zA-Z ]+" placeholder="Your Name" value="<?php echo $row['cName'] ?>" required>
                        </div>
                        <div class="form-group mb-3 ">
                        <input type="text" class="form-control" name="roomno" id="roomno" placeholder="Room NO" required>
                        </div>
                        <div class="form-group mb-3 ">
                            <input type="number" class="form-control" name="rate" id="email" placeholder="Rate" value="<?php echo $row['roomRent']?>" required>
                        </div>
                        <div class="form-group mb-3 ">
                            <textarea class="form-control" name="desc" rows="5" placeholder="Description"required><?php echo $row['roomDesc']?></textarea>
                        </div>
                        <div class="form-group mb-3 ">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="<?php echo $row['bokDate'] ?>" required>
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
    $roomno = $_POST['roomno'];
    $desc = $_POST['desc'];
    $rate = $_POST['rate'];
    $id = $_GET['rqid'];
    $qry = "UPDATE `tblrequest` SET `status`='Booked',`roomNo`='$roomno' WHERE `reqId`='$id'";
    $res = mysqli_query($con, $qry);
    if ($res) {
        echo "<script>alert('Status Updated...');location='adminViewBookings.php'</script>";
    } else {
        echo "<script>alert('Error Occured...');location='adminViewBookings.php'</script>";
    }
    
}
include "userFooter.php";
?>