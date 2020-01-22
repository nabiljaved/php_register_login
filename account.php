<?php 

session_start();
require_once('header.php');
?>




<div class="container">
	<h1 class="text-primary text-uppercase text-center"> AJAX CRUD OPERATION PHP - 2020</h1>

	<div class="d-flex justify-content-end">
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"> add record </button>
	</div>

	<h2 class="text-danger">All Records </h2>
	<div id="records_contant">
	</div>

	<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">AJAX CRUD OPERATION</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
        	<label> Firstname:</label>
        	<input type="text" name="" id="firstname" class="form-control" placeholder="First Name">
        </div>
        <div class="form-group">
        	<label> Lastname:</label>
        	<input type="text" name="" id="lastname" class="form-control" placeholder="Last Name">
        </div>

        <div class="form-group">
        	<label> Email Id:</label>
        	<input type="email" name="" id="email" class="form-control" placeholder="Email">
        </div>

        <div class="form-group">
        	<label> Mobile:</label>
        	<input type="text" name="" id="mobile" class="form-control" placeholder="Mobile Number">
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="addRecord()">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- Update Modal -->

<div class="modal fade" id="update_user_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">AJAX CRUD OPERATION</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
          <label for="update_firstname"> Firstname:</label>
          <input type="text" name="" id="update_firstname" class="form-control">
        </div>
        <div class="form-group">
          <label for="update_lastname"> Lastname:</label>
          <input type="text" name="" id="update_lastname" class="form-control">
        </div>

        <div class="form-group">
          <label for="update_email">Email :</label>
          <input type="email" name="" id="update_email" class="form-control">
        </div>

        <div class="form-group">
          <label for="update_mobile"> Mobile:</label>
          <input type="text" name="" id="update_mobile" class="form-control">
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Update</button>
                  <input type="hidden" id="hidden_user_id">

      </div>

    </div>
  </div>
</div>


</div>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
 -->
  <script type="text/javascript">

    window.onload = function() {
    readRecords();
}


  	function addRecord(){
  		var firstname = $('#firstname').val();
  		var lastname = $('#lastname').val();
  		var email = $('#email').val();
  		var mobile = $('#mobile').val();

  		$.ajax({
  			url:"backend1.php",
  			type:'post',
  			data: { firstname :firstname,
  				lastname : lastname,
  				email : email,
  				mobile : mobile
  			 },

  			 success:function(data,status){
  			 	readRecords();
  			 }

  		});
  	}	



//////////////////Display Records
  function readRecords(){
    
    var readrecords = "readrecords";

    $.ajax({
      url:"backend.php",
      type:"POST",
      data:{readrecords:readrecords},
      success:function(data,status){
        $('#records_contant').html(data);
      },

    });
  }


/////////////delete userdetails ////////////
function DeleteUser(deleteid){

  var conf = confirm("are u sure");
  if(conf == true) {
  $.ajax({
    url:"backend.php",
    type:'POST',
    data: {  deleteid : deleteid},

    success:function(data, status){
      readRecords();
    }
  });
  }
}


function GetUserDetails(id){
    $("#hidden_user_id").val(id);
    $.post("backend.php", {
            id: id
        },
        function (data, status) {
            //alert(data);
            //console.log(data);
            //JSON.parse() parses a string, written in JSON format, and returns a JavaScript object.
            var user = JSON.parse(data);
            //alert(user);

            $("#update_firstname").val(user.firstname);
            $("#update_lastname").val(user.lastname);
            $("#update_email").val(user.email);
            $("#update_mobile").val(user.mobile);
        }
    );
    $("#update_user_modal").modal("show");
}




function UpdateUserDetails() {
    var firstnameupd = $("#update_firstname").val();
    var lastnameupd = $("#update_lastname").val();
    var emailupd = $("#update_email").val();
    var mobileupd = $("#update_mobile").val();
    var hidden_user_idupd = $("#hidden_user_id").val();


    $.post("backend.php", {
            hidden_user_idupd: hidden_user_idupd,
            firstnameupd: firstnameupd,
            lastnameupd: lastnameupd,
            emailupd: emailupd,
            mobileupd: mobileupd
        },
        function (data, status) {
            $("#update_user_modal").modal("hide");
            readRecords();
        }
    );
}



  </script>


<script src="public/js/jquery.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>

<?php require_once('footer.php');?>