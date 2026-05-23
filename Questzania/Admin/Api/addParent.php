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


$nama = $_POST["nama"];
$email = $_POST["email"];
$noKp = $_POST["noKp"];
$noFon = $_POST["noFon"];
$child = $_POST["child"];
$role="Parent";

    $query="INSERT INTO user (email,password,role) VALUES ('$email','$noKp','$role')";
    $run_query=mysqli_query($conn,$query);
    if($run_query){

        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        $userId = $row['id'];
 
            $query1="INSERT INTO profile (user_id,nama,noKp,noFon,student_id) VALUES ('$userId','$nama','$noKp','$noFon','$child')";
            $run_query1=mysqli_query($conn,$query1);
            if($run_query1){
                echo "
                      <script type='text/javascript'>
                      alert('Register Success');
                  window.location.href ='../senaraiParent.php';
                </script>";
            }
            else{
                echo "
                      <script type='text/javascript'>
                      alert('Error Register');
                      window.location.href ='../senaraiParent.php';
                </script>";
            }
    }
    else{
          echo "
          <script type='text/javascript'>
          alert('Error Register');
          window.location.href ='../senaraiParent.php';
    </script>";
    }
