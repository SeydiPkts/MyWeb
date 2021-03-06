<?php

	include("baglanti.php");
	error_reporting(0);
	session_start();
	ob_start();

	if($_POST){
		$kadi = htmlspecialchars($_POST["kadi"]);
		$pass = $_POST["sifre"];
		$email = $_POST["email"];
		if(strlen($kadi)>=4 && strlen($pass)>=4)
		{
			$sifre = md5($pass);
			$sorgu = $db->prepare("insert into authme (username, password, ip, lastlogin, x, y, z, email) values ('$kadi', '$sifre', '0', 'null', '0', '0', '0', '$email')");
			$sorgu->execute();
			
			if($sorgu){
				$_SESSION['user_nick'] = $kadi;
				echo "<script>alert('Kayıt olma işlemi başarılı.')</script>";
				echo '<meta http-equiv="refresh" content="2;URL=index.php">';
			} else{
				echo "<script>alert('Kullanıcı adı daha önce kayıtlanmış.')</script>";
			}
		}
		else
		{
			echo "<script>('Kullanıcı adı ve şifre boş olmamalı')</script>";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kayıt ol</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="login/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						Kullanıcı Kayıt
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Boş bırakmayın">
						<input class="input100" type="text" name="kadi" placeholder="Minecraft Kullanıcı Adı">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Boş bırakmayın">
						<input class="input100" type="email" name="email" placeholder="E-Posta Adresiniz">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Boş bırakmayın">
						<input class="input100" type="password" name="sifre" placeholder="Şifre">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Kaydol
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="girisyap.php">
							Giriş yap
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>