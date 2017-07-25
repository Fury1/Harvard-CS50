<?php
/**
*   mphcorrect.php
*
*   Automotive Toolbox
*
*   Calculate your actual
*   speed when installing
*   larger tires without
*   re-gearing. Provides
*   vehicle programming
*   correction parameters.
*/

require("../includes/functions.php");

    $result = NULL;
    
// make sure request is POST
if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       
       // assign POST variables
       $oetire = $_POST["oetire"];
       $ntire = $_POST["ntire"];
       $mph = $_POST["mph"];
       
        // error check for any null values
        if ($oetire == NULL)
        {
            sorry("Please provide the OE tire size.");      
        }
        
        else if ($ntire == NULL)
        {
            sorry("Please provide the NEW tire size.");      
        }
        
        else if ($mph == NULL)
        {
            sorry("Please provide a vehicle speed.");      
        }
        
        else
        {
            $result = ($ntire / $oetire) * $mph;
        }
        
        // echo the number back to the jquery out 5 decimal places
        echo number_format($result, '5', '.', '');          
    }
    
?>	
