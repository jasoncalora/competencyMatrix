<div class="container1">
<button id="back_btn" onclick="getMatrix();">Back</button>
<table>
<tr>
    <td>Integration Number</td>
    <td>Solution 1</td>
    <td>Solution 2</td>
    <td></td>
</tr>
<?php
include("dbcon.php");
mysqli_select_db($conn,"solutionsmatrix");
$sql="SELECT i1.solution1_id, (select solution_name from solutions where solution_id = i1.solution1_id) as Solution1, i1.solution2_id, (select solution_name from solutions where solution_id = i1.solution2_id) as Solution1
from integrations i1";
$result = mysqli_query($conn,$sql);
    $count = 1;
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>$count</td>";
    echo "<td>$row[1]</td>";
    echo "<td>$row[3]</td>";
    echo "<td><button onclick='deleteIntegration($row[0],$row[2])'>Delete</button></td>";
    echo "</tr>";
    $count += 1;
//    $matrix[$solutionsCount[$row['solution2_id']]][$solutionsCount[$row['solution1_id']]] = 1;
}

?>
</table>    
</div>
<style>
    table, td{
        border:1px solid black;
        width:90%;
    }
    td{
        width:auto;
        padding-top:0.5rem;
        padding-bottom:0.5rem;
    }
    tr:nth-child(1){
        font-weight:600;
    }
    td:nth-child(1){
        width:150px;
        text-align: center;
    }
    td:nth-child(2){
        width:250px;
    }
    td:nth-child(3){
        width:250px;
    }    
    td:nth-child(4){
        width:250px;
        text-align:center;
    }
    #back_btn{
        padding-top:0.5rem;
        padding-bottom:0.5rem;
        border-radius:5px;
        margin-bottom:1rem;
    }
    button:hover{
        cursor:pointer;        
    }
    .container1{
        width:100%;
        padding-left:5%;
    }
</style>