<?php
include("dbcon.php");
mysqli_select_db($conn,"solutionsmatrix");
$sql="SELECT * FROM `solutions`";
$result = mysqli_query($conn,$sql);
    echo "<select name='delete_dropdown' id='delete_dropdown'>";
    echo "<option value='' disabled selected>Select a Solution</option>"; 
while($row = mysqli_fetch_array($result)) {
    echo "<option value='".$row['solution_id']."'>".$row['solution_name']."</option>";       
}
    echo "</select>"; 
?>
<button id="delete_refresh" onclick="updateDeleteDropdown();"><img src="images/r.svg" alt=""></button>