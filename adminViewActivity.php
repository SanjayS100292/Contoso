<?php
session_start();
include "adminHeader.php";
include "connection.php";
$uid = $_SESSION['uid'];
$uname = $_SESSION['uname'];
$currentDate = date('Y-m-d');

$activeQuery = "SELECT `id`, `user_id`, `action`, `status`, `logintime` FROM `login_logout` WHERE `status` = 'active' AND DATE(`logintime`) = '$currentDate' ORDER BY `logintime` DESC";
$activeResult = mysqli_query($con, $activeQuery);

$inactiveQuery = "SELECT `id`, `user_id`, `action`, `status`, `logintime`, `logouttime` FROM `login_logout` WHERE `status` = 'inactive' AND DATE(`logintime`) = '$currentDate' ORDER BY `logouttime` DESC ";
$inactiveResult = mysqli_query($con, $inactiveQuery);

$historyQuery = "SELECT `id`, `user_id`, `action`, `status`, `logintime`, `logouttime` FROM `login_logout` ORDER BY `logouttime` DESC";
$historyResult = mysqli_query($con, $historyQuery);
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <!-- <h2>Pump</h2> -->
            <h2>Activity Log </h2>
        </div>
    </div><!-- End Breadcrumbs -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4 mt-1">
            <h5>Active Records Today</h5>
                <table class='table table-secondary table-striped table-hover text-center'>          
            <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Action</th>
            <th>Status</th>
            <th>Login Time</th>
        </tr>
        <?php  
        $i = 0;
        while ($row = mysqli_fetch_assoc($activeResult)) { $i++; ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['action']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['logintime']; ?></td>

            </tr>
        <?php } ?>
        </table>
        <h5>Inactive Records Today</h5>
        <table class='table table-secondary table-striped table-hover text-center'>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Action</th>
            <th>Status</th>
            <th>Login Time</th>
            <th>Logout Time</th>
        </tr>
        <?php 
        $i = 0;
        while ($row = mysqli_fetch_assoc($inactiveResult)) { $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['action']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['logintime']; ?></td>
                <td><?php echo $row['logouttime']; ?></td>
            </tr>
            <?php } ?>

                </table>
                <h5>All Login/Logout History</h5>
                <table class='table table-secondary table-striped table-hover text-center'>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Action</th>
            <th>Status</th>
            <th>Login Time</th>
            <th>Logout Time</th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_assoc($historyResult)) { $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['action']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['logintime']; ?></td>
                <td><?php echo $row['logouttime']; ?></td>
            </tr>
        <?php } ?>
    </table>
            </div>
            <?php
                
                ?>
        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php
include "userFooter.php";
?>