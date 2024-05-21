<?php
    session_start();

$id = $_POST['idd'];
$servername = "localhost";
$username = "asqaured_root";
$password = "rootroot";
$dbname = "asqaured_jennysnursing";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM online_nursing_application_db where id=".$id."";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $namee=$row["name"];
    $ad=$row["admision_num"];
$str=$row["dob"];
if($str=="")
{

}
else
{
    $str=substr($str,8,9)."-".substr($str,5,2)."-".substr($str,0,4);
}
$dop=$row["do_passing"];

if($dop=="0000-00-00")
{
  $dop="";
}
else
{
    $dop=substr($dop,8,9)."-".substr($dop,5,2)."-".substr($dop,0,4);
}
$html = "
<style>
table
{
    width: 800px;
    font-size:17px;
    font-family:calibri;
    background-color:white;
    margin-left:-30px;
}
tr 
{
  line-height: 35px;
}
td
{
  width:200px;
 
}


</style>
<table>
<tr>
    <td  align=\"center\" colspan=5><h2><b>JENNYS COLLEGE OF NURSING<br>B.Sc Nursing Application<br><span style=\"font-weight:normal\">_______________________________________________________________</span></b></h2></td>
  </tr>
 
  <tr>
      <td style=\"width:20px\"></td>
        <td>
      <b>Application No</b>
        </td>
        <td style=\"width:30px\"> <b>:</b>
        </td>
        <td>" .$row["admision_num"]. "
        </td>
        <td>
        </td>
    </tr>
 
    <tr>
      <td style=\"width:20px\"></td>
        <td>
      <b> Name of the Applicant </b>
        </td>
        <td style=\"width:30px\"> <b>:</b>
        </td>
        <td>" .$row["name"]. "
        </td>
        <td>
        </td>
    </tr>
  <tr>
      <td style=\"width:20px\"></td>

        <td>
        <b>  Date of Birth [DD/MM/YYYY] </b>
        </td>
        <td style=\"width:30px\"> <b>:</b>
        </td>         
        <td>" .$str. "
        </td>
        <td>
        </td>
    </tr>
  <tr>
    <td style=\"width:20px\"></td>

    <td>
    <b>  Age </b>
    </td>
    <td style=\"width:30px\"> <b>:</b>
    </td>
    <td>".$row["age"]." 
    </td>
    <td>
    </td>
  </tr>
  <tr>
    <td style=\"width:20px\"></td>

    <td>
    <b> Gender </b>
    </td>
    <td style=\"width:30px\"> <b>:</b>
    </td>
    <td>".$row["gender"]." 
    </td>
    <td>
    </td>
  </tr>
  <tr>
    <td style=\"width:20px\"></td>

    <td>
    <b> Nationality </b>
    </td>
    <td style=\"width:30px\"> <b>:</b>
    </td>
    <td>".$row["nationality"]." 
    </td>
    <td>
    </td>
  </tr>
  <tr>
  <td style=\"width:20px\"></td>

  <td>
  <b> Domicile </b>
  </td>
  <td style=\"width:30px\"> <b>:</b>
  </td>
  <td>".$row["domicile"]." 
  </td>
  <td>
  </td>
</tr>
<tr>
  <td style=\"width:20px\"></td>

  <td>
  <b> Religion </b>
  </td>
  <td style=\"width:30px\"> <b>:</b>
  </td>
  <td>".$row["religion"]." 
  </td>
  <td>
  </td>
</tr>
<tr>
  <td style=\"width:20px\"></td>

  <td>
  <b> Caste </b>
  </td>
  <td style=\"width:30px\"> <b>:</b>
  </td>
  <td>".$row["caste"]." 
  </td>
  <td>
  </td>
</tr>
<tr>
  <td style=\"width:20px\"></td>

  <td>
  <b> Community </b>
  </td>
  <td style=\"width:30px\"> <b>:</b>
  </td>
  <td>".$row["community"]." 
  </td>
  <td>
  </td>
</tr>
<tr>
  <td style=\"width:20px\"></td>

  <td>
  <b> Name of the Parent/ Guardian  </b>
  </td>
  <td style=\"width:30px\"> <b>:</b>
  </td>
  <td>".$row["parent"]." 
  </td>
  <td>
  </td>
</tr>
<tr>
  <td style=\"width:20px\"></td>

  <td>
  <b> Relationship to the Applicant </b>
  </td>
  <td style=\"width:30px\"> <b>:</b>
  </td>
  <td>".$row["relationship"]." 
  </td>
  <td>
  </td>
</tr>
<tr>
  <td style=\"width:20px\"></td>

  <td>
  <b> Occupation </b>
  </td>
  <td style=\"width:30px\"> <b>:</b>
  </td>
  <td>".$row["occupation"]." 
  </td>
  <td>
  </td>
</tr>
<tr>
  <td style=\"width:20px\"></td>

  <td>
  <b> Income (P/A) </b>
  </td>
  <td style=\"width:30px\"> <b>:</b>
  </td>
  <td>".$row["income"]." 
  </td>
  <td>
  </td>
