<?php

$conn = mysqli_connect('localhost','root',"",'youtubecrudoperation');

//it will extract all variables which you can pass with '$firstname' quotations
extract($_POST);

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobile']) )
{
	$query = " INSERT INTO `crudtable`(`firstname`, `lastname`, `email`, `mobile`) VALUES ( '$firstname',  '$lastname', '$email', '$mobile'  ) ";
	mysqli_query($conn,$query);

}

?>