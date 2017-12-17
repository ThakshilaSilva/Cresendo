<?php

include "connect.php";
$con = connect();

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="view class" content="width=device-width, initial-scale=1">

    <title>Class Details</title>

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/main.css">

    <?php

    /* session_start();
     $TYPE=$_SESSION['TYPE'];
     $USER=$_SESSION['USER'];
     $PASS=$_SESSION['PASS'];
     $NAME=$_SESSION['NAME'];*/


    ?>
    <?php

    if(isset($_GET['next1'])) {
        $Year=$_GET['Year'];
        $Term=$_GET['Term'];
        $Instrument=$_GET['instrument'];
        session_start();
        $_SESSION['instrument']=$Instrument;
        $_SESSION['Year']=$Year;
        $_SESSION['Term']=$Term;

        $stmt=$con->prepare("SELECT Class_id FROM class WHERE Year=? AND Term=? AND Instrument_id in(select Instrument_id from instrument WHERE Title=?)");
        $stmt->bind_param("sss",$Year,$Term,$Instrument);
        $stmt->execute();
        $result=$stmt->get_result();

        $classes=array();
        while($row = $result->fetch_assoc()) {
            $classes[] = $row['Class_id'];
        }



        $_SESSION['class']=$classes;
        #$_SESSION['state']=$state;
        if(sizeof($classes)==0 ){

            echo "<script>alert('Invalid Class')</script>";

        }
        else{
            echo "<script>window.open('certificate-select-class-next.php','_self') </script>";
            #header("view_class.php");die;
        }









    }


    ?>
</head>
</html>