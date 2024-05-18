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
$year1=$_POST['year1'];
$year2=$_POST['year2'];
$year3=$_POST['year3'];
$noa = $_POST['final_year_attempt'];
//$examination = $_POST['examination'];
$do_passing = $_POST['date_of_passing'];
$totalnoy=$_POST['total_no_comp'];
$Nurse=$_POST['nurse'];
$Midwifery=$_POST['midwifery'];
$mgr=$_POST['eligible'];
$Present_Occupation=$_POST['present_occu'];
$service_date=$_POST['service_date'];
$Physically_Disabled_Category=$_POST['physically_disabled'];
$extracurricular = $_POST['extracurricular'];
$hostel = "";
$category = $_POST['category'];
$phy_max = $_POST['phy_max'];
$phy_obt = $_POST['phy_obt'];
$phy_pres = $_POST['phy_pres'];
$chy_max = $_POST['chy_max'];
$chy_obt = $_POST['chy_obt'];
$chy_pres = $_POST['chy_pres'];
$bio_max = $_POST['bio_max'];
$bio_obt = $_POST['bio_obt'];
$bio_pres = $_POST['bio_pres'];
$bot_max = $_POST['bot_max'];
$bot_obt = $_POST['bot_obt'];
$bot_pres = $_POST['bot_pres'];
$zoo_max = $_POST['zoo_max'];
$zoo_obt = $_POST['zoo_obt'];
$zoo_pres = $_POST['zoo_pres'];

$nur_max = $_POST['nur_max'];
$nur_obt = $_POST['nur_obt'];
$nur_pres = $_POST['nur_pres'];

$fs_max = $_POST['fs_max'];
$fs_obt = $_POST['fs_obt'];
$fs_pres = $_POST['fs_pres'];
$mt = $_POST["mt"];

$total_max = $_POST['total_max'];
$total_obt = $_POST['total_obt'];
$total_pres = $_POST['total_pres'];

$mt_speak = isset($_POST["mt_speak"]) ? "Yes" : "No";
$mt_read = isset($_POST["mt_read"]) ? "Yes" : "No";
$mt_write = isset($_POST["mt_write"]) ? "Yes" : "No";
$lan1 = $_POST["lan1"];
$lan1_speak = isset($_POST["lan1_speak"]) ? "Yes" : "No";
$lan1_read = isset($_POST["lan1_read"]) ? "Yes" : "No";
$lan1_write = isset($_POST["lan1_write"]) ? "Yes" : "No";
$lan2 = $_POST["lan2"];
$lan2_speak = isset($_POST["lan2_speak"]) ? "Yes" : "No";
$lan2_read = isset($_POST["lan2_read"]) ? "Yes" : "No";
$lan2_write = isset($_POST["lan2_write"]) ? "Yes" : "No";
$mark_sheet = "";
$mark_sheet_mgr = "";

if(isset($_FILES['mark_sheet'])){
  $errors= array();
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
     move_uploaded_file($file_tmp,"jnc/images/online_nursing_marksheet_post/".$file_name);
     $mark_sheet = "/images/online_nursing_marksheet_post/".$file_name;
  }
  else
  {
    //  print_r($errors);
  }
}

//pg
if(isset($_FILES['mark_sheet_mgr'])){
  $errors= array();
  $file_name = $_FILES['mark_sheet_mgr']['name'];
  $file_size =$_FILES['mark_sheet_mgr']['size'];
  $file_tmp =$_FILES['mark_sheet_mgr']['tmp_name'];
  $file_type=$_FILES['mark_sheet_mgr']['type'];
  
  $file_ext=strtolower(end(explode('.',$_FILES['mark_sheet_mgr']['name'])));
  
  $extensions= array("jpeg","jpg","png");
  
  if(in_array($file_ext,$extensions)=== false){
      
     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
  }
  
  if(empty($errors)==true){
     move_uploaded_file($file_tmp,"jnc/images/mgr_university_certificate/".$file_name);
     $mark_sheet_mgr = "/images/mgr_university_certificate/".$file_name;
  }
  else
  {
    //  print_r($errors);
  }
}


//

