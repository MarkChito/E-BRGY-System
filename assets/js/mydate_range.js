var minDate, maxDate;

// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date( data[0] );

        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);
$(document).ready(function() {
        // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime($('#max'), {
        format: 'MMMM Do YYYY'
    });

    var table = $('#revenuetable').DataTable({
        "order": [[ 0, "desc" ]],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
            },
            {
                extend: 'csv',
                title: 'Barangay Revenues',
            },
            {
                extend: 'excel',
                title: 'List of Barangay Revenues',
            },
            {
                extend: 'pdf',
                title: 'List of Barangay Revenues',
                exportOptions: {
                    columns: [ 0,1,2,3,4 ]
                },
            },
            {
                extend: 'print',
                title: 'List of Barangay Revenues',
            },
        ]
    });

    // Refilter the table
    $('#min, #max').on('change', function () {
        table.draw();
    });
});