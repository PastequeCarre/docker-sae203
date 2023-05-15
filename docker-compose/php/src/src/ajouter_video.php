<?php 
    session_start();
    $userSaisie = $_SESSION['username'];

    $user = 'Marrouche';
    $pass = 'password';
    $mydatabase = 'MYSQL_DATABASE';
    
    $conn = new mysqli('Mini_Drive', $user, $pass, $mydatabase);
    $conn->set_charset("utf8");

    if ($conn->connect_error) 
        echo "erreurrrrrrrrrrrrrrr";

    $titreSaisi = $_POST["titre"];
    $lienSaisi  = $_POST["lien"];
    $privacySaisi  = $_POST["privacy"];

    $query = "INSERT INTO VIDEOS(nom,lien,bpublic) VALUES ('".$titreSaisi."','".$lienSaisi."',".$privacySaisi.");";
    $conn->query($query);

    $queryID = "SELECT id FROM VIDEOS WHERE nom = '" . $titreSaisi . "' AND lien = '" . $lienSaisi . "';";

    $result= $conn->query($queryID);

    if ($result && mysqli_num_rows($result) > 0) 
    {
        $row = mysqli_fetch_assoc($result);
        $videoId = $row['id'];
    }

    $query = "INSERT INTO VPERSO VALUES('".$userSaisie."',".$videoId.");";
    $conn->query($query);

    header("Location: /src/drive.php");
	exit();
?>