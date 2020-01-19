<?php

session_start();
require_once('connection.php');


    if(isset($_POST['login']))
    {
        if(empty($_POST['username']) || empty($_POST['password']))
        {
            header("location: ../login.php?empty");    
        }else{

            $uname = mysqli_real_escape_string($conn, $_POST['username']);
            $pwd = mysqli_real_escape_string($conn, $_POST['password']);

            $query = "select * from user_login_register where UserName= '".$uname."' or Password = '".$pwd."'";
            $result = mysqli_query($conn, $query);

            if($row = mysqli_fetch_assoc($result))
            {

                $hashpass = password_verify($pwd, $row['Password']);
                if($hashpass == false)
                {
                    header("location: ../login.php?p_invalid");
                    exit();
                }
                else if($hashpass == true)
                {
                    $_SESSION['u_id'] = $row['ID'];
                    $_SESSION['u_fname'] = $row['Fname'];
                    $_SESSION['u_lname'] = $row['Lname'];
                    $_SESSION['u_email'] = $row['Email'];
                    $_SESSION['u_name'] = $row['UserName'];
                    $_SESSION['u_pwd'] = $row['Password'];

                    
                    header("location: ../account.php?wellcome");
                    exit();

                }

                
            }else{

                header("location: ../login.php?u_invalid");
                exit();

            }


        }

    }else{

        header("location: ../login.php");
        exit();

    }


?>