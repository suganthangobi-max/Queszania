<?php
session_start();
if(!$_SESSION["login_user"]){
    echo "
    <script type='text/javascript'>
window.location.href ='../../index.php';
</script>";
 }
$login_session =$_SESSION['login_user'];
$uid =$_SESSION['uid'];
include_once("../../dbConnect.php");

// $user_id=$_POST["user_id"];
$email=$login_session;
$pass1=$_POST["pass1"];
$pass2=$_POST["pass2"];
$pass3=$_POST["pass3"];



// echo $pass3.$pass2.$pass1;

$query = "SELECT * from user WHERE id='$uid'";
$result = $conn->query($query);

$modal = 0;
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    $password = $row['password'];
    
    if ($pass1 !=$password){
        echo "<script>alert('Kata Laluan Lama Salah')</script>" ;
    }
    else{
        if($pass2!=$pass3){
            echo "<script>alert('Kata Laluan Tidak Sama')</script>" ;
        }
        else{
            $sql = "UPDATE user SET password='$pass2' WHERE id='$uid'";
            if ($conn->query($sql) === TRUE){
                echo "<script>alert('Kata Laluan Berjaya Ditukar')</script>" ;
            }
            else{
            echo "<script>alert('Kata Laluan Ralat Ditukar')</script>" ;
            }
            echo "
    <script type='text/javascript'>
window.location.href ='../profile.php';
</script>";
          
        }

    }
    echo "
    <script type='text/javascript'>
window.location.href ='../profile.php';
</script>";
}
}


?>