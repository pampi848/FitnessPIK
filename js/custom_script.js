function alert(){
    $("#porn").fadeOut(600);
};

$(document).ready(function(){
    var screen = document.documentElement.clientWidth;
    if(screen < 1100){
        $("#sidebar_social").fadeOut(1);
    }
    if(screen >= 1100){
        $("#sidebar_social").fadeIn(600);
    }
});