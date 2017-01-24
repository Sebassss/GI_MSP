/**
 * Created by Calopsia on 24/01/2017.
 */
function loadPage(routes){

    $.ajax({
        url: routes,
        type: "POST",
        global: true,
        cache:false

    }).done(function(data) {

        $("#main").html(data);
    });
}