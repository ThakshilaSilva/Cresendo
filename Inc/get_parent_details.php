<?php
include '../php/connect.php';
function get_parent_details($id){
    try {
        $con = connect();

        #parent details
        $query = mysqli_query($con, "select Parent_id,FirstName,LastName,Relation,Address,Province,City from parent where Parent_id in(select Parent_id from student where S_ID='$id')");
        if (!$query) {
            die("database query failed." . mysqli_error($con));
        }
        $result =mysqli_fetch_array($query);
        $p_id=$result['Parent_id'];
        $fname=$result['FirstName'];
        $lname=$result['LastName'];
        $relation=$result['Relation'];
        $address=$result['Address'];
        $province=$result['Province'];
        $city=$result['City'];

        #get parent telephone numbers
        $query2 = mysqli_query($con, "select TP from parent_tel_numbers where ID='$p_id'");
        if (!$query2) {
            die("database query failed." . mysqli_error($con));
        }
        $tels = [];
        while ($tel = $query2->fetch_array()) {
            $tels[] = $tel["TP"];
        }
        $ptp1=NULL;
        $ptp2=NULL;
        if(sizeof($tels)==1){
            $ptp1=$tels[0];
        }else if(sizeof($tels)==2){
            $ptp1=$tels[0];
            $ptp2=$tels[1];
        }
        $con->close();
        $array=array($fname,$lname,$relation,$address,$province,$city,$ptp1,$ptp2,$p_id);
        return $array;
    }catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    }

}
?>