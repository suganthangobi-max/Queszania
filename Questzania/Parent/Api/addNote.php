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

$tajuk = $_POST["tajuk"];
$kelasId = $_POST["kelasId"];
$file=basename($_FILES["file"]['name']);

$file_extension = pathinfo($file, PATHINFO_EXTENSION);
$new_file_name = "prefix_" . time() . "_suffix." . $file_extension;
$target_dir = "../../nota/";
$target_file = $target_dir . $new_file_name;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

echo $kelasId;
echo $new_file_name;
echo $title;
if($imageFileType != "pdf" && $imageFileType != "docs" && $imageFileType != "docx" ) {
    echo "
                <script type='text/javascript'>
                alert('Sorry, only PDF/WORD files are allowed');
                history.back();
        </script>";
    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    return 0;
  }

    $query="INSERT INTO nota (kelas_id,tarikh,title,file) VALUES ('$kelasId',NOW(),'$tajuk','$new_file_name')";
    $run_query=mysqli_query($conn,$query);
    if($run_query){
        
    $target_dir = "../../nota/";
    $target_file = $target_dir . $new_file_name;
    // $target_file = "../../Bay/" . $new_file_name;
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }
      }
      
      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        echo "
        <script type='text/javascript'>
        history.back();
  </script>";
        $uploadOk = 0;
      }
      

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        //   echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
                    echo "
                    <script type='text/javascript'>
                    alert('Success Add Note');
                    history.back();
            </script>";
          
        } else {
          echo "Sorry, there was an error uploading your file.";
          
        }
      }

    
     
    }
    else{
          echo "
          <script type='text/javascript'>
          alert('Error');
          history.back();
    </script>";
    }
