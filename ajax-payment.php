<?php

$data = ['payment_id' => $_POST['razorpay_payment_id'], 'amount' => $_POST['totalAmount'], 'mobile' => $_POST['mobile'], ];
//check payment is authrized or not via API call
$razorPayId = $_POST['razorpay_payment_id'];

$ch = curl_init('https://api.razorpay.com/v1/payments/' . $razorPayId . '');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_USERPWD, "rzp_live_S8m6yIBjyJaOym:VwgzQ6OOZAeQIYWfcM2L3w2C"); //rzp_test_TCeyJnSX9hGBjR:dal4vQJDVJiiYIrmpPcxTMyn //   Input your Razorpay Key Id and Secret Id here
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

    $servername = "localhost";
    $username = "asqaured_root";
    $password = "rootroot";
    $dbname = "asqaured_jennysnursing";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql_1 = 'SELECT * FROM `online_registration_post` WHERE pay_status ="YES"';
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

    $sql = 'UPDATE `online_registration_post` SET pay_status = "' . $pay_status . '",payment_id= "' . $payment_id . '",admision_num= "' . $admision_num . '"  WHERE id =' . $last_id;
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
        $to = $email;
        // $to = "harshamvc11@gmail.com";
        $subject = "APPLICATION EMAIL";

        $message = "POST BASIC B.SC NURSING APPLICATION";
        $message .= "\n Name : ";
        $message .= $name;
        $message .= "\n Mobile : ";
        $message .= $phone;
        $message .= "\n Email : ";
        $message .= $email;
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <jennysnu@server.harshainfotech.com>' . "\r\n";
        $headers .= 'Cc: info@jennysnursingedu.in' . "\r\n";

        mail($to, $subject, $message);
    }
    else
    {

    }

}

?>
