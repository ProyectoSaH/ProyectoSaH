<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link rel='stylesheet' href='../lib/cupertino/jquery-ui.min.css' />
<link href='../css/fullcalendar.css' rel='stylesheet' />
<link href='../css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='../lib/moment.min.js'></script>
<script src='../lib/jquery.min.js'></script>
<script src='../lib/jquery-ui.custom.min.js'></script>
<script src='../js/fullcalendar.min.js'></script>
<legend> &nbsp <?php echo 'Calendario de ',ucfirst($_GET['name']);?> </legend>
</nav>    
<script>
var newEvent = new Object();

newEvent.title = "some text";
newEvent.start = new Date();
newEvent.allDay = false;
$(document).ready(function()
		{
			/*
				date store today date.
				d store today date.
				m store current month.
				y store current year.
			*/
			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();
                        var h = (date.getTime()+900000);
			/*
				Initialize fullCalendar and store into variable.
				Why in variable?
				Because doing so we can use it inside other function.
				In order to modify its option later.
			*/
			
			var calendar = $('#calendar').fullCalendar(
			{
				theme: true,
                                /*
					header option will define our calendar header.
					left define what will be at left position in calendar
					center define what will be at center position in calendar
					right define what will be at right position in calendar
				*/
				header:
				{
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				/*
					defaultView option used to define which view to show by default,
					for example we have used agendaWeek.
				*/
				defaultView: 'agendaWeek',
				/*
					selectable:true will enable user to select datetime slot
					selectHelper will add helpers for selectable.
				*/
				selectable: true,
				selectHelper: true,
				/*
					when user select timeslot this option code will execute.
					It has three arguments. Start,end and allDay.
					Start means starting time of event.
					End means ending time of event.
					allDay means if events is for entire day or not.
				*/
                           
				select: function(start, end, allDay)
				{

					/*
						after selection user will be promted for enter title for event.
					*/
					var title = prompt('Event Title:');
					/*
						if title is enterd calendar will add title and event into fullCalendar.
					*/
                                     
					if (title)
					{
						calendar.fullCalendar('renderEvent',
							{
								title: title,
								start: start,
								end: end
                                                               
							},
							true // make the event "stick"
                                                                
						);
                                              var start_min = start.minute();
                                              var end_min = end.minute();
                                              if(start.minute()== 0) start_min = "00";
                                              if(end.minute()== 0)   end_min =   "00"; 
                                               
                                              window.location = 'view?title='+title+'&fecha='+start.year()+'-'+(start.month()+1)+'-'+(start.day()+1)+
                                                      '&horainicial='+start.hours()+':'+start_min+':00'+'&horafinal='+
                                                      end.hours()+':'+end_min+':00'+'&id='+<?php echo $_GET['id'];?>;  
                                          

					}
                                        
                                              
					calendar.fullCalendar('unselect');
				},
				/*
					editable: true allow user to edit events.
				*/
				editable: false,
				/*
					events is the main option for calendar.
					for demo we have added predefined events in json object.
				*/
			events: '../calendars/feed/ <?php echo $_GET['id'];?>'
                   

		});
		
	});
        
        

</script>
<style>

	body {
		margin: 0;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		width: 900px;
		margin: 40px auto;
	}

</style>
</head>
<body>

	<div id='calendar'></div>

</body>


</html>
