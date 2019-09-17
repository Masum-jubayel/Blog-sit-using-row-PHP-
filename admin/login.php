<?php  
	include '../lib/Session.php';
	Session::init();

?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php include '../helpers/format.php';?>

<?php 
	$db= new Database();
	$fm= new format();
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->

		<?php  
			if ($_SERVER['REQUEST_METHOD']=='POST') {
				$username=$fm->validation($_POST['username']);
				$password=$fm->validation(md5($_POST['password']));

				$username = mysqli_real_escape_string($db->link, $username);
				$password = mysqli_real_escape_string($db->link, $password);

				$query = "SELECT * from tbl_user where name='$username' and password='$password' ";
				$result = $db->select($query);
				if ($result != false) {
					$value = mysqli_fetch_array($result);
					$rows  = mysqli_num_rows($result);
					if ($rows > 0) {
						Session::set("login",true);
						Session::set("username",$value['name']);
						Session::set("useID",$value['id']);
						header("location:index.php");
					}else{
						echo "<span style='color:red; font-size:20px;  margin-top:10px;'> Result not Found !!!</span>";
					}
				}else{
					echo "<span style='color:red; font-size:20px; margin-top:10px;'> Username or Password is not match !!!</span>";
				}
			}
		?>
		<div class="button">
			<a href="login.php">Forget Username or Pssword</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>