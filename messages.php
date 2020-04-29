<?php
include("includes/config.php");
include("includes/meta.php");
include("includes/header.php");
?>
    <!-- <div class="js-fullheight"> -->
    <div class="hero-wrap js-fullheight">
      <div class="overlay"></div>
      <div id="particles-js"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Home</a></span> <span>Messages</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Messages</h1>
          </div>
        </div>
      </div>
    </div>
    
 
    <?php
//Connection for database
//Select Database
$conn = new mysqli($server, $username, $pass, $db);
$sql = "SELECT * FROM visitors";
$result = $conn->query($sql);
?>



<table border="1" align="center" class="table table-bordered table-striped" style="line-height:25px;">
<tr>
<th>Message ID</th>
<th>Name</th>
<th>Email</th>
<th>Subject</th>
<th>Message</th>
<th>Update</th>
<th>Delete</th>
</tr>
<?php
//Fetch Data form database
if($result->num_rows > 0){
 while($row = $result->fetch_assoc()){
 ?>
 <tr>
 <td><?php echo $row['id']; ?></td>
 <td><?php echo $row['name']; ?></td>
 <td><?php echo $row['email']; ?></td>
 <td><?php echo $row['subject']; ?></td>
 <td><?php echo $row['message']; ?></td>
 <!--Edit option -->
 <td ><button class="btn btn-success btn-lg"><a href="edit.php?edit_id=<?php echo $row['id']; ?>" alt="edit" >Edit</a></button></td>
 <td ><button class="btn btn-danger btn-lg"><a href="delete.php?delete_id=<?php echo $row['id']; ?>" alt="delete" >Delete</a></button></td>
 
 </tr>
 <?php
 }
}
else
{
 ?>
 <tr>
 <th colspan="2">There's No data found!!!</th>
 </tr>
 <?php
}
?>
</table>
</body>
</html>










<?php
include("includes/footer.php");
?>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/particles.min.js"></script>
  <script src="js/particle.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>