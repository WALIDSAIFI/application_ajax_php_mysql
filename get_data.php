<?php
// Connexion à la base de données (remplacez les valeurs par les vôtres)
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'per';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

// Exécutez votre requête SQL pour récupérer les données (remplacez le SELECT par votre propre requête)
$query = "SELECT *  FROM utilisateurs";
$result = $conn->query($query);

// Récupérer les données sous forme de tableau associatif
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Renvoyer les données au format JSON
echo json_encode($data);
?>
