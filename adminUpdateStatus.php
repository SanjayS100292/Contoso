<?php
include "connection.php";
$id = $_GET['id'];
$status = $_GET['status'];
$url = $_GET['url'];

$qry = "UPDATE `tbllogin` SET `status`='$status' WHERE `logid`='$id'";
$res = mysqli_query($con, $qry);
if ($res) {
    echo "<script>alert('Status Updated...');location='$url'</script>";
} else {
    echo "<script>alert('Error Occured...');location='$url'</script>";
}
