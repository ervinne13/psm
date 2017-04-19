

@extends('layouts.skarla')

@section('css')

<style>
    .external-event {
        margin: 1px;
    }
</style>

@endsection

@section('vendor-js')
<script src="{{skarla_vendor_url("js/jquery-ui-draggable.min.js")}}"></script>
<script src="{{skarla_vendor_url("js/moment.min.js")}}"></script>
<script src="{{skarla_vendor_url("js/fullcalendar.min.js")}}"></script>
@endsection

@section('js')

<script src="{{url("js/view-presenters/PaginatedSelectViewPresenter.js")}}"></script>
<script src="{{url("js/view-presenters/master-files/CompanySelectViewPresenter.js")}}"></script>
<script src="{{url("js/view-presenters/master-files/LocationSelectViewPresenter.js")}}"></script>

<script type="text/javascript">

/* initialize the external events
 -----------------------------------------------------------------*/


$('#external-events div.external-event').each(function () {

    // store data so the calendar knows to render an event upon drop
    $(this).data('event', {
        title: $.trim($(this).text()), // use the element's text as the event title
        stick: true // maintain when user navigates (see docs on the renderEvent method)
    });

    // make the event draggable using jQuery UI
    $(this).draggable({
        zIndex: 1111999,
        revert: true, // will cause the event to go back to its
        revertDuration: 0  //  original position after the drag
    });

});


var date = new Date();
var d = date.getDate();
var m = date.getMonth();
var y = date.getFullYear();

$('#calendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
    },
    editable: true,
    droppable: true, // this allows things to be dropped onto the calendar
    drop: function () {
        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
            // if so, remove the element from the "Draggable Events" list
            $(this).remove();
        }
    },
    events: [
//        {
//            title: 'All Day Event',
//            start: new Date(y, m, 1)
//        },
//        {
//            title: 'Long Event',
//            start: new Date(y, m, d - 5),
//            end: new Date(y, m, d - 2)
//        },
//        {
//            id: 999,
//            title: 'Repeating Event',
//            start: new Date(y, m, d - 3, 16, 0),
//            allDay: false
//        },
//        {
//            id: 999,
//            title: 'Repeating Event',
//            start: new Date(y, m, d + 4, 16, 0),
//            allDay: false
//        },
//        {
//            title: 'Meeting',
//            start: new Date(y, m, d, 10, 30),
//            allDay: false
//        },
//        {
//            title: 'Lunch',
//            start: new Date(y, m, d, 12, 0),
//            end: new Date(y, m, d, 14, 0),
//            allDay: false
//        },
//        {
//            title: 'Birthday Party',
//            start: new Date(y, m, d + 1, 19, 0),
//            end: new Date(y, m, d + 1, 22, 30),
//            allDay: false
//        },
//        {
//            title: 'Click for Google',
//            start: new Date(y, m, 28),
//            end: new Date(y, m, 29),
//            url: 'http://google.com/'
//        }
    ]
});
</script>

<script src="{{url("js/pages/reports/payslip/index.js")}}"></script>
@endsection

@section('content')

<div class="row m-t-3">
    <div class="col-lg-3">
        <div class="panel panel-default b-a-0 shadow-box">
            <div class="panel-heading">
                <h5>Available Schedules</h5>             
            </div>
            <div class="panel-body">
                <div id='external-events'>
                    <p>Drag a shift to override your assigned shift to the calendar.</p>
                                                            
                    <div class='external-event fc-event'>Morning Shift 1</div>
                    <div class='external-event fc-event'>Morning Shift 2</div>
                    <div class='external-event fc-event'>Morning Shift 3</div>
                    <div class='external-event fc-event'>Mid Shift 1</div>
                    <div class='external-event fc-event'>Night Shift 1</div>
                    <div class='external-event fc-event'>Night Shift 2</div>
                    <hr>
                    <div class='external-event fc-event'>Day Off</div>
                    <p class="m-t hidden">
                        <input type='checkbox' id='drop-remove' class="i-checks" /> <label for='drop-remove'>remove after drop</label>
                    </p>
                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-9">
        <div class="panel panel-default b-a-0 shadow-box">
            <div class="panel-heading">
                <h5>Overwritten Work Schedule</h5>                
            </div>
            <div class="panel-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>

@endsection