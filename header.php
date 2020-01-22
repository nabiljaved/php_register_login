<!DOCTYPE html>
<html>
<head>
	<title>PHP LOGIN AND REGISTRATION SYSTEM</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="public/css/bootstrap.css"> 
    


</head>

<body>

	 <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a href="index.php" class="navbar-brand"><h3>Login System</h3></a>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar ml-auto">

<form>

</form>

                <?php
                 
                    if(isset($_SESSION['u_id']))
                    {

                        echo '
                        
                        <form action="includes/logout.php" method="POST">

                            <li class="nav-item">
                                <button type="submit" name="logout" class="btn btn-outline-light">Logout</button>
                            </li>

						</form>
                        
                        ';
                        
                    }else{

                        echo 
                        '
                        <li class="nav-item"><a href="login.php" class="btn btn-outline-light ml-3">Login</a></li>
                		<li class="nav-item"><a href="signup.php" class="btn btn-outline-light ml-3">sign up</a></li>

                        ';
                    }
            
                    ?>
                	
                </ul>

             </div>

         </div>

      </nav>