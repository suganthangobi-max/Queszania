<?php
session_start();
include("dbConnect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = mysqli_real_escape_string($conn, $_POST['email']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['pass']);
    $sql = "SELECT * FROM user WHERE email='$myusername' and password='$mypassword'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    $role = $row['role'];
    $uid = $row['id'];

    if ($count == 1) {
        $_SESSION['login_user'] = $myusername;
        $_SESSION['role'] = $role;
        $_SESSION['uid'] = $uid;
        session_write_close();
        if ($role == 'Admin') {
            header("Location: Admin/index.php");
        } elseif ($role == 'Student') {
            header("Location: Student/index.php");
        } elseif ($role == 'Teacher') {
            header("Location: Teacher/index.php");
        } elseif ($role == 'Parent') {
            header("Location: Parent/index.php");
        }
        exit;
    } else {
        header("Location: index.php?error=1");
        exit;
    }
}
?>
