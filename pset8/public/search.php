<?php

    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of places
    $places = [];

    if (($_GET["geo"]) !== NULL)
    {
        // get the search into a usable format
        $search = preg_split("/[\s,]+/", $_GET["geo"]);

        // count the search array
        $search_count = count($search);

        // remove "US" if present from search to simplify
        for ($i = 0; $i < $search_count; $i++)
        {
            $search[$i] = strtolower($search[$i]);

            if (($key = array_search("us",$search)) !== FALSE)
            {
                unset($search[$key]);
                $search_count = count($search);
            }
        }

        // start a query to build upon
        $sql = "SELECT * FROM places WHERE MATCH";

        // loop through and make a dynamic sql query
        for ($i = 0; $i < $search_count; $i++)
        {
            if (is_numeric($search[$i]))
            {
                $sql .= "(postal_code) AGAINST ('$search[$i]*' IN BOOLEAN MODE)";
            }

            if (mb_strlen($search[$i]) === 3)
            {
                $sql .= "(admin_code1) AGAINST ('$search[$i]*' IN BOOLEAN MODE)";
            }

            else if (ctype_alpha($search[$i]) === TRUE)
            {
                $sql .= "(place_name, admin_name1) AGAINST ('$search[$i]*' IN BOOLEAN MODE)";
            }

            if ($i < $search_count - 1)
            {
                $sql .= " AND MATCH ";
            }
         }
    }

    $places = query($sql);

    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));

?>
