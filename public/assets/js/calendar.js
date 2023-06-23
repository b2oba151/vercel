$(document).ready(function() {
    /* initialize the external events
            -----------------------------------------------------------------*/


    function initEvent() {
        $('#external-events .fc-event').each(function() {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                color: $(this).css('background-color'),
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true, // will cause the event to go back to its
                revertDuration: 0 // original position after the drag
            });

        });
    }
    initEvent();


    /* initialize the calendar
    -----------------------------------------------------------------*/
    var newDate = new Date,
        date = newDate.getDate(),
        month = newDate.getMonth(),
        year = newDate.getFullYear();

        var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
            headerToolbar: {
                left: 'prev,next,today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,,list'
            },
            initialView: 'dayGridMonth',
    
    
    
    
        timeZone: 'UTC',
        locale: 'fr',
        events: 'https://fullcalendar.io/api/demo-feeds/events.json',
        editable: true,
        selectable: true,
        
    
            
            
            
            
        themeSystem: 'bootstrap4',
        buttonText:{
            today: 'Aujourd\'hui',
            year: 'Année',
            month: 'Mois',
            week: 'Semaine',
            day: 'Jour',
            list: 'Planning',
        },
        weekText: 'Sem.',
        weekTextLong: 'Semaine',
        allDayText: 'Toute la journée',
        moreLinkText: 'en plus',
        noEventsText: 'Aucun évènement à afficher',

        themeSystem: "bootstrap4",
        droppable: true,
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        drop: function() {
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }
        },


        events: [{
            title: "aaaaaa",
            start: new Date(year, month, 1),
            allDay: !0,
            color: "#ffc107"
        }, {
            title: "bbbbb",
            start: new Date(year, month, 3)
        }, {
            title: "ccccc",
            start: new Date(year, month, 9),
            end: new Date(year, month, 12),
            allDay: !0,
            color: "#d22346"
        }, {
            title: "ddddd",
            start: new Date(year, month, 17),
            end: new Date(year, month, 19),
            allDay: !0,
            color: "#d22346"
        },  {
            title: "eeeeeeeee",
            start: new Date(year, month, date + 8, 20, 0),
            end: new Date(year, month, date + 8, 22, 0)
        }]
    });




    jQuery(".js-form-add-event").on("submit", function(e) {
        e.preventDefault();

        var data = $('#newEvent').val();
        $('#newEvent').val('');
        $('#external-events').prepend('<li class="list-group-item bg-success fc-event">' + data + '</li>');

        initEvent();
    });
    calendar.render();
});