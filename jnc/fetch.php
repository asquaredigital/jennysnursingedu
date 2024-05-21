<?php
    session_start();

if($_SESSION["name"])
{
$connect = new PDO("mysql:host=localhost; dbname=asqaured_jennysnursing", "asqaured_root", "rootroot");
//$connect  = mysqli_connect("localhost:3307","asquarg1_root","rootroot","asquarg1_jennysnursing");

/*function get_total_row($connect)
{
  $query = "
  SELECT * FROM tbl_webslesson_post
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  return $statement->rowCount();
}

$total_record = get_total_row($connect);*/

$limit = '10';
$page = 1;
$i=0;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}

$query = "
SELECT * FROM online_nursing_application_db
";



if($_POST['query'] != '')
{
  $query .= '
  WHERE name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
  ';
}

$query .= 'ORDER BY date DESC ';



$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '
<label>Total Records - '.$total_data.'</label>
<table class="table table-striped table-bordered">
  <tr>
      <th>Ad No</th>

    <th>Name</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Payment</th>
    <th>Reg Date (YYYY/MM/DD HH/MM/SS)</th>
    <th>Attachment</th>
    <th>View Application</th>
    <th>Download Application</th>



  </tr>
';

if($total_data > 0)
{
 
  foreach($result as $row)
  {
    $i=$i+1;

    $att="";
    //$view="<a href=\""."application.php?id=".$att."\" target=\"_blank\">Download</a>";
    $view=" <form action=\"application.php\" method=\"post\">  <input type=\"hidden\" name=\"idd\" value=".$row["id"]."><button type=\"submit\" class=\"btn btn-primary\" style=\"background-color: #004a99;\" > View </button></form>";

    $att=$row["mark_sheet"];

    if ($att=="")
    {    
      $att="";
    }
    else
    {
      $att="<a href=\""."https://asquaredemo.com/jennysnursingedu/jnc/".$att."\" target=\"_blank\"><b>Marksheet</b></a>";
    }
    $down=" <form action=\"download.php\" method=\"post\">  <input type=\"hidden\" name=\"idd\" value=".$row["id"]."><button type=\"submit\" class=\"btn btn-primary\" style=\"background-color: #004a99;\"> Download </button> </form>";


    $output .= '
    <tr>
        <td>'.$row["admision_num"].'</td>

      <td>'.$row["name"].'</td>
      <td>'.$row["age"].'</td>
      <td>'.$row["gender"].'</td>
      <td>'.$row["mobile"].'</td>
      <td>'.$row["email"].'</td>
      <td>'.$row["pay_status"].'</td>
      <td>'.$row["date"].'</td>
      <td>'.$att.'</td>
      <td>'.$view.'</td>

      <td>'.$down.'</td>

    </tr>
    ';
  }
}
else
{
  $output .= '
  <tr>
    <td colspan="2" align="center">No Data Found</td>
  </tr>
  ';
}

$output .= '
</table>
<br />
<div align="center">
  <ul class="pagination">
';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 9)
{
  if($page < 10)
  {
    for($count = 1; $count <= 10; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 10;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}

for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li style="background-color: #004a99;" class="page-item"><a class="page-link" href="javascript:void(0)"  data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
';

echo $output;
}
?>

<html>
  <head>
  </head>
  <body>
   
</body>
</head>
