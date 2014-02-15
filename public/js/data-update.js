$(document).ready(function(){
    $('.edit-me').click(function(){
        var pos = $(this).position();
        lastClicked = $(this);
        $("#edit-data").css('left', pos.left-20);
        $("#edit-data").css('top', pos.top+20);
        $("#edit-data").fadeIn(200);
        $("#edit-data").data('id', $(this).data("id"));
        $("#edit-data input").val($.trim($(this).text()));
    });

    $('#edit-cancel').click(function(){
        $("#edit-data").fadeOut(200);
    });

    $('#edit-save').click(function(){
        $.ajax({
            type: "PUT",
            url: "http://localhost/datacharter/public/data/"+$("#edit-data").data("id"),
            data: { data: $("#edit-data input").val() }
        }).done(function( msg ) {
            lastClicked.text($("#edit-data input").val());
            $("#edit-data").fadeOut(200);
        });
    });
    $('#edit-delete').click(function(){
        alert('here');
        $.ajax({
            type: "DELETE",
            url: "http://localhost/datacharter/public/data/"+$("#edit-data").data("id")
        }).done(function( msg ) {
            lastClicked.parent().text('Deleted');
            $("#edit-data").fadeOut(200);
        });
    });
});