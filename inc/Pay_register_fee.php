<?php


function operation($id,$amount,$TYPE,$con){
    #$con=connect($TYPE);
    $date=date('Y-m-d');

    #check whether the student has paid tha admission

    $paid_date = "";
    $stmt2 = $con->prepare("SELECT PaidDate FROM FeeAdmission WHERE S_ID=? ");
    $stmt2->bind_param("s", $id);
    $stmt2->execute();
    $stmt2->bind_result($paid_date);
    $stmt2->fetch();
    $stmt2->close();

    if($paid_date!=""){
        echo "<script>alert('Student has already paid the Admission fees!')</script>";
        echo "<script>window.open('main_admin_window.php','_self')</script>";

    }else{


    #insert to the database
    $stmt3 = $con->prepare("INSERT INTO FeeAdmission(Amount,PaidDate,S_ID) VALUES(?,?,?) ");
    $stmt3->bind_param("sss", $amount,$date,$id);
    $result3=$stmt3->execute();
    $stmt3->close();
    $con->close();

    if($result3){
        echo "<script>alert('Payment Successful !')</script>";
        echo "<script>window.open('main_admin_window.php','_self')</script>";
    }
    else{
        echo "<script>alert('Payment Rejected !')</script>";
        echo "<script>window.open('../php/main_admin_window.php','_self')</script>";
    }

    }
}
