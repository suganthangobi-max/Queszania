<?php
session_start();
if (!$_SESSION["login_user"]) {
    echo "
    <script type='text/javascript'>
window.location.href ='../../index.php';
</script>";
}
$login_session = $_SESSION['login_user'];
include_once("../../dbConnect.php");


$title = $_POST["title"];
$expiredDate = $_POST["expiredDate"];
$kelasId = $_POST["kelasId"];
$link = $_POST["link"];

    $query="INSERT INTO quiz (kelas_id,link,title,tarikhTamat) VALUES ('$kelasId','$link','$title','$expiredDate')";
    $run_query=mysqli_query($conn,$query);
    if($run_query){
                echo "
                      <script type='text/javascript'>
                      alert('Add Quiz Success');
                 history.back();
                </script>";
    }
    else{
          echo "
          <script type='text/javascript'>
          alert('Error Register');
          history.back();
    </script>";
    }
