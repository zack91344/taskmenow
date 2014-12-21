<!DOCTYPE html>
<HTML lang = "en-US">
    
   <HEAD>
       
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
       <link rel = "stylesheet" href="style.css">
       
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
    
    <div class="container">
        <form class="form-horizontal" role="form" action="login.php">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="username" id="username">Username</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="username" type="email" name="username" value placeholder="Email">
                    </div>
                <label class="col-sm-2 control-label" for="pword"  id="pwd">Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" id="pwd" value placeholder="Password">
                    </div>
                </div>
            <div class="checkbox">
                <label><input type="checkbox" checked="checked">Remember Me</label>
                
            </div>
            

            <button class="btn btn-primary pull-left">Login</button>
            </form>
    
    
    </div>


</BODY>
</HTML>