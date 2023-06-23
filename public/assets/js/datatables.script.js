$(document).ready(function () {
    // contact-list-table
    $('#contact_list_table').DataTable({searching: false  });

    // Historique des transactions
    $('#historique_transactions').DataTable({
        "language": {
            "lengthMenu": "Afficher _MENU_ lignes par page",
            "zeroRecords": "Aucune donnée trouvée - désolé",
            "info": "_PAGE_ sur _PAGES_",
            "search": "Rechercher",
            "infoEmpty": "Pas d'enregistrement disponible",
            "infoFiltered": "(filtré parmi un total de _MAX_ enregistrements)",
            "decimal": ",",
            "thousands": ".",
            "paginate": {
                "first": "Premier",
                "previous": "Précédent",
                "next": "Suivant",
                "last": "Dernier"
            }
        },
        "pageLength": 10,
        "lengthMenu": [10, 15, 20, 25, 50],
        "buttons": [
            'copy', 'excel', 'csv', 'pdf', 'print'
        ],
        "columnDefs": [
            { "width": "3%", "targets": 0 }, // Définition de la largeur de la première colonne à 20%
            { "width": "8%", "targets": [1,2] },
            { "width": "8%", "targets": [3,4,5] },
            { "width": "10%", "targets": 10 },
        ],
        "order": [
            [11, "desc"]
        ]
    });

    // Historique des transactions-show
    $('#historique_transactions-show').DataTable({
        "language": {
            "lengthMenu": "Afficher _MENU_ lignes par page",
            "zeroRecords": "Aucune donnée trouvée - désolé",
            "info": "_PAGE_ sur _PAGES_",
            "search": "Rechercher",
            "infoEmpty": "Pas d'enregistrement disponible",
            "infoFiltered": "(filtré parmi un total de _MAX_ enregistrements)",
            "decimal": ",",
            "thousands": ".",
            "paginate": {
                "first": "Premier",
                "previous": "Précédent",
                "next": "Suivant",
                "last": "Dernier"
            }
        },
        "pageLength": 10,
        "lengthMenu": [10, 15, 20, 25, 50],
        "buttons": [
            'copy', 'excel', 'csv', 'pdf', 'print'
        ],
        "order": [
            [2, "desc"]
        ]
    });

    // variation
    $('#variation').DataTable({
        "language": {
            "lengthMenu": "Afficher _MENU_ lignes par page",
            "zeroRecords": "Aucune donnée trouvée - désolé",
            "info": "_PAGE_ sur _PAGES_",
            "search": "Rechercher",
            "infoEmpty": "Pas d'enregistrement disponible",
            "infoFiltered": "(filtré parmi un total de _MAX_ enregistrements)",
            "decimal": ",",
            "thousands": ".",
            "paginate": {
                "first": "Premier",
                "previous": "Précédent",
                "next": "Suivant",
                "last": "Dernier"
            }
        },
        "pageLength": 10,
        "lengthMenu": [10, 15, 20, 25, 50],
        "buttons": [
            'copy', 'excel', 'csv', 'pdf', 'print'
        ],
        "columnDefs": [
            { "width": "15%", "targets": [1,2,3] },
        ],
        "order": [
            [4, "desc"]
        ]
    });

    // user
    $('#user').DataTable({
        "language": {
            "lengthMenu": "Afficher _MENU_ lignes par page",
            "zeroRecords": "Aucune donnée trouvée - désolé",
            "info": "_PAGE_ sur _PAGES_",
            "search": "Rechercher",
            "infoEmpty": "Pas d'enregistrement disponible",
            "infoFiltered": "(filtré parmi un total de _MAX_ enregistrements)",
            "decimal": ",",
            "thousands": ".",
            "paginate": {
                "first": "Premier",
                "previous": "Précédent",
                "next": "Suivant",
                "last": "Dernier"
            }
        },
        "pageLength": 10,
        "lengthMenu": [10, 15, 20, 25, 50],
        "buttons": [
            'copy', 'excel', 'csv', 'pdf', 'print'
        ],
        "columnDefs": [
            { "width": "15%", "targets": [1,2,3] },
        ],
        "order": [
            [0, "asc"]
        ]
    });

    // permission
    $('#permission').DataTable({
        "language": {
            "lengthMenu": "Afficher _MENU_ lignes par page",
            "zeroRecords": "Aucune donnée trouvée - désolé",
            "info": "_PAGE_ sur _PAGES_",
            "search": "Rechercher",
            "infoEmpty": "Pas d'enregistrement disponible",
            "infoFiltered": "(filtré parmi un total de _MAX_ enregistrements)",
            "decimal": ",",
            "thousands": ".",
            "paginate": {
                "first": "Premier",
                "previous": "Précédent",
                "next": "Suivant",
                "last": "Dernier"
            }
        },
        "pageLength": 10,
        "lengthMenu": [10, 15, 20, 25, 50],
        "buttons": [
            'copy', 'excel', 'csv', 'pdf', 'print'
        ],
        "columnDefs": [
        ],
        "order": [
            [0, "asc"]
        ]
    });

    $('#cinq_dernier').DataTable({
        "language": {
            "lengthMenu": "Afficher _MENU_ lignes par page",
            "zeroRecords": "Aucune donnée trouvée - désolé",
            "info": "_PAGE_ sur _PAGES_",
            "search": "Rechercher",
            "infoEmpty": "Pas d'enregistrement disponible",
            "infoFiltered": "(filtré parmi un total de _MAX_ enregistrements)",
            "paginate": {
                "first": "Premier",
                "previous": "Précédent",
                "next": "Suivant",
                "last": "Dernier"
            }
        },
        "paging": false,
        "info": false,
        "order": [
            [5, "desc"]
        ]
    });

    $('#zero_configuration_table2').DataTable({
        "language": {
            "lengthMenu": "Afficher _MENU_ lignes par page",
            "zeroRecords": "Aucune donnée trouvée - désolé",
            "info": "_PAGE_ sur _PAGES_",
            "search": "Rechercher",
            "infoEmpty": "Pas d'enregistrement disponible",
            "infoFiltered": "(filtré parmi un total de _MAX_ enregistrements)",
            "paginate": {
                "first": "Premier",
                "previous": "Précédent",
                "next": "Suivant",
                "last": "Dernier"
            }
        },
        "lengthMenu": [10, 15, 20, 25, 50],
    });

    // feature enable/disable

    $('#feature_disable_table').DataTable({
        "paging": false,
        "ordering": false,
        "info": false,
        "order": [
            [3, "desc"]
        ]
    });

    // ordering or sorting

    $('#deafult_ordering_table').DataTable({
        "order": [
            [3, "desc"]
        ]
    });

    // multi column ordering
    $('#multicolumn_ordering_table').DataTable({
        columnDefs: [{
            targets: [0],
            orderData: [0, 1]
        }, {
            targets: [1],
            orderData: [1, 0]
        }, {
            targets: [4],
            orderData: [4, 0]
        }]
    });


    // hidden column
    $('#hidden_column_table').DataTable({
        responsive: true,
        "columnDefs": [{
            "targets": [2],
            "visible": false,
            "searchable": false
        },
        {
            "targets": [3],
            "visible": false
        }
        ]
    });


    // complex header
    $('#complex_header_table').DataTable();

    // dom positioning
    $('#dom_positioning_table').DataTable({
        "dom": '<"top"i>rt<"bottom"flp><"clear">'
    });


    // alternative pagination
    $('#alternative_pagination_table').DataTable({
        "pagingType": "full_numbers"
    });

    // scroll vertical
    $('#scroll_vertical_table').DataTable({
        "scrollY": "200px",
        "scrollCollapse": true,
        "paging": false
    });

    // scroll horizontal
    $('#scroll_horizontal_table').DataTable({
        "scrollX": true
    });

    // scroll vertical dynamic height
    $('#scroll_vertical_dynamic_height_table').DataTable({
        scrollY: '50vh',
        scrollCollapse: true,
        paging: false
    });

    // scroll vertical and horizontal
    $('#scroll_horizontal_vertical_table').DataTable({
        "scrollY": 200,
        "scrollX": 200
    });

    // comma decimal
    $('#comma_decimal_table').DataTable({
        "language": {
            "decimal": ",",
            "thousands": "."
        }
    });


    // language option
    $('#language_option_table').DataTable({
        "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Nothing found - sorry",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    });

})

    // language option
    $('#language_fr_option_table').DataTable({
        "language": {
            "lengthMenu": "Afficher _MENU_ lignes par page",
            "zeroRecords": "Aucune donnée trouvée - désolé",
            "info": "_PAGE_ sur _PAGES_",
            "search": "Rechercher",
            "infoEmpty": "Pas d'enregistrement disponible",
            "infoFiltered": "(filtré parmi un total de _MAX_ enregistrements)",
            "paginate": {
                "first": "Premier",
                "previous": "Précédent",
                "next": "Suivant",
                "last": "Dernier"
            },
            // ou
            // "paginate": {
            //     "first": "&laquo;",
            //     "previous": "&lsaquo;",
            //     "next": "&rsaquo;",
            //     "last": "&raquo;"
            // },
        },
    });



$('#pa-moi').DataTable({
    "language": {
        "lengthMenu": "Afficher _MENU_ lignes par page",
        "zeroRecords": "Aucune donnée trouvée - désolé",
        "info": "_PAGE_ sur _PAGES_",
        "infoEmpty": "Pas d'enregistrement disponible",
        "infoFiltered": "(filtré parmi un total de _MAX_ enregistrements)"
    },
    "pagingType": "full_numbers", // Type de pagination
    "searching": true, // Possibilité de recherche
    "ordering": true, // Possibilité de tri
    "order": [[ 0, "asc" ]], // Tri par défaut sur la première colonne en ordre ascendant
    "lengthMenu": [10, 25, 50], // Options de nombre de lignes par page
    "pageLength": 10, // Nombre de lignes par page par défaut
    "columnDefs": [
        { "width": "20%", "targets": 0 }, // Définition de la largeur de la première colonne à 20%
        { "visible": false, "targets": [2, 3] } // Rendre les colonnes 2 et 3 invisibles
    ],
    "dom": "lrtip" // Définir la structure des éléments de contrôle (pagination, recherche, longueur par page, etc.)
});
