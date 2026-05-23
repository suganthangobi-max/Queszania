<?php

include('../../dbConnect.php');

$userId = $_GET['userId'];

    $sql2 = "DELETE FROM profile WHERE user_id='$userId'";
    $run_query2 = mysqli_query($conn, $sql2);
    $sql3 = "DELETE FROM user WHERE id='$userId'";
    $run_query3 = mysqli_query($conn, $sql3);

        if ($conn->query($sql3) === TRUE) {
                echo "<script>alert('Teacher Remove')</script>";
                echo "
                <script type='text/javascript'>
                   window.location.href ='../senaraiTeacher.php';
                </script>";

        } else {
            echo "<script>alert('Error Remove');</script>";
        }

?>
