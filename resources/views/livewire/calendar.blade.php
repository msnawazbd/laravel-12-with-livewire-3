<div>
    <div id="calendar" wire:ignore></div>
</div>

@script
<script>
    document.addEventListener('livewire:initialized', function () {
        console.log('Livewire calendar component initialized');

        // Initialize the calendar
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: @json($events),
            editable: true,
            selectable: true,
            select: function(info) {
                console.log(info)
                var title = prompt('Enter Event Title:');
                if (title) {
                    Livewire.dispatch('eventAdded', {title: title, start: info.startStr, end: info.endStr});
                }
            },
            eventClick: function(info) {
                console.log(info.event.id);
            }
        });

        calendar.render();

        Livewire.on('eventLoaded', function(events) {
            console.log('Events loaded:', events);
            calendar.removeAllEvents();
            calendar.addEventSource(events);
        });

    });
</script>
@endscript
