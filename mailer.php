<?php
require '../vendor/vendor/autoload.php';

use Aws\Ses\SesClient;
use Aws\Exception\AwsException;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Script accessed directly without form submission
    $response = array('message' => 'Invalid request.');
    echo json_encode($response);
    exit;
}

$config = require '../vendor/config.php';

$awsKey = $config['aws']['key'];
$awsSecret = $config['aws']['secret'];
$awsRegion = $config['aws']['region'];

$sesClient = new SesClient([
    'version' => 'latest',
    'region' => $awsRegion,
    'credentials' => [
        'key' => $awsKey,
        'secret' => $awsSecret,
    ],
]);
// Get form data
$name = strip_tags(trim($_POST["name"]));
$name = str_replace(array("\r","\n"),array(" "," "),$name);
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
$contact = trim($_POST["contact1"]);
$address = trim($_POST["address"]);
$message = trim($_POST["message"]);

// Set up email headers
$headers = "From: www.jennysnursingedu.in" . "\r\n" .
           "Reply-To: $email" . "\r\n" ;

// Set up email content
$subject = 'Enquiry Form the Website';
// Build the email content.
$email_content = "Name: $name\n\n";
$email_content .= "Email: $email\n\n";
$email_content .= "Contact: $contact\n\n";
$email_content .= "Address: $address\n\n";
$email_content .= "Message :$message\n\n";


$senderEmail = 'asquaremailer@gmail.com';
$recipientEmail = 'jennyscon2010@gmail.com';
//$recipientEmail = 'elavarasan5193@gmail.com';

error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $result = $sesClient->sendEmail(['Destination' => [
        'ToAddresses' => [$recipientEmail],
    ],
    'Message' => [
        'Body' => [
            'Text' => [
                'Charset' => 'UTF-8',
                'Data' => $email_content,
            ],
        ],
        'Subject' => [
            'Charset' => 'UTF-8',
            'Data' => $subject,
        ],
    ],
    'Source' => $senderEmail,
    'ReplyToAddresses' => [$email], // Specify Reply-To header

]);

// Prepare JSON response
$response = "Email sent successfully";
echo json_encode($response);
} catch (AwsException $e) {
// Prepare JSON error response
$response = "Failed to send email.";
echo json_encode($response);
}
?>
