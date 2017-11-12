<?php
include "../inc/Teacher_class_Allocation.php";
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
        <title>Allocations</title>

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
                    source: "../inc/search_teacher.php",
                    minLength: 1
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
                <h1>Class Allocation</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Teacher Name :</span>
                    <input type="text" name="name1" class="auto1" required  >
                </label>
            </div>


            <div class="form-row">
                <label>
                    <span>ClassType:</span>
                    <select name="type" value="Group" required>
                        <option>Group</option>
                        <option>Individual</option>
                    </select>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>TimeSlot:</span>
                    <select name="time" value="Slot 2" required>
                        <option>Slot 1</option>
                        <option>Slot 2</option>
                    </select>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Term:</span>
                    <select name="term" value="Term 2" required>
                        <option>Term 1</option>
                        <option>Term 2</option>
                    </select>
                </label>
            </div>


            <div class="form-row">
                <label>
                    <span>Day:</span>
                    <select name="day" value="Monday" required>
                        <option>Monday</option>
                        <option>Tuesday</option>
                        <option>Wednesday</option>
                        <option>Thursday</option>
                        <option>Friday</option>
                    </select>
                </label>
            </div>

            <div class="form-row">
                <button type="submit" name="submit">Allocate</button>
            </div>
                </div>
            </div>


        </form>
    </div>

    </body>

<?php
if(isset($_POST['submit'])) {

    $name1 = $_POST['name1'];
    $type = $_POST['type'];
    $time = $_POST['time'];
    $term = $_POST['term'];
    $day = $_POST['day'];
    $id = substr($name1, strrpos($name1, " ") + 1);


    operation($type, $time, $term, $day, $id,$TYPE);
}
?>