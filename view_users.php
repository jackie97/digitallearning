<html>
<head lang="en">
    <meta charset="UTF-8">
   <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script> <!--css file link in bootstrap folder-->
    <title>View Users</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;
    }
    .table {
        margin-top: 50px;

    }

</style>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><h4>Digital learning: <b>Registered Student's Details</b></h4> </a>
            <p><a href="new_users.php"><h5><b>Add a new student User</b></h5></a></p>
        </div>

         <div id="navbar" class="navbar-collapse collapse">
          
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
     <span class="glyphicon glyphicon-user"></span>&nbsp; User: Admin &nbsp; <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="userAccount.php?logoutSubmit=1" class="logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
               </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


<div class="table-scrol">    
<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->
    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
        <thead>

        <tr>

            <th>User Id</th>
            <th>User First Name</th>
            <th>User Second Name</th>
            <th>Registration Number</th>
            <th>Age</th>
            <th>gender</th>
            <th>Residence</th>
            <th>Username</th>
            <th>Sign Up Date</th>
            <th>E-mail Addresses</th>
            <th>User Password</th>
            <th>Delete User</th>
            <th> Edit user</th>
        </tr>
        </thead>

        <?php
        include("dbconnect.php");
        $view_users_query="select * from users";//select query for viewing users.
        $run=mysqli_query($conn,$view_users_query);//here run the sql query.

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
            $id=$row[0];
            $first_name=$row[1];
            $last_name=$row[2];
            $regno=$row[3];
            $age=$row[4];
            $gender=$row[5];
            $residence=$row[6];
            $username=$row[7];
            $created=$row[11];
            $email=$row[8];
            $password=$row[9];



        ?>

        <tr>
<!--here showing results in the table -->
            <td><?php echo $id;  ?></td>
            <td><?php echo $first_name;  ?></td>
            <td><?php echo $last_name;  ?></td>
            <td><?php echo $regno;  ?></td>
            <td><?php echo $age;  ?></td>
            <td><?php echo $gender;  ?></td>
            <td><?php echo $residence;  ?></td>
            <td><?php echo $username;  ?></td>
            <td><?php echo $created;  ?></td>
            <td><?php echo $email;  ?></td>
            <td><?php echo $password;  ?></td>
            <td><a href="delete.php?del=<?php echo $id ?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->
             echo '<td><a href="user_edit.php?id=<?php echo $id ?>"><button class="btn btn-default">Edit</button></a></td>';
        
        </tr>

        <?php } ?>

    </table>
        </div>
</div>


</body>

</html>
