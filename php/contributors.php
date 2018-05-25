<?php 
// echo '<li><i class="fa fa-check"></i> Sed ut perspiciatis unde omnis </li>';

$con = mysqli_connect('localhost','id5455345_dab_admin','abuisthepassword') 
        or die('Cannot connect to the DB');
// $con = mysqli_connect('localhost','root','qwe123') 
//       or die('Cannot connect to the DB');

mysqli_select_db($con, 'id5455345_dab');
// mysqli_select_db($con, 'dab');

$result = mysqli_query($con,"SELECT DISTINCT name, category FROM feedback WHERE showonweb = 'yes'");
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            echo '<tr><td><i class="fa fa-gift"></i><strong style="padding-left:1em">'.$row["category"].'</strong></td><td><i class="fa fa-caret-right" style="padding:0em 1em"></i>'.$row["name"].'</td></tr>';
    }
}

mysqli_close($con);
?>