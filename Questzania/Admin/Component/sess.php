<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["login_user"]) || $_SESSION["role"] !='Admin') {
    echo "<script type='text/javascript'>window.location.href ='../index.php';</script>";
    exit;
}
include('../dbConnect.php');
$uid = $_SESSION['uid'];
$sql = "SELECT * FROM profile WHERE user_id='$uid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$nama = $row['nama'];
$noMatrik = $row['noKp'];
$login_session = $_SESSION['login_user'];
$role=$_SESSION['role'];
?>