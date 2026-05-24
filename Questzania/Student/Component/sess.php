<?php
ob_start();
ini_set('session.save_path', '/tmp');
session_name('QSESSID');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!$_SESSION["login_user"] || $_SESSION["role"] !='Student') {
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
$kelas_id = $row['kelas_id'];
$login_session = $_SESSION['login_user'];
$role=$_SESSION['role'];
?>