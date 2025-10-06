<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>DevShelter | Room And Hotels</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- <script src="js/main.js"></script> -->

    <meta property="og:title" content="DevShelter | Rooms and Hotels" />
    <meta
      name="description"
      content="DevShelter - We provide comfortable and peaceful stay for corporate executives,
    business travelers, tourists and vacation rentals. "
    />
    <meta property="og:image" content="https://devshelter.in/img/main/logo.png" />
    <meta property="og:url" content="https://devshelter.in" />
    <meta property="og:type" content="Rooms and hotels at mumbai" />
    <meta name="twitter:image" content="https://devshelter.in/img/main/logo.png" />
    <meta name="twitter:image:width" content="100" />
    <!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '881243914437463');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=881243914437463&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
  </head>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap");

@import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700");

*{
  margin:0;
  padding:0;
  box-sizing:border-box;
}

body{
  overflow-x:hidden;
  background-color: #f4f6ff;
}

.container-1{
  width:100vw;
  height:100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: "Poppins", sans-serif;
  position: relative;
  left:6vmin;
  text-align: center;
}

.cog-wheel1, .cog-wheel2{
  transform:scale(0.7);
}

.cog1, .cog2{
  width:40vmin;
  height:40vmin;
  border-radius:50%;
  border:6vmin solid #0f172b;
  position: relative;
}


.cog2{
  border:6vmin solid #24d4fd;
}

.top, .down, .left, .right, .left-top, .left-down, .right-top, .right-down{
  width:10vmin;
  height:10vmin;
  background-color: #0f172b;
  position: absolute;
}

.cog2 .top,.cog2  .down,.cog2  .left,.cog2  .right,.cog2  .left-top,.cog2  .left-down,.cog2  .right-top,.cog2  .right-down{
  background-color: #24d4fd;
}

.top{
  top:-14vmin;
  left:9vmin;
}

.down{
  bottom:-14vmin;
  left:9vmin;
}

.left{
  left:-14vmin;
  top:9vmin;
}

.right{
  right:-14vmin;
  top:9vmin;
}

.left-top{
  transform:rotateZ(-45deg);
  left:-8vmin;
  top:-8vmin;
}

.left-down{
  transform:rotateZ(45deg);
  left:-8vmin;
  top:25vmin;
}

.right-top{
  transform:rotateZ(45deg);
  right:-8vmin;
  top:-8vmin;
}

.right-down{
  transform:rotateZ(-45deg);
  right:-8vmin;
  top:25vmin;
}

.cog2{
  position: relative;
  left:-10.2vmin;
  bottom:10vmin;
}

h1{
  color:grey;
}

.first-four{
  position: relative;
  left:6vmin;
  font-size:40vmin;
}

.second-four{
  position: relative;
  right:18vmin;
  z-index: -1;
  font-size:40vmin;
}

