<?php
ob_start();
ini_set('session.save_path', '/tmp');
session_name('QSESSID');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('../dbConnect.php');
$uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : 4;
$sql = "SELECT * FROM profile WHERE user_id='$uid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$nama = isset($row['nama']) ? $row['nama'] : 'Admin';
$noMatrik = isset($row['noKp']) ? $row['noKp'] : '';
$login_session = isset($_SESSION['login_user']) ? $_SESSION['login_user'] : 'admin@gmail.com';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'Admin';
?>