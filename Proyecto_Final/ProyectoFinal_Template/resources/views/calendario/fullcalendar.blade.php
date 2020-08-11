@extends('layouts.app', [
    'namePage' => 'calendario',
    'class' => 'sidebar-mini',
    'activePage' => 'calendario',
])
@section ('titulo', 'Administración de calendario')
@section('content')
@guest
@else
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="panel-header panel-header-sm">
  </div>
<div class="content">
    <div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <br>
            <h4 style="padding-left: 20px;" class="card-title"> Calendario de Citas</h4>
            <br>
            <hr>
            <br>
                <div class="container">
                    <div class="response"></div>
                    <div id='calendar'></div>
                    <br>  
                </div>
        </div>
</div>
    </div>
</div>


<script>
  $(document).ready(function () {
         
        var SITEURL = "{{url('calendario/fullcalendar')}}";
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
 
        var calendar = $('#calendar').fullCalendar({
            editable: true,
            events: SITEURL + "calendario/fullcalendar",
            displayEventTime: true,
            editable: true,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                var title = prompt('Nombre del Paciente:');
 
                if (title) {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
 
                    $.ajax({
                        url: SITEURL + "calendario/fullcalendar/create",
                        data: 'title=' + title + '&amp;start=' + start + '&amp;end=' + end,
                        type: "POST",
                        success: function (data) {
                            displayMessage("Añadido Satisfactoriamente");
                        }
                    });
                    calendar.fullCalendar('renderEvent',
                            {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay
                            },
                    true
                            );
                }
                calendar.fullCalendar('unselect');
            },
             
            eventDrop: function (event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url: SITEURL + 'calendario/fullcalendar/update',
                            data: 'title=' + event.title + '&amp;start=' + start + '&amp;end=' + end + '&amp;id=' + event.id,
                            type: "POST",
                            success: function (response) {
                                displayMessage("Actualizado Satisfactoriamente");
                            }
                        });
                    },
            eventClick: function (event) {
                var deleteMsg = confirm("Deseas eliminarlo?");
                if (deleteMsg) {
                    $.ajax({
                        type: "POST",
                        url: SITEURL + 'calendario/fullcalendar/delete',
                        data: "&amp;id=" + event.id,
                        success: function (response) {
                            if(parseInt(response) > 0) {
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                displayMessage("Eliminado Satisfactoriamente");
                            }
                        }
                    });
                }
            }
 
        });
  });
 
  function displayMessage(message) {
    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
  }
</script>

@endguest
@endsection