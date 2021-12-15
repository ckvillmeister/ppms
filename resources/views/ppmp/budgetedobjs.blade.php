<div class="row mt-3">
    <div class="col-lg-6">
        <select class="form form-control form-control-sm" id="objects" style="width:100%">
            <option value="" data-amount=''> - Object of Expenditures - </option>
            @foreach ($objects as $object)
                <option value="{{ $object->object}}" data-amount="{{ $object->amount }}">{{ $object->object()->where('id', $object->object)->first()->obj_exp_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-6">
        <div class="float-right">
            <input type="text" class="form form-control form-control-sm bg-white text-right" id="text-approved-amount" readonly="readonly">
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-12">
        <div class="float-right">
        <button type="button" class="btn btn-sm btn-success" id="btn-export"><i class="fas fa-file-excel mr-2"></i> Export</button> 
        <button type="button" class="btn btn-sm btn-secondary" id="btn-print"><i class="fas fa-print mr-2"></i> Print</button> 
        </div>
    </div>
</div>
<br>
<script>
    $("#text-approved-amount").inputmask('decimal', {'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'});

    $('#objects').on('change', function(){
        var amount = $('option:selected', this).attr('data-amount');
        $('#text-approved-amount').val(amount);
    })

    $('#btn-print').on('click', function(){
        var dept = $('#departments').val(),
            deptname = $('#departments option:selected').text(),
            year = $('#cbo_year').val();

        $.ajax({
            headers: {
                'x-csrf-token': token
            },
            url: '/reports/getppmp',
            method: 'POST',
            data: {'dept': dept, 'year': year},
            setCookies: token,
            dataType: "HTML",
            beforeSend: function() {
                $('#basicloader').show();
            },
            complete: function(){
                $('#basicloader').hide();
            },
            success: function(result) {
                var mywindow = window.open('', 'Project Procurement Management Plan - ' + deptname, 'height=' + screen.height + ',width=' + screen.width + ',scrollbars=yes');
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
            error: function(obj, msg, exception){
                message('Error', 'red', msg + ": " + obj.status + " " + exception);
            }
        })
    })
</script>

