<?php

require 'admin/config.php';
require 'utilities.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $netTotal;
    // Perform necessary actions for POST request
    $guest_name = $_POST['contactName'];
    $guest_email = $_POST['emailId'];
    $guest_phone = $_POST['contactNumber'];
    // echo implode(',', $_POST);
    $room_id = $_POST['roomNumber'];
    $check_in = $_POST['checkIn'];
    $check_out = $_POST['checkOut'];
    $rooms = $_POST['rooms'];
    $guests = $_POST['guests'];
    $netTotal = $_POST['totalprice'];
    // get Room number
    $roomNumber = intval($_POST['roomNumber']);
    $room_query = "SELECT room_number FROM rooms WHERE id = ?";
    $stmt = $conn->prepare($room_query);
    $stmt->bind_param("i", $roomNumber);
    $stmt->execute();
    $room_result = $stmt->get_result();
    $room_row = $room_result->fetch_assoc();
    $room_name = $room_row['room_number'];
    $guest_id;
    // check if guest is present
    $guest_query = "SELECT * FROM guests WHERE phone = '$guest_phone' OR email = '$guest_email'";
    $guest_result = $conn->query($guest_query);

    if ($guest_result->num_rows > 0) {
        // Guest already exists, get their ID
        $guest_row = $guest_result->fetch_assoc();
        $guest_id = $guest_row['id'];
    } else {
        // Guest does not exist, add them to the guests table
        $guest_query = "INSERT INTO guests (name, email, phone) VALUES ('$guest_name', '$guest_email', '$guest_phone')";
        $conn->query($guest_query);
        $guest_id = $conn->insert_id;
    }

    $timestamp = date('Y-m-d H:i:s');
    // Add new booking to the bookings table
    $allRooms = explode(',', $room_id);
    for ($i = 0; $i < $rooms; $i++) {
        $roomId = $allRooms[$i]; // Correctly extract the room ID from the array
        $booking_query = "INSERT INTO bookings (room_id, guest_id, check_in, check_out, status, totalRooms, totalGuest, timestamp, Price) VALUES ('$roomId', '$guest_id', '$check_in', '$check_out', 'pending', $rooms, $guests, '$timestamp', $netTotal)";

        if (!$conn->query($booking_query)) {
            die("Error in booking query: " . $conn->error); // Stop execution and show the error
        }

        $update_room_query = "UPDATE rooms SET status = 'pending' WHERE id = '$roomId'";

        if (!$conn->query($update_room_query)) {
            die("Error in update room query: " . $conn->error); // Stop execution and show the error
        }
    }

    // get current room details
    $res = $conn->query("SELECT * FROM bookings ORDER BY timestamp DESC LIMIT $rooms");
    if ($res === false) {
        die("Error in selecting bookings: " . $conn->error); // Stop execution and show the error
    }

    $row = $res->fetch_assoc();
    if ($row) {
        // Get guest details
        $res = $conn->query("SELECT * FROM guests WHERE id = " . $row['guest_id']);
        if ($res === false) {
            die("Error in selecting guest: " . $conn->error); // Stop execution and show the error
        }
        $guestDetails = $res->fetch_assoc();
    
        // Get room type
        $res = $conn->query("SELECT * FROM room_types WHERE id = (SELECT type_id FROM rooms WHERE id = (SELECT room_id FROM bookings WHERE id = " . $row['id'] . "))");
        if ($res === false) {
            die("Error in selecting room type: " . $conn->error); // Stop execution and show the error
        }
        $roomtype = $res->fetch_assoc();
    } else {
        die("No bookings found.");
    }

    // differencce in day (total days)
    $date1 = new DateTime($row['check_in']);
    $date2 = new DateTime($row['check_out']);
    $interval = $date1->diff($date2);

    $conn->close();
    $subject = "Booking Confirmation - DevShelter";
    $message = '<td style="padding:10px;box-sizing:border-box">
            <table style="width:100%;height:auto;margin:0;border-collapse:collapse;padding:0" cellpadding="0" cellspacing="0">
                <tbody><tr>
                    <td style="padding:5px;text-align:center;box-sizing:border-box;border:1px solid #999">
                        <img src="https://devshelter.in/img/main/logo.png" alt="Logo" width="100px">
                    </td>
                    <td style="padding:5px;line-height:1;box-sizing:border-box;border:1px solid #999;white-space:nowrap"> Reservation ID<br>

                        <h2 style="margin:5px 0 0 0">DEV' . $row['id'] . '</h2>
                        
                        
                    </td>
                    <td style="padding:5px;box-sizing:border-box;border:1px solid #999;font-size:12px;line-height:16px;white-space:nowrap">
                        <img src="https://ci3.googleusercontent.com/meips/ADKq_NZ1j2qwQtvg7KUPPhHb7BDiBvMm5fOQzyIs0zzJYmIXgMSmga0VJfmgKP30jRLyzG6KmFuprXZWa-84Ap1VvqDOvW9wUPgl7U5SYW791JAwPkBa98XtsNKP=s0-d-e1-ft#https://djubo-static.s3.amazonaws.com/static/v4/images/calendar.png" style="max-width:25%" class="CToWUd" data-bit="iit"><br>
                        <strong>Check in</strong>
                        <br>' . $row['check_in'] . '<br>
                        <strong>Check out</strong>
                        <br>' . $row['check_out'] . '</td>
                    
                        <td style="padding:5px;box-sizing:border-box;border:1px solid #999">
                            <img src="https://ci3.googleusercontent.com/meips/ADKq_NZuznA0ahTfPgip_VE78-uDATqtySsQbpT8ZbOk8RH_D-qdAk64OI16-HP3ZzJd4cBOscyi31BK9QJkd741EmaddrOBt6j0RY1gJpyGk9un2LKGTQ=s0-d-e1-ft#https://djubo-static.s3.amazonaws.com/static/v4/images/cfm.png" style="max-height:65px;min-width:50px;min-height:50px;max-width:100%" class="CToWUd" data-bit="iit">
                        </td>
                    
                    
                </tr>
                
    <tr>
    <td colspan="5" style="padding:10px 0;box-sizing:border-box">
        <p></p>
    </td>
