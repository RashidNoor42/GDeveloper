<?php
  $msg = "";
  $msg_class = "";
  include("includes/config.php");
  $conn = new mysqli($server, $username, $pass, $db);
  if (isset($_POST['save_profile'])) {
    // for the database
    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    // For image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['profileImage']['size'] > 2000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    // check if file exists
    if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
    // Upload image only if no errors
    if (empty($error)) {
        $name = $_POST['name'];
        $comment = $_POST['comment'];
      
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO comment (name,time_date, comment, picture) VALUES ( '$name', LOCALTIME(), '$comment', '$target_file')";
        if(mysqli_query($conn, $sql)){
          $msg = "Image uploaded and saved in the Database";
          header("location: portfolio-single.php");
          echo "ok";
          $msg_class = "alert-success";
        } else {
            echo "error1";
           // echo mysqli_error($conn);
          $msg = "There was an error in the database";
          $msg_class = "alert-danger";
        }
      } else {
        echo "error 2";
        $error = "There was an erro uploading the file";
        $msg = "alert-danger";
      }
    }
  }
?>