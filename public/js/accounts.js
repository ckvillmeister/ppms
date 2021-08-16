retrieveAccountList(1);

$('#newAccount').on('click', function(){
    $('#reset').click(); 
    $('#modal_new_account').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true});

    getForm(0);
});

function retrieveRoleList(status){
    request('accounts.retrieveAccounts',
                'POST', 
                {'status' : status},
                'HTML',
                '#accountlist',
                '#page_loading');
}

function getForm(accountid){
    request('accounts.getForm',
                'POST', 
                {'accountid' : accountid},
                'HTML',
                '#new_account_form',
                '#form_loading');
}