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
    
    
    <nav>
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="/#">Home</a></li>
        <li role="presentation"><a href="/simcity.php">SimCity</a></li>
        <li role="presentation"><a href="#">Profile</a></li>
    </ul>
    </nav>
        
    <hr/>
        <!--Left section for task management/selection-->

    <?php
    //for error output
    error_reporting(E_ALL);
    ini_set('display_errors', 1); 

	header('Cache-Control: no-cache');
	header('Pragma: no-cache');
	require_once "getitems.php";
	$items = getItems();
	if(!empty($items))
	{
		echo "  <main>
                <div class = 'container'>
                <table class = 'centered'>
				<tr>
					<th>Name</th>
					<th>Category</th>
					<th>Date</td>
					<th>Complete</th>
					<th>Mark Complete?</th>
					<th>Delete?</th>
				</tr>";
		foreach($items as $item)
		{
			echo 	"<tr>
						<td>".$item[1]."</td>
						<td>".$item[2]."</td>
						<td>".$item[3]."</td>";
							
			if($item[4] == 0)
			{
				echo "<td>No</td>";
				echo "<td><a href='markitemcomplete.php?id=".$item[0]."'>Mark complete</a></td>";
			}
			else
			{
				echo "<td>Yes</td>";
				echo "<td>N/A</td>";
			}
			echo "<td><a href='deleteitem.php?id=".$item[0]."'>Delete</a></td>";
			echo "</tr>";
            echo "</div>";
		}
		
		echo "</table>";
	}
?>
	
    
    <div class="container">

        <form class="form-horizontal" role="form" action="additem.php" method="post">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="itemName" id="itemName">Item Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="itemName" type="text" name="itemName">
                    </div>
                <label class="col-sm-2 control-label" for="category" id="category">Category</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="category" type="text" name="category">
                    </div>

            </div>
            <div class="form-group"> 
                  <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary">Add Item</button>
                  </div>
                </div>
	    </form>
    </div>
    </main>

      
    
</BODY>
</HTML>