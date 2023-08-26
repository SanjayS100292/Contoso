<?php
session_start();
include "custHeader.php";
include "connection.php";
$uid = $_SESSION['uid'];
$uname = $_SESSION['uname'];

// Prepare the SQL statement
$sql = "UPDATE `login_logout` SET `action` = 'logout', `status` = 'inactive', `logouttime` = NOW() WHERE `user_id` = ? AND `action` = 'login' AND `status` = 'active'";
$stmt = mysqli_prepare($con, $sql);

// Bind the parameter to the prepared statement
mysqli_stmt_bind_param($stmt, "s", $uname);

// Execute the prepared statement
$rcc = mysqli_stmt_execute($stmt);

// Check if the update was successful
if ($rcc) {
    // Redirect to login page
    echo '<script>window.location.href = "login.php";</script>';
} else {
    // Handle the error, if any
}

// Close the prepared statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($con);
?>
