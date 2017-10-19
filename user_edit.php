<?php

/*

EDIT.PHP

Allows user to edit specific entry in database

*/



// creates the edit record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($id, $first_name, $last_name, $age, $regno, $residence, $phone, $gender, $email, $username, $password, $error)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>Edit User</title>

 <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>



<form action="" method="post">

<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<div>

<p><strong>ID:</strong> <?php echo $id; ?></p>


<div class="row">
        	 	<div class="col-md-6 col-md-offset-4">
        	 		<h3><a href="view_users.php"><span class = "glyphicon glyphicon-home"><i> Back </i></span></a> <br> <br>Add Users</h3>

        	 		<div class="form-group">
            		 <hr />
           			 </div>

					<div class="form-group">
                        <div class="input-group">
                         	<span class="input-group-addon"><span class="glyphicon glyphicon-tag"></span></span>
                            <input type="text"  class="form-control" name="first_name" placeholder="Enter First Name" maxlength="20" value="<?php echo $first_name; ?>" >                 
                       	</div>
                     </div>


                      <div class="form-group">
                        <div class="input-group">
                         <span class="input-group-addon"><span class="glyphicon glyphicon-tag"></span></span>
                            <input type="text"  class="form-control" name="last_name" placeholder="Enter Last Name" maxlength="20" value= "<?php echo $last_name; ?>" >                
                       </div>
                     </div>
                

                  
                    <div class="form-group">
                       <div class="input-group">
                         <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            <input type="text"  class="form-control" name="age" placeholder="Enter Age" maxlength="10" value="<?php echo $age; ?>" required="">
                      </div>
                    </div>


                    <div class="form-group">
                       <div class="input-group">
                         <span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span>
                             <input type="text"  class="form-control" name="regno" placeholder="Your Registration Number" maxlength="5" value="<?php echo $regno; ?>" required="">
                        </div> 
                    </div>


                     <div class="form-group">
             			<div class="input-group">
                			<span class="input-group-addon"><span class=" glyphicon glyphicon-home"></span></span>
                   		 <input type="text"  class="form-control" name="residence" placeholder="Enter Residence eg. Ntugi" value="<?php echo $residence; ?>" required="">
                		</div>
               		 </div>


               		 <div class="form-group">
             			<div class="input-group">
                			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             					<input type="text"  class="form-control" name="phone" placeholder="Enter the user's Phone Number" value ="<?php echo $phone; ?>" maxlength="10" >
               			 </div>
            		</div> 

            		            		
                        
            		<div class="form-group">
            			 <div class="input-group">
              			  <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
           					 <input type="text"  class="form-control" name="gender" placeholder="Gender: Male or Female" maxlength="12" value="<?php echo $gender; ?>" required="">
               			 </div>
            		</div>


            		<div class="form-group">
             			<div class="input-group">
               			 <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            				 <input type="email"  class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>" required="">
                		</div>
            		</div>


            		<div class="form-group">
             			<div class="input-group">
               			 <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            				 <input type="text"  class="form-control" name="password" placeholder="Password" value="<?php echo $password; ?>" required="">
                		</div>
            		</div>


            		<div class="form-group">
             			<div class="input-group">
               			 <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             				<input type="text"  class="form-control" name="username" placeholder="Enter the preferred username eg @student" value="<?php echo $username; ?>" maxlength="10" >
                		</div>
            		</div>


            		<div class="form-group">
             			<hr />
            		</div>


            		<div class="form-group" align="center">
           
                       <input type="submit"  class="form-control" name="submit" value="Submit">
            
            		</div>




             </div>
           </div>

</div>

</form>

</body>

</html>

<?php

}







// connect to the database

include("dbconnect.php");



// check if the form has been submitted. If it has, process the form and save it to the database

if (isset($_POST['submit']))

{

// confirm that the 'id' value is a valid integer before getting the form data

if (is_numeric($_POST['id']))

{

// get form data, making sure it is valid

$id = $_POST['id'];

$first_name = mysqli_real_escape_string($conn,htmlspecialchars($_POST['first_name']));

$last_name = mysqli_real_escape_string($conn,htmlspecialchars($_POST['last_name']));

$age = mysqli_real_escape_string($conn,htmlspecialchars($_POST['age']));

$regno = mysqli_real_escape_string($conn,htmlspecialchars($_POST['regno']));

$residence = mysqli_real_escape_string($conn,htmlspecialchars($_POST['residence']));

$phone = mysqli_real_escape_string($conn,htmlspecialchars($_POST['phone']));

$gender = mysqli_real_escape_string($conn,htmlspecialchars($_POST['gender']));

$email = mysqli_real_escape_string($conn,htmlspecialchars($_POST['email']));

$username = mysqli_real_escape_string($conn,htmlspecialchars($_POST['username']));

$password = mysqli_real_escape_string($conn,htmlspecialchars($_POST['password']));



// check that firstname/lastname fields are both filled in

if ($first_name == '' || $last_name == '' || $age == '' || $regno == '' || $residence == '' || $phone == '' || $gender == '' || $email == '' || $username == '' || $password == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



//error, display form

renderForm($id, $first_name, $last_name, $age, $regno, $residence, $phone, $gender, $email, $username, $password, $error);

}

else

{

// save the data to the database

mysqli_query($conn,"UPDATE users SET first_name='$first_name', last_name='$last_name', age='$age', regno='$regno', residence='$residence', phone='$phone', gender='$gender', email='$email', username='$username', password='$password' WHERE id='$id'")

or die(mysqli_error($conn));



// once saved, redirect back to the view page

header("Location: view_users.php");

}

}

else

{

// if the 'id' isn't valid, display an error

echo 'Error!';

}

}

else

// if the form hasn't been submitted, get the data from the db and display the form

{



// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)

{

// query db

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM users WHERE id='$id'");

$row = mysqli_fetch_array($result);



// check that the 'id' matches up with a row in the databse

if($row)

{



// get data from db

$first_name = $row['first_name'];

$last_name = $row['last_name'];

$age = $row['age'];

$regno = $row['regno'];

$residence = $row['residence'];

$phone = $row['phone'];

$gender = $row['gender'];

$email = $row['email'];

$username = $row['username'];

$password = $row['password'];





// show form

renderForm($id, $first_name, $last_name, $age, $regno, $residence, $phone, $gender, $email, $username, $password, '');

}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

{

echo 'Error!';

}

}

?>