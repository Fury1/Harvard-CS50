<?php
/**
*   gearratio.php
*
*   Automotive Toolbox
*
*   Calculate the new gear ratio
*   needed when installing different
*   size tires if vehicle re-programing
*   is not desired.
*
*/

require("../includes/functions.php");

    $result = NULL;
    
    // make a preset array of gear ratios
    $gearratios = array(2.73, 3.08, 3.31, 3.42, 3.55, 3.73, 3.90, 4.11, 
                   4.30, 4.56, 4.88, 5.13, 5.38);
    
    // check server request
if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       
       // assign POST variables
       $oetire = $_POST["oetire"];
       $ntire = $_POST["ntire"];
       $gr = $_POST["gr"];
       
        // error check for null values           
        if ($oetire == NULL)
        {
            sorry("Please provide the OE tire size.");      
        }
        
        else if ($ntire == NULL)
        {
            sorry("Please provide the NEW tire size.");      
        }
        
        else if ($gr == NULL)
        {
            sorry("Please provide the ORIGINAL gear ratio.");      
        }
        
        else
        {
            $result = ($ntire / $oetire) * $gr;
        }
        
        // call special rounding function to get closest available gear ratio to return
        echo getClosest($result, $gearratios);          
    }

//http://stackoverflow.com/questions/5464919/php-nearest-value-from-an-array    
function getClosest($search, $arr) 
{    
    $closest = null;
    
    foreach ($arr as $item) 
    {
        if ($closest === null || abs($search - $closest) > abs($item - $search)) 
        {
            $closest = $item;
        }
    }
    return $closest;
}
?>	
