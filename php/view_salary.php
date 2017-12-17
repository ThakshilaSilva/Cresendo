<?php
if (isset($_GET['view_salary'])) {
    $teacher = $_GET['teacher'];
    $split_class=explode(" ",$teacher);
    $tfname= $split_class[0];
    $tlname=$split_class[1];
    $id= $split_class[2];
    $year=date('Y')+$_GET['yea'];
    $month=$_GET['month'];
    include '../Inc/get_salary.php';
    $salary=get_salary($id,$year,$month);
    if((time()-$_SESSION['LOGIN_TIME'])>1200){
        echo"<script>alert('Session Timed out!')</script>";
        echo "<script>window.open('login.php','_self')</script>";
    }
    session_start();
    $NAME=$_SESSION['NAME'];
    $_SESSION['LOGIN_TIME']=time();
}

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
    <span class="avatar"><img src="../img/logo.jpg" alt="" /></span>

</header>


<div class="main-content">

    <form class="form-basic" method="get" action="salary_final.php">
        <div class="form-title-row">
            <h1>Salary Details</h1>
        </div>

        <div class="form">
            <div class="form-row">
                <label><?php echo "Teacher ID : ".$id?></label>
            </div>
            <div class="form-row">
                <label><?php echo "Name : ".$tfname." ".$tlname?></label>
            </div>

        </div>

        <div class="form-row">

            <div class="amount-display">
                <label for="">Salary : </label>
                <label for=""><?php echo $salary?></label>
            </div>
        </div>
        <?php
            session_start();
            $_SESSION['id']=$id;
            $_SESSION['salary']=$salary;
            $_SESSION['year']=$year;
            $_SESSION['month']=$month;
        ?>

        <div class="form-row">
            <a href="salary_main.php">Back to Salary Window</a>
        </div>
        <div class="form-row">
            <button type="submit" name="settle" >Pay</button>
        </div>
    </form>

</div>
</body>
</html>

