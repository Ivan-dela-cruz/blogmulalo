$(document).on('click', '.create-modaltag', function () {
    $('#create-tag').modal('show');
    $('.form-horizontal-tag').show();
    $('.modal-title-tag').text('Añadir período administrativo');
});
$("#add-tag").click(function () {
    $.ajax({
        type: 'POST',
        url: 'store-period',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': $('input[name=nametag]').val(),
            'start_date': $('input[name=slug]').val(),
            'end_date': $('input[name=datend]').val()
        },
        success: function (data) {
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                $('.error').text(data.errors.name);
                $('.error').text(data.errors.slug);
            } else {
                $('.error').remove();
                $('#table').append("<tr class='period" + data.id + "'>" +
                    "<td>" + data.id + "</td>" +
                    "<td>" + data.name + "</td>" +
                    "<td>" + data.start_date + "</td>" +
                    "<td>" + data.end_date + "</td>" +
                    "<td>" + data.created_at + "</td>" +
                    "<td>" + data.updated_at + "</td>" +
                    "<td>" +
                    "<button class='show-modal-tag btn btn-info btn-sm' data-id-tag='" + data.id + "' data-name-tag='" + data.name + "' data-slug-tag='" + data.start_date + "' data-end-date='" + data.end_date + "'>" +
                    "<span class='fa fa-eye'></span>" +
                    "</button> " +
                    "</td>" +
                    "<td>" +
                    "<button class='edit-modal-tag btn btn-warning btn-sm' data-id-tag='" + data.id + "' data-name-tag='" + data.name + "' data-slug-tag='" + data.start_date + "' data-end-date='" + data.end_date + "'>" +
                    "<span class='fa fa-pencil'></span>" +
                    "</button> " +
                    "</td>" +
                    "<td>" +
                    "<button class='delete-modal-tag btn btn-danger btn-sm' data-id-tag='" + data.id + "' data-name-tag='" + data.name + "' data-slug-tag='" + data.start_date + "' data-end-date=" + data.end_date + "'>" +
                    "<span class='fa fa-trash'></span>" +
                    "</button>" +
                    "</td>" +
                    "</tr>"
                );
            }
        },
    });
    $('#nametag').val('');
    $('#slug').val('');
    $('#datend').val('');
});

// function Edit POST
$(document).on('click', '.edit-modal-tag', function () {
    $('#footer_action_button').text(" Actualizar datos");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Editar período administrativo');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#id-tag-edit').val($(this).data('id-tag'));
    $('#name-tag-edit').val($(this).data('name-tag'));
    $('#slug-tag-edit').val($(this).data('slug-tag'));
    $('#dat-end').val($(this).data('end-date'));
    $('#myModal-tag').modal('show');
});

$('.modal-footer').on('click', '.edit', function () {
    $.ajax({
        type: 'POST',
        url: 'update-period',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $("#id-tag-edit").val(),
            'name': $('#name-tag-edit').val(),
            'start_date': $('#slug-tag-edit').val(),
            'end_date': $('#dat-end').val()
        },
        success: function (data) {
            $('.period' + data.id).replaceWith(" " +
                "<tr class='period" + data.id + "'>" +
                "<td>" + data.id + "</td>" +
                "<td>" + data.name + "</td>" +
                "<td>" + data.start_date + "</td>" +
                "<td>" + data.end_date + "</td>" +
                "<td>" + data.created_at + "</td>" +
                "<td>" + data.updated_at + "</td>" +
                "<td>" +
                "<button class='show-modal-tag btn btn-info btn-sm' data-id-tag='" + data.id + "' data-name-tag='" + data.name + "' data-slug-tag='" + data.start_date + "' data-end-date='" + data.end_date + "'>" +
                "<span class='fa fa-eye'></span>" +
                "</button> " +
                "</td>" +
                "<td>" +
                "<button class='edit-modal-tag btn btn-warning btn-sm' data-id-tag='" + data.id + "' data-name-tag='" + data.name + "' data-slug-tag='" + data.start_date + "' data-end-date='" + data.end_date + "'>" +
                "<span class='fa fa-pencil'></span>" +
                "</button> " +
                "</td>" +
                "<td>" +
                "<button class='delete-modal-tag btn btn-danger btn-sm' data-id-tag='" + data.id + "' data-name-tag='" + data.name + "' data-slug-tag='" + data.start_date + "' data-end-date=" + data.end_date + "'>" +
                "<span class='fa fa-trash'></span>" +
                "</button>" +
                "</td>" +
                "</tr>"
            );
        }
    });
});


// form Delete function
$(document).on('click', '.delete-modal-tag', function () {
    $('#footer_action_button').text(" eliminar");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('delete');
    $('.modal-title').text('Eliminar período administrativo');
    $('.id-tag-delete').text($(this).data('id-tag'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('.name-tag-delete').html($(this).data('name-tag'));
    $('#myModal-tag').modal('show');
});

$('.modal-footer').on('click', '.delete', function () {
    $.ajax({
        type: 'POST',
        url: 'destroy-period',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $('.id-tag-delete').text()
        },
        success: function (data) {
            $('.period' + $('.id-tag-delete').text()).remove();
        }
    });
});

// Show function
$(document).on('click', '.show-modal-tag', function () {
    $('#show-tag').modal('show');
    $('#idtag').text($(this).data('id-tag'));
    $('#nametagshow').text($(this).data('name-tag'));
    $('#slugtag').text($(this).data('slug-tag'));
    $('#dateend').text($(this).data('end-date'));
    $('.modal-title-tag').text('Ver etiqueta');
});

