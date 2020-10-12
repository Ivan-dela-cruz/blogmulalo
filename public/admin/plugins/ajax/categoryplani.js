$(document).on('click', '.create-modalcat', function () {
    $('#create-cat').modal('show');
    $('.form-horizontal-cat').show();
    $('.modal-title-cat').text('Añadir categorias');
});
$("#add-cat").click(function () {
    var nombre = $("#namecat").val();
    var conte = $("#bodycat").val();
    if (nombre != '') {
        if (conte != '') {
            $.ajax({
                type: 'POST',
                url: 'store-categoryplanification',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name': $('input[name=namecat]').val(),
                    'body': $('input[name=bodycat]').val()
                },
                success: function (data) {
                    if ((data.errors)) {
                        $('.error').removeClass('hidden');
                        $('.error').text(data.errors.name);
                        $('.error').text(data.errors.body);
                    } else {
                        $('.error').remove();
                        $('.name-error').addClass('hide');
                        $('.body-error').addClass('hide');
                        $('#table').append("<tr class='cat" + data.id + "'>" +
                            "<td>" + data.id + "</td>" +
                            "<td>" + data.name + "</td>" +
                            "<td>" + data.body + "</td>" +
                            "<td>" + data.created_at + "</td>" +
                            "<td>" + data.updated_at + "</td>" +
                            "<td>" +
                            "<button class='show-modal-cat btn btn-info btn-sm' data-id-cat='" + data.id + "' data-name-cat='" + data.name + "' data-body-cat='" + data.body + "'>" +
                            "<span class='fa fa-eye'></span>" +
                            "</button> " +
                            "</td>" +
                            "<td>" +
                            "<button class='edit-modal-cat btn btn-warning btn-sm' data-id-cat='" + data.id + "' data-name-cat='" + data.name + "' data-body-cat='" + data.body + "'>" +
                            "<span class='fa fa-pencil'></span>" +
                            "</button> " +
                            "</td>" +
                            "<td>" +
                            "<button class='delete-modal-cat btn btn-danger btn-sm' data-id-cat='" + data.id + "' data-name-cat='" + data.name + "' data-body-cat='" + data.body + "'>" +
                            "<span class='fa fa-trash'></span>" +
                            "</button>" +
                            "</td>" +
                            "</tr>"
                        );
                    }
                },
            });
            $('#namecat').val('');
            $('#bodycat').val('');

        } else {
            $('.body-error').removeClass('hide');
        }
    }
    else {
        $('.name-error').removeClass('hide');
    }

});

// function Edit POST
$(document).on('click', '.edit-modal-cat', function () {
    $('#footer_action_button').text(" Actualizar categoria");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Editar categoria');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#id-cat-edit').val($(this).data('id-cat'));
    $('#name-cat-edit').val($(this).data('name-cat'));
    $('#body-cat-edit').val($(this).data('body-cat'));
    $('#myModal-cat').modal('show');
});

$('.modal-footer').on('click', '.edit', function () {
    $.ajax({
        type: 'POST',
        url: 'update-categoryplanification',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $("#id-cat-edit").val(),
            'name': $('#name-cat-edit').val(),
            'body': $('#body-cat-edit').val()
        },
        success: function (data) {
            $('.cat' + data.id).replaceWith(" " +
                "<tr class='cat" + data.id + "'>" +
                "<td>" + data.id + "</td>" +
                "<td>" + data.name + "</td>" +
                "<td>" + data.body + "</td>" +
                "<td>" + data.created_at + "</td>" +
                "<td>" + data.updated_at + "</td>" +
                "<td>" +
                "<button class='show-modal-cat btn btn-info btn-sm' data-id-cat='" + data.id + "' data-name-cat='" + data.name + "' data-body-cat='" + data.body + "'>" +
                "<span class='fa fa-eye'></span>" +
                "</button> " +
                "</td>" +
                "<td>" +
                "<button class='edit-modal-cat btn btn-warning btn-sm' data-id-cat='" + data.id + "' data-name-cat='" + data.name + "' data-body-cat='" + data.body + "'>" +
                "<span class='fa fa-pencil'></span>" +
                "</button> " +
                "</td>" +
                "<td>" +
                "<button class='delete-modal-cat btn btn-danger btn-sm' data-id-cat='" + data.id + "' data-name-cat='" + data.name + "' data-body-cat='" + data.body + "'>" +
                "<span class='fa fa-trash'></span>" +
                "</button>" +
                "</td>" +
                "</tr>"
            );
        }
    });
});


// form Delete function
$(document).on('click', '.delete-modal-cat', function () {
    $('#footer_action_button').text(" eliminar");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('delete');
    $('.modal-title').text('Eliminar categoria');
    $('.id-cat-delete').text($(this).data('id-cat'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('.name-cat-delete').html($(this).data('name-cat'));
    $('#myModal-cat').modal('show');
});

$('.modal-footer').on('click', '.delete', function () {
    $.ajax({
        type: 'POST',
        url: 'destroy-categoryplanification',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $('.id-cat-delete').text()
        },
        success: function (data) {
            $('.cat' + $('.id-cat-delete').text()).remove();
        }
    });
});

// Show function
$(document).on('click', '.show-modal-cat', function () {
    $('#show-cat').modal('show');
    $('#idcat').text($(this).data('id-cat'));
    $('#namecatshow').text($(this).data('name-cat'));
    $('#bodycatshow').text($(this).data('body-cat'));
    $('.modal-title-cat').text('Ver categoria');
});

