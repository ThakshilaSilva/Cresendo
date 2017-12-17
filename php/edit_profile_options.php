<?php
if (isset($_GET['edit_profile'])){
    $student = $_GET['student'];
    $split_class=explode(" ",$student);
    $id= $split_class[2];
    session_start();
    $_SESSION['id']=$id;
    if((time()-$_SESSION['LOGIN_TIME'])>1200){
        echo"<script>alert('Session Timed out!')</script>";
        echo "<script>window.open('login.php','_self')</script>";
    }
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
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

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


        <div class="wrap">
            <span>Student : <?php echo htmlspecialchars($student)?></span>
            <a href="edit_student_detail.php" class="button">Student Details</a>
            <a href="edit_parent_detail.php" class="button2">Parent Details</a>
            <a href="edit_sibling_details.php" class="button2">Sibling Details</a>
        </div>

</div>
</body>
</html>



