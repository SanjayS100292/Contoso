<?php
session_start();
include "adminHeader.php";
include "connection.php";
$qry = "SELECT * FROM `tblfeedback`f, `tblcustomer`c WHERE c.`cId`=f.`cid` ";
$res = mysqli_query($con, $qry);

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



            <div class="row gy-4 mt-3">
                <div class="col-lg-10" style="margin: auto;">
                    <table class='table table-secondary table-striped table-hover text-center'>
                        <tr>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Feedback</th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_array($res)) {
                            echo "<tr>
                            <td>$row[date]</td>
                            <td>$row[cName]</td>
                            <td>$row[feedback]</td>
                            </tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php

include "userFooter.php";
?>