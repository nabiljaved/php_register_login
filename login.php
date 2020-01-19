<?php
 session_start();
 	if(isset($_SESSION['u_id'])){
    header("location: account.php?wellcome");
 }
 ?>

<?php require_once('header.php')?>



	<div class="container">

		<div class="row">
			
			<div class="col-lg-6 m-auto">
					<div class="card bg-light mt-5">
							
						<div class="card-title bg-primary text-white mt-5">
							
							<h3 class="text-center py-2">Login Form</h3>

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

						
						<!--invalid user-->
						
						<?php
							if(isset($_GET['u_invalid']))
							{
								$message = $_GET['u_invalid'];
								$message = "Invalid User"; 		
						?>
								<div class="alert alert-danger text-center my-0"><?php echo $message?></div>	
						<?php
							}
						?>

						
						<!--invalid password-->
						
						<?php
							if(isset($_GET['p_invalid']))
							{
								$message = $_GET['p_invalid'];
								$message = "Invalid Password"; 		
						?>
								<div class="alert alert-danger text-center my-0"><?php echo $message?></div>	
						<?php
							}
						?>


						<div class="card-body">
							 <form action="includes/check_login.php" method="POST">
								<input type="text" name="username" placeholder="Enter user name" class="form-control my-2">
								<input type="password" name="password" placeholder="Password" class="form-control my-3">
								<button class="btn btn-success" name="login" class="pt-3">Login</button>
							 </form>
						</div>

					</div>
			</div>

		</div>

	</div>




<?php require_once('footer.php'); ?>