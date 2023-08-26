<?php
include "commonHeader.php";
include "connection.php";
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>Hotel</h2>
            <h2>Registration</h2>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">



            <div class="row gy-4 mt-1">
                <div class="col-lg-6" style="margin: auto;">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row gy-4 mb-3 ">
                            <div class="col-lg-6 form-group">
                                <input type="text" name="name" class="form-control" pattern="[a-zA-Z ]+" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="row gy-4 mb-3 ">
                            <div class="col-lg-6 form-group">
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Your Phone" pattern="[6789][0-9]{9}" maxlength="10" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <select name="district" class="form-control" id="" required>
                                    <option value="" selected disabled>Select District</option>
                                    <?php
                                        include"dbconfig.php";
                                        $query="SELECT city from cities";
	                                            $result=mysqli_query($con,$query);
	
                                            while($r=mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                    <option value="<?=$r[0]?>"><?=$r[0]?></option>
                                                    <?php
                                                    }
                                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row gy-4 mb-3 ">
                            <div class="col-lg-6 form-group">
                                <input type="text" name="license" class="form-control" id="name" placeholder="License" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <input type="file" name="image" class="form-control" id="name" title="Proof" required>
                            </div>
                        </div>
                        <!-- <div class="form-group mb-3 ">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div> -->
                        <div class="form-group mb-3 ">
                            <textarea class="form-control" name="address" rows="5" placeholder="Address" required></textarea>
                        </div>
                        <div class="row gy-4 mb-3 ">
                            <div class="col-lg-6 form-group">
                                <input type="password" name="password" class="form-control" id="name" placeholder="Password" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <input type="password" class="form-control" name="cPassword" id="email" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <div class="my-3 mb-3 ">
                            <div class="error-message"></div>
                        </div>
                        <div class="text-center"><button type="submit" name="submit" class="btn btn-warning">Register</button></div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $district = $_POST['district'];
    $address = $_POST['address'];
    $license = $_POST['license'];
    $password = $_POST['password'];
    $cPassword = $_POST['cPassword'];

    $folder = './images/';
    $file = $folder . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $file);

    if ($password == $cPassword) {
        $qry = "INSERT INTO `hotels` (`hotel`,`phone`,`email`,`address`,`license`,`image`,`district`)VALUES('$name','$phone','$email','$address','$license','$file','$district')";
        $qryLog = "INSERT INTO `tbllogin` (`uid`,`username`,`password`,`usertype`,`status`) VALUES ((SELECT MAX(`hid`) FROM `hotels`), '$email','$password','Hotel','Waiting')";
        // echo $qryLog;
        if (mysqli_query($con, $qry) && mysqli_query($con, $qryLog)) {
            echo "<script>alert('Registration Successful');location='login.php'</script>";
        } else {
            echo "<script>alert('Registration Failed');</script>";
        }
    } else {
        echo "<script>alert('Password Dosent Match');</script>";
    }
}
include "commonFooter.php";
?>