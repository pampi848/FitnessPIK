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