<?php
//echo $_POST['id'];

include("dbcon.php");
if (isset($_POST['id'])) {
    mysqli_select_db($conn,"solutionsmatrix");
    $sql="DELETE FROM `solutions` WHERE solution_id = '".$_POST['id']."'";
    $result = mysqli_query($conn,$sql);
    $sql="DELETE FROM `integrations` WHERE solution1_id = '".$_POST['id']."'";
    $result = mysqli_query($conn,$sql);
    $sql="DELETE FROM `integrations` WHERE solution2_id = '".$_POST['id']."'";
    $result = mysqli_query($conn,$sql);
    echo $result;  
}
?>