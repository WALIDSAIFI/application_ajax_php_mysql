<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'per';
global $conn;
$conn = new mysqli($host, $user, $pass, $db);
$query = "SELECT * FROM utilisateurs";
$result = $conn->query($query);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];

    $sql = "INSERT INTO utilisateurs (nom, prenom, age) VALUES ('$nom', '$prenom', '$age')";
    $res = $conn->query($sql);


}

?>
