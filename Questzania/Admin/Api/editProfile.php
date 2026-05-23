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

$nama=$_POST["nama"];
$noFon=$_POST["noFon"] ?? null;
$noKp=$_POST["noKp"] ?? null;

            $sql = "UPDATE profile SET nama='$nama', noKp='$noKp'
            WHERE user_id='$uid'";
            if ($conn->query($sql) === TRUE){
              echo "<script>alert('Kemaskini Berjaya')</script>" ;
                    echo "
                    <script type='text/javascript'>
                window.location.href ='../profile.php';
              </script>";
            }
            else{
            echo "<script>alert('Ralat Kemaskini')</script>" ;
                    echo "
                    <script type='text/javascript'>
                window.location.href ='../profile.php';
              </script>";
            }
     
   

?>