<?php
session_start();
include "custHeader.php";
include "connection.php";
$uid = $_SESSION['uid'];
$uname = $_SESSION['uname'];

?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <!-- <h2>Pump</h2> -->
            <h2>Feedback</h2>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">



            <div class="container">

                <div class="col-lg-6 mt-5 mb-5" style="margin: auto;">
                    <form action="" method="post">
                        <div class="form-group mb-3 ">
                            <textarea class="form-control" name="feedback" rows="5" placeholder="Feedback" required></textarea>
                        </div>
                        <div class="text-center"><button type="submit" name="submit" class="btn btn-warning">Submit</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php
if (isset($_POST['submit'])) {
    $feedback = $_POST['feedback'];

    $qry = "INSERT INTO `tblfeedback`(`cid`,`feedback`,`date`) VALUES ('$uid','$feedback',(SELECT SYSDATE()))";
    if (mysqli_query($con, $qry) == TRUE) {
        echo "<script>alert('Feedback Submitted');location='custAddFeedBack.php'</script>";
    } else {
        echo "<script>alert('Error Occured')</script>";
    }
}
include "userFooter.php";
?>