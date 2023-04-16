<?php
// User name base de données
$user = 'MYSQL_USER';

//mdp user de la base de données
$pass = 'MYSQL_PASSWORD';

// Nom de la base de donnée
$mydatabase = 'MYSQL_DATABASE';

$conn = new mysqli('Mini_Drive', $user, $pass, $mydatabase);

if (!$conn->connect_error) 
    echo "Connecté";
else
    echo "erreurrrrrrrrrrrrrrr";


// Requete select tout from users
$sql = 'SELECT * FROM users';

//Si le resultat n'est pas null alors on stock dans un tableau 
if ($result = $conn->query($sql)) 
{
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
}

//Afficher tout dans le tableau 
foreach ($users as $user) {
    echo "<br>";
    echo $user->username . " " . $user->password;
    echo "<br>";
}
?>

<html>
    <head>
        <title> Test doc</title>
    </head>

    <body>
       <br> BIJOURRR
    </body>
</html>