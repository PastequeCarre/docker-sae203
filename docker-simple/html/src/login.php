<!DOCTYPE html>
<html>
	<body>
		<?php

		session_start();
		$dbuser = 'review_site';
		$dbpass = 'password';
		$conn = new mysqli("localhost", $dbuser, $dbpass, "momentos");
		$conn->set_charset("utf8");

		if (! $conn->connect_error) 
			echo "Connecté";
		else
			echo "erreurrrrrrrrrrrrrrr";

	
		$userSaisi = $_POST["name"];
		$mdpSaisi  = $_POST["password"];

		echo $userSaisi;
		echo $mdpSaisi;

		$query = "SELECT * FROM USERS WHERE username = '" . $userSaisi . "' AND mdp = '" . $mdpSaisi . "';";

		$queryArray = $conn->query($query)->fetch_array();

		if ($queryArray == NULL) 
		{
			header("Location: /src/login_simple_error.html");
			exit();
		}
		else
		{
			$_SESSION['username'] = $userSaisi;
			header("Location: /src/drive_simple.php");
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
	</body>
</html>