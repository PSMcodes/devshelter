<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>DEVSHELTER</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="keywords" />
  <meta content="" name="description" />

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon" />
  <script src="https://cdn.lordicon.com/lordicon.js"></script>

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
    rel="stylesheet" />

  <!-- Icon Font Stylesheet -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    rel="stylesheet" />

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet" />
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
  <link
    href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css"
    rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet" />
</head>

<body>
  <div id="loader" class="loader">
    <img src="img/main/logo.png" alt="Company Logo">
  </div>

  <div class="content" id="content">

    <div class="container-fluid bg-white p-0">
      <!-- Spinner Start -->


      <!-- Header Start -->
      <div class="container-fluid bg-dark px-0">
        <div class="row gx-0">
          <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a
              href="index.php"
              class="navbar-brand d-flex flex-column align-items-center justify-content-center">
              <img
                src="img/main/logo.png"
                class="navbar-brand w-25"
                alt="Dev Shelters Logo"
                id="logo" />
              <h3 class="text-primary">Dev Shelter</h3>
            </a>
          </div>
          <div class="col-lg-9 d-flex flex-column justify-content-center">
            <div class="row gx-0 bg-white d-none d-lg-flex h-100">
              <div class="col-lg-7 px-5 text-start d-flex">
                <div class="h-100 d-inline-flex align-items-center me-4">
                  <i class="fa fa-envelope text-primary me-2"></i>
                  <a
                    href="mailto:devshelters63@gmail.com"
                    class="mb-0 text-dark">devshelters63@gmail.com</a>
                </div>
                <div class="h-100 d-inline-flex align-items-center d-flex mx-2">
                  <i class="fa fa-phone-alt text-primary me-2"></i>
                  <a href="tel:+91 8451880595 " class="mb-0 text-dark">+918451880595</a>
                </div>
                <div class="h-100 d-inline-flex align-items-center d-flex mx-2">
                  <i class="fa fa-phone-alt text-primary me-2"></i>
                  <a href="tel:+91 7039433505 " class="mb-0 text-dark">+917039433505</a>
                </div>
              </div>
              <div
                class="col-lg-5 px-5 text-end d-inline-flex align-items-center justify-content-center">
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
                <h1 class="m-0 text-primary">Dev Shelter</h1>
              </a>
              <button
                type="button"
                class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div
                class="collapse navbar-collapse justify-content-between"
                id="navbarCollapse">
                <div class="navbar-nav">
                  <a href="index.php" class="nav-item nav-link ">Home</a>
                  <a href="service.php" class="nav-item nav-link active">Services</a>
                  <a href="about.php" class="nav-item nav-link">About Us</a>
                  <ul class="navbar-nav">
                    <!-- Dropdown -->
                    <li class=" dropdown p-0 m-0 bg-dark">
                      <a
                        class="nav-link dropdown-toggle"
                        id="navbarDropdownMenuLink">
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
                                href="roomdetails.php?location=malad&type=service&subtype=3bhk"><i
                                  class="fa-solid fa-hotel"
                                  style="color: #24d4fd"></i>
                                3Bhk Malad
                              </a>
                            </li>
                            <li>
                              <a
                                class="dropdown-item"
                                href="roomdetails.php?location=malad&type=service&subtype=4bhk"><i
                                  class="fa-solid fa-hotel"
                                  style="color: #24d4fd"></i>
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
                                href="roomdetails.php?location=malad&type=apart"><i
                                  class="fa-solid fa-hotel"
                                  style="color: #24d4fd"></i>
                                Kalpataru Hometel Malad
                              </a>
                            </li>
                            <li>
                              <a
                                class="dropdown-item border-bottom"
                                href="roomdetails.php?location=malad&type=apart2"><i
                                  class="fa-solid fa-hotel"
                                  style="color: #24d4fd"></i>
                                Dev Shelters Malad
                              </a>
                            </li>
                            <li>
                              <a
                                class="dropdown-item"
                                href="roomdetails.php?location=goregaon&type=apart"><i
                                  class="fa-solid fa-hotel"
                                  style="color: #24d4fd"></i>
                                Dev Shelters Goregaon
                              </a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                  </ul>
                  <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <!-- <a href="https://htmlcodex.com/hotel-html-template-pro" class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block">Premium Version<i class="fa fa-arrow-right ms-3"></i></a> -->
              </div>
            </nav>
          </div>
        </div>
      </div>
      <!-- Header End -->
      <?php 
          include 'admin/offers.php';
          if(has_offer()){
            echo '<div class="marquee-footer">
        <div class="marquee">
          <div class="marquee_text">
            <ul class="marquee-content-primary">
              ⚪ '.display_latest_offer().' ⚪
              ⚪ '.display_latest_offer().' ⚪
              ⚪ '.display_latest_offer().' ⚪ 
            </ul>
          </div>
        </div>
      </div>
      '; } ?>
    
      <!-- Page Header Start -->
      <div
        class="container-fluid page-header p-0"
        style="background-image: url(img/main/Service_banner.jpg)">
        <div class="container-fluid page-header-inner py-5">
          <div class="container text-center pb-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">
              Services
            </h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center text-uppercase" style="font-size: 20px;">
                <li class="breadcrumb-item"><a href="index.php">Dev Shelter</a></li>
                <!-- <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
                <li
                  class="breadcrumb-item text-white active"
                  aria-current="page" style="font-size: 20px;">
                  Services
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
      <!-- Page Header End -->

      <!-- about service start  -->
      <div class="container-fluid px-0 wow zoomIn" data-wow-delay="0.1s">
        <div class="container-fluid bg-dark d-flex align-items-center">
          <div class="p-5">
            <h6 class="section-title text-start text-white text-uppercase mb-3">
              luxurious Service
            </h6>
            <h1 class="text-white mb-4">Discover our Luxurious Service!</h1>
            <p class="text-white mb-4">
              Welcome to Dev Shelter, where every detail is meticulously curated
              to offer you an unparalleled experience of opulence and comfort.
              Our exquisite rooms and suites are designed with elegant décor and
              equipped with state-of-the-art amenities, ensuring a serene and
              lavish retreat. Guests can indulge in our 24-hour concierge
              service, gourmet dining options featuring world-class chefs, and
              personalized spa treatments tailored to rejuvenate your senses.
              Each stay is enhanced by breathtaking views, plush bedding, and a
              commitment to exceptional service, promising a memorable and
              extraordinary escape from the everyday.
            </p>
            <div id="additional-text" class="hidden-on-small">
              <p class="text-white mb-4">
                Our rooms are adorned with fine linens, custom furnishings, and
                cutting-edge technology, providing a seamless blend of classic
                elegance and modern convenience. For those seeking the ultimate in
                luxury, our premium suites offer expansive living spaces, private
                terraces, and exclusive access to our elite club lounge, where
                personalized service and exquisite offerings await. Beyond the
                comfort of your room, our hotel boasts an array of exclusive
                amenities designed to elevate your stay. Unwind in our infinity
                pool overlooking stunning vistas, or take advantage of our fully
                equipped fitness center and wellness programs. Our business
                facilities, including high-speed internet and elegantly appointed
                meeting rooms, cater to the needs of discerning professionals,
                ensuring productivity in a luxurious setting. Dining at our hotel
                is an experience in itself, with a selection of gourmet
                restaurants and chic lounges that cater to every palate. Enjoy
                handcrafted cocktails at our rooftop bar, savor international
                delicacies prepared by our award-winning chefs, or indulge in a
                private dining experience tailored to your preferences. Every meal
                is a celebration of the finest ingredients and culinary artistry.
              </p>
            </div>
            <button id="load-more-btn" class="btn btn-primary mt-3 hidden-on-small">Show More</button>
          </div>
        </div>
        <!-- <div class="col-md-4">
                            <div class="video">
                                <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/C6ZQTMQ7k9A?si=YlIgMoi5oue9Y4iE" data-bs-target="#videoModal">
                                    <span></span>
                                </button>
                        
                            </div>
                        </div> -->
      </div>
      <!-- about service end  -->

      <!-- Service Start -->
      <div class="container-fluid py-5 main-services services-container" style="background: url(img/main/time-background.png); background-size: cover; background-position:center center ; backdrop-filter: opacity(23%) ; ">
        <div class="container services-container">
          <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">
              Our Services
            </h6>
            <h1 class="mb-5">
              Explore Our
              <span class="text-primary text-uppercase">Services</span>
            </h1>
          </div>

          <div class="row m-2 d-flex justify-content-between">
            <h3 class="text-start text-primary text-uppercase">
              complimentary Services
            </h3>
            <div class="container service-main">

              <div class="Services-main2 d-flex flex-column align-items-center justify-content-center w-50">
                <div class="radio-inputs room-div2">
                  <!-- Radio Buttons -->

                  <label>
                    <input class="radio-input" type="radio" name="vehicle" value="Room">
                    <span class="radio-tile">
                      <span class="radio-icon">
                        <!-- SVG for Room -->
                        <i class="fa-solid fa-hotel"></i>
                      </span>
                    </span>
                  </label>

                  <label>
                    <input class="radio-input" type="radio" name="vehicle" value="newspaper">
                    <span class="radio-tile">
                      <span class="radio-icon">
                        <!-- SVG for Motorbike -->
                        <i class="fa-solid fa-envelope"></i>
                      </span>
                    </span>
                  </label>

                  <label>
                    <input class="radio-input" type="radio" name="vehicle" value="wifi">
                    <span class="radio-tile">
                      <span class="radio-icon">
                        <!-- SVG for Car -->
                        <i class="fa-solid fa-wifi"></i>
                      </span>
                    </span>
                  </label>

                  <label>
                    <input class="radio-input" type="radio" name="vehicle" value="desk-services">
                    <span class="radio-tile">
                      <span class="radio-icon">
                        <!-- SVG for Plane -->
                        <i class="fa-solid fa-table"></i>
                      </span>
                    </span>
                  </label>

                  <!-- Add more labels for additional options -->
                </div>
                <div class="radio-inputs room-div2">
                  <!-- Radio Buttons -->
                  <label>
                    <input class="radio-input" type="radio" name="vehicle" value="call">
                    <span class="radio-tile">
                      <span class="radio-icon">
                        <!-- SVG for Room -->
                        <i class="fa-solid fa-phone-alt"></i>
                      </span>
                    </span>
                  </label>

                  <label>
                    <input class="radio-input" type="radio" name="vehicle" value="Luggage">
                    <span class="radio-tile">
                      <span class="radio-icon">
                        <!-- SVG for Motorbike -->
                        <i class="fa-solid fa-store"></i>
                      </span>
                    </span>
                  </label>

                  <label>
                    <input class="radio-input" type="radio" name="vehicle" value="Laundry">
                    <span class="radio-tile">
                      <span class="radio-icon">
                        <!-- SVG for Car -->
                        <i class="fa-solid fa-tshirt"></i>
                      </span>
                    </span>
                  </label>

                  <label>
                    <input class="radio-input" type="radio" name="vehicle" value="Parking">
                    <span class="radio-tile">
                      <span class="radio-icon">
                        <!-- SVG for Plane -->
                        <i class="fa-solid fa-car"></i>
                      </span>
                    </span>
                  </label>

                  <!-- Add more labels for additional options -->
                </div>

              </div>


              <!-- Description Boxes -->
              <div class="description-boxes">
                <div id="Room-description" class="description-box active">
                  <h6 class="section-title text-center text-primary text-uppercase">
                    Rooms & Apartments
                  </h6>
                  <p>Our rooms and apartments are designed to offer the pinnacle of luxury and comfort, ensuring a memorable stay for every guest. Each space is meticulously furnished with high-end finishes, elegant décor, and state-of-the-art amenities to create a serene and sophisticated atmosphere.</p>
                  <a class="btn btn-primary py-3 px-5 mt-2" href="">Explore More</a>
                </div>
                <div id="newspaper-description" class="description-box">
                  <h6 class="section-title text-center text-primary text-uppercase">
                    Comp. newspaper
                  </h6>
                  <p>At our establishment, we understand the importance of staying connected and informed. That's why we offer our guests free access to a wide selection of top newspapers and the latest news. Whether you prefer to start your day with a cup of coffee and the morning paper or catch up on the latest headlines before bed.</p>
                  <a class="btn btn-primary py-3 px-5 mt-2" href="">Explore More</a>
                </div>
                <div id="wifi-description" class="description-box">
                  <h6 class="section-title text-center text-primary text-uppercase">
                    Free wifi
                  </h6>
                  <p>Enjoy seamless connectivity with our complimentary high-speed Wi-Fi, available throughout our property. Whether you're working remotely, streaming your favorite shows, or staying in touch with loved ones, our reliable Wi-Fi ensures you're always connected.</p>
                  <a class="btn btn-primary py-3 px-5 mt-2" href="">Explore More</a>
                </div>
                <div id="desk-services-description" class="description-box">
                  <h6 class="section-title text-center text-primary text-uppercase">
                    24 Hour Help Desk
                  </h6>
                  <p>Rest easy knowing our 24-hour help desk is always available to assist you with any needs or concerns. Whether you require late-night assistance, travel arrangements, or local recommendations, our dedicated staff is ready to help anytime.</p>
                  <a class="btn btn-primary py-3 px-5 mt-2" href="">Explore More</a>
                </div>
                <div id="call-description" class="description-box">
                  <h6 class="section-title text-center text-primary text-uppercase">
                    Wake-up calls
                  </h6>
                  <p>Never miss a beat with our dependable wake-up call service, ensuring you start your day on time. Whether you have an early meeting or a planned adventure, our attentive staff will give you a timely wake-up call. Enjoy a worry-free rest, knowing we’ve got your schedule covered.</p>
                  <a class="btn btn-primary py-3 px-5 mt-2" href="">Explore More</a>
                </div>
                <div id="Luggage-services-description" class="description-box">
                  <h6 class="section-title text-center text-primary text-uppercase">
                    Luggage Storage
                  </h6>
                  <p>Store your luggage securely with our convenient storage service, available for your peace of mind. Whether you arrive early, depart late, or simply need a safe place for your belongings, we've got you covered. Enjoy exploring the area without the hassle of carrying your bags.</p>
                  <a class="btn btn-primary py-3 px-5 mt-2" href="">Explore More</a>
                </div>
                <div id="Laundry-description" class="description-box">
                  <h6 class="section-title text-center text-primary text-uppercase">
                    Laundry/Dry Cleaning
                  </h6>
                  <p>Store your luggage securely with our convenient service, providing you with peace of mind during your stay. Whether you need to drop off bags before check-in or keep them safe after check-out, our reliable storage ensures your belongings are protected.</p>
                  <a class="btn btn-primary py-3 px-5 mt-2" href="">Explore More</a>
                </div>
                <div id="Parking-description" class="description-box">
                  <h6 class="section-title text-center text-primary text-uppercase">
                    Free Parking
                  </h6>
                  <p>Enjoy laundry and dry cleaning services for a fresh wardrobe throughout your stay. Our efficient and reliable service ensures your clothes are clean, pressed, and ready to wear. Relax and focus on your activities while we take care of your laundry needs.</p>
                  <a class="btn btn-primary py-3 px-5 mt-2" href="">Explore More</a>
                </div>
                <!-- Add more description boxes for other options -->
              </div>
            </div>


          </div>

          <div class="row m-2 d-flex justify-content-center paid-services">
            <h3 class="text-start text-primary text-uppercase">
              Paid Services
            </h3>

            <div class="radio-container service-main">

              <div class="container  d-flex flex-column align-items-center  w-50">



                <div class="radio-inputs room-div2">
                  <!-- Radio Buttons -->
                  <label>
                    <input class="radio-fight" type="radio" name="paid" value="butler">
                    <span class="radio-tile">
                      <span class="radio-icon">
                        <!-- SVG for Room -->
                        <i class="fa-solid fa-user"></i>
                      </span>
                    </span>
                  </label>

                  <label>
                    <input class="radio-fight" type="radio" name="paid" value="airplane">
                    <span class="radio-tile">
                      <span class="radio-icon">
                        <!-- SVG for Motorbike -->
                        <i class="fa-solid fa-plane"></i>
                      </span>
                    </span>
                  </label>

                  <label>
                    <input class="radio-fight" type="radio" name="paid" value="food">
                    <span class="radio-tile">
                      <span class="radio-icon">
                        <!-- SVG for Car -->
                        <i class="fa-solid fa-cutlery"></i>
                      </span>
                    </span>
                  </label>

                  <label>
                    <input class="radio-fight" type="radio" name="paid" value="cab">
                    <span class="radio-tile">
                      <span class="radio-icon">
                        <!-- SVG for Plane -->
                        <i class="fa-solid fa-taxi"></i>
                      </span>
                    </span>
                  </label>

                  <!-- Add more labels for additional options -->
                </div>
              </div>

              <!-- Description Boxes -->
              <div class="description-boxes">
                <div id="butler-description" class=" description-box2 active">
                  <span class="paid-tag">Paid</span>
                  <h6 class="section-title text-center text-primary text-uppercase">
                    butler Services
                  </h6>
                  <p>Experience the epitome of luxury with our personalized butler services, tailored to meet your every need. From unpacking your luggage to arranging special requests, our dedicated butlers are here to ensure a seamless and unforgettable stay.</p>
                  <a class="btn btn-primary py-3 px-5 mt-2" href="">Explore More</a>
                </div>
                <div id="airplane-services-description" class="description-box2">
                  <span class="paid-tag">Paid</span>
                  <h6 class="section-title text-center text-primary text-uppercase">
                    Airport Transfers
                  </h6>
                  <p>Enjoy seamless airport transfers with our reliable and comfortable transportation service. Our professional drivers ensure timely pickups and drop-offs, allowing you to relax from the moment you arrive until your departure.</p>
                  <a class="btn btn-primary py-3 px-5 mt-2" href="">Explore More</a>
                </div>
                <div id="food-description" class="description-box2">
                  <span class="paid-tag">Paid</span>
                  <h6 class="section-title text-center text-primary text-uppercase">
                    Food & Beverages
                  </h6>
                  <p>Savor a diverse selection of exquisite food and beverages, crafted to satisfy every palate. Our menu features a range of gourmet dishes, refreshing drinks, and delectable snacks available around the clock.</p>
                  <a class="btn btn-primary py-3 px-5 mt-2" href="">Explore More</a>
                </div>
                <div id="cab-description" class="description-box2">
                  <span class="paid-tag">Paid</span>
                  <h6 class="section-title text-center text-primary text-uppercase">
                    Charges Cab Hire
                  </h6>
                  <p>Enjoy hassle-free transportation with our transparent cab hire charges, ensuring you know exactly what you're paying for. Our competitive rates and detailed billing provide clarity and peace of mind, whether you're heading to a meeting, exploring the city, or running errands.</p>
                  <a class="btn btn-primary py-3 px-5 mt-2" href="">Explore More</a>
                </div>
                <!-- Add more description boxes for other options -->
              </div>
            </div>
          </div>


        </div>

      </div>



      <!-- Service End -->

      <!-- Testimonial Start -->
      <div
        class="container-fluid testimonial my-5 py-5 bg-dark wow zoomIn"
        data-wow-delay="0.1s">
        <div class="container-fluid d-flex justify-content-center align-items-center">
          <div class="owl-carousel testimonial-carousel py-5">
            <div
              class="testimonial-item position-relative bg-white rounded overflow-hidden">
              <a
                href="https://www.google.com/travel/search?q=Dev%20shelter&g2lb=2504374%2C4814050%2C4874190%2C4893075%2C4965990%2C72277293%2C72302247%2C72317059%2C72406588%2C72414906%2C72421566%2C72462234%2C72470899%2C72471280%2C72472051%2C72473841%2C72481459%2C72485658%2C72486593%2C72494250%2C72513513%2C72536387%2C72538597%2C72549171%2C72570850%2C72586335%2C72597757%2C72597926%2C72602734%2C72606236%2C72616110%2C72618896%2C72619172%2C72619927%2C72620306%2C72629582&hl=en-IN&gl=in&cs=1&ssta=1&ts=CAEaHhIcEhQKBwjoDxAGGA8SBwjoDxAGGBAYATIECAAQACoHCgU6A0lOUg&qs=CAEyFENnc0kwSmJkOXAzUWhlX1RBUkFCOAhCCREKx7NY-G_nj0IJEatrXTwSsitZQgkRaMv8PQDWrFpaODI2qgEzEAEyHhABIhpFppq6QvAZouUrN5eveHdnfFoOfzH50PmY9TIPEAIiC2RldiBzaGVsdGVyahwKGg0AcBZFEhMIiuCCzJzbhgMVVf5MAh1ekQVr&ap=MABoAboBB3Jldmlld3M&ictx=111&ved=0CAAQ5JsGahcKEwjY8ezQnNuGAxUAAAAAHQAAAAAQPA"
                class="text-dark">
                <p>
                  Well managed set of properties. The manager, Shivajeet, is a
                  very kind and helpful guy. They have a caretaker and a cook at
                  each property. The caretakers are very cooperative people as
                  well.
                </p>
                <div class="d-flex align-items-center">
                  <img
                    class="img-fluid flex-shrink-0 rounded"
                    src="https://lh3.googleusercontent.com/a/ACg8ocI62o557erbgRx7ujT8D91pPhNaUW8Qz5l8K-V8-V1IbxfHbw=s40-c-rp-mo-ba3-br100"
                    style="width: 45px; height: 45px" />
                  <div class="ps-3">
                    <h6 class="fw-bold mb-1">Siddharth Mathapati</h6>
                    <!-- <small>Profession</small> -->
                  </div>
                </div>
                <i
                  class="fa-solid fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"
                  style="color: #ffd43b"></i>
                <!-- <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i> -->
              </a>
            </div>
            <div
              class="testimonial-item position-relative bg-white rounded overflow-hidden">
              <a
                href="https://www.google.com/travel/search?q=Dev%20shelter&g2lb=2504374%2C4814050%2C4874190%2C4893075%2C4965990%2C72277293%2C72302247%2C72317059%2C72406588%2C72414906%2C72421566%2C72462234%2C72470899%2C72471280%2C72472051%2C72473841%2C72481459%2C72485658%2C72486593%2C72494250%2C72513513%2C72536387%2C72538597%2C72549171%2C72570850%2C72586335%2C72597757%2C72597926%2C72602734%2C72606236%2C72616110%2C72618896%2C72619172%2C72619927%2C72620306%2C72629582&hl=en-IN&gl=in&cs=1&ssta=1&ts=CAEaHhIcEhQKBwjoDxAGGA8SBwjoDxAGGBAYATIECAAQACoHCgU6A0lOUg&qs=CAEyFENnc0kwSmJkOXAzUWhlX1RBUkFCOAhCCREKx7NY-G_nj0IJEatrXTwSsitZQgkRaMv8PQDWrFpaODI2qgEzEAEyHhABIhpFppq6QvAZouUrN5eveHdnfFoOfzH50PmY9TIPEAIiC2RldiBzaGVsdGVyahwKGg0AcBZFEhMIiuCCzJzbhgMVVf5MAh1ekQVr&ap=MABoAboBB3Jldmlld3M&ictx=111&ved=0CAAQ5JsGahcKEwjY8ezQnNuGAxUAAAAAHQAAAAAQPA"
                class="text-dark">
                <p>
                  What a homestay!!! This is the best room stay hotel ever
                  seen...superb room super service everything is so good .. The
                  only thing I felt sad is bed because it's small for family
                  members
                </p>
                <div class="d-flex align-items-center">
                  <img
                    class="img-fluid flex-shrink-0 rounded"
                    src="https://lh3.googleusercontent.com/a/ACg8ocLy-WJtCSBzP1SYemgxQ68JELFiY5XWCF_J579jBFGpMIZcvA=s40-c-rp-mo-br100 "
                    style="width: 45px; height: 45px" />
                  <div class="ps-3">
                    <h6 class="fw-bold mb-1">Hamee Safee</h6>
                    <!-- <small>Profession</small> -->
                  </div>
                </div>
                <i
                  class="fa-solid fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"
                  style="color: #ffd43b"></i>
                <!-- <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i> -->
              </a>
            </div>
            <div
              class="testimonial-item position-relative bg-white rounded overflow-hidden">
              <a
                href="https://www.google.com/travel/search?q=Dev%20shelter&g2lb=2504374%2C4814050%2C4874190%2C4893075%2C4965990%2C72277293%2C72302247%2C72317059%2C72406588%2C72414906%2C72421566%2C72462234%2C72470899%2C72471280%2C72472051%2C72473841%2C72481459%2C72485658%2C72486593%2C72494250%2C72513513%2C72536387%2C72538597%2C72549171%2C72570850%2C72586335%2C72597757%2C72597926%2C72602734%2C72606236%2C72616110%2C72618896%2C72619172%2C72619927%2C72620306%2C72629582&hl=en-IN&gl=in&cs=1&ssta=1&ts=CAEaHhIcEhQKBwjoDxAGGA8SBwjoDxAGGBAYATIECAAQACoHCgU6A0lOUg&qs=CAEyFENnc0kwSmJkOXAzUWhlX1RBUkFCOAhCCREKx7NY-G_nj0IJEatrXTwSsitZQgkRaMv8PQDWrFpaODI2qgEzEAEyHhABIhpFppq6QvAZouUrN5eveHdnfFoOfzH50PmY9TIPEAIiC2RldiBzaGVsdGVyahwKGg0AcBZFEhMIiuCCzJzbhgMVVf5MAh1ekQVr&ap=MABoAboBB3Jldmlld3M&ictx=111&ved=0CAAQ5JsGahcKEwjY8ezQnNuGAxUAAAAAHQAAAAAQPA"
                class="text-dark">
                <p>
                  Thank you so much for the hospitality and also the arrangements.
                  We really liked your service. Amar bhaiyaa is an amazing cook.
                  They have laundary facility and also outside food is allowed.
                </p>
                <div class="d-flex align-items-center">
                  <img
                    class="img-fluid flex-shrink-0 rounded"
                    src="https://lh3.googleusercontent.com/a-/ALV-UjWlJxKP9QO1aIGAT2ZYFVlFAtiriSJBPTzUQLRpgby4A0pHhX4T=s40-c-rp-mo-ba3-br100"
                    style="width: 45px; height: 45px" />
                  <div class="ps-3">
                    <h6 class="fw-bold mb-1">Skinasics by Rhea</h6>
                    <!-- <small>Profession</small> -->
                  </div>
                </div>
                <i
                  class="fa-solid fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"
                  style="color: #ffd43b"></i>
                <!-- <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i> -->
              </a>
            </div>
            <div
              class="testimonial-item position-relative bg-white rounded overflow-hidden">
              <a
                href="https://www.google.com/travel/search?q=Dev%20shelter&g2lb=2504374%2C4814050%2C4874190%2C4893075%2C4965990%2C72277293%2C72302247%2C72317059%2C72406588%2C72414906%2C72421566%2C72462234%2C72470899%2C72471280%2C72472051%2C72473841%2C72481459%2C72485658%2C72486593%2C72494250%2C72513513%2C72536387%2C72538597%2C72549171%2C72570850%2C72586335%2C72597757%2C72597926%2C72602734%2C72606236%2C72616110%2C72618896%2C72619172%2C72619927%2C72620306%2C72629582&hl=en-IN&gl=in&cs=1&ssta=1&ts=CAEaHhIcEhQKBwjoDxAGGA8SBwjoDxAGGBAYATIECAAQACoHCgU6A0lOUg&qs=CAEyFENnc0kwSmJkOXAzUWhlX1RBUkFCOAhCCREKx7NY-G_nj0IJEatrXTwSsitZQgkRaMv8PQDWrFpaODI2qgEzEAEyHhABIhpFppq6QvAZouUrN5eveHdnfFoOfzH50PmY9TIPEAIiC2RldiBzaGVsdGVyahwKGg0AcBZFEhMIiuCCzJzbhgMVVf5MAh1ekQVr&ap=MABoAboBB3Jldmlld3M&ictx=111&ved=0CAAQ5JsGahcKEwjY8ezQnNuGAxUAAAAAHQAAAAAQPA"
                class="text-dark">
                <p>
                  Great experience in this hotel manager and staff is ver good
                  behaviour And rooms , clining, breakfast is very good great
                  experience I request to all please 👍visit
                </p>
                <div class="d-flex align-items-center">
                  <img
                    class="img-fluid flex-shrink-0 rounded"
                    src="https://lh3.googleusercontent.com/a-/ALV-UjXmCIc5zMNotppB-VcxZI3HS6sjHiUPvHMLIqi4m6OenUVgiINs=s40-c-rp-mo-br100"
                    style="width: 45px; height: 45px" />
                  <div class="ps-3">
                    <h6 class="fw-bold mb-1">Indrajeet Pandey</h6>
                    <!-- <small>Profession</small> -->
                  </div>
                </div>
                <i
                  class="fa-solid fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"
                  style="color: #ffd43b"></i>
                <!-- <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i> -->
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- Testimonial End -->

      <!-- Footer Start -->
      <div
        class="container-fluid bg-dark text-light wow fadeIn footer"
        data-wow-delay="0.1s">
        <div class="container pb-5">
          <div class="row g-5">
            <div class="col-md-6 col-lg-4">
              <div class="bg-primary rounded p-4">
                <a href="index.php">
                  <h1 class="text-white text-uppercase mb-3">Dev Shelter</h1>
                </a>
                <h5 class="text-white mb-0">
                  <a class="text-dark fw-medium ">Beyond </a> your dreams
                  within your reach.
                </h5>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <h6
                class="section-title text-start text-primary text-uppercase mb-4">
                Contact
              </h6>
              <p class="mb-2">
                <i class="fa fa-map-marker-alt me-3"></i>2nd Floor, Kalpataru
                Building,Evershine Nagar, Malad West Mumbai -400064, India.
              </p>
              <p class="mb-2">
                <a href="tel:+91 7039433505" class="text-light"><i class="fa fa-phone-alt me-3"></i>+91 7039433505 (for booking) <br></a>
                <a href="tel:+91 8451880595" class="text-light"> <i class="fa fa-headset me-3"></i>+91 8451880595 (for business enquiry) <br> </a>
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
                    class="section-title text-start text-primary text-uppercase mb-4">
                    Company
                  </h6>
                  <a class="btn btn-link" href="about.php">About Us</a>
                  <a class="btn btn-link" href="contact.php">Contact Us</a>
                </div>
                <div class="col-md-6 d-flex flex-column">
                  <h6 class="text-start text-primary text-uppercase mb-4">
                    Social media
                  </h6>
                  <a class="btn btn-link m-1" href="https://www.linkedin.com/in/shubham-sharma-34ba10133?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" target="_blank"><i class="fab fa-linkedin-in me-2"></i>Linkedin</a>
                  <a class="btn btn-link m-1" href="https://www.facebook.com/share/dyovuE3GajghUz1m/?mibextid=LQQJ4d" target="_blank"><i class="fab fa-facebook-f me-2"></i>Facebook</a>
                  <a class="btn btn-link m-1" href="https://www.youtube.com/@devshelters9739" target="_blank"><i class="fab fa-youtube me-2"></i>Youtube</a>
                  <a class="btn btn-link m-1" href="https://www.instagram.com/dev.shelters?igsh=MTVzNWlxbWZrNnRmNg%3D%3D&utm_source=qr" target="_blank"><i class="fab fa-instagram me-2"></i>Instagram</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="copyright">
            <div class="row">
              <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; <a class="border-bottom" href="#">Dev Shelter</a> , All
                Right Reserved. Designed by
                <a
                  class="border-bottom"
                  href="https://psmcodes.com"
                  target="_blank">
                  psmcodes.co</a>
              </div>

            </div>
          </div>
        </div>
      </div>
      <!-- Footer End -->

      <a href="https://wa.me/7039433505" class="float " target="_blank" alt="contact directly">
        <i class="fab fa-whatsapp my-float"></i>
      </a>



      <a href="tel:+918451880595" class="float-2" target="_blank">
        <i class="fa fa-headset my-float"></i>
      </a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>