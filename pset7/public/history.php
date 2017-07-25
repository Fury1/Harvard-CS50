<?php

    // configuration
    require("../includes/config.php");

	// get user history from table
    $history = query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);

    // render history
    render("user_history.php", ["title" => "History", "history" => $history]);

?>

