
<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'config.php';
$msg = '
    <h2>Reservation Details</h2>
    <table>
        <tr>
            <td>Reservation ID</td>
            <td>as</td>
        </tr>
        <tr>
            <td>Check-in</td>
            <td>Jan. 2, 2017</td>
        </tr>
        <tr>
            <td>Check-out</td>
            <td>Jan. 4, 2017</td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <th>S.No.</th>
            <th>Room</th>
            <th>Nights</th>
            <th>Adults</th>
            <th>Children</th>
            <th>Infants</th>
            <th>Meal Plan</th>
            <th>Room No.</th>
            <th>Currency</th>
            <th>Average Price Per Night</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Deluxe Room</td>
            <td>2</td>
            <td>2</td>
            <td>N.A.</td>
            <td>N.A.</td>
            <td>CP</td>
            <td>005</td>
            <td>INR</td>
            <td>4,512.50</td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td>Room Rent</td>
            <td>INR 9,025.00</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>INR 9,025.00</td>
        </tr>
        <tr>
            <td>Total Taxes</td>
            <td>INR 0.00</td>
        </tr>
        <tr>
            <td>Advance Amount</td>
            <td>INR 0.00</td>
        </tr>
        <tr>
            <td>Discount Amount</td>
            <td>INR 4,025.00</td>
        </tr>
        <tr>
            <td>Net Payable at Hotel</td>
            <td>INR 5,000.00</td>
        </tr>
    </table>
    <br>
    <h3>Payment Summary</h3>
    <p>Guest Name: Pearl</p>
    <p>Booking ID: 1543300-2942-1483282518</p>
    <p>Booking ID: 1543300-2942-1483283645</p>
    <br>
    <p>Created On: '.'
';
function sendMail($email, $subject, $message)
{

    $mail = new PHPMailer(true);

    $mail->isSMTP();

    $mail->SMTPAuth = true;

    $mail->Host = MAILHOST;

    $mail->Username = USERNAME;

    $mail->Password = PASSWORD;

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    $mail->Port = 587;

    $mail->setFrom(SENT_FROM, SENT_FROM_NAME);

    $mail->addAddress($email);

    $mail->addReplyTo(REPLY_TO, REPLY_TO_NAME);

    $mail->isHTML(true);

    
    $mail->Subject = $subject;
    
    $mail->Body = !empty($bodyContent) ? $bodyContent : 'Default body content';

    $mail->AltBody = $message;

    if (!$mail->send())
        return "Email not send . Try again";
    else
        return "success";

}

function generateRandomGibberish($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>
