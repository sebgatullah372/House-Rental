<?php
//echo $_GET['user_id'];
//session_start();
include './includes/header.php';
if($_SESSION['user']){
  
include './includes/db_connection.php';

//echo $_GET['user_id'];
if(isset($_GET['user_id'])){
    $user_id = (int)$_GET['user_id'];
    $sql = "SELECT * FROM user WHERE user_id = '$user_id'";
    $query = mysqli_query($db, $sql);
    $result = mysqli_fetch_assoc($query);
     if($result){
        //  foreach($result as $key => $value){
        //    echo $key." ".$value."<br>";
        //  }
        $firstname = $result['first_name'];
        $lastname = $result['last_name'];
        $email = $result['email'];
        $contact = $result['contact'];
        $city = $result['City'];
        $area = $result['Area'];
        $gender = $result['gender'];
        $birthday = $result['birthday'];
        $address = $result['Address'];
        $user_photo = $result['user_photo'];
    }
}

?>


    <div class="site-blocks-cover overlay" style="background-image: url('images/hero_bg_2.jpg');" data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="400">
          <h1 class="mb-4">Excellent Space For Finding Your Next Home</h1>
            <p class="mb-5">Your Next House for Rent is available Here </p>
            <p><a href="houses.php" class="btn btn-primary px-5 py-3">Take a Tour</a></p>
          </div>
        </div>
      </div>
    </div>


    <div class="container">
      <div class="featured-property-half d-flex">
      <div class="text">
          <h2>User Information</h2>
          
          
          <ul class="property-list-details mb-5">
          <img src="<?php echo "./Registration_form/".$user_photo; ?>" class="rounded-circle" alt="<?php echo $firstname; ?>" width="250" height="250">
            <li class="text-black">First Name: <strong class="text-black"><?php echo $firstname; ?></strong></li>
            <li class="text-black">Last name: <strong><?php echo $lastname;?></strong></li>
            <li class="text-black">Email : <strong><?php echo $email;?></strong></li>
            <li class="text-black">Contact No.  <strong><?php echo $contact;?></strong></li>
            <li class="text-black">Gender: <strong><?php echo ucwords($gender);?></strong></li>
          </ul>
          
        </div>
        <div class="text">
          
          <ul class="property-list-details mb-5">
            
            <li class="text-black">City: <strong><?php echo $city;?></strong></li>
            <li class="text-black">Area: <strong><?php echo $area;?></strong></li>
            <li class="text-black">Birthday: <strong><?php echo $birthday;?></strong></li>
            <li class="text-black">Address: <strong><?php echo $address; ?></strong></li>
          </ul>
          <p><a href="#" class="btn btn-primary px-4 py-3">Edit Information</a></p>
        </div>
        
      </div>
    </div>


    <div class="bg-primary" data-aos="fade">
      <div class="container">
        <div class="row">
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-facebook text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-twitter text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-instagram text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-linkedin text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-pinterest text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-youtube text-white"></span></a>
        </div>
      </div>
    </div>

<?php 
include './includes/footer.php';
}
else{
    
    header('location: ./');
    echo "here";
}
?>   