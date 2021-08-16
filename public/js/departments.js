retrieveDepartmentList(1);

$('#newDepartment').on('click', function(){
    $('#reset').click(); 
    $('#modal_new_department').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true});

    getForm(0);
});

function retrieveDepartmentList(status){
    request('departments.retrieveDepartments',
                'POST', 
                {'status' : status},
                'HTML',
                '#departmentlist',
                '#page_loading');
}

function getForm(deptid){
    request('departments.getForm',
                'POST', 
                {'deptid' : deptid},
                'HTML',
                '#new_department_form',
                '#form_loading');
}