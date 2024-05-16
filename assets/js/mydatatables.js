$(document).ready(function() {
    summonCase = $('#summonTitle').val();

    $('#purokTable').DataTable();
    $('#certsTable').DataTable();
    $('#housesTable').DataTable({
        "lengthMenu": [[10, 25, 50, 1000000], [10, 25, 50, "All"]],
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: [ 0,1,2 ]
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: [ 0,1,2 ]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0,1,2 ]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0,1,2 ]
                },
                customize: function (doc) {
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [ 0,1,2 ]
                }
            },
        ]
    });
    $('#precinctTable').DataTable();
    $('#positionTable').DataTable();
    $('#chairTable').DataTable();
    $('#userTable').DataTable();
    $('#activityTable').DataTable();

    $('#supportTable').DataTable({
        "order": [[ 0, "asc" ]],
    });
    $('#summonTable').DataTable({
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: [ 0,1,2,3 ]
                }
            },
            {
                extend: 'csv',
                title: summonCase,
                exportOptions: {
                    columns: [ 0,1,2,3 ]
                }
            },
            {
                extend: 'excel',
                title: summonCase,
                exportOptions: {
                    columns: [ 0,1,2,3 ]
                }
            },
            {
                extend: 'pdf',
                title: summonCase,
                exportOptions: {
                    columns: [ 0,1,2,3 ]
                },
                customize: function (doc) {
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                }
            },
            {
                extend: 'print',
                title: ''+summonCase+'',
                exportOptions: {
                    columns: [ 0,1,2,3 ]
                }
            },
        ]
    });
    $('#officialTable').DataTable({
        "aaSorting": [],
        dom: 'Blfrtip',
        "lengthMenu": [[20, 25, 50, -1], [20, 25, 50, "All"]],
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: [ 0,1,2,3]
                }
            },
            {
                extend: 'csv',
                title: 'List of Barangay Officials and Staff',
                exportOptions: {
                    columns: [ 0,1,2,3]
                }
            },
            {
                extend: 'excel',
                title: 'List of Barangay Officials and Staff',
                exportOptions: {
                    columns: [ 0,1,2,3]
                }
            },
            {
                extend: 'pdf',
                title: 'List of Barangay Officials and Staff',
                exportOptions: {
                    columns: [ 0,1,2,3]
                },
                customize: function (doc) {
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                }
            },
            {
                extend: 'print',
                title: 'List of Barangay Officials and Staff',
                exportOptions: {
                    columns: [ 0,1,2,3]
                }
            },
        ]
    });

    $('#permittable').DataTable({
        "order": [[ 3, "desc" ]],
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: [ 0,1,2,3,4 ]
                }
            },
            {
                extend: 'csv',
                title: 'List of Barangay Business Clearance',
                exportOptions: {
                    columns: [ 0,1,2,3,4 ]
                }
            },
            {
                extend: 'excel',
                title: 'List of Barangay Business Clearance',
                exportOptions: {
                    columns: [ 0,1,2,3,4 ]
                }
            },
            {
                extend: 'pdf',
                title: 'List of Barangay Business Clearance',
                exportOptions: {
                    columns: [ 0,1,2,3,4 ]
                },
                customize: function (doc) {
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                }
            },
            {
                extend: 'print',
                title: 'List of Barangay Business Clearance',
                exportOptions: {
                    columns: [ 0,1,2,3,4 ]
                }
            },
        ]
    });

    var oTable = $('#blottertable').DataTable({
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5]
                }
            },
            {
                extend: 'csv',
                title: 'List of Blotters',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5]
                }
            },
            {
                extend: 'excel',
                title: 'List of Blotters',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5]
                }
            },
            {
                extend: 'pdf',
                title: 'List of Blotters',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5 ]
                },
                customize: function (doc) {
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                }
            },
            {
                extend: 'print',
                title: 'List of Blotters',
                exportOptions: {
                    columns: [0,1,2,3,4,5]
                }
            },
        ]
    });

    $("#activeCase").click(function(){
        var textSelected = 'Active';
        oTable.columns(5).search(textSelected).draw();
    });
    $("#settledCase").click(function(){
        var textSelected = 'Settled';
        oTable.columns(5).search(textSelected).draw();
    });
    $("#scheduledCase").click(function(){
        var textSelected = 'Scheduled';
        oTable.columns(5).search(textSelected).draw();
    });
    $("#dismissedCase").click(function(){
        var textSelected = 'Dismissed';
        oTable.columns(5).search(textSelected).draw();
    });
    $("#endorsedCase").click(function(){
        var textSelected = 'Endorsed';
        oTable.columns(5).search(textSelected).draw();
    });

    var state = $('#state').val();
    $('#voters').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": SITE_URL+"dashboard/getvoters/"+state,
            "type": "POST",
        },
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6]
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6 ]
                },
                customize: function (doc) {
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6]
                }
            },
        ]
    });

    $('#population').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": SITE_URL+"resident/getpopulation",
            "type": "POST",
        },
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5]
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5 ]
                },
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5]
                }
            },
        ]
    });

    $('#residentcertstable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": SITE_URL+"resident/getresidentscerts",
            "type": "POST",
        },
    });

    $('#residenttable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": SITE_URL+"resident/getresidents",
            "type": "POST",
        },
        "lengthMenu": [[10, 25, 50, 1000000], [10, 25, 50, "All"]],
        "dom": 'Blfrtip',
        "buttons": [
            {
                "extend": 'print',
                "title": 'Resident Information',
                "exportOptions": {
                    "columns": [0,1,2,3,4,5,6,7,8,9,10]
                }
            },
        ],
    });

    $('#deathTable').DataTable({
        "processing": true,
        "serverSide": true,
        "filter": true,
        "ajax":{
            "url": SITE_URL+"dashboard/getcovidDeaths",
            "type": "POST",
        },
        "lengthMenu": [[10, 25, 50, 1000000], [10, 25, 50, "All"]],
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8 ]
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8 ]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8 ]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8 ]
                },
                customize: function (doc) {
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8 ]
                }
            },
        ]
    });

    var cov = $('#covidTable').DataTable({
        "processing": true,
        "serverSide": true,
        "filter": true,
        "ajax":{
            "url": SITE_URL+"dashboard/getcovidStats",
            "type": "POST",
        },
        "lengthMenu": [[10, 25, 50, 1000000], [10, 25, 50, "All"]],
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7 ]
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7 ]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7 ]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7 ]
                },
                customize: function (doc) {
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7 ]
                }
            },
        ]
    });

    $("#allNega").click(function(){
        $('#covidTable_filter input').val('Negative');
        $('#covidTable_filter input').keyup();
    });
    $("#allPosi").click(function(){
        $('#covidTable_filter input').val('Positive');
        $('#covidTable_filter input').keyup();
    });
    $("#allFully").click(function(){
        $('#covidTable_filter input').val('Fully Vaccinated');
        $('#covidTable_filter input').keyup();
    });
    $("#allVac").click(function(){
        $('#covidTable_filter input').val('1st Vaccine');
        $('#covidTable_filter input').keyup();
    });
    $("#allFullyP").click(function(){
        $('#covidTable_filter input').val('Fully Vaccinated - Positive');
        $('#covidTable_filter input').keyup();
    });
    $("#allVacP").click(function(){
        $('#covidTable_filter input').val('1st Vaccine - Positive');
        $('#covidTable_filter input').keyup();
    });

    $("#maleRes").click(function(){
        $('#population_filter input').val('Male');
        $('#population_filter input').keyup();
    });
    $("#femaleRes").click(function(){
        $('#population_filter input').val('Female');
        $('#population_filter input').keyup();
    });
    $("#allRes").click(function(){
        $('#population_filter input').val('');
        $('#population_filter input').keyup();

    });
});