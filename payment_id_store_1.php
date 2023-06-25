
<?php   

$razorpay_payment_id= $_POST['razorpay_payment_id'];
$last_id= $_POST['last_id'];


$db_servername = "localhost";
$db_username = "asqaured_root";
$db_password = "rootroot";
$db_name = "asqaured_jennysnursing";

$sql = 'UPDATE "online_nursing_application_db" SET raszer_payment_id = "'.$razorpay_payment_id.'" WHERE id ="' . $last_id;'");';

// UPDATE `online_registration_post` SET pay_status = "' . $pay_status . '",payment_id= "' . $payment_id . '",admision_num= "' . $admision_num . '"  WHERE id =' . $last_id;

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
if ($conn->query($sql) === TRUE) 
{
    return true;
}
    ?>