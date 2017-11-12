<?php
    session_start();
    $id=$_SESSION['id'];
    include '../inc/get_student_detials.php';
    $details=getdetails($id);
    $_SESSION['tp1']=$details[7];
    $_SESSION['tp2']=$details[8];

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

</head>

<header>
    <h1>CRESCENDO MUSIC ACADEMY</h1>

</header>

<div class="main-content">

        <form class="form-basic" method="get" action="edit_profile_message.php">
            <div class="form-row">
                <span>Student ID: <?php echo htmlspecialchars($id)?></span>
            </div>
            <div class="form-row">
                <label>
                    <span>First Name</span>
                    <input type="text" name="fname" value="<?php echo htmlspecialchars($details[0])?>" oninvalid="this.setCustomValidity('First name required!')" required oninput="setCustomValidity('')">
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Last Name</span>
                    <input type="text" name="lname" value="<?php echo htmlspecialchars($details[1])?>"oninvalid="this.setCustomValidity('Last name required!')" required oninput="setCustomValidity('')">
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Date of Birth</span>
                    <input type="date" name="date" value="<?php echo htmlspecialchars($details[2])?>"oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Address</span>
                    <input type="text" name="address" value="<?php echo htmlspecialchars($details[3])?>"oninvalid="this.setCustomValidity('Last name required!')" required oninput="setCustomValidity('')">
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Province</span>
                    <input type="text" name="province" value="<?php echo htmlspecialchars($details[4])?>" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>City</span>
                    <input type="text" name="city" value="<?php echo htmlspecialchars($details[5])?>" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
                </label>
            </div>


            <div class="form-row">
                <label>
                    <span>Gender</span>
                    <select name="gender" id="gender" >
                        <option value="M"<?php if($details[6]=='M'):?>selected="selected"<?php endif;?>>Male</option>
                        <option value="F"<?php if($details[6]=='F'):?>selected="selected"<?php endif;?>>Female</option>
                    </select>
                </label>

            </div>


            <div class="form-row">
                <label>
                    <span>Contact No -1</span>
                    <input type="text" name="mobile1" value="<?php echo htmlspecialchars($details[7])?>" >
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Contact No -2</span>
                    <input type="text" name="mobile2" value="<?php echo htmlspecialchars($details[8])?>">
                </label>
            </div>

            <div class="form-row">
                <button type="submit" name="save1">Save Changes</button>
            </div>
        </form>

</div>
</body>
</html>

