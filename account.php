<?php 

session_start();

require_once('header.php');


if(isset($_GET['wellcome']))
{
   
        if($_SESSION['u_id'])
        {
            echo '<div class="display-4 mt-5 text-center">you have successfully logged in</div>';

        }

}else{

    header("Location : ../login.php?wellcome");
    exit();

}



require_once('footer.php');

?>