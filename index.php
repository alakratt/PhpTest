<?php 
		$isVisible = 'style=\'display:none\'';
		if ($_POST) {
			
			if (strlen(trim($_POST['email'])) > 0) {
				$email = $_POST['email'];
				$isVisible = 'style=\'display:block\'';
				header("Location: welcome.php"); 
				exit;/
			}
		}
		/*echo $_POST['email'];
		echo strlen(trim($_POST['email']));*/
		?>

<!DOCTYPE html>
<html>
<head>
	

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>PHP Form</title>
</head>
<body>
	
	<div class="container">

		<form method="post">
			  <div class="form-group">
			    <label for="email">User ID</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="name@email.com" required
			    	value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
			  </div>
			  <div class="form-check">
			    <input type="checkbox" class="form-check-input" id="exampleCheck1">
			    <label class="form-check-label" for="exampleCheck1">Remember me</label>
			  </div>
			  <button type="submit" class="btn btn-primary">Log in</button>
		</form>
<div id="notif" class="alert alert-primary" <?php echo $isVisible; ?> role="alert">
  Yeyyy <?php echo $_POST['email'] ?> !!!
</div>
	</div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>
  	$(document).ready(function (){
  		$('#notif').fadeOut(3000);
  	});
  	
  </script>
</html>