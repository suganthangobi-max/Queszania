<?php
ob_start();
ini_set('session.save_path', '/tmp');
session_name('QSESSID');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('../dbConnect.php');
$uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : 26;
$sql = "SELECT * FROM profile WHERE user_id='$uid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$nama = isset($row['nama']) ? $row['nama'] : 'Parent';
$noMatrik = isset($row['noKp']) ? $row['noKp'] : '';
$noFon = isset($row['noFon']) ? $row['noFon'] : '';
$student_id = isset($row['student_id']) ? $row['student_id'] : '';
$login_session = isset($_SESSION['login_user']) ? $_SESSION['login_user'] : 'terei@gmail.com';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'Parent';

$sql2 = "SELECT * FROM profile WHERE user_id='$student_id'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$kelas_id = isset($row2['kelas_id']) ? $row2['kelas_id'] : '';
?>