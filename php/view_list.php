<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/main.css">

    <title>View Student list</title>


    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
    <script type="text/javascript">

    </script>

</head>
<header>
    <p ALIGN="RIGHT"> Logged in as: <?php echo $NAME;?> <a href="login.php" id="logout">(logout)</a></p>

    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <span class="avatar"><img src="../img/logo.jpg" alt="" /></span>

</header>
<body>
<div class="main-content">

    <form class="form-basic">

        <div class="form-title-row">
            <h1>Student List</h1>
        </div>


        <table border="=1" cellpadding="10" width="50%" >

            <tr>
                <th>Student_ID</th>
                <th>First Name</th>
                <th>Last Name</th>

            </tr>

            <tbody>


            <?php
            include_once "../inc/student_list.php";
            if(isset($_GET["submit"])) {

                $class = $_GET['class1'];
                $split_class = explode(" ", $class);

                $class_id = $split_class[13];

                $result = operationInsert($class_id);

                if($result){
                    while ($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>".$row['ID']."</td>";
                        echo "<td>".$row['FirstName']."</td>";
                        echo "<td>".$row['LastName']."</td>";


                    }

                }

            }

            ?>

            </tbody>

        </table>

    </form>
</div>

</body>
<a href="main_teacher_window.php">Go Back to Home</a>
</html>


