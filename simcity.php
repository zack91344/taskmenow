<?php
    //for error output
    error_reporting(E_ALL);
    ini_set('display_errors', 1);      
          
    $hammer = 0;
    $tape = 0;
    $nail = 0;
    $plank = 0;
    $brick = 0;
    $chair = 0;
    $shovel = 0;
    $vegetable = 0;
    $iBeam = 0;
    $log = 0;
    $plastic = 0;
    $mineral = 0;
    $seed = 0;
    
    if($_POST){
       if($_POST['hammerInput'])
            $hammer = $_POST['hammerInput'];
       if($_POST['tapeInput'])
            $tape = $_POST['tapeInput'];
       if($_POST['nailInput'])
            $nail = $_POST['nailInput'];
       if($_POST['plankInput'])
            $plank = $_POST['plankInput'];
       if($_POST['brickInput'])
            $brick = $_POST['brickInput'];
       if($_POST['chairInput'])
            $chair = $_POST['chairInput'];
       if($_POST['shovelInput'])
            $shovel = $_POST['shovelInput'];
       if($_POST['vegetableInput'])
            $vegetable = $_POST['vegetableInput'];
       if($_POST['iBeamInput'])
            $iBeam = $_POST['iBeamInput'];
       if($_POST['logInput'])
            $log = $_POST['logInput'];
       if($_POST['plasticInput'])
            $plastic = $_POST['plasticInput'];
       if($_POST['mineralInput'])
            $mineral = $_POST['mineralInput'];
       if($_POST['seedInput'])
            $seed = $_POST['seedInput'];
       
       $root = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?><houses></houses>");
       //$buildReq = simplexml_load_file('SimCityBuilds.xml');
       
       $xmlPath = __DIR__. '/userData/UserSimCity.xml';

       //header('Content-type: text/xml');
       
       $xml = $root->addChild('house1');
       
       if(!empty($_POST['brickInput'])){
            $mineral += (2 * $brick);
       }
       if(!empty($_POST['chairInput'])){
            $log += (3 * $chair);
            $iBeam += (3 * $chair);
            $nail++;
            $hammer++;
       }
       if(!empty($_POST['hammerInput'])){
            $iBeam += $hammer;
            $log += $hammer;
       }
       if(!empty($_POST['nailInput'])){
            $iBeam += (2 * $nail);
       }
       if(!empty($_POST['plankInput'])){
            $log += (2 * $plank);
       }
       if(!empty($_POST['shovelInput'])){
            $iBeam += $shovel;
            $log += $shovel;
            $plastic += $shovel;
       }
       if(!empty($_POST['tapeInput'])){
            $iBeam += $tape;
            $plastic += $tape;
       }
       if(!empty($_POST['vegetableInput'])){
            $seed += (2 * $vegetable);
       }

       $xml->addChild('chair', $chair);
       $xml->addChild('hammer', $hammer);
       $xml->addChild('nail', $nail);
       $xml->addChild('plank', $plank);
       $xml->addChild('shovel', $shovel);
       $xml->addChild('tape', $tape);
       $xml->addChild('vegetable', $vegetable);
       $xml->addChild('brick', $brick);
       $xml->addChild('mineral', $mineral);
       $xml->addChild('log', $log);
       $xml->addChild('iBeam', $iBeam);
       $xml->addChild('plastic', $plastic);
       $xml->addChild('seed', $seed);

       $root->asXML($xmlPath);

       //formatting xml 
       /*
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
}*/
    }
    
    //calculate building requirements

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
        <li role="presentation"><a href="/index.php">Home</a></li>
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
                <td id="mineralOutput"></td>  
                
            <tr id="chairHeader">
                <th>Chairs:</th>
                <th>Logs (2)</th>

            </tr>
            <tr class="chairRow">
                <td><input type="text" id="chairInput" name="chairInput"></td>
                <td id="logOutput"></td>                
                
            <tr id="hammerHeader">
                <th>Hammer:</th>
                <th>I Beam</th>
            </tr>
            <tr class="hammerRow">
                
                <td><input type="text" id="hammerInput" name="hammerInput"></td>
                <td id="iBeamOutput"></td>
            
            </tr>
                <tr id="nailHeader">
                <th>Nail:</th>
            </tr>
            <tr class="nailRow">
                <td><input type="text" id="nailInput" name="nailInput"></td>
            </tr>
                <tr id="plankHeader">
                <th>Planks:</th>

            </tr>
            <tr class="plankRow">
                <td><input type="text" id="plankInput" name="plankInput"></td>

            <tr id="shovelHeader">
                <th>Shovels:</th>
                <th>Plastic</th>

            </tr>
            <tr class="shovelRow">
                <td><input type="text" id="shovelInput" name="shovelInput"></td>
                <td id="plasticOutput"></td>
                
            <tr id="tapeHeader">
                <th>Tapes:</th>
            </tr>
            <tr class="tapeRow">
                
                <td><input type="text" id="tapeInput" name="tapeInput"></td>
            
            </tr>
            
                
                
            <tr id="vegetableHeader">
                <th>Vegetables:</th>
                <th>Seeds</th>
            </tr>
            <tr class="vegetableRow">
                <td><input type="text" id="vegetableInput" name="vegetableInput"></td>
                <td id="seedOutput"></td>

            <tr id="iBeamHeader">
                <th>iBeams:</th>
            </tr>
            <tr class="vegetableRow">
                <td><input type="text" id="iBeamInput" name="iBeamInput"></td>

            <tr id="logHeader">
                <th>Log:</th>
            </tr>
            <tr class="logRow">
                <td><input type="text" id="logInput" name="logInput"></td>


            <tr id="plasticHeader">
                <th>Plastics:</th>
            </tr>
            <tr class="plasticRow">
                <td><input type="text" id="plasticInput" name="plasticInput"></td>

            <tr id="mineralHeader">
                <th>Minerals:</th>
            </tr>
            <tr class="mineralRow">
                <td><input type="text" id="mineralInput" name="mineralInput"></td>

            <tr id="seedHeader">
                <th>Seeds:</th>
            </tr>
            <tr class="seedlRow">
                <td><input type="text" id="seedInput" name="seedInput"></td>


    
    </table>
    

    <!--Getting values from server side to display to users-->
    <script lang="javascript">
        xmhttp = new XMLHttpRequest();
        xmhttp.open("GET", "/userData/UserSimCity.xml", false);
        xmhttp.send();
        xmlDoc = xmhttp.responseXML;
        var houses = xmlDoc.documentElement.childNodes;
        var materials; // = houses.childNodes;
        var output; // = document.getElementById("mineralOutput");

        //getElementsByTagName("chair")[0].childNodes[0].nodeValue;

        for (i = 0; i < houses.length; i++) {
            for (j = 0; j < houses[i].childNodes.length; j++) {
                if (houses[i].childNodes[j].nodeName == "mineral") {
                    output = document.getElementById("mineralOutput");
                    output.innerHTML = houses[i].childNodes[j].childNodes[0].nodeValue;
                }
                if (houses[i].childNodes[j].nodeName == "chair") {
                    //output = document.getElementById("chairOutput");
                    document.write("Chair: " + houses[i].childNodes[j].childNodes[0].nodeValue + "<br>");
                    //output.innerHTML = houses[i].childNodes[j].childNodes[0].nodeValue;
                    //echo "hello";
                }
                if (houses[i].childNodes[j].nodeName == "iBeam") {
                    output = document.getElementById("iBeamOutput");
                    output.innerHTML = houses[i].childNodes[j].childNodes[0].nodeValue;
                }
                if (houses[i].childNodes[j].nodeName == "hammer") {
                    //output = document.getElementById("mineralOutput");
                    //output.innerHTML = houses[i].childNodes[j].childNodes[0].nodeValue;
                    document.write("Hammer: " + houses[i].childNodes[j].childNodes[0].nodeValue + "<br>");
                }
                if (houses[i].childNodes[j].nodeName == "tape") {
                    //output = document.getElementById("mineralOutput");
                    //output.innerHTML = houses[i].childNodes[j].childNodes[0].nodeValue;
                    document.write("Tape: " + houses[i].childNodes[j].childNodes[0].nodeValue + "<br>");
                }
                if (houses[i].childNodes[j].nodeName == "nail") {
                    //output = document.getElementById("mineralOutput");
                    //output.innerHTML = houses[i].childNodes[j].childNodes[0].nodeValue;
                    document.write("Nail: " + houses[i].childNodes[j].childNodes[0].nodeValue + "<br>");
                }
                if (houses[i].childNodes[j].nodeName == "plank") {
                    //output = document.getElementById("mineralOutput");
                    //output.innerHTML = houses[i].childNodes[j].childNodes[0].nodeValue;
                    document.write("Plank: " + houses[i].childNodes[j].childNodes[0].nodeValue + "<br>");
                }
                if (houses[i].childNodes[j].nodeName == "brick") {
                    //output = document.getElementById("mineralOutput");
                    //output.innerHTML = houses[i].childNodes[j].childNodes[0].nodeValue;
                    document.write("Brick: " + houses[i].childNodes[j].childNodes[0].nodeValue + "<br>");
                }
                if (houses[i].childNodes[j].nodeName == "shovel") {
                    //output = document.getElementById("mineralOutput");
                    //output.innerHTML = houses[i].childNodes[j].childNodes[0].nodeValue;
                    document.write("Shovel: " + houses[i].childNodes[j].childNodes[0].nodeValue + "<br>");
                }
                if (houses[i].childNodes[j].nodeName == "vegetable") {
                    //output = document.getElementById("mineralOutput");
                    //output.innerHTML = houses[i].childNodes[j].childNodes[0].nodeValue;
                    document.write("Vegetable: " + houses[i].childNodes[j].childNodes[0].nodeValue + "<br>");

                }
                if (houses[i].childNodes[j].nodeName == "log") {
                    output = document.getElementById("logOutput");
                    output.innerHTML = houses[i].childNodes[j].childNodes[0].nodeValue;
                }
                if (houses[i].childNodes[j].nodeName == "plastic") {
                    output = document.getElementById("plasticOutput");
                    output.innerHTML = houses[i].childNodes[j].childNodes[0].nodeValue;
                }
                if (houses[i].childNodes[j].nodeName == "seed") {
                    output = document.getElementById("seedOutput");
                    output.innerHTML = houses[i].childNodes[j].childNodes[0].nodeValue;
                }
            }
        }

    </script>


    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Calculate</button>
         </div>
    </div>

    </form>
    
    </section>


    
</BODY>
</HTML>