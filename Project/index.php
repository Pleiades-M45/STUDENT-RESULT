<?php
include("Assets/Connection/Connection.php");
if (isset($_POST["btn_submit"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];
  $date_time = date('Y-m-d h:i:s A');

  $insql = "INSERT INTO tbl_complaints (complaint_email,complaint_title,complaint_message,complaint_date) VALUES ('$email','$subject','$message','$date_time')";
  if (mysqli_query($con, $insql)) {
?>
    <script>
      alert('Message send successfully');
      window.location = "index.php";
    </script>
  <?php
  } else {
  ?>
    <script>
      alert('Couldn\'t send message!!');
      window.location = "index.php";
    </script>
<?php
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

  <title>Algo Results</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="index_assets/css/fontawesome.css" />
  <link rel="stylesheet" href="index_assets/css/templatemo-tale-seo-agency.css" />
  <link rel="stylesheet" href="index_assets/css/owl.css" />
  <link rel="stylesheet" href="index_assets/css/animate.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link rel="shortcut icon" href="Assets/Template/Admin/images/favicon_new.png" />

  <style>
    @font-face {
      font-family: Genshin;
      src: url("Assets/CSS/zh-cn.ttf");
      /* font-weight:bold;*/
    }
  </style>
</head>

<body>
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="index_assets/images/logo_black.png" alt="" style="max-width: 230px" />
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="#top" class="active">Home</a></li>
              <li><a href="#services">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
            <a class="menu-trigger">
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="caption header-text">
            <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ALGO RESULTS</h6>
            <div class="line-dec"></div>
            <h4>Are <em>you</em> Ready for <span>Results?</span></h4>
            <p>
              Check your marks Anywhere, Anytime. When You Look Through Some
              Results, You'll See Different Results.
            </p>
            <div class="second-button">
              <a href="Guest/Login.php" style="
                    font-family: Genshin;
                    color: #cacaca;
                    background: #000000;
                  ">&nbsp;&nbsp;&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="services section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-heading">
                <h2><em>Perks</em></h2>
                <div class="line-dec"></div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="index_assets/images/services-01.jpg" alt="" class="templatemo-feature" />
                </div>
                <h4>Free to Use<br />&nbsp;</h4>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="index_assets/images/services-02.jpg" alt="" class="templatemo-feature" />
                </div>
                <h4>Check Past Results for Progress</h4>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="index_assets/images/services-03.jpg" alt="" class="templatemo-feature" />
                </div>
                <h4>Precise Grade Calculation</h4>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="index_assets/images/services-04.jpg" alt="" class="templatemo-feature" />
                </div>
                <h4>Error-free Computation<br />&nbsp;</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-us section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="contact-us-content">
            <div class="row">
              <div class="col-lg-4">
                <div id="map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25333.7221241468!2d-105.90237705665793!3d37.467444212095295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87167bf536a13e75%3A0xdeea62120ecf8bec!2sAlamosa%2C%20CO%2081101%2C%20USA!5e0!3m2!1sen!2sin!4v1698620294178!5m2!1sen!2sin" width="100%" height="670px" frameborder="0" style="border: 0; border-radius: 23px" allowfullscreen=""></iframe>
                </div>
              </div>
              <div class="col-lg-8">
                <form id="contact-form" action="" method="post">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="section-heading">
                        <h2><em>Contact Us</em></h2>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="name" name="name" id="name" placeholder="Your Name..." autocomplete="on" required />
                      </fieldset>
                    </div>

                    <div class="col-lg-6">
                      <fieldset>
                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required="" />
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <input type="subject" name="subject" id="subject" placeholder="Subject..." autocomplete="on" required="" />
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <textarea name="message" id="message" placeholder="Your Message" required=""></textarea>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" name="btn_submit" class="orange-button">
                          Send Message Now
                        </button>
                      </fieldset>
                    </div>
                  </div>
                </form>
                <div class="more-info">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="info-item">
                        <i class="fa fa-phone"></i>
                        <h4><a href="#">010-020-0340</a></h4>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="info-item">
                        <i class="fa fa-envelope"></i>
                        <h4><a href="#">contact@orcalabs.com</a></h4>
                        <h4><a href="#">support@orcalabs.com</a></h4>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="info-item">
                        <i class="fa fa-map-marker"></i>
                        <h4>
                          <a href="#">Alamosa, Colorado 81101, United States</a>
                        </h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2047 <a href="#">OrcaLabs</a>. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="index_assets/js/isotope.min.js"></script>
  <script src="index_assets/js/owl-carousel.js"></script>
  <script src="index_assets/js/tabs.js"></script>
  <script src="index_assets/js/popup.js"></script>
  <script src="index_assets/js/custom.js"></script>
</body>

</html>