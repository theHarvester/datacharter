$(document).ready(function(){
    $('.edit-me').click(function(){
        var pos = $(this).position();
        lastClicked = $(this);
        $("#edit-charts").css('left', pos.left-20);
        $("#edit-charts").css('top', pos.top+20);
        $("#edit-charts").fadeIn(200);
        $("#edit-charts").data('id', $(this).data("id"));
        $("#edit-charts input").val($.trim($(this).text()));
    });

    $('#edit-cancel').click(function(){
        $("#edit-charts").fadeOut(200);
    });

    $('#edit-save').click(function(){
        alert($("#edit-charts input"));
        $.ajax({
            type: "PUT",
            url: "http://localhost/datacharter/public/charts/"+$("#edit-charts").data("id"),
            data: { data: $("#edit-charts input").val() }
        }).done(function( msg ) {
            lastClicked.text($("#edit-charts input").val());
            $("#edit-charts").fadeOut(200);
        });
    });
    $('#edit-delete').click(function(){
        $.ajax({
            type: "DELETE",
            url: "http://localhost/datacharter/public/charts/"+$("#edit-charts").data("id")
        }).done(function( msg ) {
            lastClicked.parent().text('Deleted');
            $("#edit-charts").fadeOut(200);
        });
    });
});