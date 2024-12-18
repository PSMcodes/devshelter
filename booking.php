<?php
require('./admin/config.php');
require('utilities.php');

$netTotal;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  global $netTotal;
  if (isset($_GET['roomNumber'], $_GET['checkIn'], $_GET['checkOut'], $_GET['guest'], $_GET['rooms'])) {
    $roomNumber = intval($_GET['roomNumber']);
    $checkIn = new DateTime($_GET['checkIn']);
    $checkOut = new DateTime($_GET['checkOut']);
    $guest = $_GET['guest'];
    $rooms = $_GET['rooms'];
    $hasCoupon = isset($_GET['hasCoupon']) ? $_GET['hasCoupon'] : false;
    $coupon_code = isset($_GET['CouponCode']) ? $_GET['CouponCode'] : null;
    

    $sql = 'SELECT * FROM rooms WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $roomNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      // Calculate number of days
      $difference = $checkIn->diff($checkOut);
      $days = $difference->days;

      // Calculate additional guests
      $baseCapacity = $rooms * 2;
      $additionalGuests = max(0, $guest - $baseCapacity);

      // Calculate pricing
      $price1 = ($row['price'] * $days * $rooms);
      $price2 = $additionalGuests * 500;
      $total = $price1 + $price2;
      $serviceCharge = $total * (2.25 / 100);
      $gst = $total * (12 / 100);
      $netTotal = $total + $serviceCharge + $gst;

      // discount
      $discountPercentage = 0 ;
      $discountAmount = 0;
      if ($hasCoupon && $coupon_code) {
        $coupon_sql = 'SELECT discount_percentage, is_always_active, expires_at FROM offers WHERE coupon_code = ? AND (is_always_active = 1 OR expires_at > NOW())';
        $coupon_stmt = $conn->prepare($coupon_sql);
        $coupon_stmt->bind_param("s", $coupon_code);
        $coupon_stmt->execute();
        $coupon_result = $coupon_stmt->get_result();

        if ($coupon_result->num_rows > 0) {
          $coupon = $coupon_result->fetch_assoc();
          $discountPercentage = $coupon['discount_percentage'];

          // Calculate discount amount
          $discountAmount = $netTotal * ($discountPercentage / 100);
          $netTotal -= $discountAmount;

          // echo "Discount applied: $discountPercentage% ($discountAmount) <br>";
        } else {
          echo "Invalid or expired coupon code.";
        }
        $coupon_stmt->close();
      }
    } else {
      // Handle case where room number is not found
      echo "Room not found.";
      exit;
    }
  } else {
    // Handle missing parameters
    Header("Location:bookingRoom.php");
    exit;
  }
}
?>

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
    rel="stylesheet" />

  <!-- Icon Font Stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet" />
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- <script src="js/main.js"></script> -->

  <meta property="og:title" content="DevShelter | Rooms and Hotels">
  <meta name="description" content="DevShelter -   We provide comfortable and peaceful stay for corporate executives,
  business travelers, tourists and vacation rentals. ">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:type" content="Rooms and hotels at mumbai">
  <meta name="twitter:image" content="">
  <meta name="twitter:image:width" content="100">
</head>

