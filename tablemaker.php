<?php 
                //for error output
                error_reporting(E_ALL);
                ini_set('display_errors', 1); 

                require_once (__DIR__.'/methods/getshows.php');
                $items = getEpisodesByWeek();
                //echo "<tr>";
                foreach($items as $item){ 
                    $dayOfWeek = date('w', strtotime($item[7]));
                    echo "<tr>";
                                
                    if($dayOfWeek == 0){
                        echo "<td>".$item[2] ." ".$item[9]."</td>";
                    }
                    if($dayOfWeek == 1){
                        echo "<td></td><td>".$item[2] ." ".$item[9]."</td>";
                    }
                    if($dayOfWeek == 2){
                        echo "<td></td><td></td><td>".$item[2] ." ".$item[9]."</td>";
                    }
                    if($dayOfWeek == 3){
                        echo "<td></td><td></td><td></td><td>".$item[2] ." ".$item[9]."</td>";
                    }
                    if($dayOfWeek == 4){
                        echo "<td></td><td></td><td></td><td></td><td>".$item[2] ." ".$item[9]."</td>";
                    }
                    if($dayOfWeek == 5){
                        echo "<td></td><td></td><td></td><td></td><td><td></td><td>".$item[2] ." ".$item[9]."</td>";
                    }
                    if($dayOfWeek == 6){
                        echo "<td></td><td></td><td></td><td></td><td><td></td><td><td></td><td>".$item[2] ." ".$item[9]."</td>";
                    }
                   echo "</tr>";                 
                    /*echo "  <tr>
                            <td>".$item[2]." ".$item[9]."</td>
                            <td>".$item[7]." ".$item[4]."</td>
                            <td>".$item[1]." ".$item[4]."</td>
                            <td>".$item[1]." ".$item[4]."</td>
                            <td>".$item[1]." ".$item[4]."</td>
                            <td>".$item[1]." ".$item[4]."</td>
                            <td>".$item[1]." ".$item[4]."</td>;
                            </tr>";*/
                           
                }
                
            ?>