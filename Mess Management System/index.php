<?php
	session_start();
  if(isset($_POST['login'])){
    include('includes/connection.php');
    $query = "select * from users where email = '$_POST[email]' AND password = '$_POST[password]'";
  	$query_run = mysqli_query($connection,$query);
    if(mysqli_num_rows($query_run)){
			$_SESSION['email'] = $_POST['email'];
			while($row = mysqli_fetch_assoc($query_run)){
				$_SESSION['fname'] = $row['fname'];
				$_SESSION['lname'] = $row['lname'];
				$_SESSION['uid'] = $row['sno'];
			}
      echo "<script type='text/javascript'>
      	window.location.href = 'user_dashboard.php';
      </script>";
    }
    else{
      echo "<script type='text/javascript'>
      	alert('Please enter correct email and password.');
      	window.location.href = 'index.php';
      </script>";
    }
  }

  if(isset($_POST['register'])){
    include('includes/connection.php');
    $query = "insert into users values(null,'$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[password]',$_POST[mobile],'$_POST[address]',0)";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
      echo "<script type='text/javascript'>
        alert('Registeration successfully...');
        window.location.href = 'index.php';
      </script>";
    }
    else{
      echo "<script type='text/javascript'>
        alert('Registeration failed...Plz try again.');
        window.location.href = 'index.php';
      </script>";
    }
  }

	if(isset($_POST['admin_login'])){
    include('includes/connection.php');
    $query = "select * from admins where email = '$_POST[email]' AND password = '$_POST[password]'";
  	$query_run = mysqli_query($connection,$query);
    if(mysqli_num_rows($query_run)){
			$_SESSION['email'] = $_POST['email'];
			while($row = mysqli_fetch_assoc($query_run)){
				$_SESSION['fname'] = $row['fname'];
				$_SESSION['lname'] = $row['lname'];
				$_SESSION['email'] = $row['email'];
			}
      echo "<script type='text/javascript'>
      	window.location.href = 'admin pannel/admin_dashboard.php';
      </script>";
    }
    else{
      echo "<script type='text/javascript'>
      	alert('Please enter correct email and password.');
      	window.location.href = 'index.php';
      </script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <!-- Bootsrap Files -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"></link>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/juqery_latest.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
		<!-- CSS Files -->
		<link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript">
      function resetData(){
        document.getElementById('fname').value = "";
        document.getElementById('lname').value = "";
        document.getElementById('email').value = "";
        document.getElementById('password').value = "";
        document.getElementById('mobile').value = "";
        document.getElementById('address').value = "";
      }
    </script>
  </head>
   <body style="background:url('');">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" style="background-color:smokewhite;">
  		<div class="container-fluid">
  			<a class="navbar-brand" href="index.php"><h1 style="color:black;">𝐀𝐧𝐧𝐚𝐩𝐮𝐫𝐧𝐚 𝐌𝐞𝐬𝐬 𝐌𝐚𝐧𝐚𝐠𝐦𝐞𝐧𝐭 𝐒𝐲𝐬𝐭𝐞𝐦</h1></a>
  		    <ul class="nav navbar-nav navbar-center">
  		      <li class="nav-item">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login_modal" id="login_button">Login</button>
  		      </li>
  					<li class="nav-item">
  		        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#register_modal" id="register_button">Register</button>
  		      </li>
  					<li class="nav-item">
  		        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#admin_login_modal" id="admin_login_button">Admin Login</button>
  		      </li>
  		    </ul>
  		</div>
  	</nav><br><br><br>
    <div class="container">
      <!-- LOGIN MODAL -->
      <div class="modal fade" id="login_modal">
        <div class="modal-dialog">
          <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">𝐋𝐨𝐠𝐢𝐧 𝐅𝐨𝐫𝐦</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="email">Email ID:</label>
              <input class="form-control" type="text" name="email" placeholder="Enter Your Email" required>
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input class="form-control" type="password" name="password" placeholder="Enter Your Password" required>
            </div>
            <button class="btn btn-primary" type="submit" name="login">Login</button><br>
          </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </div>
      </div>
    </div>
    <!-- Register Modal  -->
    <div class="modal fade" id="register_modal">
      <div class="modal-dialog">
        <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">𝐑𝐚𝐠𝐢𝐬𝐭𝐫𝐚𝐭𝐢𝐨𝐧 𝐟𝐨𝐫𝐦</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="name"> Name:</label>
            <input type="text" class="form-control" name="fname" placeholder="Enter Your Name" id="fname" required="">
          </div>
          <div class="form-group">
            <label for="name">Date:</label>
            <input type="date" class="form-control" name="lname" placeholder="Enter joining date " id="lname" required="">
          </div>
          <div class="form-group">
            <label for="name">Email ID:</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Your email ID" id="email" required="">
          </div>
          <div class="form-group">
            <label for="name">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Your Password" id="password" required="">
          </div>
          <div class="form-group">
            <label for="name">Mobile No:</label>
            <input type="text" class="form-control" name="mobile" placeholder="Enter Your Mobile No" id="mobile" required="">
          </div>
          <div class="form-group">
            <label>Address:</label>
            <textarea name="address" rows="3" cols="50" placeholder="Enter Your Address...." id="address"></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="register">Register</button>&nbsp;&nbsp;
          <button type="button" class="btn btn-danger" name="reset" onclick="resetData()" >Reset</button>
        </form>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  </div>
	<!-- Admin LOGIN MODAL -->
	<div class="modal fade" id="admin_login_modal">
		<div class="modal-dialog">
			<div class="modal-content">
		<!-- Modal Header -->
		<div class="modal-header">
			<h4 class="modal-title">𝐀𝐝𝐦𝐢𝐧 𝐋𝐨𝐠𝐢𝐧</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<!-- Modal body -->
		<div class="modal-body">
			<form action="" method="post">
				<div class="form-group">
					<label for="email">Email ID:</label>
					<input class="form-control" type="text" name="email" placeholder="Enter Your Email" required>
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input class="form-control" type="password" name="password" placeholder="Enter Your Password" required>
				</div>
				<button class="btn btn-primary" type="submit" name="admin_login">Login</button><br>
			</form>
		</div>
		<!-- Modal footer -->
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>
		</div>
	</div>
</div>
<section class="text-gray-300 body-font">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      <img class="object-cover object-center rounded" alt="hero" src="https://securecdn.pymnts.com/wp-content/uploads/2022/01/ready-made-meals-delivery-300x180.jpg">
    </div><br><br>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-left">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">ɢᴏᴏᴅ ғᴏᴏᴅ,
        <br class="hidden lg:inline-block">ɢᴏᴏᴅ ᴍᴏᴏᴅ....
      </h1>
      <p class="mb-8 leading-relaxed"><h5>The foods you eat play an important role in supporting a healthy and happy mood.
 explains how food affects your mood, which mood-enhancing foods we recommend, and how to best individualize your “good food, good mood” diet</h5></p>
      </div>
    </div>
  </div>
</section>
<footer class="text-gray-600 body-font">
  <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
    <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
    <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">annapurna mess system —@annapurna
      <a href="https://instagram.com/itz_nil._143" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank"></a>
    </p>
  </div>
</footer>
</body>
</html>
