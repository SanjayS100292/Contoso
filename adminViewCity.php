<?php
session_start();
include "adminHeader.php";
include "connection.php";
$uid = $_SESSION['uid'];
$uname = $_SESSION['uname'];
$qry = "SELECT * FROM `cities`";
$res = mysqli_query($con, $qry);

?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <!-- <h2>Pump</h2> -->
            <h2>Cities</h2>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">



            <div class="row gy-4 mt-1">
                <table class='table table-secondary table-striped table-hover text-center'>
                    <tr>
                        <th>City ID</th>
                        <th>City</th>
                        <th>Remove</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($res)) {
                        echo "<tr>
                            <td>$row[cid]</td>
                            <td>$row[city]</td>
                            <td><a class='bt' href='adminViewCity.php?del=".$row["cid"]."'>Delete</a></td>
                            </tr>";
                    }
                    ?>
                </table>
            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
<?php
if(isset($_GET["del"])){
    $id = $_GET["del"];
    $qry = "DELETE FROM cities WHERE cid= '$id'";
$res = mysqli_query($con, $qry);
    if($res){
      print"<script>alert('Successfully Deleted');
      window.location.href= 'adminViewcity.php'
      </script>";
    } else { 
        echo "Failed to delete category.";
    }    
  }  
?>
<!-- ======= Footer ======= -->
<?php
include "userFooter.php";
?>