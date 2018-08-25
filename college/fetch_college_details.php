<?php
include 'db.php';
include 'validate_input.php';
$columns = array('s_no','college_name','link_to_college');
$query="SELECT s_no,college_name,link_to_college FROM college_data";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE s_no LIKE "%'.vi($_POST["search"]["value"]).'%" 
 OR college_name LIKE "%'.vi($_POST["search"]["value"]).'%"
 OR link_to_college LIKE "%'.vi($_POST["search"]["value"]).'%"
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY s_no ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();
$i=1;

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div id="'.$row["s_no"].'" data-column="s_no">' . $i . '</div>';
 $sub_array[] = '<div id="'.$row["s_no"].'" data-column="college_name">' . $row["college_name"] . '</div>';
 $sub_array[] = '<div id="'.$row["s_no"].'" data-column="link_to_college">' . $row["link_to_college"] . '</div>';
 $sub_array[] = '<button type="button" name="blog_delete_button" id="'.$row["s_no"].'" class="btn btn-danger college_delete_button">Delete College</button>';
 
 $data[] = $sub_array;
 $i=$i+1;
}


function get_all_data($connect)
{
 $query = "SELECT s_no,college_name,link_to_college FROM college_data";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);
 mysqli_close($connect);
	


?>