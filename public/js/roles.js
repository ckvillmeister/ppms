retrieveRoleList(1);

$('#newRole').on('click', function(){
    $('#reset').click(); 
    $('#modal_new_role').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true});

    getForm(0);
});

function retrieveRoleList(status){
    request('roles.retrieveRoles',
                'POST', 
                {'status' : status},
                'HTML',
                '#rolelist',
                '#page_loading');
}

function getForm(roleid){
    request('roles.getForm',
                'POST', 
                {'roleid' : roleid},
                'HTML',
                '#new_role_form',
                '#form_loading');
}