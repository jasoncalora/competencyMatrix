<?php
include("functions/dbcon.php");

?>

<table>
    <tr>
        <td>Core Competency</td>
        <td>
            <select name="" id="">
                    echo "<option value='' default>Competency</option>";
            <?php
                mysqli_select_db($conn,"competencymatrix");
                $sql="SELECT * from core_competencies";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result)) {
                    echo "<option value='".$row[0]."'>".$row[1]."</option>";
                }
            ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Employee</td>
        <td>
            <select name="" id="">
                    echo "<option value='' default>Select Employee</option>";
            <?php
                mysqli_select_db($conn,"competencymatrix");
                $sql="SELECT * from consultants";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result)) {
                    echo "<option value='".$row[0]."'>".$row[1]."</option>";
                }
            ?>
            </select>
        </td>
    </tr>
</table>
<div class="form-container">
    
</div>