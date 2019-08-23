<?php
//echo $_POST['name'];

include("dbcon.php");
if (isset($_POST['name'])) {
    mysqli_select_db($conn,"solutionsmatrix");
    $sql="SELECT * FROM `solutions` WHERE `solution_name` = '".$_POST['name']."'";
    $result = mysqli_query($conn,$sql);
    If(mysqli_num_rows($result)==0){
        $sql="INSERT INTO `solutions`(`solution_name`) VALUES ('".$_POST['name']."')";
        $result = mysqli_query($conn,$sql);
        echo $result; 
    }else{
        echo "Solution already Exists";
    }
     
}
?>