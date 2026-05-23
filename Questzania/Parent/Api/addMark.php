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


$mark = $_POST["mark"];
$quizId = $_POST["quizId"];
$userId = $_POST["userId"];
$markahId = $_POST["markahId"];

    if($markahId!=null){
        $sql = "UPDATE markah SET markah='$mark'
        WHERE id='$markahId'";
        if ($conn->query($sql) === TRUE){
          echo "<script>alert('Add Mark Success')</script>" ;
                echo "
                <script type='text/javascript'>
                history.back();
          </script>";
        }
        else{
        echo "<script>alert('Error Update')</script>" ;
                echo "
                <script type='text/javascript'>
                history.back();
          </script>";
        }
    }
    else{
        $query="INSERT INTO markah (quiz_id,markah,student_id) VALUES 
        ('$quizId','$mark','$userId')";
        $run_query=mysqli_query($conn,$query);
        if($run_query){
                    echo "
                          <script type='text/javascript'>
                          alert('Add Mark Success');
                     history.back();
                    </script>";
        }
        else{
              echo "
              <script type='text/javascript'>
              alert('Error Mark Add');
              history.back();
        </script>";
        }
    }

