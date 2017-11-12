<?php
include "connect.php";

function operation($name1,$class){
    try {
        $con = connect();
        $id = substr($name1, strrpos($name1, " ") + 1);

        $split_class = explode(" ", $class);

        $instrument = $split_class[0];
        $stmt = $con->prepare("SELECT Instrument_id from instrument WHERE Title=?");
        $stmt->bind_param("s", $instrument);
        $stmt->execute();
        $stmt->bind_result($Instrument_id);
        $stmt->fetch();
        $stmt->close();

        #get the details of the class.

        $year = $split_class[4];
        $term = $split_class[6];
        $Class_id = $split_class[13];
        $type=$split_class[11];
        echo $type;


        #check whether student has payed for the class.
        $paid_date = "";
        $stmt2 = $con->prepare("SELECT PaidDate FROM FeeAdmission WHERE S_ID=? ");
        $stmt2->bind_param("s", $id);
        $stmt2->execute();
        $stmt2->bind_result($paid_date);
        $stmt2->fetch();
        $stmt2->close();
        #Check whether student has already registered.

        $count = 0;
        $stmt3 = $con->prepare("SELECT Count(S_ID) FROM participate WHERE S_ID=? AND Class_id=?");
        $stmt3->bind_param("ss", $id,$Class_id);
        $stmt3->execute();
        $stmt3->bind_result($count);
        $stmt3->fetch();
        $stmt3->close();

        #chek whether there is enough space


        $number = 0;
        $stmt4 = $con->prepare("SELECT Count(S_ID) FROM participate WHERE  Class_id=?");
        $stmt4->bind_param("s",$Class_id);
        $stmt4->execute();
        $stmt4->bind_result($number);
        $stmt4->fetch();
        $stmt4->close();
        echo $number;

        $capacity=0;
        $stmt4 = $con->prepare("SELECT Capacity FROM class NATURAL JOIN Class_room WHERE Class_id=?");
        $stmt4->bind_param("s",$Class_id);
        $stmt4->execute();
        $stmt4->bind_result($capacity);
        $stmt4->fetch();
        $stmt4->close();
        echo $capacity;


        if($type=="Individual" and $number>=1){
            echo "<script>alert('Cannot be Registered as the class is full')</script>";
            echo "<script>window.open('main_admin_window.php','_self')</script>";
        }elseif($type=="Group" and $number>=$capacity){
            echo "<script>alert('Cannot be Registered as the class is full')</script>";
            echo "<script>window.open('main_admin_window.php','_self')</script>";
        } elseif ($paid_date == "") {
            echo "<script>alert('Student Cannot be registered to the Class. Register fee Not Paid!')</script>";
            echo "<script>window.open('main_admin_window.php','_self')</script>";
        } elseif ($count == 1) {
            echo "<script>alert('Student has already Registered for this class!')</script>";
            #echo "<script>window.open('main_admin_window.php','_self')</script>";
        } else {

            $stmt5 = $con->prepare("INSERT INTO participate(S_ID,Class_id) VALUES (?, ?)");
            $stmt5->bind_param("ss", $id, $Class_id);
            $result5=$stmt5->execute();
            $stmt5->close();
            $con->close();
            if($result5){

            echo "<script>alert('Registered to the class Successfully!')</script>";
            echo "<script>window.open('main_admin_window.php','_self')</script>";
            } else{
                echo "<script>alert('Error Occur in Registering!!')</script>";
                echo "<script>window.open('main_admin_window.php','_self')</script>";
            }
        }
    }catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    } catch (Exception $e){
        echo "<script>alert('Enter Valid Inputs!')</script>";
    }
}
?>