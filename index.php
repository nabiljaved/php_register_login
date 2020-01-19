<?php
 session_start();
 	if(isset($_SESSION['u_id'])){
    header("location: account.php?wellcome");
 }
 ?>

<?php require_once('header.php'); ?>
 
    <h4 class="display-4 text-center mt-5">Home Page</h4>
 
<?php require_once('footer.php'); ?>