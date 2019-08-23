<?php

include("dbcon.php");
mysqli_select_db($conn,"solutionsmatrix");
$sql="DELETE FROM `integrations` WHERE solution1_id = ".$_POST['s1']." AND  solution2_id = ".$_POST['s2'];
$result = mysqli_query($conn,$sql);
echo $result;  
$sql="DELETE FROM `integrations` WHERE solution2_id = ".$_POST['s1']." AND  solution1_id = ".$_POST['s2'];
$result2 = mysqli_query($conn,$sql);
echo $result;  
echo $result2;  
?>