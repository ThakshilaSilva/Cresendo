<?php
    session_start();
    $id=$_SESSION['id'];
    include '../Inc/get_parent_details.php';
    $details=get_parent_details($id);
    $_SESSION['ptp1']=$details[6];
    $_SESSION['ptp2']=$details[7];
    $_SESSION['p_id']=$details[8];
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
</head>

<header>
    <p ALIGN="RIGHT"> Logged in as: <?php echo $NAME;?> <a href="login.php" id="logout">(logout)</a></p>
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>

</header>

<div class="main-content">

    <form class="form-basic" method="get" action="edit_profile_message.php">
        <div class="form-row">
            <span>Student ID: <?php echo htmlspecialchars($id)?></span>

        </div>
        <span>Edit Parent Details</span>
        <div class="form-row">
            <label>
                <span>First Name</span>
                <input type="text" name="pfname" value="<?php echo htmlspecialchars($details[0])?>" oninvalid="this.setCustomValidity('First name required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Last Name</span>
                <input type="text" name="plname" value="<?php echo htmlspecialchars($details[1])?>"oninvalid="this.setCustomValidity('Last name required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Relation</span>
                <select name="prelation" >
                    <option value="Father"<?php if($details[2]=='Father'):?>selected="selected"<?php endif;?>>Father</option>
                    <option value="Mother"<?php if($details[2]=='Mother'):?>selected="selected"<?php endif;?>>Mother</option>
                    <option value="Guardian"<?php if($details[2]=='Guardian'):?>selected="selected"<?php endif;?>>Guardian</option>
                </select>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Address</span>
                <input type="text" name="paddress" value="<?php echo htmlspecialchars($details[3])?>"oninvalid="this.setCustomValidity('Last name required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Province</span>
                <input type="text" name="pprovince" value="<?php echo htmlspecialchars($details[4])?>" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>City</span>
                <input type="text" name="pcity" value="<?php echo htmlspecialchars($details[5])?>" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>


        <div class="form-row">
            <label>
                <span>Contact No -1</span>
                <input type="text" name="pmobile1" value="<?php echo htmlspecialchars($details[6])?>" >
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Contact No -2</span>
                <input type="text" name="pmobile2" value="<?php echo htmlspecialchars($details[7])?>">
            </label>
        </div>

        <div class="form-row">
            <button type="submit" name="save2">Save Changes</button>
        </div>
    </form>

</div>
</body>
</html>

