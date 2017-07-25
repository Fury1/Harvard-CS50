<div class="table-container">
    <h1>Your Stock Quote</h1>
        <table>
        <thead>
            <tr>
                <th><b>Price</b></th>
                <th><b>Name</b></th>
                <th><b>Symbol</b></th>
                <th><b>BUY NOW!</b></th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php print( $stock["name"]);?></td>
            <td><?php print(strtoupper($stock["symbol"]));?></td>
	        <td><?php print(number_format($stock["price"], 2, '.', ''));?></td>
	        <td>
            <form action="buy.php" method="post">
                <fieldset>
                    <div>
                        <button type="submit" class="btn">Buy!</button>
                        <input type="number" name="shares" value="number" placeholder="Number of Shares"/>
                        <input type="hidden" name="symbol" value="<?php echo $stock['symbol'];?>"/>
                        <input type="hidden" name="value" value="<?php echo $stock['price'];?>"/>
                        <input type="hidden" name="email" value="<?php echo $user[0]['email'];?>"/>
                    </div>
                </fieldset>
            </form></td>
	     </tr>
	     </tbody>
	     </table>
</div>
<div>
    <a href="logout.php">Log Out</a>
</div>
