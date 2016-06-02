function alert() {
    $("#porn").fadeOut(600);
};

function redirectNews() {
    window.location.replace("index.php");
}

$(document).ready(function () {
    var screen = document.documentElement.clientWidth;
    if (screen >= 1100) {
        $("#sidebar_social").fadeIn(600);
    }
    console.log(screen);
});

$('button.cat').click(function(){
    var objectID = $(this).attr('id');
    console.log(objectID);
    console.log($(this).text());
    var cat = $(this).text();
    $('input#cat').val(cat);
    console.log($('input#cat').val());
    
    $('button.cat').removeClass('active');
    $('button#'+objectID).addClass('active');
});
