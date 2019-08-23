<?php
//echo $_POST['name'];

include("dbcon.php");
if (isset($_POST['s1']) && isset($_POST['s2'])) {
    $exist = 0;
    mysqli_select_db($conn,"solutionsmatrix");
    $sql="SELECT * FROM `integrations` WHERE `solution1_id` = ".$_POST['s1']." AND `solution2_id` = ".$_POST['s2'];
    $result = mysqli_query($conn,$sql);
    $exist += mysqli_num_rows($result);
    mysqli_select_db($conn,"solutionsmatrix");
    $sql="SELECT * FROM `integrations` WHERE `solution2_id` = ".$_POST['s1']." AND `solution1_id` = ".$_POST['s2'];
    $result = mysqli_query($conn,$sql);
    $exist += mysqli_num_rows($result);
    if($exist>0){
        echo "Integration Already Exists";
    }else{
        mysqli_select_db($conn,"solutionsmatrix");
        $sql="INSERT INTO `integrations`( `solution1_id`, `solution2_id`) VALUES (".$_POST['s1'].",".$_POST['s2'].")";
        $result = mysqli_query($conn,$sql);
        echo $result;  
    }
}
?>