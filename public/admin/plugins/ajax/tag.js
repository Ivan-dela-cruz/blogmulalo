$(document).on('click', '.create-modaltag', function () {
    $('#create-tag').modal('show');
    $('.form-horizontal-tag').show();
    $('.modal-title-tag').text('Añadir etiquetas');
});
$("#add-tag").click(function () {
    $.ajax({
        type: 'POST',
        url: 'store-tag',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': $('input[name=nametag]').val(),
            'slug': $('input[name=slug]').val()
        },
        success: function (data) {
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                $('.error').text(data.errors.name);
                $('.error').text(data.errors.slug);
            } else {
                $('.error').remove();
                $('#table').append("<tr class='tag" + data.id + "'>" +
                    "<td>" + data.id + "</td>" +
                    "<td>" + data.name + "</td>" +
                    "<td>" + data.slug + "</td>" +
                    "<td>" + data.created_at + "</td>" +
                    "<td>" + data.updated_at + "</td>" +
                    "<td>" +
                    "<button class='show-modal-tag btn btn-info btn-sm' data-id-tag='" + data.id + "' data-name-tag='" + data.name + "' data-slug-tag='" + data.slug + "'>" +
                    "<span class='fa fa-eye'></span>" +
                    "</button> " +
                    "</td>" +
                    "<td>" +
                    "<button class='edit-modal-tag btn btn-warning btn-sm' data-id-tag='" + data.id + "' data-name-tag='" + data.name + "' data-slug-tag='" + data.slug + "'>" +
                    "<span class='fa fa-pencil'></span>" +
                    "</button> " +
                    "</td>" +
                    "<td>" +
                    "<button class='delete-modal-tag btn btn-danger btn-sm' data-id-tag='" + data.id + "' data-name-tag='" + data.name + "' data-slug-tag='" + data.slug + "'>" +
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
});

// function Edit POST
$(document).on('click', '.edit-modal-tag', function () {
    $('#footer_action_button').text(" Actualizar etiqueta");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Editar etiqueta');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#id-tag-edit').val($(this).data('id-tag'));
    $('#name-tag-edit').val($(this).data('name-tag'));
    $('#slug-tag-edit').val($(this).data('slug-tag'));
    $('#myModal-tag').modal('show');
});

$('.modal-footer').on('click', '.edit', function () {
    $.ajax({
        type: 'POST',
        url: 'update-tag',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $("#id-tag-edit").val(),
            'name': $('#name-tag-edit').val(),
            'slug': $('#slug-tag-edit').val()
        },
        success: function (data) {
            $('.tag' + data.id).replaceWith(" " +
                "<tr class='tag" + data.id + "'>" +
                "<td>" + data.id + "</td>" +
                "<td>" + data.name + "</td>" +
                "<td>" + data.slug + "</td>" +
                "<td>" + data.created_at + "</td>" +
                "<td>" + data.updated_at + "</td>" +
                "<td>" +
                "<button class='show-modal-tag btn btn-info btn-sm' data-id-tag='" + data.id + "' data-name-tag='" + data.name + "' data-slug-tag='" + data.slug + "'>" +
                "<span class='fa fa-eye'></span>" +
                "</button> " +
                "</td>" +
                "<td>" +
                "<button class='edit-modal-tag btn btn-warning btn-sm' data-id-tag='" + data.id + "' data-name-tag='" + data.name + "' data-slug-tag='" + data.slug + "'>" +
                "<span class='fa fa-pencil'></span>" +
                "</button> " +
                "</td>" +
                "<td>" +
                "<button class='delete-modal-tag btn btn-danger btn-sm' data-id-tag='" + data.id + "' data-name-tag='" + data.name + "' data-slug-tag='" + data.slug + "'>" +
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
    $('.modal-title').text('Eliminar etiqueta');
    $('.id-tag-delete').text($(this).data('id-tag'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('.name-tag-delete').html($(this).data('name-tag'));
    $('#myModal-tag').modal('show');
});

$('.modal-footer').on('click', '.delete', function () {
    $.ajax({
        type: 'POST',
        url: 'destroy-tag',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $('.id-tag-delete').text()
        },
        success: function (data) {
            $('.tag' + $('.id-tag-delete').text()).remove();
        }
    });
});

// Show function
$(document).on('click', '.show-modal-tag', function () {
    $('#show-tag').modal('show');
    $('#idtag').text($(this).data('id-tag'));
    $('#nametagshow').text($(this).data('name-tag'));
    $('#slugtag').text($(this).data('slug-tag'));
    $('.modal-title-tag').text('Ver etiqueta');
});

