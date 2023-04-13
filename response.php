<?php
    session_start();
    /*SQL connection here*/
?>
<html>
    <body>
        <h1>Password updated!!</h1>
        <p>
        <?php
            echo $_SESSION['Cpass']; 
            echo "<br><br> This is an obivous security flaw. Will not exist in final release.";
        ?>
        </p>
    </body>
</html>