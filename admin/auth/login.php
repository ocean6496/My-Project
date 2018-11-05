<?php  
	session_start();
	ob_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/functions/DBConnectionUtil.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/templates/admin/css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<?php  
					if (isset($_POST['submit'])) {
						$username = $_POST['username'];
						$password = md5($_POST['password']);
						$queryLogin = "SELECT * FROM users WHERE username = '$username' && password ='$password' ";
						$resultLogin = $mysqli -> query($queryLogin);
						$arLogin = mysqli_fetch_assoc($resultLogin);
						
						if (count($arLogin) > 0) {
							//đăng nhập thành công
							$_SESSION['userinfo'] = $arLogin;
							header('location: /admin');
						} else {
							//đăng nhập thất bại
							echo "<h3 style = 'color:red; '>Sai tên đăng nhập hoặc mật khẩu!</h3>";

						}
					}
				?>
				<form class="login100-form validate-form" action="" method="POST">
					<span class="login100-form-title p-b-26">
						Login
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="username" placeholder="Enter username">
					</div>

					<div class="wrap-input100 validate-input" >
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<input type="submit" class="login100-form-btn" value="Login" name="submit">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
<?php  
	ob_end_flush();
?>