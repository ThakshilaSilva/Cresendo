<?php
    session_start();
    $id=$_SESSION['id'];
    include '../Inc/get_sibling_details.php';
    $details=get_sibling_details($id);
    $detail1=NULL;
    $detail2=NULL;
    if(sizeof($details)==3){
        $detail3=array_slice($details,0,3);
        $detail1=$detail3[0]." ".$detail3[1]." ".$detail1[2];
        $_SESSION['sib_id1']=$detail1[2];
    }else if(sizeof($details)==6){
        $detail4=array_slice($details,0,3);
        $detail5=array_slice($details,3,7);
        $detail1=$detail4[0]." ".$detail4[1]." ".$detail4[2];
        $detail2=$detail5[0]." ".$detail5[1]." ".$detail5[2];
        $_SESSION['sib1']=$detail4[2];
        $_SESSION['sib2']=$detail5[2];
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
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/form-basic.css">
    <link rel="stylesheet" href="../css/new.css">
    <link rel="stylesheet" href="../css/main.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(function() {

            //autocomplete
            $(".auto1").autocomplete({
                source: "../Inc/search_student.php",
                minLength: 1
            });
        });
    </script>

    <script type="text/javascript">
        $(function() {

            //autocomplete
            $(".auto2").autocomplete({
                source: "../Inc/search_student.php",
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

<div class="main-content">

    <form class="form-basic" method="get" action="edit_profile_message.php">
        <div class="form-row">
            <span>Student ID: <?php echo htmlspecialchars($id)?></span>

        </div>
        <span>Edit Sibling Details</span>

        <div class="form-row">
            <label>
                <span>Sibling Detail 1</span>
                <input type="text" name="sib1" value="<?php echo htmlspecialchars($detail1)?>" class="auto1">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Sibling Details 2</span>
                <input type="text" name="sib2" value="<?php echo htmlspecialchars($detail2)?>" class="auto2">
            </label>
        </div>
        <div class="form-row">
            <button type="submit" name="save3">Save Changes</button>
        </div>
    </form>

</div>
</body>
</html>

