<?php
include("functions/dbcon.php");
$emp_id = 1;
$core_id = 1;
$group = array(); 
$skill = array(); 
//get employee
mysqli_select_db($conn,"competencymatrix");
$sql="SELECT * from consultants where emp_id=".$emp_id;
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    $emp_name =  $row[1];
}
//get competency
mysqli_select_db($conn,"competencymatrix");
$sql="SELECT * from core_competencies where core_id=".$core_id;
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    $competency =  $row[1];
    $comp_id = $row[0];
}
//get skill groups
$sql="SELECT * from skill_group where core_id=".$comp_id;
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    $group[] = [$row[0],$row[2]];
}
//get record dates
$sql="SELECT * from competency_records where emp_id=".$emp_id." and comp_id=".$core_id ." order by date asc";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    $comp_records[] = $row[0];
}
//var_dump($group);
//$obj = json_decode('{ "1": 5, "2": 4 , "3": 2 , "4": 5, "5": 3, "6": 5}', false);
//var_dump($obj);
//echo $obj->{1};
//$group1=1;



//}
?>
<div class="comp_container">
    <div class="rating_container">
       <table border=1>
       <tr>
           <td class="title" rowspan="2" style="width:200px;"><?php echo $competency;?></td>
           <td class="emp_name" colspan="<?php echo count($comp_records) ?>"><?php echo $emp_name;?></td>
       </tr>
       <tr>
            <?php
                $sql="SELECT * from competency_records where emp_id=".$emp_id." and comp_id=".$core_id ." order by date asc";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result)) {
                    echo "<td class='record_date'>".date("d F Y", strtotime($row[3]))."</td>";
                }
            ?>

       </tr>
        <?php
            $temp = 0;
            $values = array();
            for($i=0;$i<=count($group)-1;$i++){
                echo "<tr>";
                echo "<td class='comp_group'>".$group[$i][1]."</td>";   //Skill Groups
                    //get min score
                    $group_skills = array();
                    $sql="SELECT * from skills where group_id=".$group[$i][0];
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($result)) {
                        $group_skills[] = $row[0];
                    }
                    //var_dump($group_skills);
                    $sql="SELECT count(*) from competency_records where emp_id=".$emp_id." and comp_id=".$core_id ." order by date asc";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($result)) {
                        $datecount = $row[0];
                    }
                    //for($i=1;$i<=$datecount;$i++){
                       $sql="SELECT * from competency_records where emp_id=".$emp_id." and comp_id=".$core_id ." order by date asc";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($result)) {
                    //        echo $row[4];
                            $obj = json_decode($row[4], false);
                            $skillids = array();
                            for($i2=0;$i2<=count($group_skills)-1;$i2++){
                                if (property_exists($obj, $group_skills[$i2])){
                                    $skillids [] = $obj->{$group_skills[$i2]};
                                }else{
                                    $skillids [] = 0;
                                }
                                
                            }
//                            var_dump($skillids);
                            echo "<td class='group-totals'>". min($skillids)."</td>";
                            unset($skillids);
                        }
                echo "</tr>";
                mysqli_select_db($conn,"competencymatrix");
                    $sql="SELECT * from skills where group_id=".$group[$i][0];
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($result)) {
                        echo "<tr id=".$row[0].">";
                        echo "<td class='comp_skill'> ● ".$row[2]."</td>";  // Skill
//                        echo "<td class='comp_skill'>● ".$row[0].$row[2]."</td>";
                            $sql2="SELECT * from competency_records where emp_id=".$emp_id." and comp_id=".$core_id ." order by date asc";
                            $result2 = mysqli_query($conn,$sql2);
                            while($row2 = mysqli_fetch_array($result2)) {
                                $obj = json_decode($row2[4], false);
                                
                                echo "<td class='rating_cell' >";
                                if (property_exists($obj, $row[0])){
                                    echo $obj->{$row[0]};
                                }else{
                                    echo "0";
                                }
                                echo "</td>";
                            }
                        echo "<tr>";
                    }
            }
        ?>  
       </table>
        
    </div>

</div>


<style>
    body,html{
        height:100%;
        width:100%;
        overflow:hidden;
    }
    body{
        margin:0;
    }
    .comp_container{
/*        border:1px solid black;*/
        width:100%;
        height:100%;
        display:flex;
        flex-wrap:wrap;
    }
    .competency-title{
        float:left;
/*        border:1px solid black;*/
        width:390px;
        height:2rem;
    }
    .employee_pane{
        float:left;
/*        border:1px solid black;*/
        width:69%;
        height:2rem;
    }
    .title{
        font-size:2rem;
    }
    .emp_name{
        font-size:1.5rem;
    }
    .rating_container{
/*        border:1px solid red;*/
/*        width:130%;*/
/*        display:none;*/
/*        width:100%;*/
        height:100%;
        width:100%;
        overflow-y:auto;
        overflow-x:scroll;
    }
    .group-totals{
        font-weight:600;
        text-align:center;
    }
    .comp_group{
/*        border:1px solid black;*/
        padding-left:1rem;
        font-size:1.2rem;
        width:350px;
    }
    .comp_skill{
        padding-left:2rem;
        font-size:0.9rem;
        width:350px;
    }
/*
    td{
        width:350px;
    }
*/
    tr td{
/*        width:150px;*/
    }
    tr td:nth-child(1){
/*        width:350px;*/
    }
    .record_date{
        width:120px;
        font-size:0.9rem;
        text-align:center;
    }
    .rating_cell{
        text-align:center;
        width:100px;
    }
</style>