<!DOCTYPE html>

<html>

    <head>

        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>
        <link href="/css/custom.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>C$50 Finance: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Finance</title>
        <?php endif ?>

        <script src="/js/jquery-1.11.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/scripts.js"></script>

    </head>

    <body>

       <?php if (isset($_SESSION["id"])): ?>

           <?php echo $name[] = NULL;

            $name = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);?>

       <?php endif ?>

        <div class="container">

            <div id="top">


                        <?php if (isset($_SESSION["id"])): ?>
                        <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="/">C$50 Finance</a>
                        </div>
                          <div class="nav pull-right">
                            <a class="navbar-brand" href="/">Welcome, <?php echo  $name[0]["username"];?></a>
                            <a class="navbar-brand" href="logout.php"><strong>Log Out</strong></a>
                          </div>
                            <div>
                                <ul class="nav navbar-nav">
                                    <li><a href= "/">Portfolio/Sell</a></li>
                                    <li><a href= "quote.php">Quote/Buy</a></li>
                                    <li><a href= "history.php">History</a></li>

                            <!-- show users cash-->
                            <li class="line a:hover "><a>CASH: $<?php echo number_format($name[0]["cash"], 2, '.', '');?></a></li>
                                </ul>
                                   </div>
                    </div>
                </nav>
                        <?php endif ?>


                <a href="/"><img alt="C$50 Finance" src="/img/logo.gif"/></a>
            </div>

            <div id="middle">

