$('#save').on('click', function(){
    var permissions = [];
    var ctr = 0;
    var id = $(this).val();
  
    $('#permissions input[type=checkbox]').each(function() {
      if ($(this).is(":checked")) {
        permissions[ctr] = $(this).val();
        ctr++;
      }
    });
  
    request('/roles/saverolepermissions', 'POST', {'id' : id, 'permissions' : permissions}, 'JSON');
});