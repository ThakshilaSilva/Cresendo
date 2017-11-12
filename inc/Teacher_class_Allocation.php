<?php
include "connect_user.php";

function operation($type,$time,$term,$day,$id,$TYPE){

    try {
        $con = connect($TYPE);

        mysqli_autocommit($con,false);
        $date_array = ["Monday" => "MO", "Tuesday" => "TU", "Wednesday" => "WE", "Thursday" => "TH", "Friday" => "FR"];
        $term_array = ["Term 1" => "1", "Term 2" => "2"];
        $time_start_array = ["Slot 1" => 2, "Slot 2" => 4];
        $time_end_array = ["Slot 1" => 4, "Slot 2" => 6];
        $class_type_array = ["Group" => "G", "Individual" => "I"];

        $type = $class_type_array[$type];
        $start = $time_start_array[$time];
        $end = $time_end_array[$time];
        $term = $term_array[$term];
        $date = $date_array[$day];

        $date = mysqli_real_escape_string($con, $date);
        $start = mysqli_real_escape_string($con, $start);
        $end = mysqli_real_escape_string($con, $end);


        $year = (int)date('Y');

        #$stmt=$con->prepare("SELECT * FROM time_slot WHERE Date=? and Start_time=? and End_time=?");
        #$stmt->bind_param("sss",$date,$start,$end);
        #$stmt->execute();
        #$num=$stmt->num_rows;


        #get the time slot id

        $stmt = "SELECT * FROM time_slot WHERE Date='$date' and Start_time='$start' and End_time='$end'";
        $result = mysqli_query($con, $stmt);
        $num = mysqli_num_rows($result);



        #if the system get the relevant time slot
        if ($num > 0) {
            $row = mysqli_fetch_array($result);
            #$row=$stmt->fetch();
            $Time_slot_id = $row['Time_slot_id'];
            echo $Time_slot_id;


            #get the time slotsthat the teacher teaches in the same year same term


            $stmt = "SELECT Time_slot_id FROM  conduct NATURAL JOIN class where Teacher_id='$id' and Year='$year' and Term=$term";
            $result = mysqli_query($con, $stmt);

            $times = array();
            while ($row = mysqli_fetch_array($result)) {
                $times[] = $row['Time_slot_id'];
            }

            if (in_array($Time_slot_id, $times)) {

                $slot = false;
            } else {
                $slot = true;
            }

            if ($slot) {




            $stmt = "SELECT * FROM class WHERE Time_slot_id = '$Time_slot_id' and Term ='$term' and Year='$year'";
            $result = mysqli_query($con, $stmt);

            #get the room ids to an array which has classes on same year same ter same time slot
            $rooms = array();
            while ($row = mysqli_fetch_array($result)) {
                # echo $row['Class_room_id'];
                $rooms[] = $row['Class_room_id'];
            }
            print_r($rooms);

            $stmt = "SELECT Class_room_id FROM  Class_room ";
            #$result=mysqli_query($con,$stmt);
            $result = mysqli_query($con, $stmt);
            $class_available = false;
            $new_class_room = "";

            #get a room id which is not available in the previous array.
            while ($row = mysqli_fetch_array($result)) {
                $row['Class_room_id'] . " ";
                if (!in_array($row['Class_room_id'], $rooms)) {
                    $new_class_room = $row['Class_room_id'];
                    $class_available = true;
                    break;

                }

            }
            #if class available add to the new class list
            if ($class_available) {
              #  echo "<script>alert('Class can be Allocated')</script>";



                #insert new class details to the database

                $stmt5 = $con->prepare("INSERT INTO class (Instrument_id, Term, Year, Class_Type, Time_slot_id, Class_room_id) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt5->bind_param("ssssss", $instrument_id, $term, $year, $type, $Time_slot_id, $new_class_room);

                #get the instrument of the teacher

                $stmt1 = "SELECT Instrument_id FROM teacher WHERE T_ID='$id'";
                $result1 = mysqli_query($con, $stmt1);
                while ($row = mysqli_fetch_array($result1)) {
                    $instrument_id = $row['Instrument_id'];
                }

                echo $instrument_id." ";

                #insert the values in to the class details.
                $result_1=$stmt5->execute();
                $stmt5->close();

                #insert the data in to the the conduct table

                $result3 = mysqli_query($con, "SELECT COUNT(Class_id) as total FROM class");
                $data = mysqli_fetch_assoc($result3);
                $class_id = $data['total'];



                $stmt3 = $con->prepare("INSERT INTO conduct (Teacher_id,Class_id) VALUES ( ?, ?)");
                $stmt3->bind_param("ss", $id, $class_id);
                $result_3=$stmt3->execute();
                $stmt3->close();
                mysqli_autocommit($con, true);

                if($result_1 and $result_3){


                    $msg = ' Class Can be Allocated!! Your Class location will be  ' . $new_class_room;
                    echo '<script>alert(" ' . $msg . '");</script>';
                     echo "<script>window.open('main_admin_window.php','_self')</script>";
                } else{
                    echo "<script>alert('Sorry ! Request Failed !!')</script>";
                }


            } else {
                echo "<script>alert('Sorry ! Class cannot be Allocated due to unavailability of space!')</script>";
            }
        } else{
            echo "<script>alert('Sorry! You have another class in the same time slot')</script>";}
        } else {
            echo "<script>alert('Invalid time slot!')</script>";
            exit();
        }


        $con->close();
    } catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in Connecting to the Database!')</script>";
    } catch (Exception $e){
        echo "<script>alert('Enter valid inputs ')</script>";
    }
}

?>