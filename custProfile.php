<?php
session_start();
include "custHeader.php";
include "connection.php";
$uid = $_SESSION['uid'];
$uname = $_SESSION['uname'];
$qry = "SELECT * FROM `tblcustomer`c, `tbllogin`l WHERE c.`cId`='$uid' AND c.`cid`=l.`uid` AND l.`usertype`='Customer'";
$res = mysqli_query($con, $qry);
$row = mysqli_fetch_array($res);
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <!-- <h2>Pump</h2> -->
            <h2>Profile</h2>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="container">

                <div class="row gy-4 mt-1">
                    <div class="col-lg-6" style="margin: auto;">
                        <form action="" method="post">
                            <div class="row gy-4 mb-3 ">
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" pattern="[a-zA-Z ]+" placeholder="Your Name" value="<?php echo $row['cName'] ?>" required>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="<?php echo $row['cEmail'] ?>" readonly required>
                                </div>
                            </div>
                            <div class="row gy-4 mb-3 ">
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Your Phone" value="<?php echo $row['cContact'] ?>" pattern="[6789][0-9]{9}" maxlength="10" required>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <select name="district" class="form-control" id="" required>
                                        <option value="<?php echo $row['cDistrict'] ?>"><?php echo $row['cDistrict'] ?></option>
                                        <option value="Kasaragod">Kasaragod</option>
                                        <option value="Kannur">Kannur</option>
                                        <option value="Wayanad">Wayanad</option>
                                        <option value="Kozhikode">Kozhikode</option>
                                        <option value="Malappuram">Malappuram</option>
                                        <option value="Palakkad">Palakkad</option>
                                        <option value="Thrissur">Thrissur</option>
                                        <option value="Ernakulam">Ernakulam</option>
                                        <option value="Idukki">Idukki</option>
                                        <option value="Alappuzha">Alappuzha</option>
                                        <option value="Kottayam">Kottayam</option>
                                        <option value="Pathanamthitta">Pathanamthitta</option>
                                        <option value="Kollam">Kollam</option>
                                        <option value="Thiruvananthapuram">Thiruvananthapuram</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row gy-4 mb-3 ">
                                <div class="col-lg-12 form-group">
                                    <input type="text" name="age" pattern="[0-9]{2}" maxlength="2" class="form-control" value="<?php echo $row['cAge'] ?>" id="name" placeholder="Age" required>
                                </div>

                            </div>
                            <!-- <div class="form-group mb-3 ">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div> -->
                            <div class="form-group mb-3 ">
                                <textarea class="form-control" name="address" rows="5" placeholder="Address" required><?php echo $row['cAddress'] ?></textarea>
                            </div>
                            <div class="row gy-4 mb-3 ">
                                <div class="col-lg-6 form-group">
                                    <input type="password" name="password" class="form-control" id="name" value="<?php echo $row['password'] ?>" placeholder="Password" required>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input type="password" class="form-control" name="cPassword" id="email" placeholder="Confirm Password" required>
                                </div>
                            </div>
                            <div class="my-3 mb-3 ">
                                <div class="error-message"></div>
                            </div>
                            <div class="text-center"><button type="submit" name="submit" class="btn btn-warning">Update</button></div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $district = $_POST['district'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $cPassword = $_POST['cPassword'];

    $qry = "UPDATE `tblcustomer` SET `cName`='$name',`cContact`='$phone',`cAge`='$age',`cDistrict`='$district',`cAddress`='$address' WHERE `cId`='$uid'";
    $qryLog = "UPDATE `tbllogin` SET `password`='$password' WHERE `uid`='$uid' AND `usertype`='Customer'";
    if (mysqli_query($con, $qry) == TRUE && mysqli_query($con, $qryLog) == TRUE) {
        echo "<script>alert('Profile Updated');location='custProfile.php'</script>";
    } else {
        echo "<script>alert('Error Occured')</script>";
    }
}
include "userFooter.php";
?>