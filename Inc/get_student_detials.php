<?php
    function getdetails($id,$con){

            $query = mysqli_query($con, "select FirstName,LastName,Gender,DoB,Address,Province,City from person where ID='$id'");
            if (!$query) {
                die("database query failed." . mysqli_error($con));
            }
            $result =mysqli_fetch_array($query);
            $fname=$result['FirstName'];
            $lname=$result['LastName'];
            $gender=$result['Gender'];
            $dob=$result['DoB'];
            $address=$result['Address'];
            $province=$result['Province'];
            $city=$result['City'];

            #get student telephone numbers
            $query2 = mysqli_query($con, "select TP from tel_numbers where ID='$id'");
            if (!$query2) {
                die("database query failed." . mysqli_error($con));
            }
            $tels = [];
            while ($tel = $query2->fetch_array()) {
                $tels[] = $tel["TP"];
            }
            $stp1=NULL;
            $stp2=NULL;
            if(sizeof($tels)==1){
                $stp1=$tels[0];
            }else if(sizeof($tels)==2){
                $stp1=$tels[0];
                $stp2=$tels[1];
            }
            $con->close();
            $array=array($fname,$lname,$dob,$address,$province,$city,$gender,$stp1,$stp2);
            return $array;

    }
?>