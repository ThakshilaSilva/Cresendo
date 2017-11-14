<?php
include "connect.php";

function pay($id,$salary,$year,$month){

    try{
        $con = connect();
        $date=date('Y-m-d H:i:s');
        mysqli_autocommit($con, false);

        $stmt1=$con->prepare("INSERT INTO salary (T_ID,Amount,Year,Month,PaidDate) VALUES (?, ?, ?, ?, ?)");
        $stmt1->bind_param("ssiis",$id,$salary,$year,$month,$date);
        $result=$stmt1->execute();
        $stmt1->close();
        mysqli_autocommit($con, true);
        $con->close();
        if($result){
            echo"<script>alert('Payment Successfull!')</script>";
            echo "<script>window.open('salary_main.php','_self')</script>";
        }else{
            echo"<script>alert('Error during Payment!')</script>";
            echo "<script>window.open('salary_main.php','_self')</script>";

        }
    } catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    }

}
