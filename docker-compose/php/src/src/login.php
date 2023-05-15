<?php
session_start();
// User name base de données
$user = 'Marrouche';

//mdp user de la base de données
$pass = 'password';

// Nom de la base de donnée
$mydatabase = 'MYSQL_DATABASE';

$conn = new mysqli('Mini_Drive', $user, $pass, $mydatabase);
$conn->set_charset("utf8");


$userSaisi = $_POST["name"];
$mdpSaisi  = $_POST["password"];

$query = "SELECT * FROM USERS WHERE username = '" . $userSaisi . "' AND mdp = '" . $mdpSaisi . "';";

$queryArray = $conn->query($query)->fetch_array();

if ($queryArray == NULL) 
{
	$query = "SELECT * FROM USERS WHERE username = '" . $userSaisi . "';";
	$queryArray2 = $conn->query($query)->fetch_array();

	if ($queryArray2 == NULL) 
	{
		$sql = "INSERT INTO USERS VALUES ( '" . $userSaisi . "' , '" . $mdpSaisi . "')";
		if (! $conn->query($sql)) {
			echo "Erreur : " . $conn->error;
		}

		$_SESSION['username'] = $userSaisi;
		header("Location: /src/drive.php");
		exit();
	}
	else
	{
		header("Location: /src/login_error.html");
		exit();
	}
}
else
{
	$_SESSION['username'] = $userSaisi;
	header("Location: /src/drive.php");
	exit();
}

/*// Requete select tout from users
$sql = "SELECT * FROM USERS;";

$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
	while ($row = $result->fetch_assoc()) 
	{
		echo "username : " . $row["username"]. "password : " . $row["mdp"]. "<br>";
	}
}*/


?>