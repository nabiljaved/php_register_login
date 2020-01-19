<?php
    session_start();
 	if(isset($_SESSION['u_id'])){
    header("location: account.php?wellcome");
 }
 ?>

<?php require_once('header.php')?>

<?php

    if(isset($_SESSION['u_id']))
    {
        header('account.php?wellcome');
               
    }

?>
		

<div class="container">

		<div class="row">
			
			<div class="col-lg-6 m-auto">
					<div class="card bg-light mt-5">
							
						<div class="card-title bg-primary text-white mt-5">
							
							<h3 class="text-center py-2">Sign Up Form</h3>

						</div>

						<!--display empty fields-->

						<?php

							if(isset($_GET['empty']))
							{
								$message = $_GET['empty'];
								$message = "please fill in the blanks"; 
								
						?>

								<div class="alert alert-danger text-center my-0"><?php echo $message?></div>
								
						<?php

							}

						?>

						<!--display invalid -->

						<?php

							if(isset($_GET['Invalid']))
							{
								$message = $_GET['Invalid'];
								$message = "Invalid Characters"; 	
							?>
								<div class="alert alert-danger text-center my-0"><?php echo $message?></div>
							<?php
								}
							?>

							<!--display invalid Email -->
							
						<?php

							if(isset($_GET['Email-Invalid']))
							{
								$message = $_GET['Email-Invalid'];
								$message = "Please Enter Valid Email"; 	
							?>
								<div class="alert alert-danger text-center my-0"><?php echo $message?></div>
							<?php
								}
							?>

							
						<!--display if user alreay exist-->
														
						<?php

							if(isset($_GET['User-Exist']))
							{
								$message = $_GET['User-Exist'];
								$message = "User ALready Taken"; 	
							?>
								<div class="alert alert-danger text-center my-0"><?php echo $message?></div>
							<?php
								}
							?>

								
						<!--display if email is alreay exist-->
														
					<?php

						if(isset($_GET['Email-Taken']))
						{
							$message = $_GET['Email-Taken'];
							$message = "Email ALready Taken"; 	
						?>
							<div class="alert alert-danger text-center my-0"><?php echo $message?></div>
						<?php
							}
						?>	
								
						<!--display if length of password is less then 8-->
														
					<?php

						if(isset($_GET['password']))
					{
							$message = $_GET['password'];
							$message = "Length of password is less then 8"; 	
					?>
						<div class="alert alert-danger text-center my-0"><?php echo $message?></div>
					<?php

					}

					?>
				
				<!--display if login is successfull-->
														
				<?php
					
					if(isset($_GET['success']))
				{
						$message = $_GET['success'];
						$message = "you have successfully sign up"; 	
				?>
					<div class="alert alert-success text-center my-0"><?php echo $message?></div>
				<?php

				}

				?>


						<div class="card-body">
							 <form action="includes/check_sign_up.php" method="POST">
								<input type="text" name="firstname" placeholder="First Name" class="form-control my-2">
								<input type="text" name="lastname" placeholder="Last Name" class="form-control my-3">
								<input type="text" name="email" placeholder="Email" class="form-control my-3">
								<input type="text" name="username" placeholder="User Name" class="form-control my-3">
								<input type="password" name="password" placeholder="Password" class="form-control my-3">
								<button class="btn btn-success" name="signup" class="pt-3">Sign Up</button>
							 </form>
						</div>

					</div>
			</div>

		</div>

	</div>




<?php require_once('footer.php'); ?>