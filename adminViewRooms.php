<?php
session_start();
include "hotelHeader.php";
include "connection.php";
$uid = $_SESSION['uid'];
$uname = $_SESSION['uname'];
$qry = "SELECT * FROM `tblroom` WHERE `hid`='$uid'";
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



            <div class="row gy-4 mt-1">
                <table class='table table-secondary table-striped table-hover text-center'>
                    <tr>
                        
                        <th>Room Description</th>
                        <th>Room Rate</th>
                        <th>Room Status</th>
                        <th>Room Image</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($res)) {
                        echo "<tr>
                          
                            <td>$row[roomDesc]</td>
                            <td>$row[roomRent]</td>
                            <td>$row[roomStatus]</td>
                            <td><a href='$row[img]' target='_blank'><img src='$row[img]' style='max-width:300px'></a></td>
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