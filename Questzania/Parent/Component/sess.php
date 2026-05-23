<?php
session_start();
if (!$_SESSION["login_user"] || $_SESSION["role"] !='Parent') {
    echo "
    <script type='text/javascript'>
window.location.href ='../index.php';
</script>";
}
include('../dbConnect.php');
$uid = $_SESSION['uid'];
$sql = "SELECT * FROM profile WHERE user_id='$uid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$nama = $row['nama'];
$noMatrik = $row['noKp'];
$noFon = $row['noFon'];
$student_id = $row['student_id'];
$login_session = $_SESSION['login_user'];
$role=$_SESSION['role'];

$sql2 = "SELECT * FROM profile WHERE user_id='$student_id'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$kelas_id = $row2['kelas_id'];

?>