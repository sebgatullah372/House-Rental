<?php
//echo $_GET['user_id'];
//session_start();
include './includes/header.php';

  
include './includes/db_connection.php';

//echo $_GET['user_id'];
if(isset($_GET['house_id'])){
    $house_id = (int)$_GET['house_id'];
    $sql = "SELECT * FROM house_for_rent INNER JOIN user ON house_for_rent.owner_id = user.user_id WHERE house_id = '$house_id' ";
    $query = mysqli_query($db, $sql);
    $result = mysqli_fetch_assoc($query);
     if($result){
        //  foreach($result as $key => $value){
        //    echo $key." ".$value."<br>";
        //  }
        $bedrooms = $result['bedrooms'];
        $livingrooms = $result['livingrooms'];
        $dining = $result['dining'];
        $servant_room = $result['servant_room'];
        $kitchen = $result['kitchen'];
        $parking = $result['parking'];
        $attach_bath = $result['attach_bath'];
        $common_bath = $result['common_bath'];
        $balcony = $result['balcony'];
        $floor_type = $result['floor_type'];
        $level = $result['Level'];
        $direction = $result['direction'];
        $rent = $result['rent'];
        $service_charge = $result['service_charge'];
        $advance = $result['advance'];
        $description = $result['description'];
        $city = $result['city'];
        $area = $result['area'];
        $address = $result['address'];
        $size = $result['size'];
        $img1 = $result['img1'];
        $img2 = $result['img2'];
        $img3 = $result['img3'];
        $img4 = $result['img4'];
        $img5 = $result['img5'];
        //users information
        $firstname = $result['first_name'];
        $lastname = $result['last_name'];
        $email = $result['email'];
        $contact = $result['contact'];
        $City = $result['City'];
        $Area = $result['Area'];
        
        
        $Address = $result['Address'];
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


  

    <div class="container-fluid">
        <div class= "row">
            <div class= "col col-sm-12 col-md-6 col-lg-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="<?php echo "post_house_for_rent/".$img1;?>" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="<?php echo "post_house_for_rent/".$img2;?>" class="d-block w-100"  alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="<?php echo "post_house_for_rent/".$img3;?>" class="d-block w-100"  alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="<?php echo "post_house_for_rent/".$img4;?>" class="d-block w-100"  alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="<?php echo "post_house_for_rent/".$img5;?>" class="d-block w-100"  alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>
            </div>
                <div class= "col col-sm-12 col-md-6 col-lg-6">
                    <div class="row">
                        <div class="col col-sm-3 col-md-6 col-lg-6">
                            <div class="text">
                            </br>
                            <h2>House Information</h2>
                            <ul class="property-list-details mb-5">
                            <li class="text-black">Size: <strong><?php echo $size. " sqft.";?></strong></li>
                            <li class="text-black">Total Bed Rooms: <strong><?php echo $bedrooms;?></strong></li>
                            <li class="text-black">Living Room: <strong><?php echo ucwords($livingrooms);?></strong></li>
                            <li class="text-black">Dining Room: <strong><?php echo ucwords($dining);?></strong></li>
                            <li class="text-black">Servant Room: <strong><?php echo ucwords($servant_room); ?></strong></li>
                            <li class="text-black">Kitchen: <strong><?php echo $kitchen;?></strong></li>
                            <li class="text-black">Parking: <strong><?php echo ucwords($parking);?></strong></li>
                            <li class="text-black">Attach Bathrooms: <strong><?php echo $attach_bath;?></strong></li>
                            <li class="text-black">Common Bathrooms: <strong><?php echo $common_bath; ?></strong></li>
                            <li class="text-black">Balcony: <strong><?php echo $balcony;?></strong></li>
                            <li class="text-black">Floor Type: <strong><?php echo $floor_type;?></strong></li>
                            
                            
                            </ul>
                       
                       
                            </div>
                        
                        </div>
                        <div class="col col-sm-6 col-md-6 col-lg-6">
                            <div class="text">
                         </br></br></br>
                            <ul class="property-list-details mb-5">
                            
                            
                            <li class="text-black">Level: <strong><?php echo $level;?></strong></li>
                            <li class="text-black">Direction: <strong><?php echo $direction; ?></strong></li>
                            <li class="text-black">Rent: <strong><?php echo $rent. " Taka per Month";?></strong></li>
                            <li class="text-black">Service Charge: <strong><?php echo $service_charge;?></strong></li>
                            <li class="text-black">Advance: <strong><?php echo $advance;?></strong></li>
                            <li class="text-black">Desription: <strong><?php echo $description; ?></strong></li>
                            <li class="text-black">City: <strong><?php echo $city;?></strong></li>
                            <li class="text-black">Area: <strong><?php echo $area;?></strong></li>
                            <li class="text-black">Full Address: <strong><?php echo $address;?></strong></li>
                            
                            </ul>
                            <p><a class="btn btn-primary px-4 py-3" id="view">View Owner Information</a></p>
                       
                       
                            </div>
                        
                        </div>
                </div>
                    
            </div> 
        
        </div>
    
    
    </div>


    <div class="container-fluid" id="owner" style="display:none;">
           <div class=row>
                <div class="col col-sm-12 col-md-6 col-lg-6">
                <img src="<?php echo "./Registration_form/".$user_photo; ?>" class="rounded-circle" alt="<?php echo $firstname; ?>" width="250" height="250">
                    <div class="text">
                        <ul class="property-list-details mb-5">
                           <li class="text-black">Owner's Name: <?php echo $firstname." ".$lastname;?></li>
                           <li class="text-black">Email: <?php echo $email;?></li>
                           <li class="text-black">Contact No. : <?php echo $contact;?></li>
                           <li class="text-black">City: <?php echo $City;?></li>
                           <li class="text-black">Area: <?php echo $Area;?></li>
                           <li class="text-black">Owner's Full Address: <?php echo $Address;?></li>
                        
                        </ul>
                    </div>
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

?>   