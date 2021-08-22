$('#displayppmp').on('click', function(){
    var dept = $('#cbo_departments').val();
    retrieveProcurementList(dept);
})

$('#export_ppmp').on('click', function(){
    var dept = $("#cbo_departments option:selected").text();
    $("body #tbl_ppmp").table2excel({
        name: "Project Procurement Management Plan",
        filename: "Project Procurement Management Plan - "  + dept
    });
})

$('#print_ppmp').on('click', function(){
    var dept = $('#cbo_departments').val();
    printPPMP(dept);
})

$('#displayapp').on('click', function(){
    var app = $('#app_format').val();
    displayAPP(app);
})

$('#export_app').on('click', function(){
    var app = $('#app_format option:selected').text();

    $("body #tbl_app").table2excel({
        name: "Annual Procurement Plan",
        filename: "Annual Procurement Plan - "  + app
    });
})

$('#print_app').on('click', function(){
    var app = $('#app_format').val();
    printAPP(app);
})

function retrieveProcurementList(dept){
    request('reports.getDeptPPMP',
                'POST', 
                {'dept' : dept},
                'HTML',
                '#display_ppmp',
                '#page_loading');
}

function displayAPP(link){
    request(link,
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
            var mywindow = window.open('', 'Project Procurement Management Plan', 'height=' + screen.height + ',width=' + screen.width + ',scrollbars=yes');
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

function printAPP(link){
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        headers: {
            'x-csrf-token': token
        },
        url: link,
        method: 'POST',
        dataType: 'HTML',
        success: function(result) {
            var mywindow = window.open('', 'Annual Procurement Plan', 'height=' + screen.height + ',width=' + screen.width + ',scrollbars=yes');
            mywindow.document.write('<html><head>');
            mywindow.document.write('<title>Annual Procurement Plan</title>');
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