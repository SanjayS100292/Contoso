<?php
session_start();
include "hotelHeader.php";
include "connection.php";
$uid = $_SESSION['uid'];
$uname = $_SESSION['uname'];
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
                        <div class="row gy-4 mb-3 ">
                            
                        </div>
                        <div class="form-group mb-3 ">
                            <input type="number" class="form-control" name="rate" id="email" placeholder="Rate" required>
                        </div>
                        <div class="form-group mb-3 ">
                            <textarea class="form-control" name="desc" rows="5" placeholder="Description" required></textarea>
                        </div>
                        <div class="row gy-4 mb-3 ">
                            <div class="col-lg-12 form-group">
                                <input type="file" name="txtFile" class="form-control" id="phone" placeholder="Product" required>
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
    $roomno = $_POST['roomno'];
    $desc = $_POST['desc'];
    $rate = $_POST['rate'];

    $folder = './images/';
    $file = $folder . basename($_FILES['txtFile']['name']);
    move_uploaded_file($_FILES['txtFile']['tmp_name'], $file);

    $qry = "INSERT INTO `tblroom` (`roomDesc`,`roomRent`,`img`,`hid`) VALUES ('$desc','$rate','$file','$uid')";
    if (mysqli_query($con, $qry) == TRUE) {
        echo "<script>alert('Room Added')</script>";
    } else {
        echo "<script>alert('Error Occured')</script>";
    }
}
include "userFooter.php";
?>