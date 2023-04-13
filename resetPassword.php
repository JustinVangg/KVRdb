<?php  
    /*
        // PHP Data Objects(PDO) Sample Code:
        try {
            $conn = new PDO("sqlsrv:server = tcp:konnectvr-db.database.windows.net,1433; Database = konnectVR-Data", "konnectVR", "TZeu4kAmTK2BWPS");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //print("connected to the server!". "<br>");
        }
        catch (PDOException $e) {
            print("Error connecting to SQL Server.");
            die(print_r($e));
        }

        $email = $_POST["emailPost"];
        $password = $_POST["passwordPost"];

        try {
            $sql = "SELECT * FROM loginData WHERE email = '". $email ."'";
            $temp = $conn -> query($sql);//Grab inforamtion based on above query statement
            $loginResult = $temp->fetch(PDO::FETCH_ASSOC);//Sort rows into arrays
            //$loginResult-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if($password == $loginResult['password']){//Check array against entered info
                print("Password Reset Link has been sent to Email!!!");
            } else {
                print("Error finding Email in database!");
            }
        }

       catch(PDOException $e){
            print("Error finding Email in database.");
            die(print_r($e));
        }
    */
    session_start();

    if(isset($_POST["CPass"]))
    {
        $CPass = $_POST["CPass"];
        $NPass = $_POST["NPass"];
    
        if(strcmp($CPass, $NPass) != 0)
        {echo "<b>Passwords are not the same. Try again.</b><br><br>";}
        else
        {$_SESSION['Cpass'] = $CPass; header('Location: https://kvrdbconnection.azurewebsites.net/response.php'); exit();}
    }

?>

<html>

    <form action="ResetPassword.php" method="post">
        <label for="NPass">New Password:</label><br>
        <input type="password" id="NPass" name="NPass" value=""><br>
        <label for="CPass">Confirm Password:</label><br>
        <input type="password" id="CPass" name="CPass" value=""><br><br>
        <input type="submit" value="Submit">
    </form>


</html>