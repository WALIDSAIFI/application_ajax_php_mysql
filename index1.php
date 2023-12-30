<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des données</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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

<script>
    $(document).ready(function() {
        // Charger les données initiales lors du chargement de la page
        loadData();

        // Actualiser les données toutes les 1 seconde
        setInterval(function() {
            loadData();
        }, 1000); // Change the interval to 1000 milliseconds (1 second)

        function loadData() {
            $.ajax({
                url: 'get_data.php', // Pointez vers le script PHP qui récupère les données depuis la base de données
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    updateTable(data);
                },
                error: function(error) {
                    console.log('Erreur de chargement des données:', error);
                }
            });
        }

        function updateTable(data) {
            // Vider le corps du tableau
            $('#data-table tbody').empty();

            // Remplir le tableau avec les données
            for (var i = 0; i < data.length; i++) {
                var row = '<tr>' +
                          '<td>' + data[i].id + '</td>' +
                          '<td>' + data[i].nom + '</td>' +
                          '<td>' + data[i].email + '</td>' +
                          '</tr>';
                $('#data-table tbody').append(row);
            }
        }
    });
</script>

</body>
</html>
