<?php
include "connect.php";

function fee($amount,$id,$Class_id,$month,$last_month,$type){

    try{
        $con = connect();
        $date=date('Y-m-d H:i:s');
        if($type=='Group'){
            $type='G';
        }else{
            $type='I';
        }
        $query2 = mysqli_query($con, "select Fee_Charge from Student_charges where Class_Type='$type'");
        if (!$query2) {
            die("database query failed." . mysqli_error($con));
        }
        $result2 = $query2->fetch_array();
        $fee=$result2["Fee_Charge"];
        mysqli_autocommit($con, false);
        for($i=$last_month;$i<=$month;$i++){
            $stmt1=$con->prepare("INSERT INTO fee (Amount,PaidDate,S_ID,Class_id,Month) VALUES (?, ?, ?, ?, ?)");
            $stmt1->bind_param("sssii",$fee,$date,$id,$Class_id,$i);
            $result=$stmt1->execute();
            $stmt1->close();
        }

        mysqli_autocommit($con, true);
        $con->close();
        if($result){
            echo"<script>alert('Payment Successfull!')</script>";
            echo "<script>window.open('fee_main.php','_self')</script>";
        }else{
            echo"<script>alert('Error during Payment!')</script>";
            echo "<script>window.open('fee_main.php','_self')</script>";

        }
    } catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    }

}
