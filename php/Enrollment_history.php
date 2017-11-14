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
    <title>Register</title>
    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/charts.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script type="text/javascript">

       // $(document).ready(function(){
            //alert("kk");
            $(".horizontal .progress-fill span").each(function(){
                var percent = $(this).html();
                $(this).parent().css('width', percent);
                alert('winma');
            });


            $(".vertical .progress-fill span").each(function(){
                alert('winma');
                var percent = $(this).html();
                var pTop = 100 - ( percent.slice(0, percent.length - 1) ) + "%";
                $(this).parent().css({
                    'height' : percent,
                    'top' : pTop
                });
            });
        //}


    </script>

</head>

<header>
    <p align="left"><a href="main_admin_window.php" id="logout">[back]</a></p>
    <P ALIGN="RIGHT"> logged in as : <?php  echo $NAME;?> <a href="login.php" id="logout">(logout)</a></P>

    <h1>CRESCENDO MUSIC ACADEMY</h1>
    <span class="avatar"><img src="../img/logo.jpg" alt="" /></span>

</header>
<body>











<!-- Horizontal, rounded -->

<div class="container horizontal rounded">
    <h2>Horizontal, Rounded</h2>
    <div class="progress-bar horizontal">
        <div class="progress-track">
            <div class="progress-fill">
                <span > 100%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar horizontal">
        <div class="progress-track">
            <div class="progress-fill">
                <span>75%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar horizontal">
        <div class="progress-track">
            <div class="progress-fill">
                <span>60%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar horizontal">
        <div class="progress-track">
            <div class="progress-fill">
                <span>20%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar horizontal">
        <div class="progress-track">
            <div class="progress-fill">
                <span>34%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar horizontal">
        <div class="progress-track">
            <div class="progress-fill">
                <span>82%</span>
            </div>
        </div>
    </div>
</div>

<!-- Horizontal, flat -->

<div class="container horizontal flat">
    <h2>Horizontal, Flat</h2>
    <div class="progress-bar horizontal">
        <div class="progress-track">
            <div class="progress-fill">
                <span>100%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar horizontal">
        <div class="progress-track">
            <div class="progress-fill">
                <span>75%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar horizontal">
        <div class="progress-track">
            <div class="progress-fill">
                <span>60%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar horizontal">
        <div class="progress-track">
            <div class="progress-fill">
                <span>20%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar horizontal">
        <div class="progress-track">
            <div class="progress-fill">
                <span>34%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar horizontal">
        <div class="progress-track">
            <div class="progress-fill">
                <span>82%</span>
            </div>
        </div>
    </div>
</div>


<!-- Vertical, rounded -->


<div class="container vertical rounded">
    <h2>Vertical, Rounded</h2>
    <div class="progress-bar">
        <div class="progress-track">
            <div class="progress-fill">
                <span>100%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar">
        <div class="progress-track">
            <div class="progress-fill">
                <span>75%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar">
        <div class="progress-track">
            <div class="progress-fill">
                <span>60%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar">
        <div class="progress-track">
            <div class="progress-fill">
                <span>20%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar">
        <div class="progress-track">
            <div class="progress-fill">
                <span>34%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar">
        <div class="progress-track">
            <div class="progress-fill">
                <span>82%</span>
            </div>
        </div>
    </div>
</div>


<!-- Vertical, flat -->


<div class="container vertical flat">
    <h2>Vertical, Flat</h2>
    <div class="progress-bar">
        <div class="progress-track">
            <div class="progress-fill">
                <span>100%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar">
        <div class="progress-track">
            <div class="progress-fill">
                <span>75%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar">
        <div class="progress-track">
            <div class="progress-fill">
                <span>60%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar">
        <div class="progress-track">
            <div class="progress-fill">
                <span>20%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar">
        <div class="progress-track">
            <div class="progress-fill">
                <span>34%</span>
            </div>
        </div>
    </div>

    <div class="progress-bar">
        <div class="progress-track">
            <div class="progress-fill">
                <span>82%</span>
            </div>
        </div>
    </div>
</div>
</body>
</html>