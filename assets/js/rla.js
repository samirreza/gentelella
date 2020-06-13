$("document").ready(function() {
    $(document).on("click", "#show_modal_btn", function(event){
        event.preventDefault();

        let url = $(this).data('url');
        let gridId = $(this).data('grid-id');
        let modalId = $(this).data('modal-id');
        let modalContainerId = $(this).data('modal-container-id');

        let keys = $('#' + gridId).yiiGridView('getSelectedRows');
        if(keys.length == 0){
            $('#' + modalId).modal(); // shows default error message
            return;
        }

        let data = {'ids': JSON.stringify(keys)};
        $.get(url, data).done(function(response){
            $('#' + modalContainerId).html(response);
            $('#' + modalId).modal();
            setDatePicker();
        });
    });

    $(document).on("click", "#save_access_modal_btn", function(event){
        let formId = '#' + $(this).data('form-id');
        let url = $(formId).attr('action');
        let data = $(formId).serialize();
        let modalId = $(this).data('modal-id');

        $.post(url, data).done(function(response){
            $('#' + modalId).modal('hide');
        });
    });

    $(document).on('select2:select', '#myUserIds', function (e) {
        let data = e.params.data;
        let rowHtml = '<div class="col-md-12" data-id="' + data.id + '">'+
        '<hr><div class="col-md-4" style="margin-top:10px">' + data.text + '</div>'+
        '<div class="form-group field-rowlevelaccess-access-types col-md-4">'+
        '<div class="checkbox">'+
        '<label for="RowLevelAccess[accessTypes][' + data.id + ']">'+
        '<input type="hidden" name="RowLevelAccess[accessTypes][' + data.id + ']" value="1">' +
        '<input type="checkbox" class="modal-access-type" id="rowlevelaccess-access-types" name="RowLevelAccess[accessTypes][' + data.id + ']" value="2">'+
        'دسترسی موقت'+
        '</label>'+
        '</div>'+
        '</div>'+
        '<div class="form-group col-md-4">'+
        '<input type="text" name="RowLevelAccess[expireDates][' + data.id + ']" class="form-control datepicker" placeholder="تاریخ انقضا" disabled="disabled">'+
        '</div>'+
        '</div>';
        $('#users_list').append(rowHtml);
        setDatePicker();
    });

    $(document).on('select2:unselect', '#myUserIds', function (e) {
        let data = e.params.data;
        $('#users_list > div[data-id="' + data.id + '"]').remove();
    });

    $(document).on('select2:clear', '#myUserIds', function (e) {
        $('#users_list').html('');
    });

    $(document).on('click', '.modal-access-type', function(){
        let myDatepicker = $(this).parent().parent().parent().parent().find('.datepicker');
        myDatepicker.prop('disabled', function(i, v) { return !v; });
        if(!$(this).is(':checked')){
            myDatepicker.val('');
        }
    });
});

function setDatePicker(){
    $('.datepicker').datepicker({isRTL: true, dateFormat: "yy/mm/dd", weekStart: 0});
}