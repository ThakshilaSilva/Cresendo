<?php
include "connect.php";
$con = connect();
session_start();
$Instrument=$_SESSION['instrument'];

if(isset($_GET['next2'])){

    $classes=$_SESSION['class'];

    $class=$_GET['class'];

    $Class_id = $classes[(int)$class[strlen($class) - 1]-1];

    $stmt1 = $con->prepare('select Active from class where Class_id=?');
    $stmt1->bind_param("s",$Class_id);
    $stmt1->execute();
    $result=$stmt1->get_result();
    $row1=$result->fetch_assoc();
    $State=$row1['Active'];
    if($State==1) {
        $State = 'True';

    }else{
        $State='False';
        }

    $_SESSION['classid']=$Class_id;
    $_SESSION['state']=$State;




}
$State=$_SESSION['state'];
/*$Instrument=$_SESSION['instrument'];
$Term=$_SESSION['Term'];
$Year=$_SESSION['Year'];
$classes=$_SESSION['class'];*/

/*$TYPE=$_SESSION['TYPE'];
$USER=$_SESSION['USER'];
$PASS=$_SESSION['PASS'];
$NAME=$_SESSION['NAME'];*/

/*$stmt=$con->prepare("SELECT FirstName,LastName FROM person WHERE ID in(SELECT S_ID from participate WHERE Class_id=?)");
$stmt->bind_param("sss",$Year,$Term,$Instrument);
$stmt->execute();
$result=$stmt->get_result();
$classes=array();
while($row = $result->fetch_assoc()) {
    $classes[] = $row['Class_id'];
}*/

?>
<?php

$Class_id=$_SESSION['classid'];
/*$classes=$_SESSION['class'];
$Term=$_SESSION['Term'];
$Year=$_SESSION['Year'];*/



$stmt=$con->prepare("SELECT FirstName,LastName FROM person WHERE ID in(SELECT S_ID from participate WHERE Class_id=?)");
$stmt->bind_param("s",$Class_id);
$stmt->execute();
$result=$stmt->get_result();
$names=array();
while($row = $result->fetch_assoc()) {
    $names[] = $row['FirstName'].' '.$row['LastName'];
}

if(isset($_GET['create'])) {
    if ($State == 'False') {
        $Name = $_GET['name'];


        require("../fpdf.php");
        $pdf = new FPDF();
        $pdf->AddPage();
        // Set font
        // $pdf->SetDrawColor(0,80,180);
        $pdf->SetFillColor(255, 255, 202);
        $pdf->SetTextColor(100, 20, 28);


// Centered text in a framed 20*10 mm cell and line break
        /* $pdf->Cell(0,20,'  ',0,1,'C');
         $pdf->Cell(0,10,'CRESCENDO MUSIC ACADEMY ',0,1,'C');*/


        $pdf->SetFont('Times', 'B', 33);
        $pdf->Cell(0, 40, "        ", 0, 1, 'C', '***1***');
        $pdf->Cell(0, 30, 'CRESCENDO MUSIC ACADEMY', 0, 1, 'C', '***1***');
        $pdf->Cell(0, 5, "        ", 0, 1, 'C', '***1***');
        $pdf->SetFont('Times', 'B', 20);
        $pdf->Cell(0, 20, "This is to certify that", 0, 1, 'C', '***1***');

        $pdf->Cell(0, 20, "{$Name}", 0, 1, 'C', '***1***');
        $pdf->Cell(0, 20, "has successfully completed the ", 0, 1, 'C', '***1***');

        $pdf->Image('../img/abc.PNG', 10, 10, 190);
        #$pdf->Image('../img/logo.jpg',162,10,38);
        $pdf->Cell(0, 20, "{$Instrument} course", 0, 1, 'C', '***1***');
        $pdf->Cell(0, 10, "at", 0, 1, 'C', '***1***');
        $pdf->Cell(0, 20, " CRESCENDO Music Academy", 0, 1, 'C', '***1***');
        $pdf->Cell(0, 40, "        ", 0, 1, 'C', '***1***');
        $pdf->Cell(0, 5, "........................................", 0, 1, 'C', '***1***');
        $pdf->SetFont('Times', 'B', 10);
        $pdf->Cell(0, 5, "The Manager", 0, 1, 'C', '***1***');
        $pdf->Cell(0, 5, "Crescendo Music Academy", 0, 1, 'C', '***1***');
        $pdf->Cell(0, 25, " ", 0, 1, 'C', '***1***');
        $pdf->Output();
    } else {
        echo "<script>alert('This class is not completed yet')</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Generate Certificate" content="width=device-width, initial-scale=1">

    <title>Class Details</title>

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/main.css">




</head>



<body>


<header id="header">
    <!-- <p ALIGN="RIGHT"> Logged in as: <?php /*echo $NAME;*/?> <a href="login.php" id="logout">(logout)</a></p>-->
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <!--  <span class="avatar"><img src="images/avatar.jpg" alt="" /></span> -->
</header>


<form class="view class" method="get" action="#">



    <div class="form-log-in-with-email">

        <div class="form-white-background">

            <div class="form-title-row">
                <h1>Generate Certificate</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Student Name :</span>
                    <input type="=text" list="names" name="name" id="name" autocomplete="off" required/>
                    <datalist id="names">
                        <?php for ($j = 0 ; $j< sizeof($names); $j++):?>
                            <option> <?php echo $names[$j];?></option>


                        <?php endfor;?>

                    </datalist>

                </label>
            </div>
            <div class="form-row">
                <button type="submit" name="create"> Create Certificate</button>
            </div>
            <p ALIGN="RIGHT"> <a href="select-class-teacher.php" id="goback">[Back]</a></p>


        </div>


    </div>

</form>


</body>

</html>
