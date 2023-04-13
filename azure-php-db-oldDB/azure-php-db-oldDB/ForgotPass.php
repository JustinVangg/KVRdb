<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    //Connect to database
    try 
    {
        $conn = new PDO("sqlsrv:server = tcp:konnectvr-db.database.windows.net,1433; Database = konnectVR-Data", "konnectVR", "TZeu4kAmTK2BWPS");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //print("connected to the server!". "<br>");
    }

    catch (PDOException $e) 
    {
        print("Error connecting to SQL Server.");
        die(print_r($e));
    }

    //$email = $_POST["emailPost"];
    
    /*function EmailTesting()
    {
        try
        {
            $temp = $_POST['email'];
            $to = substr($temp, 0, -3);//Have found that there are three extra characters when sending emails at end of string via POST. This removes those characters
            //(Extra characters were consistenly 'a??' for some reason)
            //$subject = "Password Recovery for KVR";
            $subject = "Testing email";
            if($to != null)
            {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';//Server emails are sent from
                $mail->SMTPAuth = true;
                $mail->Username = 'kvrtesting02@gmail.com';//Email address that sends the email
                    $mail->Password = 'wazngfpibmkeroch';//App password for the gmail account
                $mail->SMTPSecure = 'tls';
                $mail->SMTPOptions = array('ssl' => array(//Needed to connect to server, however this in of itself is a security flaw
                                                            'verify_peer'=>false,
                                                            'verify_peer_name'=>false,
                                                            'allow_self_signed'=>true
                                                        )
                                          );
                $mail->Port = 587;
                $mail->setFrom('kvrtesting02@gmail.com');
                $mail->addAddress($to);
                $mail->isHTML(true);
                $mail->Subject = $subject;
                //$to = $result['Email'];
                $message = "This email came from an azure web application!";
                $mail->Body = $message;
                $mail->send();
                print ("Email sent!!!");

                /*$sql = "SELECT * FROM loginData WHERE email = '". $email ."'";
                $temp = $conn -> query($sql);//Grab inforamtion based on above query statement
                $result = $temp -> fetch(PDO::FETCH_ASSOC);//Sort rows into arrays

                if($email != $result['email'])
                {print("Incorrect username and/or email. Try again   ");}
                else
                {
                    $to = $result['Email'];
                    $message = 'Your password is: '.$result['Password'];
                    $mail->Body = $message;
                    $mail->send();
                    print ("Email sent!!!");
                }
            }
        }
        
        catch(PDOException $e)
        {
            print ("Error in processing request:");
            die(print_r($e));
        }
    }
    */

    try
        {
            $temp = $_POST["passwordResetEmailPost"];
            //$verificationCode = $_POST["verificationCodePost"];
            $to = $temp; //substr($temp, 0, -3);//Have found that there are three extra characters when sending emails at end of string via POST. This removes those characters
            //(Extra characters were consistenly 'a??' for some reason)
            //$subject = "Password Recovery for KVR";
            $subject = "Password reset email from KonnectVR";
            if($to != null)
            {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';//Server emails are sent from
                $mail->SMTPAuth = true;
                $mail->Username = 'kvrtesting02@gmail.com';//Email address that sends the email
                    $mail->Password = 'wazngfpibmkeroch';//App password for the gmail account
                $mail->SMTPSecure = 'tls';
                $mail->SMTPOptions = array('ssl' => array(//Needed to connect to server, however this in of itself is a security flaw
                                                            'verify_peer'=>false,
                                                            'verify_peer_name'=>false,
                                                            'allow_self_signed'=>true
                                                        )
                                          );
                $mail->Port = 587;
                $mail->setFrom('kvrtesting02@gmail.com');
                $mail->addAddress($to);
                $mail->isHTML(true);
                $mail->Subject = $subject;
                //$to = $result['Email'];
                $message = "This is your password reset email. <br/> Follow the link: https://kvrdbconnection.azurewebsites.net/resetPassword.php";
                $mail->Body = $message;
                $mail->send();
                print ("Password reset link sent to: $to");


                /*$sql = "SELECT * FROM loginData WHERE email = '". $email ."'";
                $temp = $conn -> query($sql);//Grab inforamtion based on above query statement
                $result = $temp -> fetch(PDO::FETCH_ASSOC);//Sort rows into arrays

                if($email != $result['email'])
                {print("Incorrect username and/or email. Try again   ");}
                else
                {
                    $to = $result['Email'];
                    $message = 'Your password is: '.$result['Password'];
                    $mail->Body = $message;
                    $mail->send();
                    print ("Email sent!!!");
                }*/
            }
        }

        catch(PDOException $e)
        {
            print ("Error in processing request:");
            die(print_r($e));
        }



    //Corrosponding C# code
    /*public void ForgotPassword()
    {
        StartCoroutine(ForgotPassword(username.text, email.text));
    }
    IEnumerator ForgotPassword(string username, string email)
    {
        WWWForm form = new WWWForm();
        form.AddField("User", username);
        form.AddField("Email", email);

        using (UnityWebRequest www = UnityWebRequest.Post("http://localhost/KonnectVR/ForgotPass.php", form))
        {
            yield return www.SendWebRequest();

            if (www.result != UnityWebRequest.Result.Success)
            {
                Debug.Log(www.error);
            }
            else
            {
                String.text = www.downloadHandler.text;//Assign to public text field so users can see in their HUD
            }
        }
    }*/
?>