</tr>
<tr>
  <td style=\"width:20px\"></td>

  <td>
  <b> Address for Communication :
    </b>
  </td>
  <td style=\"width:30px\"> <b>:</b>
  </td>
  <td colspan=2>".$row["address1"]." 
  </td>
 
</tr>
<tr>
  <td style=\"width:20px\"></td>

  <td>
  <b> Permanent Address :
  </b>
  </td>
  <td style=\"width:30px\"> <b>:</b>
  </td>
  <td colspan=2>".$row["address2"]." 
  </td>
 
</tr>
<tr>
  <td style=\"width:20px\"></td>

  <td>
  <b> Phone No :
  </b>
  </td>
  <td style=\"width:30px\"> <b>:</b>
  </td>
  <td>".$row["phone"]." 
  </td>
  <td>
  </td>
</tr>
<tr>
  <td style=\"width:20px\"></td>

  <td>
  <b> Mobile </b>
  </td>
  <td style=\"width:30px\"> <b>:</b>
  </td>
  <td>".$row["landline"]." 
  </td>
  <td>
  </td>
</tr>
<tr>
  <td style=\"width:20px\"></td>

  <td>
  <b> Email </b>
  </td>
  <td style=\"width:30px\"> <b>:</b>
  </td>
  <td>".$row["email"]." 
  </td>
  <td>
  </td>
</tr>

<tr>
  <td style=\"width:20px\"></td>

  <td>
  <b> Name of the Qualifying <br>Examination
  (HSC or <br>its Equivalent) </b>
  </td>
  <td style=\"width:30px\"> <b>:</b>
  </td>
  <td>".$row["examination"]." 
  </td>
  <td>
  </td>
</tr>
<tr>
  <td style=\"width:20px\"></td>

  <td>
  <b> Date & Year of Passing </b>
  </td>
  <td style=\"width:30px\"> <b>:</b>
  </td>
  <td>".$dop." 
  </td>
  <td>
  </td>
</tr>
<tr>
  <td style=\"width:20px\"></td>

  <td>
  <b> Number of attempts </b>
  </td>
  <td style=\"width:30px\"> <b>:</b>
  </td>
  <td>".$row["noa"]." 
  </td>
  <td>
  </td>
</tr>
<tr>
  <td style=\"width:20px\"></td>

  <td>
  <b> Improvement taken if any 
    </b>
  </td>
  <td style=\"width:30px\"> <b>:</b>
  </td>
  <td>".$row["improvement"]." 
  </td>
  <td>
  </td>
</tr>
<tr>
  <td style=\"width:20px\"></td>

  <td>
  <b> Total Marks Obtained </b>
  </td>
  <td style=\"width:30px\"> <b>:</b>
  </td>
  <td>".$row["total_mark"]." 
  </td>
  <td>
  </td>
</tr>
<tr>
  <td style=\"width:20px\"></td>

  <td>
  <b> Physics Maximum Marks </b>
  </td>
  <td style=\"width:30px\"> <b>:</b>
  </td>
  <td>".$row["phy_max"]." 
  </td>
  <td>
  </td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Physics Obtainted Marks 
</b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["phy_obt"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Physics_Precentage </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["phy_pres"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Chemistry_maximum marks </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["chy_max"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Chemistry_Obtained </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["chy_obt"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Chemistry_Precentage </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["chy_pres"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Biology(Botony&Zoology)_Maximum </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["bio_max"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Biology(Botony&Zoology)_Obtained </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["bio_obt"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Biology(Botony&Zoology)_Percentage </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["bio_pres"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> English_Maximum Marks </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["eng_max"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> English_Obtained </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["eng_obt"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> English Percentage</b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["eng_pres"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Total Maximum </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["total_max"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Total Marks Obtained </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["total_obt"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Total Marks Percentage </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["total_pres"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Mother tongue </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["mt"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Mother tongue Speak</b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["mt_speak"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Mother tongue Read </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["mt_read"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Mother tongue Write</b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["mt_write"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Language1</b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["lan1"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Language1 Speak</b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["lan1_speak"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Language1 Read </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["lan1_read"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Language1 Write </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["lan1_write"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Language2 </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["lan2"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Language2 Speak </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["lan2_speak"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Language2 Read </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["lan2_read"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Language2 Write </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["lan2_write"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Extracurricular activities, hobbies
(sports, cultural, literary etc.) </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["extracurricular"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Hostel </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["hostel"]." 
</td>
<td>
</td>
</tr>
<tr>
<td style=\"width:20px\"></td>

<td>
<b> Category applied for </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["category"]." 
</td>
<td>
</td>
</tr>

<tr>
<td style=\"width:20px\"></td>
<td>
<b> Reg Date and Time (YYYY/MM/DD HH/MM/SS) </b>
</td>
<td style=\"width:30px\"> <b>:</b>
</td>
<td>".$row["date"]." 
</td>
<td>
</td>
</tr>


</table>";

 }
} else {
  echo "0 results";
}
$conn->close();


$filename = $ad." ".$namee." Application";

require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf=new Dompdf();
$dompdf->loadHtml($html);

$dompdf->setPaper('A4','potrait');
$dompdf->render();
$dompdf->stream($filename,array("Attachment"=>0));
?>
