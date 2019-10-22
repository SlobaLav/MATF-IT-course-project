<?php
session_start();
if(!isset($_SESSION["sess_user"])){
 header("Location: login.php");
}
else
{
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Dobrodosli u SLO Delivery</title>
</head>
<h1>Dobrodosli u SLO Delivery</h1>
<p>Ovo je strana za logovanje.</p>
<?=$_SESSION['sess_user'];?>!<a href="logout.php">Logout</a>
<body>
</body>
</html>
<?php
}
?>