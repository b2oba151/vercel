document.addEventListener('DOMContentLoaded', function() {
    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;
  
    var containerEl = document.getElementById('external-events');
    var calendarEl = document.getElementById('calendar');
    var checkbox = document.getElementById('drop-remove');
  
    // initialize the external events
    // -----------------------------------------------------------------
  
    new Draggable(containerEl, {
      itemSelector: '.fc-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText
        };
      }
    });
  
    // initialize the calendar
    // -----------------------------------------------------------------
  
    var calendar = new Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next,today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,list'
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
    drop: function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
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