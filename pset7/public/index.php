<?php

    // configuration
    require("../includes/config.php");

    $positions = [];

    $rows = query("SELECT * FROM portfolios WHERE id = ?", $_SESSION["id"]);
    $user = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);

    if ($rows !== false)
    {
        // define positions
        foreach ($rows as $row)
        {
            $stock = lookup($row["symbol"]);
            if ($stock !== false)
            {
                $positions[] = [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"],
                "cash_value" => $row["shares"] * number_format($stock["price"], 2, '.', '')];
            }
        }

        // check to see if they own any stock
        if ($positions == NULL)
        {
            apologize("You dont own any shares.");
        }

    // render portfolio
    render("portfolio.php", ["title" => "Portfolio", "positions" => $positions, "user" => $user]);
    }
?>