<body>

  <div id="loader" class="loader">
    <img src="img/main/logo.png" alt="Company Logo">
  </div>

  <div class="content" id="content">
    <div class="container-fluid bg-white p-0">
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
                  <a href="index.php" class="nav-item nav-link active">Home</a>
                  <a href="service.php" class="nav-item nav-link">Services</a>
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


      <!-- Page Header Start -->
      <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/main/carousel-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
          <div class="container text-center pb-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="index.php">DevShelter</a></li>
                <!-- <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
                <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
      <!-- Page Header End -->


      <!-- Booking Start -->
      <div class="container-fluid py-5">
        <div class="container">
          <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Room Booking</h6>
            <h1 class="mb-5">Book A <span class="text-primary text-uppercase">Luxury Room</span></h1>
          </div>
          <div class="row g-5">
            <div class="col-lg-6">
              <h3 class="section-title">Pricing Details</h3>
              <div class="container-fluid my-2 p-2 ">
                <p class="text-dark">Per Day ₹ <span class="text-bold">
                    <?php echo $row['price'] ?>
                  </span> x <span id="noOfDays">
                    <?php echo $difference->days; ?> Days
                  </span> x <span id="noOfRooms">
                    <?php echo $_GET['rooms'] . ' rooms'; ?>
                  </span> = ₹
                  <?php echo $price1 ?>
                </p>
                <p class="text-dark">
                  <?php echo $additionalGuests; ?> * ₹ 500 = ₹
                  <?php echo $price2; ?>
                </p>
                <p class="text-primary h4">Sub total = ₹
                  <?php echo $total; ?>
                </p>
                <p class="text-dark">Service Tax = ₹
                  <?php echo $serviceCharge; ?>
                </p>
                <p class="text-dark">GST 12% = ₹
                  <?php echo $gst; ?>
                </p>
                <p class="text-dark"><?php if($discountAmount){echo "Discount : ".$discountAmount;}?></p>
                <p class="text-primary h4">Payment Due = ₹
                  <?php echo $netTotal; ?>
                </p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="wow fadeInUp" data-wow-delay="0.2s">
                <form id="inquiryForm3" method="post" action="bookingconfirm.php">
                  <div class="row g-3">
                    <div class="col-md-6">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="name"
                          placeholder="Your Name" required name="contactName" />
                        <label for="name">Your Name</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="contact"
                          placeholder="Your Contact" required name="contactNumber" />
                        <label for="contact">Your Contact</label>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="emailId" name="emailId"
                          placeholder="Your Email" required />
                        <label for="emailId">Your Email</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating date" id="date3" data-target-input="nearest">
                        <input type="date" class="form-control" id="checkin" name="checkIn"
                          placeholder="Check In" required />
                        <label for="checkin">Check In</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating date" id="date4" data-target-input="nearest">
                        <input type="date" class="form-control" id="checkout" name="checkOut"
                          placeholder="Check Out" required />
                        <label for="checkout">Check Out</label>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-floating">
                        <input type="number" class="form-control" id="guest" name="guests"
                          placeholder="Guests" required>
                        <label for="guest">Guests</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating">
                        <input type="number" class="form-control" id="rooms" placeholder="Rooms"
                          name="rooms" required>
                        <label for="rooms">Rooms</label>
                      </div>
                    </div>
                    <input type="text" class="form-control" id="roomNumber" name="roomNumber"
                      placeholder="Your Room" required hidden>
                    <input type="text" class="form-control" id="totalprice" name="totalprice"
                      placeholder="Your Room" required hidden value="<?php echo $netTotal; ?>">
                  </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <textarea class="form-control" placeholder="Special Request" id="message"
                    style="height: 100px"></textarea>
                  <label for="message">Special Request</label>
                </div>
              </div>
              <div class="col-12">
                <button class="btn btn-primary w-100 py-3" type="submit">Confirm
                  Booking</button>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Booking End -->

    <div class="container my-5"></div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light wow fadeIn footer" data-wow-delay="0.1s">
      <div class="container pb-5">
        <div class="row g-5">
          <div class="col-md-6 col-lg-4">
            <div class="bg-primary rounded p-4">
              <a href="index.php">
                <h1 class="text-white text-uppercase mb-3">DevShelter</h1>
              </a>
              <h5 class="text-white mb-0">
                <a class="text-dark fw-medium ">Beyond </a> your dreams
                within your reach.
              </h5>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6 class="section-title text-start text-primary text-uppercase mb-4">
              Contact
            </h6>
            <p class="mb-2">
              <i class="fa fa-map-marker-alt me-3"></i>2nd Floor, Kalpataru
              Building,Evershine Nagar, Malad West Mumbai -400064, India.
            </p>
            <p class="mb-2">
              <i class="fa fa-headset me-3"></i>+91 8451880595 (for inquiry) <br>
              <i class="fa fa-phone-alt me-3"></i>+91 7039433505 (for booking)
            </p>
            <p class="mb-2">
              <i class="fa fa-envelope me-3"></i>devshelters63@gmail.com
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
                <h6 class="section-title text-start text-primary text-uppercase mb-4">
                  Company
                </h6>
                <a class="btn btn-link" href="about.php">About Us</a>
                <a class="btn btn-link" href="contact.php">Contact Us</a>
              </div>
              <div class="col-md-6 d-flex flex-column">
                <h6 class="text-start text-primary text-uppercase mb-4">
                  Social media
                </h6>
                <a class="btn btn-link m-1"
                  href="https://www.linkedin.com/in/shubham-sharma-34ba10133?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app"
                  target="_blank"><i class="fab fa-linkedin-in me-2"></i>Linkedin</a>
                <a class="btn btn-link m-1"
                  href="https://www.facebook.com/share/dyovuE3GajghUz1m/?mibextid=LQQJ4d"
                  target="_blank"><i class="fab fa-facebook-f me-2"></i>Facebook</a>
                <a class="btn btn-link m-1" href="https://www.youtube.com/@devshelters9739"
                  target="_blank"><i class="fab fa-youtube me-2"></i>Youtube</a>
                <a class="btn btn-link m-1"
                  href="https://www.instagram.com/dev.shelters?igsh=MTVzNWlxbWZrNnRmNg%3D%3D&utm_source=qr"
                  target="_blank"><i class="fab fa-instagram me-2"></i>Instagram</a>
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
              <a class="border-bottom" href="https://psmcodes.com" target="_blank">
                psmcodes.co</a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer End -->


  <a href="https://wa.me/7039433505" class="float " target="_blank" alt="contact directly">
    <i class="fab fa-whatsapp my-float"></i>
  </a>



  <a href="tel:+91 8451880595" class="float-2" target="_blank">
    <i class="fa fa-headset my-float"></i>
  </a>
  </div>
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
  <script>
    const params = new URLSearchParams(window.location.search);
    const roomNum = params.get('roomNumber')
    const loct = params.get('location');
    const checkIn = params.get('checkIn');
    const checkOut = params.get('checkOut');
    const guest = params.get('guest');
    const rooms = params.get('rooms');
    const contactName = params.get('contactName');
    const contactNumber = params.get('contactNumber');
    const contactEmail = params.get('emailId')
    const message = params.get('message')

    if (roomNum && checkIn && checkOut && guest && rooms && contactName && contactNumber && contactEmail) {
      document.querySelector(`#roomNumber`).value = roomNum;
      document.getElementById('checkin').value = checkIn;
      document.getElementById('checkout').value = checkOut;
      document.getElementById('guest').value = guest;
      document.getElementById('rooms').value = rooms
      document.getElementById('name').value = contactName
      document.getElementById('contact').value = contactNumber
      document.getElementById('emailId').value = contactEmail
      document.getElementById('message').value = message
    }
  </script>
</body>

</html>