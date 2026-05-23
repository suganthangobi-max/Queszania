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

$title = $_POST["title"];
$expiredDate = $_POST["expiredDate"];
$link = $_POST["link"];
$id = $_POST["id"];

            $sql = "UPDATE quiz SET link='$link', title='$title',
            tarikhTamat='$expiredDate'
            WHERE id='$id'";
           
            if ($conn->query($sql) === TRUE){
              echo "<script>alert('Update Success')</script>" ;
                    echo "
                    <script type='text/javascript'>
                window.location.href ='../quiz.php';
              </script>";
            }
            else{
            echo "<script>alert('Error Update')</script>" ;
                    echo "
                    <script type='text/javascript'>
                window.location.href ='../quiz.php';
              </script>";
            }
?>