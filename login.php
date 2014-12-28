
<?php
    //for error output
    error_reporting(E_ALL);
    ini_set('display_errors', 1);      
    
    session_start();
    require_once (__DIR__.'/classes/Membership.php');

    $membership = new Membership();
    if($_POST && !empty($_POST['username']) && !empty($_POST['pwd'])){
       $response = $membership->validate_User($_POST['username'], $_POST['pwd']);
    }

?>

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
        <form class="form-horizontal" role="form" method = "post" action="">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="username" id="username">Username</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="username" type="email" name="username" placeholder="Email">
                    </div>
                <label class="col-sm-2 control-label" for="pword"  id="pwd">Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" id="pwd" name = "pwd" placeholder ="Password">
                    </div>
                </div>
            <div class="checkbox">
                <label><input type="checkbox" checked="checked">Remember Me</label>
                
            </div>
            
             <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary pull-left">Login</button>
                </div>
             </div>
           
        </form>

    
        
    
    </div>
    <?php if(isset($response)) echo $response?>

</BODY>
</HTML>
