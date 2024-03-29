console.log("Le script est lié avec succès!");


$(document).ready(function () {
    loadData();
    setInterval(function () {
        loadData();
    }, 1000); 

    function loadData() {
        $.ajax({
            url: 'get_data.php', 
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
        $('#data-table tbody').empty();

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


$(document).ready(function () {
    $('#sendButton').on('click', function () {
        var nom = $('#nom').val();
        var prenom = $('#prenom').val();
        var age = $('#age').val();

        $.ajax({
            url: 'get_data.php',
            type: 'POST',
            data: {
                nom: nom,
                prenom: prenom,
                age: age,
            },
            success: function (response) {
                console.log('Message sent successfully');
                $('#nom').val('');
                $('#prenom').val('');
                $('#age').val('');
            },
            error: function () {
                console.log('Error sending message');
            }
        });
    });
});