</tr>

    
<tr>
    <td colspan="5">
        <table style="width:100%;border-collapse:collapse">
            <tbody><tr>
                <td style="line-height:24px;border-top:1px solid #ddd;padding:0 10px 0 0;vertical-align:top">
                    <table cellpadding="0" cellspacing="0">
                        <tbody><tr>
                            <td>
                                <table style="border-collapse:collapse">
                                    <tbody><tr>
                                        <td valign="top" style="padding:0 10px 0 0px;white-space:nowrap">Guest Name</td>
                                        <td valign="top" style="padding:0;white-space:nowrap"> : ' . $guestDetails['name'] . ' </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" style="padding:0 10px 0 0px;white-space:nowrap">Guest Email</td>
                                        <td valign="top" style="padding:0"> : ' . $guestDetails['email'] . ' </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" style="padding:0 10px 0 0px;white-space:nowrap">Guest Contact No.</td>
                                        <td valign="top" style="padding:0"> : ' . $guestDetails['phone'] . '</td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody></table>
                </td>
                
            </tr>
        </tbody></table>
    </td>
</tr>


    

<tr>
    <td style="padding:15px 0 0 0px" colspan="5">
        <table style="width:100%;border-collapse:collapse;line-height:15px;border-color:#ddd" border="1">
            <tbody><tr style="background:#ddd">
                <th style="border-color:#ddd;padding:5px;box-sizing:border-box">S.No.</th>
                <th style="border-color:#ddd;padding:5px;box-sizing:border-box">Room</th>
                <th style="border-color:#ddd;padding:5px;box-sizing:border-box">Nights</th>
                <th style="border-color:#ddd;padding:5px;box-sizing:border-box">Guests</th>
                <th style="border-color:#ddd;padding:5px;box-sizing:border-box">Meal Plan</th>
                <th style="border-color:#ddd;padding:5px;box-sizing:border-box">Room No.</th>
                <th style="border-color:#ddd;padding:5px;box-sizing:border-box">Currency</th>
            </tr>
            
                <tr>
                    <td style="font-weight:bold;text-align:center;border-color:#ddd;padding:5px;box-sizing:border-box">1</td>
                    <td style="font-weight:bold;text-align:center;border-color:#ddd;padding:5px;box-sizing:border-box">' . $roomtype['type'] . '</td>
                    <td style="font-weight:bold;text-align:center;border-color:#ddd;padding:5px;box-sizing:border-box">' . $interval->days . '</td>
                    <td style="font-weight:bold;text-align:center;border-color:#ddd;padding:5px;box-sizing:border-box">' . $row['totalGuest'] . '</td>
                    <td style="font-weight:bold;text-align:center;border-color:#ddd;padding:5px;box-sizing:border-box">CP</td>
                    <td style="font-weight:bold;text-align:center;border-color:#ddd;padding:5px;box-sizing:border-box">' . $row['room_id'] . '</td>
                    <td style="border-color:#ddd;padding:5px;box-sizing:border-box">INR</td>
                </tr>
              
            <tr>
                <td colspan="5" style="text-align:right;padding:5px;box-sizing:border-box;border-color:#ddd">
                    Total
                </td>
                <td style="border-color:#ddd;padding:5px;box-sizing:border-box">INR</td>
                <td style="font-weight:bold;text-align:right;padding:5px;box-sizing:border-box;border-color:#ddd">' . $row['Price'] . '</td>
            </tr>
            <tr>
                <td colspan="5" style="text-align:right;padding:5px;box-sizing:border-box;border-color:#ddd">
                    Advance Amount
                </td>
                <td style="border-color:#ddd;padding:5px;box-sizing:border-box">INR</td>
                <td style="font-weight:bold;text-align:right;padding:5px;box-sizing:border-box;border-color:#ddd">0.00</td>
            </tr>
            <tr>
                <td colspan="5" style="text-align:right;padding:5px;box-sizing:border-box;border-color:#ddd">
                    Net Payable at Hotel
                </td>
                <td style="border-color:#ddd;padding:5px;box-sizing:border-box">INR</td>
                <td style="font-weight:bold;text-align:right;padding:5px;box-sizing:border-box;border-color:#ddd">' . $row['Price'] . '</td>
            </tr>
        </tbody></table>
    </td>
