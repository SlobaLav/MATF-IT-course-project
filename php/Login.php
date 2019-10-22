<!DOCTYPE html>
<html lang='en'>
<head>
<title>Login</title>
</head>
<body>
<h1>Login</h1>
<form action="" method="post">
<label>Username:</label><input type="text" name="user"><br/>
<label>Password:</label><input type="password" name="pass"><br/>
<input type="submit" value="Login" name="submit"><br/>
<!--Link za registraciju novog korisnika -->
<p><a href="register.php">Registracija novog korisnika</a></p>
</form>
<?php
if(isset($_POST["submit"])){
 if(!empty($_POST['user']) && !empty($_POST['pass'])){
 $user = $_POST['user'];
 $pass = $_POST['pass'];
 //DB Connection
 $conn = new mysqli('localhost', 'root', '') or die(mysqli_error());
 //Select DB iz baze podataka
 $db = mysqli_select_db($conn, 'test') or die("databse error");
 //Izbor baze podataka
 $query = mysqli_query($conn, "SELECT * FROM userpass WHERE user='".$user."' AND pass='".$pass."'");
 $numrows = mysqli_num_rows($query);
 if($numrows !=0)
 {
 while($row = mysqli_fetch_assoc($query))
 {
 $dbusername=$row['user'];
 $dbpassword=$row['pass'];
 }
 if($user == $dbusername && $pass == $dbpassword)
 {
 session_start();
 $_SESSION['sess_user']=$user;
 //Preusmeravanje browsera
 header("Location:welcome.php");
 }
 }
 else
 {
 echo "Neispravno korisničko ime ili password!";
 }
 }
 else
 {
 echo "Popunite sva polja!";
 }
}
?>
</body>
</html>