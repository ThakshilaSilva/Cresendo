<?php
session_start();
$TYPE=$_SESSION['TYPE'];
$USER=$_SESSION['USER'];
$PASS=$_SESSION['PASS'];
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

    <title>Main Window</title>

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/clock.css">
    <script type="text/javascript">

        function startTime() {
            var today = new Date();
            var hr = today.getHours();
            var min = today.getMinutes();
            var sec = today.getSeconds();
            ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
            hr = (hr == 0) ? 12 : hr;
            hr = (hr > 12) ? hr - 12 : hr;
            //Add a zero in front of numbers<10
            hr = checkTime(hr);
            min = checkTime(min);
            sec = checkTime(sec);
            document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;

            var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            var curWeekDay = days[today.getDay()];
            var curDay = today.getDate();
            var curMonth = months[today.getMonth()];
            var curYear = today.getFullYear();
            var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
            document.getElementById("date").innerHTML = date;

            var time = setTimeout(function(){ startTime() }, 500);
        }
        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
    </script>







</head>




<body  onload="startTime()">

<header id="header">
    <p ALIGN="RIGHT"> Logged in as: <?php echo $NAME;?> <a href="login.php" id="logout">(logout)</a></p>
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <span class="avatar"><img src="../img/logo.jpg" alt="" /></span>
    <!--  <span class="avatar"><img src="images/avatar.jpg" alt="" /></span> -->
</header>

<!-- You only need this form and the form-login.css -->


<div id="clockdate">
    <div class="clockdate-wrapper">
        <div id="clock"></div>
        <div id="date"></div>
    </div>
</div>



<div class="form-details">

    <div class="form-log-in-with-email">

        <div class="button_list">

            <div class="form-row">
                <a href="register_teacher.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' name='regbutton' value='Register New Teacher'></a>
            </div>

            <div class="form-row">
                <a href="register_student.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Register New Student'></a>
            </div>

            <div class="form-row">
                <a href="Teacher_class_Allocation.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Class Allocation'></a>
            </div>

            <div class="form-row">
                <a href="fee_main.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Fee Payments'></a>
            </div>

            <div class="form-row">
                <a href="Student_class_registration.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Register to Classes'></a>
            </div>
            <div class="form-row">
                <a href="salary_main.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Salary Payments'></a>
            </div>
            <div class="form-row">
                <a href="view_results_admin.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='View Results'></a>
            </div>
            <div class="form-row">
                <a href="edi" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Edit Profile'></a>
            </div>
            <div class="form-row">
                <a href="add_Instrument.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Add Instrument'></a>
            </div>
            <div class="form-row">
                <a href="view_class_details.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='View Class Details'></a>
            </div>
        </div>
    </div>
</div>

        <div class="form-details">

            <div class="form-log-in-with-email">


            <div class="button_list1">

                <div class="form-row">
                    <a href="pay_register_fee.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' name='regbutton' value='Register Fee Payment'></a>
                </div>

                <div class="form-row">
                    <a href="Edit_student_charges.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Edit Student Fee Details'></a>
                </div>

                <div class="form-row">
                    <a href="Edit_teacher_charges.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Edit Teacher Salary Details'></a>
                </div>

                <div class="form-row">
                    <a href="Analysis.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Distribution Analysis'></a>
                </div>

                <div class="form-row">
                    <a href="" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Certificate Generation'></a>
                </div>
                <div class="form-row">
                    <a href="add_building.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Add New Classroom'></a>
                </div>
                <div class="form-row">
                    <a href="view_results_admin.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='View Results'></a>
                </div>
                <div class="form-row">
                    <a href="s_view_details_main.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='View Student Details'></a>
                </div>
                <div class="form-row">
                    <a href="t_view_details_main.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='View Teacher Details'></a>
                </div>
                <div class="form-row">
                    <a href="complete_class.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Complete Class'></a>
                </div>


            </div>
    </div>
</div>




</body>
</html>
