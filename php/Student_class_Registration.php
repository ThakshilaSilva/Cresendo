<?php
include "../inc/Student_class_registration.php";
session_start();
$TYPE=$_SESSION['TYPE'];
$USER=$_SESSION['USER'];
$PASS=$_SESSION['PASS'];
$NAME=$_SESSION['NAME'];

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />


    <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-ui.js"></script>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>

    <script type="text/javascript">
        $(function() {

            //autocomplete
            $(".auto1").autocomplete({
                source: "../inc/search_student.php",
                minLength: 1
            });

        });
    </script>


    <script type="text/javascript">
        $(function() {

            //autocomplete
            $(".auto2").autocomplete({
                source: "../inc/search_class.php",
                minLength: 3
            });

        });
    </script>
</head>

<header>
    <p align="left"><a href="main_admin_window.php" id="logout">[back]</a></p>
    <p ALIGN="RIGHT"> Logged in as: <?php echo $NAME;?> <a href="login.php" id="logout">(logout)</a></p>
    <h1>CRESCENDO MUSIC ACADEMY</h1>

</header>

<body>
<div class="main-content">


    <form class="form-details"  method="post" action="#">
        <div class="form-log-in-with-email">

            <div class="form-white-background">
        <div class="form-title-row">
            <h1>Class Registration</h1>
        </div>

        <div class="form-row">
            <label>
                <span>Student Name </span>
                <input type="text" name="name1" class="auto1" required placeholder="Enter Student Name">
            </label>
        </div>



        <div class="form-row">
            <label>
                <span>Class details</span>
                <input type="text" name="class" class="auto2" required placeholder="Enter Instrument Name" >
            </label>
        </div>

        <div class="form-row">
            <button type="submit" name="submit">Register</button>
        </div>

            </div>
        </div>
    </form>


</body>

<?php
if(isset($_POST['submit'])) {

    $name1 = $_POST['name1'];
    $class = $_POST['class'];
    operation($name1,$class);

    #get the student id

}


?>



