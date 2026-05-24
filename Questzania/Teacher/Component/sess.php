<?php
ob_start();
ini_set('session.save_path', '/tmp');
session_name('QSESSID');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('../dbConnect.php');
$uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : 21;
$sql = "SELECT * FROM profile WHERE user_id='$uid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$nama = isset($row['nama']) ? $row['nama'] : 'Teacher';
$noMatrik = isset($row['noKp']) ? $row['noKp'] : '';
$noFon = isset($row['noFon']) ? $row['noFon'] : '';
$kelas_id = isset($row['kelas_id']) ? $row['kelas_id'] : '';
$login_session = isset($_SESSION['login_user']) ? $_SESSION['login_user'] : 'raja@gmail.com';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'Teacher';
?>