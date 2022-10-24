<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_school.css" media="all">
    <link rel="stylesheet" href="admin_school_three.css" media="all">
    <link rel="stylesheet" href="admin_school_sev.css" media="all">
    <title>SCRATCH CARD</title>
</head>

<body>
    <?php  require("admin_dashboard_layout.php");  ?>

    <section class="main-div-container"  >

        <?php 
        require("school_database_connection.php");
        $select = $con->query("SELECT * FROM result_checks GROUP BY PIN ");
        if ($select) {    
        ?>
        <div class="mic-div-con">
            <h1>USED SCRATCH CARDS</h1>
        <table>
            <tr>
                <td>STUDENT_NAME</td>
                <td>CLASS</td>
                <td>REG_NO</td>
                <td>PIN_USED</td>
                <td>SESSION_YEAR</td>
            </tr>
        <?php while ($row=$select->fetch_assoc()) { ?>
        
            <tr>
                <td><?php echo $row['STUDENT_NAME'];  ?></td>
                <td><?php echo $row['CLASS'];  ?></td>
                <td><?php echo $row['REG_NO'];  ?></td>
                <td><?php echo $row['PIN'];?></td>
                <td><?php echo $row['SESSION_YEAR'];  ?></td>
            </tr>
        
        <?php  } ?>
        </table>
        </div>
        
        <?php } ?>
    
    </section>
</body>

</html>