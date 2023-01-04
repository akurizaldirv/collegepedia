<?php 
require 'functions.php';

if(isset($_POST["register"])){
	if (regristrasi($_POST)>0){
		echo"<script>
		alert('user baru berhasil di tambahkan');
		</script>
		";
	}else{
		echo mysqli_error($conn);;
	}

}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>halaman regristrasi</title>
	<style type="text/css">
		label{
			display: block;
		}
	</style>
</head>
<body>
<h1>Halama Regristrasi</h1>

<form action="" method="post">
	<ul>
		<li>
			<label for="username">Username :</label>
			<input type="text" name="username" id="username">
		</li>
		<li>
			<label for="password">Password :</label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<label for="password2">konfirmasi password :</label>
			<input type="password" name="password2" id="password2">
		</li>
		<li>
			<button type="submit" name="register">Register</button>
		</li>
	</ul>


</form>

</body>
</html>