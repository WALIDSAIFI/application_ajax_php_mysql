<?php
// Connexion à la base de données (remplacez les valeurs par les vôtres)
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'per';
global $conn;
$conn = new mysqli($host, $user, $pass, $db);



// Exécutez votre requête SQL pour récupérer les données (remplacez le SELECT par votre propre requête)
$query = "SELECT * FROM utilisateurs";
$result = $conn->query($query);

// Vérification des erreurs dans la requête SELECT
if (!$result) {
    die("Erreur dans la requête : " . $conn->error);
}

// Récupérer les données sous forme de tableau associatif
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Renvoyer les données au format JSON
echo json_encode($data);

// Vérification de la méthode de la requête HTTP (POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];

    // Requête SQL d'insertion
    $sql = "INSERT INTO utilisateurs (nom, prenom, age) VALUES ('$nom', '$prenom', '$age')";

    // Exécution de la requête d'insertion
    $res = $conn->query($sql);


}

?>
