<?php
require('utilities.php');
require('./admin/config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = isset($_GET['location']) ? $_GET['location'] : null;
    $type = isset($_GET['type']) ? $_GET['type'] : null;
    $checkIn = isset($_GET['checkIn']) ? $_GET['checkIn'] : null;
    $checkOut = isset($_GET['checkOut']) ? $_GET['checkOut'] : null;
    $guest = isset($_GET['guest']) ? $_GET['guest'] : $_POST['guests'];
    $rooms = isset($_GET['rooms']) ? $_GET['rooms'] : $_POST['rooms'];
    $contactName = $_POST['contactName'];
    $contactNumber = $_POST['contactNumber'];
    $emailId = $_POST['emailId'];
    $message = $_POST['message'];
    $hasCoupon = $_POST['hasCoupon'];
    $coupon_code = $_POST['couponCode'];


    // echo $location . " __ " . $type . " __ " . $checkIn . " __ " . $checkOut;
    // echo $location, $type, $checkIn, $checkOut, $checkIn, $checkOut, $checkIn, $checkOut, $rooms;
    if ($location && $type && $checkIn && $checkOut) {
        echo $guest . "__" . $rooms . "__";
        // Query to check room availability
        $sql = "SELECT 
        r.id, 
        r.room_number, 
        r.price, 
        rt.primarytype 
        FROM 
            rooms r 
        JOIN 
            room_types rt ON r.type_id = rt.id 
        WHERE 
            r.status = 'available' 
            AND r.location_id = (SELECT id FROM locations WHERE name = ?)
            AND rt.primarytype = ? 
            AND r.id NOT IN (
                SELECT room_id 
                FROM bookings 
                WHERE 
                    status = 'available'
                    AND (
                        (check_in <= ? AND check_out >= ?)
                        OR 
                        (check_in <= ? AND check_in >= ?)
                        OR 
                        (check_out <= ? AND check_out >= ?)
                    )
            ) LIMIT ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssi", $location, $type, $checkIn, $checkOut, $checkIn, $checkOut, $checkIn, $checkOut, $rooms);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Display available rooms
            $room_ids = [];
            while ($row = $result->fetch_assoc()) {
                $room_ids[] = $row['id'];
            }
            $room_ids_string = implode(',', $room_ids);

            $gibberish = generateRandomGibberish(100);
            header("Location:booking.php?$gibberish&roomNumber=$room_ids_string&location=$location&type=$type&subtype=$subtype&checkIn=$checkIn&checkOut=$checkOut&guest={$guest}&rooms=$rooms&contactName=$contactName&contactNumber=$contactNumber&emailId=$emailId&message=$message&hasCoupon=$hasCoupon&CouponCode=$coupon_code");
        } else {
            echo "<script>
        alert('Room not available at the selected dates');
        document.getElementById('alert').innerHTML += '<br><br> <span class=\"h3 text-bg-danger p-2 rounded-4\"> Room not available at the selected dates </span>';
    </script>";
        }
        $stmt->close();
    } else {
        echo "<p>Please provide valid location, type, and date range.</p>";
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
    <link href="img/main/logo.png" rel="icon" />

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

    <meta property="og:title" content="DevShelter | Rooms and Hotels" />
    <meta name="description" content="DevShelter - We provide comfortable and peaceful stay for corporate executives,
    business travelers, tourists and vacation rentals. " />
    <meta property="og:image" content="https://devshelter.in/img/main/logo.png" />
    <meta property="og:url" content="https://devshelter.in" />
    <meta property="og:type" content="Rooms and hotels at mumbai" />
    <meta name="twitter:image" content="https://devshelter.in/img/main/logo.png" />
    <meta name="twitter:image:width" content="100" />
</head>


<body>
    <style>
        .sticky-top {
            position: sticky;
            top: 0;
            z-index: 1020;
            padding: 20px;
            border-radius: 5px;
        }
    </style>

    <!-- Spinner End -->

    <!-- Header Start -->
    <div class="container-fluid bg-dark px-0">
        <div class="row gx-0">
            <div class="col-lg-3 bg-dark d-none d-lg-block">
                <a href="index.php" class="navbar-brand d-flex flex-column align-items-center justify-content-center">
                    <img src="img/main/logo.png" class="navbar-brand w-25" alt="Dev Shelters Logo" id="logo" />
                    <h3 class="text-primary">Dev Shelter</h3>
                </a>
            </div>
            <div class="col-lg-9 d-flex flex-column justify-content-center">
                <div class="row gx-0 bg-white d-none d-lg-flex h-100">
                    <div class="col-lg-7 px-5 text-start d-flex">
                        <div class="h-100 d-inline-flex align-items-center me-4">
                            <i class="fa fa-envelope text-primary me-2"></i>
                            <a href="mailto:devshelters63@gmail.com" class="mb-0 text-dark">devshelters63@gmail.com</a>
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
                    <div class="col-lg-5 px-5 text-end d-inline-flex align-items-center justify-content-center">
                        <div>
                            <a class="me-3" href="https://www.facebook.com/share/dyovuE3GajghUz1m/?mibextid=LQQJ4d"
                                target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a class="me-3" href="https://www.instagram.com/dev.shelters/" target="_blank"><i
                                    class="fab fa-instagram"></i></a>
                            <a class="me-3" href="https://www.youtube.com/@devshelters9739" target="_blank"><i
                                    class="fab fa-youtube"></i></a>
                            <a class=""
                                href="https://www.linkedin.com/in/shubham-sharma-34ba10133?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app"
                                target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-md bg-dark navbar-dark p-3 p-lg-0">
                    <a href="index.php" class="navbar-brand d-block d-lg-none">
                        <h1 class="m-0 text-primary">Dev Shelter</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="service.php" class="nav-item nav-link">Services</a>
                            <a href="about.php" class="nav-item nav-link">About Us</a>
                            <ul class="navbar-nav">
                                <!-- Dropdown -->
                                <li class=" dropdown p-0 m-0 bg-dark">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink">
                                        Our Listings
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item border-bottom" href="#">
                                                Service Apartment &raquo;
                                            </a>
                                            <ul class="dropdown-menu dropdown-submenu">
                                                <li>
                                                    <a class="dropdown-item border-bottom"
                                                        href="roomdetails.php?location=malad&type=service&subtype=3bhk"><i
                                                            class="fa-solid fa-hotel" style="color: #24d4fd"></i>
                                                        3Bhk Malad
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="roomdetails.php?location=malad&type=service&subtype=4bhk"><i
                                                            class="fa-solid fa-hotel" style="color: #24d4fd"></i>
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
                                                    <a class="dropdown-item border-bottom"
                                                        href="roomdetails.php?location=malad&type=apart"><i
                                                            class="fa-solid fa-hotel" style="color: #24d4fd"></i>
                                                        Kalpataru Hometel Malad
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-bottom"
                                                        href="roomdetails.php?location=malad&type=apart2"><i
                                                            class="fa-solid fa-hotel" style="color: #24d4fd"></i>
                                                        Dev Shelters Malad
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="roomdetails.php?location=goregaon&type=apart"><i
                                                            class="fa-solid fa-hotel" style="color: #24d4fd"></i>
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
    <?php
    include 'admin/offers.php';
    if (has_offer()) {
        echo '<div class="marquee-footer">
        <div class="marquee">
          <div class="marquee_text">
            <ul class="marquee-content-primary">
              ⚪ ' . display_latest_offer() . ' ⚪
              ⚪ ' . display_latest_offer() . ' ⚪
              ⚪ ' . display_latest_offer() . ' ⚪ 
            </ul>
          </div>
        </div>
      </div>
      ';
    } ?>

    <div class="container mt-5">
        <h2 class="room-title my-5" id="roomTitle">*</h2>
        <div class="infoDiv my-2">
            <!-- Room Details Here -->
        </div>
        <div class="row position-relative">
            <div class="col-lg-8">
                <!-- About Room -->
                <div class="row mb-4">
                    <div class="row mb-5">
                        <div
                            class="col-3 d-flex flex-column justify-content-center align-items-center border text-secondary p-3">
                            <i class="fa fa-home fa-solid f-20 my-2"></i>
                            <span class="text-secondary">Type</span>
                            <b>Private Room</b>
                        </div>
                        <div
                            class="col-3 d-flex flex-column justify-content-center align-items-center border text-secondary p-3">
                            <i class="fa fa-user fa-solid f-20 my-2"></i>
                            <span class="text-secondary">Max Occupancy</span>
                            <b id="guestsCount">3</b>
                        </div>
                        <div
                            class="col-3 d-flex flex-column justify-content-center align-items-center border text-secondary p-3">
                            <i class="fa fa-bed fa-solid f-20 my-2"></i>
                            <span class="text-secondary">Bedrooms</span>
                            <b>1 Bedrooms / 1 Beds</b>
                        </div>
                        <div
                            class="col-3 d-flex flex-column justify-content-center align-items-center border text-secondary p-3">
                            <i class="fa fa-shower fa-solid f-20 my-2"></i>
                            <span class="text-secondary">Bathrooms</span>
                            <b>1 / Full</b>
                        </div>
                    </div>
                    <div class="col-12">
                        <h3 class="my-2">About this listing</h3>
                        <p id="aboutDetails">
                            Our service apartment in Malad east Mumbai (Business Suite) is
                            the perfect place when you are in Mumbai on a personal retreat
                            or vacation and looking for a quiet and well-maintained luxury
                            apartment with a fabulous view.
                        </p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-lg-12">
                        <h3>Details</h3>
                        <div class="row w-100 d-flex justify-content-center align-items-start p-2">
                            <div class="col-6">
                                <div class="amenities">
                                    <div class="icon">
                                        <i class="fa-solid fa-people-group"></i>
                                    </div>
                                    <span class="text-secondary">Guests : <span id="guestCount2"></span> ( guest per
                                        Room )</span>
                                </div>
                                <div class="amenities">
                                    <div class="icon"><i class="fa-solid fa-bed"></i></div>
                                    <span class="text-secondary">Total Bedrooms: <span id="bedroomCount">3</span></span>
                                </div>
                                <div class="amenities">
                                    <div class="icon"><i class="fa-solid fa-bed"></i></div>
                                    <span class="text-secondary">Beds: Double / Twin Beds</span>
                                </div>
                                <div class="amenities">
                                    <div class="icon">
                                        <i class="fa-solid fa-fingerprint"></i>
                                    </div>
                                    <span class="text-secondary">Type: Private Room </span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="amenities">
                                    <div class="icon"><i class="fa-solid fa-shower"></i></div>
                                    <span class="text-secondary">Bathrooms: 1 per room</span>
                                </div>
                                <div class="amenities">
                                    <div class="icon">
                                        <i class="fa-regular fa-calendar"></i>
                                    </div>
                                    <span class="text-secondary">Check-In After : <b>12:00 PM</b>
                                    </span>
                                </div>
                                <div class="amenities">
                                    <div class="icon">
                                        <i class="fa-regular fa-calendar"></i>
                                    </div>
                                    <span class="text-secondary">Check-Out Before : <b>11:00 AM</b>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 d-flex">
                        <div class="container2">
                            <div class="section">
                                <h2>Features</h2>
                                <ul>
                                    <li data-tooltip="Room service available 24/7" class="mb-2">
                                        <i class="fas fa-concierge-bell"></i> 24-hr Room Service
                                    </li>
                                    <li data-tooltip="Temperature control in all rooms" class="mb-2">
                                        <i class="fas fa-snowflake"></i> Air Conditioning
                                    </li>
                                    <li data-tooltip="Shuttle service to and from the airport" class="mb-2">
                                        <i class="fas fa-shuttle-van"></i> Airport Shuttle
                                    </li>
                                    <li data-tooltip="Private bathroom in each room" class="mb-2">
                                        <i class="fas fa-bath"></i> Bathroom
                                    </li>
                                    <li data-tooltip="Chef and caretaker available" class="mb-2">
                                        <i class="fas fa-utensils"></i> Chef & Care Taker
                                    </li>
                                    <li data-tooltip="Free laundry service" class="mb-2">
                                        <i class="fas fa-tshirt"></i> Comp Laundry
                                    </li>
                                    <li data-tooltip="Complimentary breakfast provided" class="mb-2">
                                        <i class="fas fa-coffee"></i> Comp Breakfast
                                    </li>
                                    <li data-tooltip="Free newspaper daily">
                                        <i class="fas fa-newspaper"></i> Comp Newspaper
                                    </li>
                                </ul>
                            </div>
                            <div class="section">
                                <h2>Amenities</h2>
                                <ul>
                                    <li data-tooltip="Entertainment options available" class="mb-2">
                                        <i class="fas fa-tv"></i> Entertainment Facilities
                                    </li>
                                    <li data-tooltip="Kitchenette in rooms" class="mb-2">
                                        <i class="fas fa-blender"></i> Equipped Kitchenette
                                    </li>
                                    <li data-tooltip="Free wireless internet" class="mb-2">
                                        <i class="fas fa-wifi"></i> Free Wifi
                                    </li>
                                    <li data-tooltip="Hair dryer in rooms" class="mb-2">
                                        <i class="fas fa-wind"></i> Hair Dryer
                                    </li>
                                    <li data-tooltip="Tablet check-in service" class="mb-2">
                                        <i class="fas fa-tablet-alt"></i> Tablet Check In
                                    </li>
                                    <li data-tooltip="Television in rooms" class="mb-2">
                                        <i class="fas fa-tv"></i> TV
                                    </li>
                                    <li data-tooltip="Warm and welcoming hospitality" class="mb-2">
                                        <i class="fas fa-heart"></i> Warm Hospitality
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Map Section -->
                <div class="room-details">
                    <h3>Map</h3>
                    <div id="map"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="position-sticky top-0">
                    <h2>Booking</h2>
                    <form id="inquiryForm2" method="POST" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name" required
                                        name="contactName" />
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="contact" placeholder="Your Contact"
                                        name="contactNumber" />
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
                                    <input type="date" class="form-control" id="checkin" placeholder="Check In"
                                        required />
                                    <label for="checkin">Check In</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date" id="date4" data-target-input="nearest">
                                    <input type="date" class="form-control" id="checkout" placeholder="Check Out"
                                        required />
                                    <label for="checkout">Check Out</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="guest" placeholder="Guests"
                                        required name="guests" />
                                    <label for="guest">Guests</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="rooms" placeholder="Rooms" required name="rooms" />
                                    <label for="rooms">Rooms</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Special Request" id="message"
                                        name="message" style="height: 100px"></textarea>
                                    <label for="message">Special Request</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="hasCoupon" name="hasCoupon" value="true" >
                                    <label for="hasCoupon" class="form-check-label">Add Coupon Code ?</label>
                                </div>
                                <input type="text" name="couponCode" id="couponInput" class="form-control" placeholder="Coupon Code" >
                            </div>
                            <div class="col-md-12 text-danger" id="alert"></div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">
                                    Book Now
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5"></div>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light wow fadeIn footer" data-wow-delay="0.1s">
        <div class="container pb-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-4">
                    <div class="bg-primary rounded p-4">
                        <a href="index.php">
                            <h1 class="text-white text-uppercase mb-3">DevShelter</h1>
                        </a>
                        <p class="text-white mb-0">
                            <a class="text-dark fw-medium">DevShelter </a> have properties
                            listed from Malad to Jogeshwari over 30+ Rooms in Inventory
                        </p>
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
                        <i class="fa fa-phone-alt me-3"></i>+91 8451880595
                    </p>
                    <p class="mb-2">
                        <i class="fa fa-envelope me-3"></i>devshelters63@gmail.com
                    </p>
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
                            psmcodes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="https://wa.me/7039433505" class="float" target="_blank" alt="contact directly">
        <i class="fab fa-whatsapp my-float"></i>
    </a>

    <a href="tel:+91 8451880595" class="float-2" target="_blank">
        <i class="fa fa-headset my-float"></i>
    </a>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
<script>
    function changeSlide(index) {
        $("#imageGalleryCarousel").carousel(index);
    }

    // updates Details

    let roomData;

    let params = window.location.search;
    let roomLocation = new URLSearchParams(params).get("location");
    let roomType = new URLSearchParams(params).get("type");
    const loct = new URLSearchParams(params).get("location");
    const checkIn = new URLSearchParams(params).get("checkIn");
    const checkOut = new URLSearchParams(params).get("checkOut");
    const guest = new URLSearchParams(params).get("guest");
    const rooms = new URLSearchParams(params).get("rooms");
    const subtype = new URLSearchParams(params).get("subtype");

    function getData() {
        fetch("server.json")
            .then((data) => data.json())
            .then((data) => {
                roomData = data;
                if (roomLocation || roomType) {
                    showData(roomData);
                } else {
                    console.log("No room selected");
                    window.location.pathname = "room.php";
                }
            });
    }

    function showData() {
        let currentRoom = roomData[roomLocation][roomType];
        let maxOccupancy = currentRoom["maxOccupancy"];

        $("#guestsCount").html(maxOccupancy);
        $("#guestCount2").html(maxOccupancy);
        $("#bedroomCount").html(maxOccupancy);
        $("#bedCount").html(maxOccupancy);
        $('#map').html(currentRoom[subtype]?.map || currentRoom.map);
        $("#roomTitle").html(currentRoom[subtype]?.title || currentRoom.title);

        if (currentRoom.title == "Kalpaturu Hometel") {
            $("#bedroomCount").html("8");
        } else if (currentRoom.title == "Dev shelter Malad") {
            $("#bedroomCount").html("10");
        } else if (currentRoom.title == "Dev Shelter Goregaon") {
            $("#bedroomCount").html("10");
        } else if (currentRoom[subtype].title == "4 Bhk service Apartment") {
            console.log("yes");
            $("#bedroomCount").html("4");
        }

        let roomDetailsHtml = generateRoomDetailsHTML(currentRoom);
        $(".infoDiv").html(roomDetailsHtml);
    }

    function generateRoomDetailsHTML(room) {
        let html = "";

        if (room[subtype]) {
            // If there's a subtype (e.g., "3bhk", "4bhk")
            html += "<div class='row py-2 my-2 bg-white2 rounded-4 d-flex align-items-center'>"
            html += generateRoomInfoHTML(room[subtype].roomType[1]);
            html += generateCarouselHTML(room[subtype].roomType[1].images, "div2");
            html += "</div>"
            html += "<div class='row py-2 my-2 bg-white2 rounded-4 d-flex align-items-center'>"
            html += generateCarouselHTML(room[subtype].roomType[0].images, "div1");
            html += generateRoomInfoHTML(room[subtype].roomType[0]);
            html += "</div>"
        } else {
            // If no subtype, show default room details
            html += "<div class='row py-2 my-2 bg-white2 rounded-4 d-flex align-items-center'>"
            html += generateCarouselHTML(room.images, "div1");
            html += generateRoomInfoHTML(room);
            html += "</div>"
        }

        return html;
    }

    function generateCarouselHTML(images, carouselId) {
        let html = `<div id="carouselExampleFade${carouselId}" class="carousel slide carousel-fade col-md-5">`;
        html += `<div class="carousel-inner" id="${carouselId}">`;

        images.forEach((image, index) => {
            html += `<div class="carousel-item ${index === 0 ? 'active' : ''}">`;
            html += `<img src="${image}" class="d-block w-100" alt="...">`;
            html += `</div>`;
        });

        html += `</div>`;
        html += `<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade${carouselId}" data-bs-slide="prev">`;
        html += `<span class="carousel-control-prev-icon" aria-hidden="true"></span>`;
        html += `<span class="visually-hidden">Previous</span>`;
        html += `</button>`;
        html += `<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade${carouselId}" data-bs-slide="next">`;
        html += `<span class="carousel-control-next-icon" aria-hidden="true"></span>`;
        html += `<span class="visually-hidden">Next</span>`;
        html += `</button>`;
        html += `</div>`;

        return html;
    }

    function generateRoomInfoHTML(roomInfo) {
        return `
                <div class="Roomdetails col-md-6">
                    <h3>${roomInfo.title}</h3>
                    <span>${roomInfo.info}</span>
        </div>`;
    }

    if (checkIn) {
        console.log(checkIn);
        $("#checkin").val(checkIn);
    }
    if (checkOut) {
        $("#checkout").val(checkOut);
    }
    if (guest) {
        $("#guest").val(guest);
    }
    if (rooms) {
        $("#rooms").val(rooms);
    }

    $('#couponInput').hide();
    $('#hasCoupon').change(function() {
        $('#couponInput').toggle();
    })

    let inquiryForm = document.querySelector("#inquiryForm2");
    inquiryForm.addEventListener("submit", (e) => {
        if (guest > 3) {
            $("#alert").html(
                "Two rooms will be booked as the guests are exceeding room limit "
            );
        }
        // e.preventDefault()
        const name = document.getElementById("name").value;
        if (!/^[a-zA-Z\s]+$/.test(name)) {
            alert("Please enter a valid name (only letters and spaces are allowed).");
            event.preventDefault();
            return;
        }

        // Validate email (HTML5 email validation is usually sufficient)
        const email = document.getElementById("emailId").value;
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            alert("Please enter a valid email address.");
            event.preventDefault();
            return;
        }

        // Validate Indian contact number
        const contact = document.getElementById("contact").value;
        if (!/^[6-9]\d{9}$/.test(contact)) {
            alert(
                "Please enter a valid Indian contact number (10 digits, starting with 6-9)."
            );
            event.preventDefault();
            return;
        }
        $('#alert').html($('#alert').html() +
            '<br><br> <span class="h6 text-bg-success p-2 rounded-3">Processing </span>')
        inquiryForm.submit()
    });

    getData();
</script>
<script defer src="js/main.js"></script>