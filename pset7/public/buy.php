<?php

    // configuration
    require("../includes/config.php");
    require_once("libphp-phpmailer/class.phpmailer.php");

    // set up a stock variable to be defined
    $stock = NULL;

    // if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // lookup stock
        $stock = lookup($_POST["symbol"]);

            if ($stock === false)
            {
                apologize("Sorry, there was an error with your request.");
            }

            else
            {

                // check for a positive int
                if (preg_match("/^\d+$/", $_POST["shares"]) == true)
                {

                    // check to see if the user has the available cash
                    $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
                    $price = $_POST["shares"] * $_POST["value"];

                    if ($cash[0]["cash"] < $price)
                    {
                        apologize("You dont have enough money to purchase those shares.");
                    }

                    else
                    {

                        // add the stock to portfolio
                        $buy = query("INSERT INTO portfolios (id, symbol, shares) VALUES(?, ?, ?)
                               ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)",
                               $_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["shares"]);


                        if ($buy === false)
                        {
                            apologize("Sorry, there was an error with your request.");
                        }

                        else
                        {

                        // update user cash
                        $value = $_POST["shares"] * number_format($_POST["value"], 2, '.','');

                        query("UPDATE users SET cash = cash - ? WHERE id = ?", $value, $_SESSION["id"]);

                        // make a history entry
                        query("INSERT INTO history (id, transaction, symbol, shares, price) VALUES (?, 'BUY', ?, ?, ?)",
                        $_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["shares"], $_POST["value"]);

                        /* email the receipt, phpmailer source
                        http://cs50.stackexchange.com/questions/11101/how-do-i-send-an-email-with-php/11106#11106 */
                        $msg = "Here is a receipt for your last transaction at C$50 Finance:\n\n
                                BOUGHT " . strtoupper($_POST["symbol"]) . " " . $_POST["shares"] . " share(s) @ " . $_POST["value"];

                        // instantiate mailer
                        $mail = new PHPMailer();
                        $mail->IsSMTP();
                        $mail->SMTPAuth = true;
                        $mail->SMTPSecure = "tls";
                        $mail->Host = "smtp.gmail.com";
                        $mail->Port = 587;
                        $mail->Username = "mycs50finance@gmail.com";
                        $mail->Password = "asdfqwer1234";
                        $mail->setFrom("myGmailAddress@gmail.com");
                        $mail->AddAddress($_POST["email"]);
                        $mail->Subject = "Your Recent Transaction";
                        $mail->Body = $msg;

                        if ($mail->Send() == false)
                        {
                            die($mail->ErrInfo);
                        }

                        else
                        {
                            echo "Success!\n";
                        }

                        redirect("/");
                        }
                    }
                }

                else
                {
                    apologize("Please enter a non negative value.");
                }
            }
    }
?>
