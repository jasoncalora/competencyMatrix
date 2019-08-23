<?php
include("dbcon.php");
mysqli_select_db($conn,"solutionsmatrix");
$sql="SELECT * FROM `solutions`";
$result = mysqli_query($conn,$sql);
    echo "<select name='s1_dropdown' id='s1_dropdown' onChange='updateIntegDropdown2(this.value)'>";
    echo "<option value='' disabled selected>Select a Solution</option>"; 
while($row = mysqli_fetch_array($result)) {
    echo "<option value='".$row['solution_id']."'>".$row['solution_name']."</option>";       
}
    echo "</select>"; 
?>