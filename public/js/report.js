displayAPP();

$('#go').on('click', function(){
    var dept = $('#cbo_departments').val();
    retrieveProcurementList(dept);
})

$('#print').on('click', function(){
    var dept = $('#cbo_departments').val();
    printPPMP(dept);
})

function retrieveProcurementList(dept){
    request('reports.getDeptPPMP',
                'POST', 
                {'dept' : dept},
                'HTML',
                '#display_ppmp',
                '#page_loading');
}

function displayAPP(){
    request('reports.retrieveAPP',
                'POST', 
                null,
                'HTML',
                '#display_app',
                '#page_loading');
}

function printPPMP(dept){
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        headers: {
            'x-csrf-token': token
        },
        url: 'reports.getDeptPPMP',
        method: 'POST',
        data: {'dept': dept},
        dataType: 'HTML',
        success: function(result) {
            var mywindow = window.open('', 'Project Procurement Management Plan', 'height=800,width=1020,scrollbars=yes');
            mywindow.document.write('<html><head>');
            mywindow.document.write('<title>Project Procurement Management Plan</title>');
            mywindow.document.write('<link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css" media="all">');
            mywindow.document.write('<link rel="stylesheet" href="css/ppmp.css">');
            mywindow.document.write('</head><body>');
            mywindow.document.write(result);
            mywindow.document.write('</body></html>');
            mywindow.document.close();
            setTimeout(function(){
                mywindow.focus();
                mywindow.print();    
            },350);
        },
        error: function(obj, err, ex){
            message('Error', 'red', msg + ": " + obj.status + " " + exception);
      }
    })
}