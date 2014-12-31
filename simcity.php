<?php
    //for error output
    error_reporting(E_ALL);
    ini_set('display_errors', 1);      
    
    if($_POST){
       $hammer = $_POST['hammerInput'];
       $tape = $_POST['tapeInput'];
       $nail = $_POST['nailInput'];
       $plank = $_POST['plankInput'];
       $brick = $_POST['brickInput'];
       $chair = $_POST['chairInput'];
       $shovel = $_POST['shovelInput'];
       $vegetable = $_POST['vegetableInput'];

       $root = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?><houses></houses>");
       
       $xmlPath = __DIR__. '/Includes/UserSimCity.xml';

       //header('Content-type: text/xml');
       
       $xml = $root->addChild('house1');
       
       if(!empty($_POST['brickInput']))
            $xml->addChild('brick', $brick);
       if(!empty($_POST['chairInput']))
            $xml->addChild('chair', $chair);
       if(!empty($_POST['hammerInput']))
            $xml->addChild('hammer', $hammer);
       if(!empty($_POST['nailInput']))
            $xml->addChild('nail', $nail);
       if(!empty($_POST['plankInput']))
            $xml->addChild('plank', $plank);
       if(!empty($_POST['shovelInput']))
            $xml->addChild('shovel', $shovel);
       if(!empty($_POST['tapeInput']))
            $xml->addChild('tape', $tape);
       if(!empty($_POST['vegetableInput']))
            $xml->addChild('vegetable', $vegetable);
       
       $root->asXML($xmlPath);

       //formatting xml 
       $xmlFile = $xmlPath;
if( !file_exists($xmlFile) ) die('Missing file: ' . $xmlFile);
else
{
  $dom = new DOMDocument('1.0');
  $dom->preserveWhiteSpace = false;
  $dom->formatOutput = true;
  $dl = @$dom->load($xmlFile); // remove error control operator (@) to print any error message generated while loading.
  if ( !$dl ) die('Error while parsing the document: ' . $xmlFile);
  echo $dom->save($xmlFile);
}
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
       <H1>SimCity Tracker</H1>

       <P title = "Brief Overview">SimCity Tracker will help you track what you need to manufacture in order to efficiently build your city</P> 
   </div>
    

    <nav>
    <ul class="nav nav-tabs">
        <li role="presentation"><a href="/index.htm">Home</a></li>
        <li role="presentation" class="active"><a href="#">SimCity</a></li>
        <li role="presentation"><a href="#">Profile</a></li>
    </ul>
    </nav>
    
    <section>
        
        <h3>House 1</h3>
        <form method="post" action="" role="form">

        <table id="house1">
            
            <tr id="brickHeader">
                <th>Bricks:</th>
                <th>Minerals (2)</th>
            </tr>
            <tr class="brickRow">
                <td><input type="text" id="brickInput" name="brickInput"></td>
                <td><input type="text" id="mineralInput" name="mineralInput"></td>  
                
            <tr id="chairHeader">
                <th>Chairs:</th>
                <th>Logs (2)</th>
                <th>Nail</th>
                <th>Hammer</th>

            </tr>
            <tr class="chairRow">
                <td><input type="text" id="chairInput" name="chairInput"></td>
                <td><input type="text" id="logInput" name="logInput"></td>
                <td><input type="text" id="nailInput" name="nailInput"></td>
                <td><input type="text" id="hammerInput" name="hammerInput"></td>
                
                
            <tr id="hammerHeader">
                <th>Hammer:</th>
                <th>I Beam</th>
                <th>Log</th>
            </tr>
            <tr class="hammerRow">
                
                <td><input type="text" id="hammerInput" name="hammerInput"></td>
                <td><input type="text" id="iBeamInput" name="iBeamInput"></td>
                <td><input type="text" id="logInput" name="logInput"></td>
            
            </tr>
                    <tr id="nailHeader">
                <th>Nail:</th>
                <th>I Beam (2)</th>
            </tr>
            <tr class="nailRow">
                <td><input type="text" id="nailInput" name="nailInput"></td>
                <td><input type="text" id="iBeamInput" name="iBeamInput"></td>
            </tr>
                        <tr id="plankHeader">
                <th>Planks:</th>
                <th>Logs (2)</th>

            </tr>
            <tr class="plankRow">
                <td><input type="text" id="plankInput" name="plankInput"></td>
                <td><input type="text" id="logInput" name="logInput"></td>
            <tr id="shovelHeader">
                <th>Shovels:</th>
                <th>I Beam</th>
                <th>Log</th>
                <th>Plastic</th>

            </tr>
            <tr class="shovelRow">
                <td><input type="text" id="shovelInput" name="shovelInput"></td>
                <td><input type="text" id="iBeamInput" name="iBeamInput"></td>
                <td><input type="text" id="logInput" name="logInput"></td>
                <td><input type="text" id="plasticInput" name="plasticInput"></td>
                
            <tr id="tapeHeader">
                <th>Tape:</th>
                <th>I Beam</th>
                <th>Plastic</th>

            </tr>
            <tr class="tapeRow">
                
                <td><input type="text" id="tapeInput" name="tapeInput"></td>
                <td><input type="text" id="iBeamInput" name="iBeamInput"></td>
                <td><input type="text" id="plasticInput" name="plasticInput"></td>
            
            </tr>
            
                
                
            <tr id="vegetableHeader">
                <th>Vegetables:</th>
                <th>Seeds</th>
            </tr>
            <tr class="vegetableRow">
                <td><input type="text" id="vegetableInput" name="vegetableInput"></td>
                <td><input type="text" id="seedInput" name="seedInput"></td>
    
    </table>
    
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Calculate</button>
         </div>
    </div>

    </form>
    
    </section>


    
</BODY>
</HTML>