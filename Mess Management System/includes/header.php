<?php
	session_start();
?>
<html>
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg" style="background-color:;">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php"><h2 style="color:black;">𝐀𝐧𝐧𝐚𝐩𝐮𝐫𝐧𝐚 𝐌𝐞𝐬𝐬 𝐌𝐚𝐧𝐚𝐠𝐦𝐞𝐧𝐭 𝐒𝐲𝐬𝐭𝐞𝐦</h2></a>
		    <ul class="nav navbar-nav navbar-center">
					<li><span style="color:black;"><?php echo $_SESSION['fname'] . " ". $_SESSION['lname'];?></span></li>
					<li class="nav-item">
		        <a type="button" href="logout.php" class="btn btn btn-warning" id="admin_login_button">Logout</a>
		      </li>
		    </ul>
		</div>
	</nav>
</body>
</html>
