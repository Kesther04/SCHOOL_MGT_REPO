<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_school.css" media="all">
    <link rel="stylesheet" href="admin_school_three.css" media="all">
    <link rel="stylesheet" href="admin_school_sev.css" media="all">
    <link rel="stylesheet" href="scratch_card.css" media="all">
    <title>SCRATCH CARD</title>
</head>

<body>
    <?php  require("admin_dashboard_layout.php");  ?>

    <section class="main-div-container" >

        <?php 
        require("school_database_connection.php");
        $select = $con->query("SELECT * FROM pin_table");
        if ($select) {    
        ?>
        <div style="float:left;">
        <?php 
        while ($row=$select->fetch_assoc()) {

        
        ?>
        <div class="front-card">
            <img src="pic/logo.png">
            <div style="float:left;text-indent:10px;">
            <p>STUDENT RESULT CARD</p>

            <p style="margin-top:50px;">Contacts:08103416893,08080530968</p>
            </div>
            <img src="pic/qr.webp" width="150" style="float:right;">
        </div>

        <div class="back-card">

        <div class="inner-b-card">
            <img src="pic/logo2.png" width="60" style="float:left;"><h1>BRITISH SPRING COLLEGE</h1>
        </div>

        <div class="next-inner-b-card">
            <p>How to Use this Card:</p>
            <span><i>(scratch off the covered area to obtain your secret PIN)</i></span>
            <ol>
                <li>visit the school portal(www.britishschool.org) and go to check result.</li>
                <li>fill in your credentials including your pin</li>
                <li>Click Check Result</li>
            </ol>
            <p style="text-align:center;margin-top:20px;">PIN:<?php echo $row['STUDENT_PIN']; ?></p>
        </div>
        
        </div>
        <?php  } ?>
        </div>
        
        <?php } ?>
    
    </section>
</body>

</html>