<?php

include('../../dbConnect.php');

$id = $_GET['id'];

 
    $sql3 = "DELETE FROM quiz WHERE id='$id'";
    $run_query3 = mysqli_query($conn, $sql3);

        if ($conn->query($sql3) === TRUE) {
                echo "<script>alert('Quiz Remove Success')</script>";
                echo "
                <script type='text/javascript'>
                 history.back()
                </script>";

        } else {
            echo "<script>alert('Error')</script>";
        }
?>
