
    <?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('location:../../login/school_admin_login.php');
    }
    ?>
    <button id="first-insider" onclick="rap()">
    <div></div>
    <div></div>
    <div></div>
    </button>
    
    
    <button id="second-insider" onclick="pat()">
    <div></div>
    <div></div>
    <div></div>
    </button>
    
    <script src="dash.js"></script>

    <div id="main-sean">

    <div class="dashboard">
        <h1>DASHBOARD</h1>
        <div class="dash-b"><a href="../../index.php" target="blank">HOME</a></div> 
        <div class="dash-b"><a href="../s_reg/admin_school_system.php">STUDENT REGISTRATION</a></div>
        <div class="dash-b"><a href="../jup/admin_junior_result_system.php">JUNIOR RESULT UPLOAD</a></div>
        <div class="dash-b"><a href="../sup/admin_result_system.php">SENIOR RESULT UPLOAD</a></div>
        <div class="dash-b"><a href="../res_chk/result_form.php">CHECK RESULT</a></div>
        <div class="dash-b"><a href="../pin/backend_pin.php">MANUAL PIN GENERATION</a></div>
        <div class="dash-b"><a href="../scratch_card/scratch_card.php">SCRATCH CARD PRINT-OUT</a></div>
        <div class="dash-b"><a href="../scratch_card_u/scratch_card_used.php">USED SCRATCH CARD</a></div>
        <div class="dash-b"><a href="../res_gen/classform.php">GENERATE RESULT</a></div>
        <div class="dash-b"><button onclick="if(window.confirm('Are you sure want to log out of this page')){window.location='../../login/school_admin_login.php';}">LOG OUT</button></div>
        
    </div>
    </div>
