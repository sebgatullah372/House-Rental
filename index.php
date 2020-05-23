<?php
include './includes/db_connection.php';
include './includes/header.php';
$sql = "SELECT house_id, img1, rent, city, Area FROM house_for_rent LIMIT 4";
$query = mysqli_query($db, $sql);
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

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
    <div class="site-section">

      <div class="container" align="center">
      <div class="row">
      <div class="col">
      <h2 class="mb-5">Search Your House Here</h2>
      <p>Fill any field According to your Requirement and Search</p>
      </div>
    </div>
      
      </div>
    
    
    </div>
    
    

    <div class="container">
    
  
    <form action="search_result.php" method="POST">
    
    <div class="featured-property-half d-flex">
          
          <div class="col">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city">
            <label for="area">Area</label>
            <input type="text" class="form-control" name="area">
          </div>
          <div class="col">
            <label for="minbed">Minimum Bedroom</label>
            <input type="text" class="form-control" name="minbed">
            <label for="maxbed">Maximum Bedroom</label>
            <input type="text" class="form-control" name="maxbed">
          </div>
          <div class="col">
            <label for="minbath">Minimum Bathroom</label>
            <input type="text" class="form-control" name="minbath">
            <label for="maxbath">Maximum Bathroom</label>
            <input type="text" class="form-control" name="maxbath">
          </div>
          <div class="col">
            <label for="minsize">Minimum Size</label>
            <input type="text" class="form-control" name="minsize">
            <label for="maxsize">Maximum Size</label>
            <input type="text" class="form-control" name="maxsize">
          </div>
          <div class="col">
            <label for="minrent">Minimum Rent</label>
            <input type="text" class="form-control" name="minrent">
            <label for="maxrent">Maximum Rent</label>
            <input type="text" class="form-control" name="maxrent">
          </div>
          
          </div>
          <div class="row">
          <div class="col">
          
          </div>
          <div class="col">
          
          </div>
          <div class="col">
          <br>
          <!-- <p><a class="btn btn-primary px-5 py-3" name="submit" style="color:#1D724A; margin-right:240px; font-size:25px;" >Search</a></p> -->
          <button class="btn btn-primary px-5 py-3" name="submit"style="color:#1D724A; margin-right:240px; font-size:25px;">Search</button>
          </div>
          <div class="col">
          
          </div>
    </div>
    
      </form>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
            <h2 class="mb-5">Browse Apartments</h2>
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
                <!-- <span>with Wendy Matos</span> -->
              </div>
            </a>
          </div>
          <?php
          }
        }
        ?>

        </div>
          

          <div class="col-md-12 text-center mt-5" data-aos="fade-up">
            <a href="houses.php" class="btn btn-primary">Browse All Apartments</a>
          </div>
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
    

    
    

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto" data-aos="fade-up">
            <h2 class="mb-5">News &amp; Events</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, fugit nam obcaecati fuga itaque deserunt officia, error reiciendis ab quod?</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <a href="single.html"><img src="images/img_4.jpg" alt="Image" class="img-fluid"></a>
            <div class="p-4 bg-white">
              <span class="d-block text-secondary small text-uppercase">Jan 20th, 2019</span>
              <h2 class="h5 text-black mb-3"><a href="single.html">Fugit nam obcaecati fuga itaque</a></h2>
              
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
            <a href="single.html"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
            <div class="p-4 bg-white">
              <span class="d-block text-secondary small text-uppercase">Jan 20th, 2019</span>
              <h2 class="h5 text-black mb-3"><a href="single.html">Fugit nam obcaecati fuga itaque</a></h2>
              
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
            <a href="single.html"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
            <div class="p-4 bg-white">
              <span class="d-block text-secondary small text-uppercase">Jan 20th, 2019</span>
              <h2 class="h5 text-black mb-3"><a href="single.html">Fugit nam obcaecati fuga itaque</a></h2>
              
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