<?php
//Database Connection
include("includes/config.php");
$conn = new mysqli($server, $username, $pass, $db);
//Get ID from Database
if(isset($_GET['delete_id'])){
 $sql = "SELECT * FROM visitors WHERE id =" .$_GET['delete_id'];
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($result);
}
//Update Information
if(isset($_POST['btn-update'])){
 $name = $_POST['name'];
 $email = $_POST['email'];
 $subject = $_POST['subject'];
 $message = $_POST['message'];
 $delete = "DELETE from visitors WHERE id=". $_GET['delete_id'];
 $up = mysqli_query($conn, $delete);
 if(!isset($sql)){
 die ("Error $sql" .mysqli_connect_error());
 header("location: messages.php?s=success");
 }
 else
 {
 header("location: messages.php?s=success");
 }
}
?>
<!--Create Edit form -->
<!doctype html>
<html>
<body>
<form method="post">
<h1>delete Messages Information</h1>
<label>Name:</label><input type="text" name="name" placeholder="Name" value="<?php echo $row['name']; ?>"><br/><br/>
<label>Email:</label><input type="Email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>"><br/><br/>
<label>Subject:</label><input type="text" name="subject" placeholder="Subject" value="<?php echo $row['subject']; ?>"><br/><br/>
<label>Message:</label><input type="text" name="message" placeholder="message" value="<?php echo $row['message']; ?>"><br/><br/>
<button type="submit" name="btn-update" id="btn-update" onClick="delete()"><strong>Delete</strong></button>
<a href="messages.php"><button type="button" value="button">Cancel</button></a>
</form>
<!-- Alert for Updating -->
<script>
function delete(){
 var x;
 if(confirm("deleted data Sucessfully") == true){
 x= "delete";
 }
}
</script>
</body>
</html>