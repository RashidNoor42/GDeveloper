<?php
include("includes/config.php");
$name;
$email;
$subject;
$message;
// if(!isset($_SESSION["l"]))
// {
//     header("Location:login.php");
// }
$conn = new mysqli($server, $username, $pass, $db);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
   
    if(isset($_POST['name']))
    {
        $name=$_POST['name'];
       $name=sanitizeInput($name);
    }
    if(isset($_POST['email']))
    {
        $email=$_POST['email'];
        $email=sanitizeInput($email);

    }
    if(isset($_POST['subject']))
    {
        $subject=$_POST['subject'];
        $subject=sanitizeInput($subject);

    }
    if(isset($_POST['message']))
    {
        $message=$_POST['message'];
        $message=sanitizeInput($message);

    }
    if($stmt = $conn->prepare("INSERT INTO visitors (name , email, subject , message) VALUES (?,?,?,?)")){
        $stmt->bind_param("ssss" ,$name, $email ,$subject ,$message);
          $stmt->execute();
          $stmt->close();
          $conn->close();
    
    


            ///////////////////////SEND MAIL////////////////////////
            $headers = 'From: rashidnoor6309@gmail.com' . "\r\n" . 
            'MIME-Version: 1.0' . "\r\n" .
            'Content-Type: text/html; charset=utf-8';
 
        $result = mail($email, $subject, $message,$headers );
        var_dump($result);
        header("Location:index.php?s=success");
    }
}
