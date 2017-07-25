<div class= "table-container">
    <table class="table-container">
        <thead>
            <tr>
                <th><b>SELL NOW!</b></th>
                <th><b>Stock</b></th>
                <th><b>Shares</b></th>
                <th><b>Price</b></th>
                <th><b>Current Value</b></th>
            </tr>
        </thead>
       <tbody>

        <!--loop through the users portfolio and display, give option to sell-->
        <?php foreach ($positions as $position): ?>

            <tr><td>
                <form action="sell.php" method="post">
                    <fieldset>
                        <div>
                            <input type="hidden" name="symbol" value="<?php echo $position['symbol'];?>"/>
                            <input type="hidden" name="value" value="<?php echo $position['cash_value'];?>"/>
                            <input type="hidden" name="price" value="<?php echo $position['price'];?>"/>
                            <input type="hidden" name="shares" value="<?php echo $position['shares'];?>"/>
                            <input type="hidden" name="email" value="<?php echo $user[0]['email'];?>"/>
                            <button type="submit" class="btn">Sell!</button>
                        </div>
                    </fieldset>
                </form></td>

                <td><?php echo $position["symbol"];?></td>
                <td><?php echo $position["shares"];?></td>
                <td><?php echo number_format($position["price"], 2, '.', '');?></td>
                <td>$<?php echo number_format($position["cash_value"], 2, '.', '');?></td></tr>

        <?php endforeach;?>
         </tbody>
    </table>
</div>
