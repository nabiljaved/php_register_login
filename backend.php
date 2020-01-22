<?php

$conn = mysqli_connect('localhost','root',"",'youtubecrudoperation');

extract($_POST);

if(isset($_POST['readrecords'])){

	$data =  '<table class="table table-bordered table-striped ">
						<tr class="bg-dark text-white">
							<th>No.</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email Address</th>
							<th>Mobile Number </th> 
							<th>Edit Action</th>
							<th>Delete Action</th>
						</tr>'; 

	$displayquery = " SELECT * FROM crudtable "; 
	$result = mysqli_query($conn,$displayquery);

	if(mysqli_num_rows($result) > 0){

		$number = 1;
		while ($row = mysqli_fetch_array($result)) {
			
			$data .=
			 '<tr>  
				<td>'.$number.'</td>
				<td>'.$row['firstname'].'</td>
				<td>'.$row['lastname'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['mobile'].'</td>
				<td>
					<button onclick="GetUserDetails('.$row['id'].')" class="btn btn-success">Edit</button>
				</td>
				<td>
					<button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
				</td>
    		</tr>';
    		$number++;

		}
	} 
	 $data .= '</table>';
    	echo $data;

}

//adding records in database
if(isset($_POST['firstname']) &&  isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobile']) )
	{
		$query = " INSERT INTO `insertdata`( `firstname`, `lastname`, `email`, `mobile`) VALUES('$firstname', '$lastname', '$email', '$mobile' )   ";

		if($result = mysqli_query($conn,$query)){
			exit(mysqli_error());
		}else{
			echo "1 record added";
		}


	}

	// pass id on modal
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    $user_id = $_POST['id'];
    $query = "SELECT * FROM crudtable WHERE id = '$user_id'";
    if (!$result = mysqli_query($conn,$query)) {
        exit(mysqli_error());
    }
    
    $response = array();

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
       
            $response = $row;
        }
    }
  //  // agar ek bhi value nai milta hai tho data not found no. of rows 0 hai tho
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
   //     PHP has some built-in functions to handle JSON.
// Objects in PHP can be converted into JSON by using the PHP function json_encode(): 

    echo json_encode($response);
}
// ye top wala id jo humhe mil raha hai uska hai jaha wo id check karega sahi hai ya nai agar nai tho invalid req boldega...
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}
//////////////// update table//////////////

if(isset($_POST['hidden_user_id']))
{
    // get values
    $hidden_user_id = $_POST['hidden_user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $mobile = $_POST['mpbile'];
    $query = "UPDATE user SET firstname = '$firstname', lastname = '$lastname', email = '$email', mobile = '$mobile'  WHERE id = '$hidden_user_id'";
    if (!$result = mysqli_query($conn,$query)) {
        exit(mysqli_error());
    }
}
/////////////Delete user record /////////

if(isset($_POST['deleteid']))
{

	$user_id = $_POST['deleteid']; 

	$deletequery = " delete from crudtable where id ='$user_id' ";
	if (!$result = mysqli_query($conn,$deletequery)) {
        exit(mysqli_error());

}

}

?>











<?php

$conn = mysqli_connect( 'localhost','root',"",'youtubecrudoperation' );	

//adding records

extract($_POST);

if(isset($_POST['readrecord'])){

	$data =  '<table class="table table-bordered table-striped">
						<tr>
							<th>No.</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email Address</th>
							<th>Mobile Number </th> 
							<th>Edit Action</th>
							<th>Delete Action</th>
						</tr>'; 

	$displayquery = " SELECT * FROM `crudtable` "; 
	$result = mysqli_query($conn,$displayquery);

	if(mysqli_num_rows($result) > 0){

		$number = 1;
		while ($row = mysqli_fetch_array($result)) {
			
			$data .= '<tr>  
				<td>'.$number.'</td>
				<td>'.$row['firstname'].'</td>
				<td>'.$row['lastname'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['mobile'].'</td>
				<td>
					<button onclick="UpdateUserDetails('.$row['id'].')" class="btn btn-warning">Edit</button>
				</td>
				<td>
					<button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
				</td>
    		</tr>';
    		$number++;

		}
	} 
	 $data .= '</table>';
    	echo $data;

}

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobile']) )
{
	$query = "  INSERT INTO `crudtable`(`firstname`, `lastname`, `email`, `mobile`) VALUES ('$firstname', '$lastname', '$email', '$mobile') ";
	mysqli_query($conn,$query);

}


///delete user record

if(isset($_POST['deleteid'])){

	$userid= $_POST['deleteid'];
	$deletequery = " delete from crudtable where id='$userid' ";
	mysqli_query($conn,$deletequery);
}


/// get userid for update
if(isset($_POST['id']))
{
    $user_id = $_POST['id'];
    $query = "SELECT * FROM crudtable WHERE id = '$user_id'";
    if (!$result = mysqli_query($conn,$query)) {
        exit(mysqli_error());
    }
    
    $response = array();

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
       
            $response[] = $row;
        }

	  
    }else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
  //     PHP has some built-in functions to handle JSON.
// Objects in PHP can be converted into JSON by using the PHP function json_encode(): 
    
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}


///update table

if(isset($_POST['hidden_user_idupd'])){

	$hidden_user_idupd = $_POST['hidden_user_idupd'];
	$firstnameupd = $_POST['firstnameupd'];
	$lastnameupd = $_POST['lastnameupd'];
    $emailupd = $_POST['emailupd'];
    $mobileupd = $_POST['mobileupd'];

    $query = " UPDATE crudtable SET `firstname`='$firstnameupd',`lastname`='$lastnameupd',`email`='$emailupd',`mobile`='$mobileupd' WHERE id = '$hidden_user_idupd' ";
     if (!$result = mysqli_query($conn,$query)) {
        exit(mysqli_error());
    }
}


?>