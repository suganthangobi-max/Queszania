<?php

include('../../dbConnect.php');

$id = $_GET['id'];

 
    $sql3 = "DELETE FROM nota WHERE id='$id'";
    $run_query3 = mysqli_query($conn, $sql3);

        if ($conn->query($sql3) === TRUE) {
                echo "<script>alert('Note Remove Success')</script>";
                echo "
                <script type='text/javascript'>
                 history.back()
                </script>";

        } else {
            echo "<script>alert('Error')</script>";
        }
?>
