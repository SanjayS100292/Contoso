<?php
include "connection.php";
$id = $_GET['rqid'];
$rid = $_GET['rid'];
$qry = "UPDATE `tblrequest` SET `status`='Vacated' WHERE `reqId`='$id'";
$res = mysqli_query($con, $qry);
if ($res) {
    $qryUp = "UPDATE `tblroom` SET `roomStatus`='Available' WHERE `roomId`='$rid'";
    mysqli_query($con, $qryUp);
    echo "<script>alert('Status Updated...');location='adminViewBookings.php'</script>";
} else {
    echo "<script>alert('Error Occured...');location='adminViewBookings.php'</script>";
}
