<?php
/**
*   rpm.php
*
*   Automotive Toolbox
*
*   Calculate your rpm
*   based on vehicle speed,
*   final drive ratio, 1:1
*   trans gear, and tire size.
*   This checks to see if the engine
*   is going to be over revved at
*   a desired speed.
*/

require("../includes/functions.php");

    $result = NULL;
    
    // check for server request
if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       
       // assign POST variables
       $gr = $_POST["gr"];
       $tire = $_POST["tire"];
       $vs = $_POST["vs"];
       
        // error check for any null values
        if ($gr == NULL)
        {
            sorry("Please provide the AXLE gear ratio.");      
        }
        
        else if ($tire == NULL)
        {
            sorry("Please provide the tire size.");      
        }
        
        else if ($vs == NULL)
        {
            sorry("Please provide a vehicle speed.");      
        }
        
        else
        {
            // 336.13 is used to get the result rpm (63360 inches per mile / (60 min per hr * Pi))
            $result = ($gr * $vs * 1 * 336.13) / $tire;
        }
       
        // round the result to a whole integer
        echo round($result);          
    }    
?>	
