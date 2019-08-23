<?php
//echo $_POST['id'];
include("dbcon.php");
mysqli_select_db($conn,"solutionsmatrix");
$sql="SELECT * FROM `solutions` WHERE NOT solution_id = ".$_POST['id'];
$result = mysqli_query($conn,$sql);
    echo "<select name='s2_dropdown' id='s2_dropdown' onchcange='updateIntegDropdown2(this.value)'>";
    echo "<option value='' disabled selected>Select a Solution</option>"; 
while($row = mysqli_fetch_array($result)) {
    echo "<option value='".$row['solution_id']."'>".$row['solution_name']."</option>";       
}
    echo "</select>"; 
?>