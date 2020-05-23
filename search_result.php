<?php
include './includes/db_connection.php';
include './includes/header.php';
function process_input($data){
    
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}
$sql = "SELECT house_id, img1, rent, city, Area, bedrooms, size ,(attach_bath + common_bath) AS total_bath FROM house_for_rent WHERE renting_status = 'Not Rented' ";

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
  
    if(!empty($_POST['city'])){
      $city = mysqli_real_escape_string($db,process_input($_POST['city']));
      $sql.= " AND city = '$city'";
    }
    if(!empty($_POST['area'])){
      $area = mysqli_real_escape_string($db,process_input($_POST['area']));
      $sql.= " AND area = '$area'";
    }
    if(!empty($_POST['minrent']) && !empty($_POST['maxrent'])){
      $minrent = mysqli_real_escape_string($db,process_input($_POST['minrent']));
      $maxrent = mysqli_real_escape_string($db,process_input($_POST['maxrent']));
      $sql.= " AND rent BETWEEN '$minrent' AND '$maxrent'";
    }else{
      if(!empty($_POST['minrent'])){
        $minrent = mysqli_real_escape_string($db,process_input($_POST['minrent']));
        $sql.= " AND rent <= '$minrent'";
     }
     if(!empty($_POST['maxrent'])){
      $maxrent = mysqli_real_escape_string($db,process_input($_POST['maxrent']));
      $sql.= " AND rent <= '$maxrent'";
   }
  }
  if(!empty($_POST['minbed']) && !empty($_POST['maxbed'])){
    $minbed = mysqli_real_escape_string($db,process_input($_POST['minbed']));
    $maxbed = mysqli_real_escape_string($db,process_input($_POST['maxbed']));
    $sql.= " AND bedrooms BETWEEN '$minbed' AND '$maxbed'";
  }else{
    if(!empty($_POST['minbed'])){
      $minbed = mysqli_real_escape_string($db,process_input($_POST['minbed']));
      $sql.= " AND bedrooms <= '$minbed'";
   }
   if(!empty($_POST['maxbed'])){
    $maxbed = mysqli_real_escape_string($db,process_input($_POST['maxbed']));
    $sql.= " AND bedrooms <= '$maxbed'";
 }
}
if(!empty($_POST['minsize']) && !empty($_POST['maxsize'])){
  $minsize = mysqli_real_escape_string($db,process_input($_POST['minsize']));
  $maxsize = mysqli_real_escape_string($db,process_input($_POST['maxsize']));
  $sql.= " AND size BETWEEN '$minsize' AND '$maxsize'";
}else{
  if(!empty($_POST['minsize'])){
    $minsize = mysqli_real_escape_string($db,process_input($_POST['minsize']));
    $sql.= " AND size <= '$minsize'";
 }
 if(!empty($_POST['maxsize'])){
  $maxsize = mysqli_real_escape_string($db,process_input($_POST['maxsize']));
  $sql.= " AND size <= '$maxsize'";
}
}
if(!empty($_POST['minbath']) && !empty($_POST['maxbath'])){
  $minbath = mysqli_real_escape_string($db,process_input($_POST['minbath']));
  $maxbath = mysqli_real_escape_string($db,process_input($_POST['maxbath']));
  $sql.= " AND (attach_bath + common_bath ) BETWEEN '$minbath' AND '$maxbath'";
}else{
  if(!empty($_POST['minbath'])){
    $minbath = mysqli_real_escape_string($db,process_input($_POST['minbath']));
    $sql.= " AND (attach_bath + common_bath ) <= '$minbath'";
 }
 if(!empty($_POST['maxbath'])){
  $maxbath = mysqli_real_escape_string($db,process_input($_POST['maxbath']));
  $sql.= " AND (attach_bath + common_bath) <= '$maxbath'";
}
}
//echo $sql.'<br>';
$query = mysqli_query($db, $sql);
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

// if($result){

//   foreach($result as $data ){
//       print_r ($data).'<br>'; 
//   }
// }

}




