<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("quote_form.php", ["title" => "Quote"]);
    }

    // if a user checks for a symbol
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
          // check to see if a value was entered
        if ($_POST["symbol"] == NULL)
        {
            apologize("Please enter a symbol to look up.");
        }

            else
            {
                // lookup stock price
                $stock = lookup($_POST["symbol"]);
                $user = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);

                // check to see if stock exists
                if ($stock === false)
                {
                    apologize("Sorry, we could not find that symbol.");
                }

                else
                {
                    // else render form
                    render("quote_results.php", ["title" => "Your Stock Quote", "stock" => $stock, "user" => $user]);
                }
            }
    }
?>
