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
});


// Utilisez l'ID correct du bouton dans l'écouteur d'événements
document.getElementById('sendButton').addEventListener('click', function(event) {
    // Empêche le formulaire de se soumettre normalement
    event.preventDefault();

    // Utilisez les bons identifiants pour récupérer les valeurs du formulaire
    var nom = document.getElementById('nom').value;
    var email = document.getElementById('email').value;

    // Vous pouvez utiliser ces valeurs pour effectuer une action, par exemple, envoyer une requête AJAX
    $.ajax({
        url: 'get_data.php',
        type: 'POST',
        data: {
            nom: nom,
            email: email
        },
        success: function(response) {
            // Gérez la réponse en conséquence
            console.log('Message envoyé avec succès');
        },
        error: function() {
            console.log('Erreur lors de l\'envoi du message');
        }
    });
});

