<?php
include "../inc/connect_user.php";
function operation($tp1,$tp2,$name1,$name2,$gender,$bday,$address,$province,$city,$instrument,$TYPE){
    try {

        $con = connect($TYPE);

        $type = "T";
        $year = date('Y');
        $pre = substr($name1, 0, 1);

        $date=date('Y-m-d');

        #creating a unique id

        mysqli_autocommit($con, false);

        $result1= mysqli_query($con, "SELECT COUNT(ID) as total FROM Person");
        $data = mysqli_fetch_assoc($result1);
        $_id = $data['total'] ;
        $len=strlen($_id);
        $_id1=str_repeat('0',4-$len);
        $id=$year.$_id1.$_id.$pre;


        if ($tp1 == $tp2 and $tp1 != "") {
            echo "<script>alert('Telephone numbers must be distinct!')</script>";
        } elseif ((strlen($tp1) != 10 and $tp1 != 0) or (strlen($tp2) != 10) and $tp2 != 0) {
            echo "<script>alert('Telephone numbers must be of valid length!')</script>";
        } else {

            #insert details to the teacher table


            $stmt1 = $con->prepare("SELECT Instrument_id FROM Instrument WHERE Title=?");
            $stmt1->bind_param("s", $instrument);
            $result1=$stmt1->execute();
            $stmt1->bind_result($instrument_id);
            $stmt1->store_result();
            $stmt1->fetch();
            $stmt1->close();
            #echo $instrument_id;

            if ($gender == "Male") {
                $gender = "M";
            } else {
                $gender = "F";
            }




           // $con->begin_transaction();

            $stmt2 = $con->prepare("INSERT INTO Person (FirstName, LastName, ID, Gender, DoB, Address, Province, City) VALUES (?,?,?, ?, ?, ?, ?, ?)");
            $stmt2->bind_param("ssssssss", $name1, $name2, $id, $gender, $bday, $address, $province, $city);
            $result2=$stmt2->execute();
            $stmt2->close();


            #insert details to the tp_numbers of the student.

            if ($tp1 != "") {
                $stmt3 = $con->prepare("INSERT INTO tel_numbers (ID,TP) VALUES (?, ?)");
                $stmt3->bind_param("ss", $id, $tp1);
                $stmt3->execute();
                $stmt3->close();
            }
            if ($tp2 != "") {
                $stmt4 = $con->prepare("INSERT INTO tel_numbers (ID,TP) VALUES (?, ?)");
                $stmt4->bind_param("ss", $id, $tp2);
                $stmt4->execute();
                $stmt4->close();
            }

            $pass='crescendo';
            $stmt5 = $con->prepare("INSERT INTO User(U_ID,password,UType) VALUES (?, ?, ?)");
            $stmt5->bind_param("sss", $id, $pass,$type);
            $result5=$stmt5->execute();
            $stmt5->close();

            $stmt6 = $con->prepare("INSERT INTO Teacher(T_ID,Instrument_id,Reg_date) VALUES (?, ?, ?)");
            $stmt6->bind_param("sss", $id, $instrument_id,$date);
            $result6=$stmt6->execute();
            $stmt6->close();
           mysqli_autocommit($con, true);

            $con->close();
           # $con->commit();

            if($result5 and $result6 and $result2 and $result1){
                echo "<script>alert('Successfully Registered!')</script>";
                echo "<script>window.open('main_admin_window.php','_self')</script>";
            }else{
                mysqli_rollback($con);
            }



        }



    } catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    } catch (Exception $e){
        echo "<script>alert('Enter Valid Inputs!')</script>";

    }



}



?>