$sql = 'INSERT INTO `online_registration_post`(`name`, `dob`, `age`, `gender`, `nationality`, `domicile`, `religion`, `caste`, `community`, `parent`, `relationship`, `occupation`,`income`, `address1`, `address2`, `phone`, `landline`, `mobile`, `email`,`year1`,	`year2`,`year3`,	`final_year_attempt`,`date_of_passing`,	`total_no_comp`,`nurse`,	`midwifery`,`mgr_univsty_certificate`,`present_occu`,`service_date`,`physically_disabled`,	`extracurricular`,`hostel`,	`category`,`phy_max`, `phy_obt`, `phy_pres`, `chy_max`, `chy_obt`, `chy_pres`, `bio_max`, `bio_obt`, `bio_pres`,`bot_max`,`bot_obt`,`bot_pres`,`zoo_max`,`zoo_obt`,`zoo_pres`,`nur_max`,`nur_obt`,	`nur_pres`,`fs_max`,`fs_obt`,`fs_pres`,`total_max`, `total_obt`, `total_pres`, `mt_speak`, `mt_read`, `mt_write`, `lan1`, `lan1_speak`, `lan1_read`, `lan1_write`, `lan2`, `lan2_speak`, `lan2_read`, `lan2_write`,`mark_sheet_mgr`,`mark_sheet`,`pay_status`,`mt`) VALUES ("'.$name.'", "'.$dob.'", "'.$age.'", "'.$gender.'", "'.$nationality.'", "'.$domicile.'", "'.$religion.'", "'.$caste.'", "'.$community.'", "'.$parent.'", "'.$relationship.'", "'.$occupation.'", "'.$income.'", "'.$address1.'", "'.$address2.'", "'.$phone.'", "'.$landline.'", "'.$mobile.'", "'.$email.'","'.$year1.'","'.$year2.'","'.$year3.'", "'.$noa.'", "'.$do_passing.'","'.$totalnoy.'","'.$Nurse.'","'.$Midwifery.'","'.$mgr.'","'.$Present_Occupation.'","'.$service_date.'","'.$Physically_Disabled_Category.'", "'.$extracurricular.'", "'.$hostel.'", "'.$category.'","'.$phy_max.'", "'.$phy_obt.'", "'.$phy_pres.'", "'.$chy_max.'", "'.$chy_obt.'", "'.$chy_pres.'", "'.$bio_max.'", "'.$bio_obt.'", "'.$bio_pres.'", "'.$bot_max.'", "'.$bot_obt.'","'.$bot_pres.'", "'.$zoo_max.'", "'.$zoo_obt.'", "'.$zoo_pres.'", "'.$nur_max.'", "'.$nur_obt.'", "'.$nur_pres.'", "'.$fs_max.'", "'.$fs_obt.'", "'.$fs_pres.'", "'.$total_max.'", "'.$total_obt.'", "'.$total_pres.'", "'.$mt_speak.'", "'.$mt_read.'", "'.$mt_write.'", "'.$lan1.'", "'.$lan1_speak.'", "'.$lan1_read.'", "'.$lan1_write.'", "'.$lan2.'", "'.$lan2_speak.'", "'.$lan2_read.'", "'.$lan2_write.'","'.$mark_sheet_mgr.'","'.$mark_sheet.'","NO","'.$mt.'");';

$servername = "localhost";
$username = "asqaured_root";
$password = "rootroot";
$dbname = "asqaured_jennysnursing";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->query($sql) === TRUE) 
{
    // echo $mark_sheet;
    $last_id = $conn->insert_id;
    //echo  $last_id;
    // echo "<script>alert('Pay');
//   window.location.replace('https://www.jennysnursingedu.in/online_nursing_application_post.php');";
    // echo "</script>";
   
}
else
{
    echo $conn->error;
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<script>alert('somthing Problem');window.location.replace('https://www.jennysnursingedu.in/postbsc.php');</script>";
}


?>
<html>
    
    <input type="hidden" name="name" id='name' value='<?php echo $name; ?>'>
    <input type="hidden" name="price" id='price' value='400'>
    <input type="hidden" name="email" id='email' value='<?php echo $email; ?>'>
    <input type="hidden" name="mobile" id='mobile' value='<?php echo $mobile; ?>'>
    <input type="hidden" name="last_id" id='last_id' value='<?php echo $last_id; ?>'>
    
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</html>
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
					"key": "rzp_live_S8m6yIBjyJaOym", //rzp_test_TCeyJnSX9hGBjR //    your Razorpay Key Id
					"amount": totalAmount,
					"name": name,
					"description": "Application Fees",
				// 	"image": "https://www.codefixup.com/wp-content/uploads/2016/03/logo.png",
					"handler": function (response){
					       // alert(response.razorpay_payment_id);
            //                 console.log(response);
            //                 alert(mobile);
            //                 alert(last_id);
                        $.ajax({
							url: 'payment_id_store.php',
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
							url: 'ajax-payment.php',
							type: 'post',
							dataType: 'json',
							data: {
									razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,mobile : mobile ,useremail : useremail,last_id:last_id,name:name,
								  }, 
							success: function (data) 
							{
								alert(data.msg);
								
								// window.location.href = 'success.php/?mobile='+ data.mobile +'&payId='+ data.paymentID +'&userEmail='+ data.userEmail +'';
								window.location.replace('https://www.jennysnursingedu.in/postbsc.php');
								
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