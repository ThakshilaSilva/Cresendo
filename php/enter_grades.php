<?php
session_start();
$t_id=$_SESSION['USER'];
$t_name=$_SESSION['NAME'];
$_SESSION['t_id']=$t_id;
$NAME=$_SESSION['NAME'];
if((time()-$_SESSION['LOGIN_TIME'])>1200){
    echo"<script>alert('Session Timed out!')</script>";
    echo "<script>window.open('login.php','_self')</script>";
}

$_SESSION['LOGIN_TIME']=time();
?>

<?php

if(isset($_GET["submit"])) {

    $title = $_GET['ETitle'];
    $class = $_GET['class1'];
    $split_class = explode(" ", $class);
    $class_id = $split_class[13];

    #session_start();
    $_SESSION['class_id']=$class_id;
    $_SESSION['title']=$title;

    #echo $class_id;

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
    <link rel="stylesheet" href="../css/main.css">

    <title>Enter the class</title>


    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(function() {

            //autocomplete
            $(".auto1").autocomplete({
                source: "../Inc/search_class.php",
                minLength: 1
            });
        });
    </script>

</head>
<header>
    <p ALIGN="RIGHT"> Logged in as: <?php echo $NAME;?> <a href="login.php" id="logout">(logout)</a></p>

    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <span class="avatar"><img src="../img/logo.jpg" alt="" /></span>

</header>


<body>
<div class="main-content">


    <form class="form-basic"  method="get" action="enter_grades.php">

        <div class="form-title-row">
            <h1>Enter Results</h1>
        </div>

        <div class="form-row">
            <label>
                <span>Student ID :</span>
                <input type="text" name="s_id" class="auto1" required >
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Marks :</span>
                <input type="number" name="grade" required >
            </label>
        </div>


        <div class="form-row">
            <button type="submit" name="submitMarks">Enter Marks</button>
        </div>


    </form>
</div>



<body>
<?php
/*
session_start();
$TYPE=$_SESSION['TYPE'];
$USER=$_SESSION['USER'];
$PASS=$_SESSION['PASS'];
$NAME=$_SESSION['NAME'];

*/
?>


<?php
    if(isset($_GET["submitMarks"])){

        include "../inc/enter_marks.php";

        #session_start();
        $cl_id=$_SESSION['class_id'];
        $ETitle=$_SESSION['title'];

        $S_ID=$_GET['s_id'];
        $marks=$_GET['grade'];

        operationInsert($S_ID,$marks,$cl_id,$ETitle,$t_id);


}
?>

<a href="main_teacher_window.php">Go Back to Home</a>
</html>
