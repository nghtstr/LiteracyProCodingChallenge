
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

$(function() {

    $('input[name$=_date]').datetimepicker({
        format: 'MMM DD, YYYY',
        viewMode: 'years'
    });

    $('table.albumTable').DataTable({

        columnDefs: [
            {
                "targets": [ 1 ],
                "visible": false
            },
            {
                "targets": [ 0 ],
                "searchable": false
            }
        ],
        "paging":   true,
        "ordering": false,
        "info":     false,
        "pageLength": 25,
        "sDom": "<'row'<'col-sm-12'tr>><'row'<'col-sm-12'p>>",
        "language": {
            "paginate": {
                "previous": "<i class='glyphicon glyphicon-arrow-left' style=\"margin-top:3px; margin-bottom: 3px;\">",
                "next": "<i class='glyphicon glyphicon-arrow-right' style=\"margin-top:3px; margin-bottom: 3px;\">"
            }
        }
    });

    $('.bandSelect').on( 'change', function () {
        var val = $(this).val();

        var table = $('table.albumTable').DataTable();

        table
            .columns( 1 )
            .search( val )
            .draw();
    } );

    $("a.addNew").mouseup(function() {
        $('form').removeClass('hidden').data('id', '');
    });

    $("td>i.clickable").mouseup(function () {
        var page = $(this).parents('table').hasClass('bandTable') ? 'band' : 'album';
        var id = $(this).parent().data('id');

        if ($(this).hasClass('glyphicon-trash')) {
            // Do Delete
            doDelete(page, id, $.trim($(this).parent().text()));

        } else if ($(this).hasClass('glyphicon-pencil')) {
            $.get('/' + page + '/' + id, {}, function (data) {
                $('form').removeClass('hidden').data('id', data.id);
                if (page == 'band') {
                    showBandForm(data);
                } else {
                    showAlbumForm(data);
                }
            });
        } else {
            // How did we get here?? So we do nothing.
        }
    });

    $('form').on('submit', function(e) {
        e.preventDefault();
        e.returnValue = false;
        var ok = true;

        $('.required', this).each(function () {
            if ($.trim($(this).val()) != '') {
                $(this).removeClass('error');
            } else {
                $(this).addClass('error');
                ok = false;
            }
        });
        if (!ok) return;

        var url = $(this).prop('action');
        var method = 'post';
        if ($(this).data('id') != '') {
            url += '/' + $(this).data('id');
            method = 'put';
        }

        $.ajax({
            method: method,
            url: url,
            data: $(this).serialize()
        }).done(function( msg ) {
            window.location.href = '';
        });

    })
});

function doDelete(page, id, name) {
    if (confirm('Are you sure you wish to delete the ' + page + ' ' + name)) {
        $.ajax({
            method: 'delete',
            url: '/' + page + '/' + id
        }).done(function( msg ) {
            window.location.href = '';
        });
    }
}

function showBandForm(data) {
    $('input[name=name]').val(data.name);
    $('input[name=website]').val(data.website);
    $('input[name=start_date]').data("DateTimePicker").date(moment(data.start_date));
    $('input[name=still_active][value=' + data.still_active + ']').click();

    $('.albumList').html('');
    for (i in data.albums) {
        var album = data.albums[i];
        $('.albumList').append('<div><i class="glyphicon glyphicon-cd"></i> ' + album.name + '</div>');
    }
}

function showAlbumForm(data) {
    $('select[name=band_id]').val(data.band_id);
    $('input[name=name]').val(data.name);
    $('input[name=label]').val(data.label);
    $('input[name=number_of_tracks]').val(data.number_of_tracks);
    $('input[name=producer]').val(data.producer);
    $('input[name=genre]').val(data.genre);
    $('input[name=recorded_date]').data("DateTimePicker").date(moment(data.recorded_date));
    $('input[name=release_date]').data("DateTimePicker").date(moment(data.release_date));
}