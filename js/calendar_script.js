var siteWidth = 0;
var positioned = false;

$(document).ready(function(){
    var width_custom = $('th#czw').css("width");
    $('th').css("width", width_custom+" !important" );
    siteWidth = $(document).width();
    console.log(siteWidth);
});
$('td.calendar_day').click(function(){
    var object = $(this);
    var position = object.offset();
    var dymek = $('#dymek');
    var day = object.html();
    day = day[0]+day[1];
    var content = event(day, dymek);
    $('#dymek-content').html(content);
    dymek.toggle(500, function(){
    });
    dymek.css('top', position.top);
    dymek.css('left', position.left);
    console.log('work');
    });

$('#dymek').mouseleave(function(){
    $('#dymek').toggle(500);
    $('#dymek-content').html('');
});

function event(day, object){
    switch(day){
        case "1 ":
            var content = "<ul class=\"list-group\">";
            content+= "<li class=\"list-group-item calendar-event\">Spotkanie organizacyjne judo  <span class=\"badge\">14.00</span></li>";
            content+= "<li class=\"list-group-item calendar-event\">Zebranie młodzików karate <span class=\"badge\">17.00</span></li>";
            content+= "</ul>";
            object.css('width', '300px');
            object.css('height', '120px');
            return content;
            break;
        case "10":
            var content = "<ul class=\"list-group\">";
            content+= "<li class=\"list-group-item calendar-event\">Wspólna wycieczka do ZOO <span class=\"badge\">16.30</span></li>";
            content+= "</ul>";
            object.css('width', '300px');
            object.css('height', '60px');
            return content;
            break;
        default:
            var content = "<div class=\"calendar-event\">Brak wydarzeń</div>";
            object.css('width', '300px');
            object.css('height', '60px');
            return content;
            break;
    }
};

function sizeOfEvent(){
    var eventWidth = $('.calendar-event').css('width');
    var eventHeight = $('.calendar-event').css('height');
    var eventNumber = $('.calendar-event').length;
    var eventSize = [eventWidth, eventHeight, eventNumber];
    return eventSize;
};

function toggleCalendar(){
    if(positioned==false)
    {positionCalendar();}
    $('button.calendar-show').toggleClass("active");
    $('div.calendar-container').slideToggle(1000);
};

function closeCalendar(){
    $('div.calendar-container').slideToggle(1000);
    $('button.calendar-show').toggleClass("active");
};

function positionCalendar(){
    var object = $('.calendar-container');
    var position = $('#sidebar_social').offset();
    var width = object.width();
    var newPositionHorizontal = position.left - width;
    console.log(newPositionHorizontal);
    var height = object.height();
    var newPositionVertical = position.top;
    console.log(newPositionVertical);
    object.offset({top: newPositionVertical, left: newPositionHorizontal});
    positioned=true;
}