.wrong-para{
  font-family: "Montserrat", sans-serif;
  position: absolute;
  bottom:15vmin;
  padding:3vmin 12vmin 3vmin 3vmin;
  font-weight:600;
  color:#092532;
}
  </style>


  <body>

    <div id="loader" class="loader">
      <img src="img/main/logo.png" alt="Company Logo">
  </div>
  
  <div class="content" id="content">


    <div class="container-fluid bg-dark px-0">
        <div class="row gx-0">
          <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a
              href="index.php"
              class="navbar-brand d-flex flex-column align-items-center justify-content-center"
            >
              <img
                src="img/main/logo.png"
                class="navbar-brand w-25"
                alt="Dev Shelters Logo"
                id="logo"
              />
              <h3 class="text-primary">DevShelter</h3>
            </a>
          </div>
          <div class="col-lg-9 d-flex flex-column justify-content-center">
            <div class="row gx-0 bg-white d-none d-lg-flex h-100">
              <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                  <i class="fa fa-envelope text-primary me-2"></i>
                  <a
                    href="mailto:devshelters63@gmail.com"
                    class="mb-0 text-dark"
                    >devshelters63@gmail.com</a
                  >
                </div>
                <!-- <div class="h-100 d-inline-flex align-items-center me-4">
                  <i class="fa fa-headset text-primary me-2"></i>
                  <p class="mb-0">+91 8451880595</p>
                </div> -->

                <div class="h-100 d-inline-flex align-items-center">
                  <i class="fa fa-phone-alt text-primary me-2"></i>
                  <a href="tel:+91 8451880595 " class="mb-0 text-dark"
                    >+91 8451880595</a
                  >
                </div>
              </div>
              <div
                class="col-lg-5 px-5 text-end d-inline-flex align-items-center justify-content-center"
              >
                <div>
                  <a class="me-3" href="https://www.facebook.com/share/dyovuE3GajghUz1m/?mibextid=LQQJ4d" target="_blank"><i class="fab fa-facebook-f"></i></a>
                  <a class="me-3" href="https://www.instagram.com/dev.shelters/" target="_blank"><i class="fab fa-instagram"></i></a>
                  <a class="me-3" href="https://www.youtube.com/@devshelters9739" target="_blank"><i class="fab fa-youtube"></i></a>
                  <a class="" href="https://www.linkedin.com/in/shubham-sharma-34ba10133?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
              </div>
            </div>
            <nav class="navbar navbar-expand-md bg-dark navbar-dark p-3 p-lg-0">
              <a href="index.php" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 text-primary">DevShelter</h1>
              </a>
              <button
                type="button"
                class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div
                class="collapse navbar-collapse justify-content-between"
                id="navbarCollapse"
              >
                <div class="navbar-nav">
                  <a href="index.php" class="nav-item nav-link ">Home</a>
                  <a href="service.php" class="nav-item nav-link">Services</a>
                  <a href="about.php" class="nav-item nav-link">About Us</a>
                  <ul class="navbar-nav">
                    <!-- Dropdown -->
                    <li class="nav-item dropdown p-0 m-0 bg-dark">
                      <a
                        class="nav-link dropdown-toggle"
                        id="navbarDropdownMenuLink"
                      >
                        Our Listings
                      </a>
                      <ul class="dropdown-menu">
                        <li>
                          <a class="dropdown-item border-bottom" href="#">
                            Service Apartment &raquo;
                          </a>
                          <ul class="dropdown-menu dropdown-submenu">
                            <li>
                              <a
                                class="dropdown-item border-bottom"
                                href="roomdetails.php?location=malad&type=3bhk"
                                ><i
                                  class="fa-solid fa-hotel"
                                  style="color: #24d4fd"
                                ></i>
                                3Bhk Malad
                              </a>
                            </li>
                            <li>
                              <a
                                class="dropdown-item"
                                href="roomdetails.php?location=malad&type=4bhk"
                                ><i
                                  class="fa-solid fa-hotel"
                                  style="color: #24d4fd"
                                ></i>
                                4Bhk Malad
                              </a>
                            </li>
                          </ul>
                        </li>

                        <li>
                          <a class="dropdown-item" href="#">
                            Apart Hotel &raquo;
                          </a>
                          <ul class="dropdown-menu dropdown-submenu">
                            <li>
                              <a
                                class="dropdown-item border-bottom"
                                href="roomdetails.php?location=malad&type=apart"
                                ><i
                                  class="fa-solid fa-hotel"
                                  style="color: #24d4fd"
                                ></i>
                                Kalpataru Hometel Malad
                              </a>
                            </li>
                            <li>
                              <a
                                class="dropdown-item border-bottom"
                                href="roomdetails.php?location=malad&type=apart2"
                                ><i
                                  class="fa-solid fa-hotel"
                                  style="color: #24d4fd"
                                ></i>
                                Devshelters Malad
                              </a>
                            </li>
                            <li>
                              <a
                                class="dropdown-item"
                                href="roomdetails.php?location=goregon&type=apart"
                                ><i
                                  class="fa-solid fa-hotel"
                                  style="color: #24d4fd"
                                ></i>
                                Devshelters Goregaon
                              </a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                  </ul>

                  <a href="booking.php" class="nav-item nav-link">Booking</a>
                  <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <!-- <a href="https://htmlcodex.com/hotel-html-template-pro" class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block">Premium Version<i class="fa fa-arrow-right ms-3"></i></a> -->
              </div>
            </nav>
          </div>
        </div>
      </div>




      <div class="container-1">
        <h1 class="first-four">4</h1>
        <div class="cog-wheel1">
            <div class="cog1">
              <div class="top"></div>
              <div class="down"></div>
              <div class="left-top"></div>
              <div class="left-down"></div>
              <div class="right-top"></div>
              <div class="right-down"></div>
              <div class="left"></div>
              <div class="right"></div>
          </div>
        </div>
        
        <div class="cog-wheel2"> 
          <div class="cog2">
              <div class="top"></div>
              <div class="down"></div>
              <div class="left-top"></div>
              <div class="left-down"></div>
              <div class="right-top"></div>
              <div class="right-down"></div>
              <div class="left"></div>
              <div class="right"></div>
          </div>
        </div>
       <h1 class="second-four">4</h1>
        <p class="wrong-para">Uh Oh! Page not found!</p>
      </div>







    <!-- Footer Start -->
    <div
    class="container-fluid bg-dark text-light wow fadeIn footer"
    data-wow-delay="0.1s"
  >
    <div class="container pb-5">
      <div class="row g-5">
        <div class="col-md-6 col-lg-4">
          <div class="bg-primary rounded p-4">
            <a href="index.php">
              <h1 class="text-white text-uppercase mb-3">DevShelter</h1>
            </a>
            <h5 class="text-white mb-0" >
              <a class="text-dark fw-medium ">Beyond </a>  your dreams 
              within your reach.
            </h5>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <h6
            class="section-title text-start text-primary text-uppercase mb-4"
          >
            Contact
          </h6>
          <p class="mb-2">
            <i class="fa fa-map-marker-alt me-3"></i>2nd Floor, Kalpataru
            Building,Evershine Nagar, Malad West Mumbai -400064, India.
          </p>
          <p class="mb-2">
           <a href="tel:+91 8451880595" class="text-light"> <i class="fa fa-headset me-3"></i>+91 8451880595 (for inquiry) <br> </a>
           <a href="tel:+91 7039433505" class="text-light"><i class="fa fa-phone-alt me-3"></i>+91 7039433505 (for booking) </a>
          </p>
          <p class="mb-2">
            <a href="mailto:devshelters63@gmail.com" class="text-light"><i class="fa fa-envelope me-3"></i>devshelters63@gmail.com </a>
          </p>
          <!-- <div class="d-flex pt-2">
                          <a class=" btn-outline-light btn-social m-2" href=""><i class="fab fa-twitter"></i></a>
                          <a class=" btn-outline-light btn-social m-2" href=""><i class="fab fa-facebook-f"></i></a>
                          <a class=" btn-outline-light btn-social m-2" href=""><i class="fab fa-youtube"></i></a>
                          <a class=" btn-outline-light btn-social m-2 " href=""><i class="fab fa-linkedin-in"></i></a>
                      </div> -->
        </div>
        <div class="col-lg-5 col-md-12">
          <div class="row gy-5 g-4">
            <div class="col-md-6">
              <h6
                class="section-title text-start text-primary text-uppercase mb-4"
              >
                Company
              </h6>
              <a class="btn btn-link" href="about.php">About Us</a>
              <a class="btn btn-link" href="contact.php">Contact Us</a>
            </div>
            <div class="col-md-6 d-flex flex-column">
              <h6 class="text-start text-primary text-uppercase mb-4">
                Social media
              </h6>
              <a class="btn btn-link m-1" href="https://www.linkedin.com/in/shubham-sharma-34ba10133?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" target="_blank"
              ><i class="fab fa-linkedin-in me-2" ></i>Linkedin</a
            >
            <a class="btn btn-link m-1" href="https://www.facebook.com/share/dyovuE3GajghUz1m/?mibextid=LQQJ4d"target="_blank"
              ><i class="fab fa-facebook-f me-2"></i>Facebook</a
            >
            <a class="btn btn-link m-1" href="https://www.youtube.com/@devshelters9739"target="_blank"
              ><i class="fab fa-youtube me-2"></i>Youtube</a
            >
            <a class="btn btn-link m-1" href="https://www.instagram.com/dev.shelters?igsh=MTVzNWlxbWZrNnRmNg%3D%3D&utm_source=qr" target="_blank"
              ><i class="fab fa-instagram me-2"></i>Instagram</a
            >
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        <div class="row">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            &copy; <a class="border-bottom" href="#">DevShelter</a> , All
            Right Reserved. Designed by
            <a
              class="border-bottom"
              href="https://psmcodes.com"
              target="_blank"
            >
              psmcodes.co</a
            >
          </div>
       
        </div>
      </div>
    </div>
  </div>
  <a
  href="https://wa.me/7039433505"
  class="float"
  target="_blank"
  alt="contact directly"
>
  <i class="fab fa-whatsapp my-float"></i>
</a>

<a href="tel:+91 8451880595" class="float-2" target="_blank">
  <i class="fa fa-headset my-float"></i>
</a>
</div>

<!-- JavaScript Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">  -->
<!-- <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css"> -->

<!-- Template Javascript -->
<script defer src="js/main.js"></script>
<script>
    let t1 = gsap.timeline();
let t2 = gsap.timeline();
let t3 = gsap.timeline();

t1.to(".cog1",
{
  transformOrigin:"50% 50%",
  rotation:"+=360",
  repeat:-1,
  ease:Linear.easeNone,
  duration:8
});

t2.to(".cog2",
{
  transformOrigin:"50% 50%",
  rotation:"-=360",
  repeat:-1,
  ease:Linear.easeNone,
  duration:8
});

t3.fromTo(".wrong-para",
{
  opacity:0
},
{
  opacity:1,
  duration:1,
  stagger:{
    repeat:-1,
    yoyo:true
  }
});
  </script>
    </body>

    </html>


