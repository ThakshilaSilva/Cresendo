
<?php
include "../inc/get_amount.php";
if (isset($_GET['continue'])) {

    $student = $_GET['student'];
    $split_class=explode(" ",$student);
    $fname= $split_class[0];
    $lname=$split_class[1];
    $id= $split_class[2];

    $class = $_GET['class'];
    $split_class=explode(" ",$class);
    $instrument= $split_class[0];
    $year= $split_class[4];
    $term= $split_class[5];
    $Class_id=$split_class[13];
    $type=$split_class[11];
    $month=$_GET['month'];

    $amount=amount($id,$Class_id,$month,$type);
    $last_month=$_SESSION['last'];

}

$NAME=$_SESSION['NAME'];
if((time()-$_SESSION['LOGIN_TIME'])>1200){
    echo"<script>alert('Session Timed out!')</script>";
    echo "<script>window.open('login.php','_self')</script>";
}

$_SESSION['LOGIN_TIME']=time();
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fee payments</title>

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/form-basic.css">
    <link rel="stylesheet" href="../css/new.css">
    <link rel="stylesheet" href="../css/main.css">
</head>


<header>
    <p ALIGN="RIGHT"> Logged in as: <?php echo $NAME;?> <a href="login.php" id="logout">(logout)</a></p>
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>

</header>


<div class="main-content">
    <a href="main_admin_window.php">Back to main</a>
    <form class="form-basic" method="get" action="fee_final.php">
        <div class="form-title-row">
            <h1>Payment Details</h1>
        </div>

        <div class="form">
            <div class="form-row">
                <label><?php echo "Student ID : ".htmlspecialchars($id)?></label>
            </div>
            <div class="form-row">
                <label><?php echo "Name : ".htmlspecialchars($fname)." ".htmlspecialchars($lname)?></label>
            </div>
            <div class="form-row">
                <label><?php echo "Class : ".htmlspecialchars($instrument)?></label>
            </div>
            <div class="form-row">
                <label><?php echo "Type : ".htmlspecialchars($type)?></label>
            </div>
            <div class="form-row">
                <label><?php echo "Month : ".htmlspecialchars($month)?></label>
            </div>
        </div>

        <div class="form-row">

            <div class="amount-display">
                <label for=""><?php  echo htmlspecialchars($amount)?></label>
            </div>
        </div>
        <?php
        $_SESSION['amount']=$amount;
        $_SESSION['id']=$id;
        $_SESSION['Class_id']=$Class_id;
        $_SESSION['month']=$month;
        $_SESSION['type']=$type;
        ?>
        <div class="form-row">
            <button type="submit" name="pay" >Pay</button>
        </div>
    </form>

</div>
</body>
</html>
