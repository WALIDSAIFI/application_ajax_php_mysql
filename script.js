console.log("Le script est lié avec succès!");
$(document).ready(function () {
    loadData();

    // Actualiser les données toutes les 1 seconde
    setInterval(function () {
        loadData();
    }, 1000); // Change the interval to 1000 milliseconds (1 second)

    function loadData() {
        $.ajax({
            url: 'get_data.php', // Pointez vers le script PHP qui récupère les données depuis la base de données
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                updateTable(data);
            },
            error: function (error) {
                console.log('Erreur de chargement des données:', error);
            }
        });
    }

    function updateTable(data) {
        // Vider le corps du tableau
        $('#data-table tbody').empty();

        // Remplir le tableau avec les données
        for (var i = 0; i < data.length; i++) {
            var row =
                '<tr>' +
                '<td>' + data[i].id + '</td>' +
                '<td>' + data[i].nom + '</td>' +
                '<td>' + data[i].prenom + '</td>' +
                '<td>' + data[i].age + '</td>' +
                '</tr>';
            $('#data-table tbody').append(row);
        }
    }

    $('#add-form').submit(function (event) {
        // Empêcher le comportement par défaut du formulaire
        event.preventDefault();

        // Récupérer les valeurs du formulaire
        var nom = $('#nom').val();
        var email = $('#email').val();

        // Créer un objet avec les données à envoyer
        var formData = {
            nom: nom,
            email: email
        };

        $.ajax({
            type: 'POST', // Méthode HTTP
            url: 'get_data.php', // L'URL où les données seront traitées par le script PHP
            data: formData, // Les données à envoyer
            dataType: 'json', // Type de données attendu en retour
            success: function (response) {
                // La fonction à exécuter en cas de succès
                console.log('Données envoyées avec succès!', response);

                // Ajouter les données au tableau si nécessaire
                // addData(response.id, response.nom, response.email);

                // Effacer les champs du formulaire
                $('#add-form')[0].reset();
            },
            error: function (error) {
                // La fonction à exécuter en cas d'erreur
                console.error('Erreur lors de l\'envoi des données', error);
            }
        });
    });
});
