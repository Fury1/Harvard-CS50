<?php

/**
* functions.php
*
* Automotive Toolbox
*
* Special Functions
*/
    // sorry message for errors
    function sorry($message)
    {
        display("error.php", ["message" => $message]);
        exit;
    }
    
    // display only the template page with values
    function display($template, $values = [])
    {
        // if template exists, render it
        if (file_exists("../templates/$template"))
        {
            // extract variables into local scope
            extract($values);

            // render template
            require("../templates/$template");
            
        }
        
        // else err
        else
        {
            trigger_error("Invalid template: $template", E_USER_ERROR);
        }
    }
    
    function render($template, $values = [])
    {
        // if template exists, render it
        if (file_exists("../templates/$template"))
        {
            // extract variables into local scope
            extract($values);

            // render header
            require("../templates/header.php");

            // render template
            require("../templates/$template");

            // render footer
            require("../templates/footer.php");
        }

        // else err
        else
        {
            trigger_error("Invalid template: $template", E_USER_ERROR);
        }
    }
?>
