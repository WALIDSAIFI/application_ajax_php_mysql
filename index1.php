<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <th>Email</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<!-- Ajouter un formulaire pour ajouter des éléments au tableau -->
<form id="add-form">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" required></br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required></br>
    <button type="submit" id="sendButton">Ajouter</button>
</form>

</body>
</html>
