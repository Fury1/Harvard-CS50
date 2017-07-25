<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check for blank entry
        if ($_POST["password"] == NULL || $_POST["confirmation"] == NULL)
        {
            apologize("Please enter your password in both fields.");
        }

        // check to see if passwords match
        else if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Your passwords did not match.");
        }

        // make sure user entered a username
        else if ($_POST["username"] == NULL)
        {
            apologize("You didn't enter a username.");
        }

        //make sure user entered a email
        else if ($_POST["email"] == NULL)
        {
            apologize("Please enter a email address.");
        }

        else
        {
            $result = query("INSERT INTO users (username, email, hash, cash) VALUES(?, ?, ?, 10000.00)", $_POST["username"], $_POST["email"], crypt($_POST["password"]));

            // check to see if the username or email has been used already
            if ($result === false)
            {
                apologize("That username/email already exists, please try again.");
            }

            else
            {
                // start a session and log in
                $rows = query("SELECT LAST_INSERT_ID() AS id");
                $id = $rows[0]["id"];
                $_SESSION["id"] = $id;
                redirect("/");
            }
        }
    }
?>
