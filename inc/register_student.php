<?php
include "connect_user.php";


function operation($tp1,$tp2,$p1tp1,$p1tp2,$p2tp2,$p2tp1,$name1,$name2,$gender,$bday,$address,$province,$city,$p1name1,$p1name2,$p1relation,$p1address,$p1city,$p1province,$sib1,$sib2,$TYPE){

    try {
        $con = connect($TYPE);

        if (($tp1 == $tp2 and $tp1 != "") or ($p1tp1 == $p1tp2 and $p1tp1 != "") ) {
            echo "<script>alert('Telephone numbers must be distinct!')</script>";
        } elseif ((strlen($tp1) != 10 and $tp1 != "") or (strlen($tp2) != 10 and $tp2 != "") or (strlen($p1tp1) != 10 and $p1tp1 != "") or (strlen($p1tp1) != 10 and $p1tp2 != "") ) {
            echo "<script>alert('Telephone numbers must be of valid length!')</script>";
        } else {



            if ($gender == "Male") {
                $gender = "M";
            } else {
                $gender = "F";
            }


            $pre = substr($name1, 0, 1);
            $year = date('Y');

            mysqli_autocommit($con, false);


            $result1= mysqli_query($con, "SELECT COUNT(ID) as total FROM Person");
            $data = mysqli_fetch_assoc($result1);
            $_id = $data['total'] ;
            $len=strlen($_id);
            $_id1=str_repeat('0',4-$len);
            $id=$year.$_id1.$_id.$pre;





            #insert details to the parent1

            $pid1 = uniqid();

            $stmt2 = $con->prepare("INSERT INTO parent (Parent_id,FirstName,LastName,Relation,Address,Province,City) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
            $stmt2->bind_param("sssssss", $pid1, $p1name1, $p1name2, $p1relation, $p1address, $p1province, $p1city);
            $result2=$stmt2->execute();
            $stmt2->close();





            #insert details to the parent table



            $date=date('Y-m-d');
            $stmt3 = $con->prepare("INSERT INTO person (FirstName, LastName, ID, Gender, DoB, Address, Province, City) VALUES (?, ?, ?, ?, ?, ?, ?,?)");
            $stmt3->bind_param("ssssssss", $name1, $name2, $id, $gender, $bday, $address, $province, $city);
            $result3=$stmt3->execute();
            $stmt3->close();

            #onsert the details to the student table

            $stmt4 = $con->prepare("INSERT INTO student (S_ID,Reg_date,Parent_id) VALUES (?, ?, ?)");
            $stmt4->bind_param("sss", $id, $date, $pid1);
            $result4=$stmt4->execute();
            $stmt4->close();



            #insert details to the tp_numbers of the student.

            if ($tp1 != "") {
                $stmt5 = $con->prepare("INSERT INTO tel_numbers (ID,TP) VALUES (?, ?)");
                $stmt5->bind_param("ss", $id, $tp1);
                $result5=$stmt5->execute();
                $stmt5->close();
            }
            if ($tp2 != "") {
                $stmt6 = $con->prepare("INSERT INTO tel_numbers (ID,TP) VALUES (?, ?)");
                $stmt6->bind_param("ss", $id, $tp2);
                $result6=$stmt6->execute();
                $stmt6->close();
            }



            #insert tp_numbers of the parent

            if ($p1tp1 != "") {
                $stmt7 = $con->prepare("INSERT INTO parent_Tel_numbers (ID,TP) VALUES (?, ?)");
                $stmt7->bind_param("ss", $pid1, $p1tp1);
                $result7=$stmt7->execute();
                $stmt7->close();
            }
            if ($p1tp2 != "") {
                $stmt8 = $con->prepare("INSERT INTO parent_Tel_numbers (ID,TP) VALUES (?, ?)");
                $stmt8->bind_param("ss", $pid1, $p1tp2);
                $result8=$stmt8->execute();
                $stmt8->close();
            }


            #insert sibling details of the student

            if ($sib1 != "") {
                $s1 = substr($sib1, strrpos($sib1, " ") + 1);
                $stmt9 = $con->prepare("INSERT INTO sibling (s_ID,sib_ID) VALUES (?, ?)");
                $stmt9->bind_param("ss", $id, $s1);
                $result9=$stmt9->execute();
                $stmt9->close();

                $stmt10 = $con->prepare("INSERT INTO sibling (s_ID,sib_ID) VALUES (?, ?)");
                $stmt10->bind_param("ss", $s1, $id);
                $result10=$stmt10->execute();
                $stmt10->close();
            }

            if ($sib2 != "") {
                $s2 = substr($sib2, strrpos($sib2, " ") + 1);
                $stmt11 = $con->prepare("INSERT INTO sibling (s_ID,sib_ID) VALUES (?, ?)");
                $stmt11->bind_param("ss", $id, $s2);
                $result11=$stmt11->execute();
                $stmt11->close();

                $stmt12 = $con->prepare("INSERT INTO sibling (s_ID,sib_ID) VALUES (?, ?)");
                $stmt12->bind_param("ss", $s2, $id);
                $result12=$stmt12->execute();
                $stmt12->close();
            }




            mysqli_autocommit($con, true);
            $con->close();

            if($result2 and $result3 and $result4){

                echo "<script>alert('Successfully Registered!')</script>";
                echo "<script>window.open('main_admin_window.php','_self')</script>";
            }
            else{
                mysqli_rollback($con);
                echo "<script>alert('Error Occur in Register! Try Again!!')</script>";
            }




        }
    } catch (mysqli_sql_exception $e){
        if(mysqli_errno()==1062){
            echo "<script>alert('Same contact No cannot be Entered!!')</script>";
        } else{
            echo "<script>alert('Error Occur in connecting to the Database!')</script>";
        }

    } catch (Exception $e){
        echo "<script>alert('Enter Valid Inputs!')</script>";
    }
}

?>