</tr>

    <tr>
    <td colspan="5">
        <table style="width:100%" cellpadding="0" cellspacing="0">
            
            
                <tbody>
        <tr>
            <td colspan="2" style="vertical-align:top;padding:0px 0;border-bottom:1px solid #ddd">
                
                    <p style="margin:5px 0px">Created By: Shubham Sharma</p>
                
                
                    <p style="margin:5px 0px">Created On: ' . date("Y-m-d H:i:s") . '</p>
                
            </td>
        </tr>
        </tbody>
        </table>
    </td>
</tr>

            </tbody></table>

        </td>
  ';

    echo sendMail($guest_email, $subject, $message);
    echo sendMail("devshelters63@gmail.com", "New Booking", $message);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Booking Confirmed - DevShelter | Room And Hotels</title>
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

<body class="overflow">
    <!-- Header Start -->
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
                      class="mb-0 text-dark"
                      >devshelters63@gmail.com</a
                    >
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
                  <h1 class="m-0 text-primary">Dev Shelter</h1>
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
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="service.php" class="nav-item nav-link">Services</a>
                    <a href="about.php" class="nav-item nav-link">About Us</a>
                    <ul class="navbar-nav">
                      <!-- Dropdown -->
                      <li class=" dropdown p-0 m-0 bg-dark">
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
                                  href="roomdetails.php?location=malad&type=service&subtype=3bhk"
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
                                  href="roomdetails.php?location=malad&type=service&subtype=4bhk"
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
                                  Dev Shelters Malad
                                </a>
                              </li>
                              <li>
                                <a
                                  class="dropdown-item"
                                  href="roomdetails.php?location=goregaon&type=apart"
                                  ><i
                                    class="fa-solid fa-hotel"
                                    style="color: #24d4fd"
                                  ></i>
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

    <!-- header end -->

    <div class="container confirmation-container">
        <!-- Heading -->
        <h1 class="mb-4">Booking Confirmed</h1>

        <!-- Party Popper Animation -->
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>

        <h2 class="display-4">Thank you
            <?php echo $guestDetails['name'] ?>
        </h2>
        <p class="lead">Your booking has been confirmed.</p>


        <div class="details-button">
            <a class=" btn btn-secondary m-3" href="https://mail.google.com" target="_blank">Check Mail</a>
            <button href="index.php" class="btn btn-primary m-3">Home Page</button>
        </div>
    </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
</body>

</html>