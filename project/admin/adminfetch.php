<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "login");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM records 
  WHERE Title LIKE '%".$search."%'
  OR Question LIKE '%".$search."%' 
  OR Option_A LIKE '%".$search."%' 
  OR Option_B LIKE '%".$search."%' 
  OR Option_C LIKE '%".$search."%'
  OR Option_D LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM records WHERE status = 1 ORDER BY User_ID
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Title</th>
     <th>Questions</th>
     <th>Option - A</th>
     <th>Option - B</th>
     <th>Option - C</th>
     <th>Option - D</th>
     <th>View Question</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["Title"].'</td>
    <td>'.$row["Question"].'</td>
    <td>'.$row["Option_A"].'</td>
    <td>'.$row["Option_B"].'</td>
    <td>'.$row["Option_C"].'</td>
    <td>'.$row["Option_D"].'</td>
    <td><a href="./viewqestion.php?queid='.$row['User_ID'].'"><button>View Que</button></a></td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>