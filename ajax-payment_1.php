<?php

require '../vendor/vendor/autoload.php';

use Aws\Ses\SesClient;
use Aws\Exception\AwsException;
$config = require '../vendor/config.php';



$data = ['payment_id' => $_POST['razorpay_payment_id'], 'amount' => $_POST['totalAmount'], 'mobile' => $_POST['mobile'], ];



//check payment is authrized or not via API call

$razorPayId = $_POST['razorpay_payment_id'];


$ch = curl_init('https://api.razorpay.com/v1/payments/' . $razorPayId . '');

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

curl_setopt($ch, CURLOPT_USERPWD, "rzp_test_TCeyJnSX9hGBjR:dal4vQJDVJiiYIrmpPcxTMyn");  // rzp_live_S8m6yIBjyJaOym:VwgzQ6OOZAeQIYWfcM2L3w2C  Input your Razorpay Key Id and Secret Id here 

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = json_decode(curl_exec($ch));





$response->status; // authorized

// you can write your database insert code here

// check that payment is authorized by razorpay or not

if ($response->status == 'authorized')

{

    $payment_id = $_POST['razorpay_payment_id'];



    $respval = array(

        'msg' => 'Payment successfully credited',

        'status' => true,

        'mobile' => $_POST['mobile'],

        'paymentID' => $_POST['razorpay_payment_id'],

        'userEmail' => $_POST['useremail']

    );



    $pay_status = 'YES';

    $last_id = $_POST['last_id'];

    $paymet_id = $_POST['razorpay_payment_id'];

    $db_servername = "localhost";

    $db_username = "asqaured_root";

    $db_password = "rootroot";

    $db_name = "asqaured_jennysnursing";

    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);



    $sql_1 = 'SELECT * FROM `online_nursing_application_db` WHERE pay_status ="YES"';

    if ($conn->query($sql_1) == true)

    {

        $result = $conn->query($sql_1);



        $name = $result->name;

        $phone = $result->mobile;

        $email = $result->email;



        $total = $result->num_rows + 1;

    }

    else

    {

        $total = 1;

    }

    $admision = sprintf('%03d', $total);



    $admision_num = date('Y') . '-' . $admision;



    $sql = 'UPDATE `online_nursing_application_db` SET pay_status = "' . $pay_status . '",payment_id= "' . $payment_id . '",admision_num= "' . $admision_num . '" WHERE id =' . $last_id;



    if ($conn->query($sql) === true)

    {

        echo json_encode($respval);

        //     echo "<script>alert('Registration successfully');

        // //   window.location.replace('https://www.jennysnursingedu.in/online_nursing_application_post.php');";

        //     echo "</script>";

        

    }

    else

    {

        console . log($last_id);

        console . log($respval);

        echo $last_id;

        // echo $conn->error;

        // echo "Error: " . $sql . "<br>" . $conn->error;

        // echo "<script>alert('somthing Problem');window.location.replace('https://www.jennysnursingedu.in/online_nursing_application_post.php');</script>";

        

    }



    if ($name !== "")

    {


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
       


        $to =$email;

        $senderEmail = 'asquaremailer@gmail.com';
        $recipientEmail = 'elavarasan5193@gmail.com';

        // $to = "harshamvc11@gmail.com";

        $subject = "B.SC NURSING APPLICATION EMAIL";



        $message = "B.SC NURSING APPLICATION";

        $message .= "\n Name : ";

        $message .= $name;

        $message .= "\n Mobile : ";

        $message .= $phone;

        $message .= "\n Email : ";

        $message .= $email;

        // Always set content-type when sending HTML email

        $headers = "MIME-Version: 1.0" . "\r\n";

        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers = "From: www.jennysnursingedu.in" . "\r\n" .
           "Reply-To: $email" . "\r\n" ;


        try {
            $result = $sesClient->sendEmail(['Destination' => [
                'ToAddresses' => [$recipientEmail],
            ],
            'Message' => [
                'Body' => [
                    'Text' => [
                        'Charset' => 'UTF-8',
                        'Data' => $message,
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
        $response = ['Application sent successfully!'];
        echo json_encode($response);
        } catch (AwsException $e) {
        // Prepare JSON error response
        $response = ['Failed to send Application.'];
        echo json_encode($response);
        }


    }

    else

    {



    }

}



?>

