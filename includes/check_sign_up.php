<?php
    require_once('connection.php');


    if(isset($_POST['signup']))
    {

        if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password']))
        {
            header("location: ../signup.php?empty");
        }else
        {

            $fname = mysqli_real_escape_string($conn, $_POST['firstname']);
            $lname = mysqli_real_escape_string($conn, $_POST['lastname']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $uname = mysqli_real_escape_string($conn, $_POST['username']);
            $pwd = mysqli_real_escape_string($conn, $_POST['password']);

            $lengthpwd = count($pwd);

            //validation which character is valid or invalid
            
            if(!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname))
            {
                header("location: ../signup.php?Invalid");
                exit();

            }else
            {
                //check if email is valid

                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                {
                    header("location: ../signup.php?Email-Invalid");
                    exit();

                }else{

                    //check if email is already taken

                    $query = "select * from user_login_register where UserName= '".$uname."' ";
                    $result = mysqli_query($conn, $query);

                    if(mysqli_fetch_assoc($result))
                    {
                        header("location: ../signup.php?User-Exist");
                        exit();
                    }else{

                        $query = "select * from user_login_register where Email = '".$email."' ";
                        $result = mysqli_query($conn, $query);
    
                        if(mysqli_fetch_assoc($result))
                        {
                            header("location: ../signup.php?Email-Taken");
                            exit();
                        }else{

                                //check length of password

                                if(strlen($pwd) < 8){

                                    header("location: ../signup.php?password");
                                    exit(); 

                                }else{

                                    //check length of password
                                    $hash_password = password_hash($pwd, PASSWORD_DEFAULT);

                                    $query = "insert into user_login_register (Fname, Lname, Email, UserName, Password) values ('$fname', '$lname', '$email', '$uname', '$hash_password')";
                                    
                                    $result = mysqli_query($conn, $query);
                                    
                                    if($result)
                                    {
                                    
                                        header("location: ../signup.php?success");
                                        exit(); 
                                    }else{

                                        header("location: ../signup.php?unsucessfull");
                                        exit(); 
                                    }

                            }
                        }

                    }

                }
            }

        }

    }else{

        header("location:../index.php");
        exit();
    }

?>