// form Delete function
$(document).on('click', '.delete-modal-cat', function () {
    $('#footer_action_button').text(" eliminar");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('delete');
    $('.modal-title-cat').text('Eliminar noticia');
    $('.id-cat-delete').text($(this).data('id-cat'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('.name-cat-delete').html($(this).data('name-cat'));
    $('#myModal-cat').modal('show');
});

$('.modal-footer').on('click', '.delete', function () {
    $.ajax({
        type: 'POST',
        url: 'destroy-post',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $('.id-cat-delete').text()
        },
        success: function (data) {
            $('.cat' + $('.id-cat-delete').text()).remove();
        }
    });
});