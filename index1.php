<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Affichage des données</title>
    <!-- Inclure jQuery en premier -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <!-- Ensuite, inclure votre script personnalisé -->
    <script src="script.js"></script>
    
</head>
<body>

<table id="data-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Age</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<!-- Ajouter un formulaire pour ajouter des éléments au tableau -->
<form id="add-form">
    <label >Nom:</label>
    <input for="nom" type="text" id="nom" name="nom" required></br>
    <label >Prenom:</label>
    <input type="text" id="prenom" name="prenom" required></br>
    <label >age:</label>
    <input type="text" id="age" name="age" required></br>
    <button  type="button" id="sendButton">Ajouter</button>
   
</form>

</body>
</html>
