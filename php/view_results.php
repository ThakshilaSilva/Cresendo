<?php
#include "connect.php";
#$con = connect();
include "../inc/view_results_admin.php";
?>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Results</title>

    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

</head>
<header>
    <h1>CRESCENDO MUSIC ACADEMY</h1>

</header>

<body>
<div class="main-content">

    <form class="form-basic">

        <div class="form-title-row">
            <h1>Results</h1>
        </div>


        <table border="=1" cellpadding="10" width="50%" >

            <tr>
                <th>Student_ID</th>
                <th>Grade</th>
            </tr>

            <tbody>


            <?php

            $arr=operationResults();
            $result=$arr[1];

            if($result){
                while ($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>".$row['Student_id']."</td>";
                    echo "<td>".$row['Grade']."</td>";
                }
            }



            ?>

            </tbody>

        </table>

    </form>
</div>

</body>






