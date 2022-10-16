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
        $select = $con->query("SELECT * FROM pin_table WHERE USAGE_AMOUNT > 0 ");
        if ($select) {    
        ?>
        <div class="mic-div-con">
            <h1>USED SCRATCH CARDS</h1>
        <table>
        <?php 
        while ($row=$select->fetch_assoc()) {
 
        ?>
        
            <tr>
                <td><?php echo $row['STUDENT_PIN'];?></td>
            </tr>
        
        <?php  } ?>
        </table>
        </div>
        
        <?php } ?>
    
    </section>
</body>

</html>