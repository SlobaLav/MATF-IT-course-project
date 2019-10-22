<!doctype html>
<html>
<head>
<title>Registracija korisnika</title>
</head>
<body>
<h1>Registracija korisnika</h1>
<form action="" method="post">
<label>Username:</label><input type="text" name="user"><br/><br/>
<label>Password:</label><input type="password" name="pass"><br/><br/>
<input type="submit" value="Register" name="submit"><br/><br/>
<!-- Login link -->
<a href="login.php">Login</a>
</form>
<?php
if(isset($_POST["submit"])){
 if(!empty($_POST['user']) && !empty($_POST['pass'])){
 $user = $_POST['user'];
 $pass = $_POST['pass'];
 $conn = new mysqli('localhost', 'root', '') or die (mysqli_error()); // DB Connection
 $db = mysqli_select_db($conn, 'test') or die("DB Error"); // Izbor DB iz baze podataka
 //Izbor baze podataka
 $query = mysqli_query($conn, "SELECT * FROM userpass WHERE user='".$user."'");
 $numrows = mysqli_num_rows($query);
 if($numrows == 0)
 {
 //Insert to Mysqli Query
 $sql = "INSERT INTO userpass(user,pass) VALUES('$user','$pass')";
 $result = mysqli_query($conn, $sql);
 //Poruka o rezultatu
 if($result){
 echo "Your Account Created Successfully";
 }
 else
 {
 echo "Failure!";
 }
 }
 else
 {
 echo "To korisničko ime već postoji! Molimo Vas pokušajte ponovo.";
 }
 }
 else
 {
 ?>
 <!--Javascript Alert -->
 <script>alert('Popunite sva polja!');</script>
 <?php
 }
}
?>
</body>
</html>