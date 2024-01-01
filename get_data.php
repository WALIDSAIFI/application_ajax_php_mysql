<?php
// Connexion à la base de données (remplacez les valeurs par les vôtres)
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'per';

$conn = new mysqli($host, $user, $pass, $db);


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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];

    // Utiliser une requête préparée pour éviter les attaques par injection SQL
    $sql = "INSERT INTO utilisateurs (nom, email, prenom, age) VALUES (?, ?, null, null)";
    
    // Préparer la requête
    $stmt = $conn->prepare($sql);

    // Binder les paramètres
    $stmt->bind_param('ss', $nom, $email);

    // Exécuter la requête
    $res = $stmt->execute();

    // Renvoyer une réponse JSON
    if ($res) {
        echo json_encode(['success' => true, 'message' => 'Utilisateur ajouté avec succès']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'ajout de l\'utilisateur']);
    }

    // Terminer le script pour éviter l'exécution inutile du reste du code
    exit();
}





?>
