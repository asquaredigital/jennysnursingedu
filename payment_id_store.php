
<?php   

$razorpay_payment_id= $_POST['razorpay_payment_id'];
$last_id= $_POST['last_id'];


$servername = "localhost";
$username = "asqaured_root";
$password = "rootroot";
$dbname = "asqaured_jennysnursing";


$sql = 'UPDATE "online_registration_post" SET raszer_payment_id = "'.$razorpay_payment_id.'" WHERE id ="' . $last_id;'");';

// UPDATE `online_registration_post` SET pay_status = "' . $pay_status . '",payment_id= "' . $payment_id . '",admision_num= "' . $admision_num . '"  WHERE id =' . $last_id;

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->query($sql) === TRUE) 
{
    return true;
}
    ?>