?>
    
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('images/hero_bg_1.jpg');"
    data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
          <h1 class="text-white">Apartments</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
      </div>
    </div>
  </div>


    
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
            <h2 class="mb-5">Browse all the Houses available for Rent</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, fugit nam obcaecati fuga itaque deserunt
              officia, error reiciendis ab quod?</p>
          </div>
        </div>
        <div class="row">
          <?php 
          if($result){
          foreach($result as $data ){?>

          <div class="col-md-6 col-lg-3 mb-5" data-aos="fade-up" data-aos-delay="100">
            <a href="house_detail.php?house_id=<?php echo $data['house_id']?>" class="unit-9">
              <div class="image" style="background-image: url('<?php echo "post_house_for_rent/".$data['img1']?>');"></div>
              <div class="unit-9-content">
                <h2><?php echo $data['Area'].",".$data['city'];?></h2>
                <span><?php echo $data['rent']." Taka/Month";?></span>
                <span><?php echo "Size:".$data['size'];?></span>
                <span><?php echo "Bedrooms:".$data['bedrooms'];?></span>
                <span><?php echo "Bathrooms:".$data['total_bath'];?></span>
                <!-- <span>with Wendy Matos</span> -->
              </div>
            </a>
          </div>
          <?php
          }
        }
        ?>

        </div>
      </div>
    </div>
    

    
    <div class="site-section">

      <div class="container">

        <div class="row">
          <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto" data-aos="fade-up">
            <h2 class="mb-5">Featured Apartments</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, fugit nam obcaecati fuga itaque deserunt officia, error reiciendis ab quod?</p>
          </div>
        </div>
        
        <div class="site-block-retro d-block d-md-flex">

          <a href="#" class="col1 unit-9 no-height" data-aos="fade-up" data-aos-delay="100">
            <div class="image" style="background-image: url('images/img_2.jpg');"></div>
            <div class="unit-9-content">
              <h2>Baltimore Apartment</h2>
              <span>$600/night</span>
            </div>
          </a>

          <div class="col2 ml-auto">

            <a href="#" class="col2-row1 unit-9 no-height" data-aos="fade-up" data-aos-delay="200">
              <div class="image" style="background-image: url('images/img_3.jpg');"></div>
              <div class="unit-9-content">
                <h2>Austin Apartment</h2>
                <span>$290/night</span>
              </div>
            </a>

            <a href="#" class="col2-row2 unit-9 no-height" data-aos="fade-up" data-aos-delay="300">
              <div class="image" style="background-image: url('images/img_1.jpg');"></div>
              <div class="unit-9-content">
                <h2>Atlanta Apartment</h2>
                <span>$1,290/night</span>
              </div>
            </a>

          </div>

        </div>
        
      </div>
    </div>

    
    <div class="site-section block-13">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
            <h2 class="mb-5">Love By Our Customers</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, fugit nam obcaecati fuga itaque deserunt officia, error reiciendis ab quod?</p>
          </div>
        </div>
        <div class="nonloop-block-13 owl-carousel">
          
          <div class="text-center p-3 p-md-5 bg-white">
            <div class="mb-4">            
              <img src="images/person_1.jpg" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
            </div>
            <div class="text-black">
              <h3 class="font-weight-light h5">Megan Smith</h3>
              <p class="font-italic">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, iusto. Aliquam illo, cum sed ea? Ducimus quos, ea?&rdquo;</p>
            </div>
          </div>

          <div class="text-center p-3 p-md-5 bg-white">
            <div class="mb-4">            
              <img src="images/person_2.jpg" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
            </div>
            <div class="text-black">
              <h3 class="font-weight-light h5">Brooke Cagle</h3>
              <p class="font-italic">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, iusto. Aliquam illo, cum sed ea? Ducimus quos, ea?&rdquo;</p>
            </div>
          </div>

          <div class="text-center p-3 p-md-5 bg-white">
            <div class="mb-4">            
              <img src="images/person_3.jpg" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
            </div>
            <div class="text-black">
              <h3 class="font-weight-light h5">Philip Martin</h3>
              <p class="font-italic">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, iusto. Aliquam illo, cum sed ea? Ducimus quos, ea?&rdquo;</p>
            </div>
          </div>

          <div class="text-center p-3 p-md-5 bg-white">
            <div class="mb-4">            
              <img src="images/person_1.jpg" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
            </div>
            <div class="text-black">
              <h3 class="font-weight-light h5">Steven Ericson</h3>
              <p class="font-italic">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, iusto. Aliquam illo, cum sed ea? Ducimus quos, ea?&rdquo;</p>
            </div>
          </div>

          <div class="text-center p-3 p-md-5 bg-white">
            <div class="mb-4">            
              <img src="images/person_2.jpg" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
            </div>
            <div class="text-black">
              <h3 class="font-weight-light h5">Nathan Dumlao</h3>
              <p class="font-italic">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, iusto. Aliquam illo, cum sed ea? Ducimus quos, ea?&rdquo;</p>
            </div>
          </div>

          <div class="text-center p-3 p-md-5 bg-white">
            <div class="mb-4">            
              <img src="images/person_4.jpg" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
            </div>
            <div class="text-black">
              <h3 class="font-weight-light h5">Brook Smith</h3>
              <p class="font-italic">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, iusto. Aliquam illo, cum sed ea? Ducimus quos, ea?&rdquo;</p>
            </div>
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