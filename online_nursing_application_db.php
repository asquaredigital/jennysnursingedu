<?php
    /* at the top of 'check.php' */
    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

        /* choose the appropriate page to redirect users */
        die( header( 'location: /error.php' ) );

    }
?>
<?php
$name = $_POST['name'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$nationality = $_POST['nationality'];
$domicile = $_POST['domicile'];
$religion = $_POST['religion'];
$caste = $_POST['caste'];
$community = $_POST['community'];
$parent = $_POST['parent'];
$relationship = $_POST['relationship'];
$occupation = $_POST['occupation'];
$income = $_POST['income'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$phone = $_POST['phone'];
$landline = $_POST['landline'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$examination = $_POST['examination'];
$do_passing = $_POST['do_passing'];
$noa = $_POST['noa'];
$improvement = $_POST['improvement'];
$total_mark = $_POST['total_mark'];
$phy_max = $_POST['phy_max'];
$phy_obt = $_POST['phy_obt'];
$phy_pres = $_POST['phy_pres'];
$chy_max = $_POST['chy_max'];
$chy_obt = $_POST['chy_obt'];
$chy_pres = $_POST['chy_pres'];
$bio_max = $_POST['bio_max'];
$bio_obt = $_POST['bio_obt'];
$bio_pres = $_POST['bio_pres'];
$eng_max = $_POST['eng_max'];
$eng_obt = $_POST['eng_obt'];
$eng_pres = $_POST['eng_pres'];
$total_max = $_POST['total_max'];
$total_obt = $_POST['total_obt'];
$total_pres = $_POST['total_pres'];
$mt_speak = isset($_POST["mt_speak"]) ? "Yes" : "No";
$mt_read = isset($_POST["mt_read"]) ? "Yes" : "No";
$mt_write = isset($_POST["mt_write"]) ? "Yes" : "No";
$mt = $_POST["mt"];

$lan1 = $_POST["lan1"];
$lan1_speak = isset($_POST["lan1_speak"]) ? "Yes" : "No";
$lan1_read = isset($_POST["lan1_read"]) ? "Yes" : "No";
$lan1_write = isset($_POST["lan1_write"]) ? "Yes" : "No";
$lan2 = $_POST["lan2"];
$lan2_speak = isset($_POST["lan2_speak"]) ? "Yes" : "No";
$lan2_read = isset($_POST["lan2_read"]) ? "Yes" : "No";
$lan2_write = isset($_POST["lan2_write"]) ? "Yes" : "No";
$extracurricular = $_POST['extracurricular'];
$hostel = "";
$category = $_POST['category'];
$mark_sheet = "";

if(isset($_FILES['mark_sheet'])){
  $errors= array();
 "<script>alert('yes');</script>";
  $file_name = $_FILES['mark_sheet']['name'];
  $file_size =$_FILES['mark_sheet']['size'];
  $file_tmp =$_FILES['mark_sheet']['tmp_name'];
  $file_type=$_FILES['mark_sheet']['type'];
  
  $file_ext=strtolower(end(explode('.',$_FILES['mark_sheet']['name'])));
  
  $extensions= array("jpeg","jpg","png");
  
  if(in_array($file_ext,$extensions)=== false){
      
     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
  }
  
  if(empty($errors)==true){
      "<script>alert('yes1');</script>";
     move_uploaded_file($file_tmp,"jnc/images/online_nursing_marksheet/".$file_name);
     $mark_sheet = "/images/online_nursing_marksheet/".$file_name;
  }
  else
  {
     // print_r($errors);
  }
}
$no="NO";
//$sql = 'INSERT INTO `online_nursing_application_db (`name`, `dob`, `age`, `gender`, `nationality`, `domicile`, `religion`, `caste`, `community`, `parent`, `relationship`, `occupation`, `income`, `address1`, `address2`, `phone`, `landline`, `mobile`, `email`, `examination`, `do_passing`, `noa`, `improvement`, `total_mark`, `phy_max`, `phy_obt`, `phy_pres`, `chy_max`, `chy_obt`, `chy_pres`, `bio_max`, `bio_obt`, `bio_pres`, `eng_max`, `eng_obt`, `eng_pres`, `total_max`, `total_obt`, `total_pres`, `mt_speak`, `mt_read`, `mt_write`, `lan1`, `lan1_speak`, `lan1_read`, `lan1_write`, `lan2`, `lan2_speak`, `lan2_read`, `lan2_write`, `extracurricular`, `hostel`, `category`, `mark_sheet`, `pay_status`) VALUES ("'.$name.'", "'.$dob.'", "'.$age.'", "'.$gender.'", "'.$nationality.'", "'.$domicile.'", "'.$religion.'", "'.$caste.'", "'.$community.'", "'.$parent.'", "'.$relationship.'", "'.$occupation.'", "'.$income.'", "'.$address1.'", "'.$address2.'", "'.$phone.'", "'.$landline.'", "'.$mobile.'", "'.$email.'", "'.$examination.'", "'.$do_passing.'", "'.$noa.'", "'.$improvement.'", "'.$total_mark.'", "'.$phy_max.'", "'.$phy_obt.'", "'.$phy_pres.'", "'.$chy_max.'", "'.$chy_obt.'", "'.$chy_pres.'", "'.$bio_max.'", "'.$bio_obt.'", "'.$bio_pres.'", "'.$eng_max.'", "'.$eng_obt.'", "'.$eng_pres.'", "'.$total_max.'", "'.$total_obt.'", "'.$total_pres.'", "'.$mt_speak.'", "'.$mt_read.'", "'.$mt_write.'", "'.$lan1.'", "'.$lan1_speak.'", "'.$lan1_read.'", "'.$lan1_write.'", "'.$lan2.'", "'.$lan2_speak.'", "'.$lan2_read.'", "'.$lan2_write.'", "'.$extracurricular.'", "'.$hostel.'", "'.$category.'", "'.$mark_sheet.'", "'.$no.'");';
$sql = "INSERT INTO online_nursing_application_db (name, dob, age, gender, nationality, domicile, religion, caste, community, parent, relationship, occupation, income, address1, address2, phone, landline, mobile, email, examination, do_passing, noa, improvement, total_mark, phy_max, phy_obt, phy_pres, chy_max, chy_obt, chy_pres, bio_max, bio_obt, bio_pres, eng_max, eng_obt, eng_pres, total_max, total_obt, total_pres, mt_speak, mt_read, mt_write, lan1, lan1_speak, lan1_read, lan1_write, lan2, lan2_speak, lan2_read, lan2_write, extracurricular, hostel, category, mark_sheet, pay_status,mt) VALUES ('$name', '$dob', '$age', '$gender', '$nationality', '$domicile', '$religion', '$caste', '$community', '$parent', '$relationship', '$occupation', '$income', '$address1', '$address2', '$phone', '$landline', '$mobile', '$email', '$examination', '$do_passing', '$noa', '$improvement', '$total_mark', '$phy_max', '$phy_obt', '$phy_pres', '$chy_max', '$chy_obt', '$chy_pres', '$bio_max', '$bio_obt', '$bio_pres', '$eng_max', '$eng_obt', '$eng_pres', '$total_max', '$total_obt', '$total_pres', '$mt_speak', '$mt_read', '$mt_write', '$lan1', '$lan1_speak', '$lan1_read', '$lan1_write', '$lan2', '$lan2_speak', '$lan2_read', '$lan2_write', '$extracurricular', '$hostel', '$category', '$mark_sheet', '$no','$mt')";

$servername = "localhost";
$username = "asqaured_root";
$password = "rootroot";
$dbname = "asqaured_jennysnursing";

// Create connection
/*
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
 
}
else
{
    echo "connected";
}*/

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
   // echo  "lastid".$last_id;
} else {
    echo "<script>alert('something Problem'); window.location.replace('https://www.jennysnursingedu.in/bscnursing.php');</script>";
}
?>
<html>
    
    <input type="hidden" name="name" id='name' value='<?php echo $name; ?>'>
    <input type="hidden" name="price" id='price' value='350'>
    <input type="hidden" name="email" id='email' value='<?php echo $email; ?>'>
    <input type="hidden" name="mobile" id='mobile' value='<?php echo $mobile; ?>'>
    <input type="hidden" name="last_id" id='last_id' value='<?php echo $last_id; ?>'>
    
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</html>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
	$(document).ready(function() {
		var getAmount = $("#price").val();
        // 		test
        //  var getAmount = 1;
		var name =  $("#name").val();
		var useremail =  $("#email").val();
		var mobile =  $("#mobile").val();
		var last_id =  $("#last_id").val();
		var totalAmount = getAmount * 100;
		var options = {
					"key": "rzp_test_TCeyJnSX9hGBjR", //rzp_live_S8m6yIBjyJaOym //your Razorpay Key Id 
					"amount": totalAmount,
					"name": name,
					"description": "Application Fees",
				// 	"image": "https://www.codefixup.com/wp-content/uploads/2016/03/logo.png",
					"handler": function (response){
					       // var razorpay_payment_id = response.razorpay_payment_id;
            //                 console.log(response);
            //                 alert(mobile);
            //                 alert(last_id);
                 $.ajax({
							url: 'payment_id_store_1.php',
							type: 'post',
							dataType: 'json',
							data: {
									razorpay_payment_id: response.razorpay_payment_id ,
									totalAmount : totalAmount,
									mobile : mobile ,
									useremail : useremail,
									last_id:last_id,
								  }, 
							
					     });
					$.ajax({
							url: 'ajax-payment_1.php',
							type: 'post',
							dataType: 'json',
							data: {
									razorpay_payment_id: response.razorpay_payment_id ,
									totalAmount : totalAmount,
									mobile : mobile ,
									useremail : useremail,
									last_id:last_id,
								  }, 
							success: function (data) 
							{
								alert(data.msg);
								
								// window.location.href = 'success.php/?mobile='+ data.mobile +'&payId='+ data.paymentID +'&userEmail='+ data.userEmail +'';
								window.location.replace('https://www.jennysnursingedu.in/bscnursing.php');
								
							}
					     });
					},
					"theme": {
					"color": "#528FF0"
							}
					};

		var rzp1 = new Razorpay(options);
		rzp1.on('payment.failed', function (response){
		    console.log(response);
        // alert(response.error.code);
        // alert(response.error.description);
        // alert(response.error.source);
        // alert(response.error.step);
        // alert(response.error.reason);
        // alert(response.error.metadata.order_id);
        // alert(response.error.metadata.payment_id);
         });
		rzp1.open();
		e.preventDefault();


});
</script>