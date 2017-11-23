<?php
session_start();
$TYPE=$_SESSION['TYPE'];
$USER=$_SESSION['USER'];
$PASS=$_SESSION['PASS'];
$NAME=$_SESSION['NAME'];


?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

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
                <a href="edit_profile_main.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' name='regbutton' value='Edit Profile'></a>
            </div>

            <div class="form-row">
                <a href="" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='View Profile'></a>
            </div>

            <div class="form-row">
                <a href="" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value=''></a>
            </div>

            <div class="form-row">
                <a href="" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value=''></a>
            </div>

            <div class="form-row">
                <a href="" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value=''></a>
            </div>
            <div class="form-row">
                <a href="" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value=''></a>
            </div>
            <div class="form-row">
                <a href="" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value=''></a>
            </div>
            <div class="form-row">
                <a href="" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value=''></a>
            </div>
            <div class="form-row">
                <a href="" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value=''></a>
            </div>
            <div class="form-row">
                <a href="" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value=''></a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
