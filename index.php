<!DOCTYPE html>
<HTML lang = "en-US">
    
   <HEAD>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
       <link rel = "stylesheet" href="style.css">

       <!--Needed for use of FullCalendar-->
        <link href='fullcalendar/fullcalendar.css' rel='stylesheet' />
        <link href='fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
        <script src='lib/moment.min.js'></script>   
        <script src='lib/jquery.min.js'></script>
        <script src='fullcalendar/fullcalendar.min.js'></script>

       <script>
           $(document).ready(function () {

               $('#calendar').fullCalendar({
                   header: {
                       left: 'prev,next today',
                       center: 'title',
                       right: 'month,agendaWeek,agendaDay'
                   },
                   editable: true,
                   eventLimit: true, // allow "more" link when too many events
                   defaultView: 'basicWeek',
                   events: {
                       url: 'php/get-events.php',
                       error: function () {
                           $('#script-warning').show();
                       }

                   },
                   loading: function (bool) {
                       $('#loading').toggle(bool);
                   },
                   eventClick: function (event) {
                       if (event.link) {
                           window.open(event.link);
                           return false;
                       }
                   },
                   
                   eventRender: function (event, element) {
                       element.text(event.name)
                       }
                   
                   

               });

           });
       </script>
       
      <TITLE>
         Task Me Now! 
      </TITLE>
   </HEAD>
<BODY>

   <div class="container">
       <H1>TaskMeNow</H1>

       <P title = "Brief Overview">TaskMeNow is a lightweight task management system that allows you to
           quickly add, complete, delete, and defer tasks you need to work with on a daily basis.</P> 
   </div>
    
   
        
    <div id="calendar"><script>$document.fullCalendar('renderEvent', events)</script></div>

    
    <div class="container">

        <form class="form-horizontal" role="form" action="/methods/addshow.php" method="post">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="show" id="show">Show</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="show" type="text" name="show">
                    </div>
            </div>
            <div class="form-group"> 
                  <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary">Add Show</button>
                  </div>
                </div>
	    </form>
    </div>
    </main>
    
</BODY>
</HTML>