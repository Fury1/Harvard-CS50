<div>
    <table class="table-container">
        <thead>
            <tr>
                <th><b>Transaction Type</b></th>
                <th><b>Symbol</b></th>
                <th><b>Shares</b></th>
                <th><b>Price</b></th>
                <th><b>Time</b></th>
            </tr>
        </thead>
        <tbody>

            <!-- display the history by row -->
            <?php foreach ($history as $row): ?>
                <tr>
                <td><?php echo $row["transaction"];?></td>
                <td><?php echo strtoupper($row["symbol"]);?></td>
                <td><?php echo $row["shares"];?></td>
                <td><?php echo number_format($row["price"], 2, '.', '');?></td>
                <td><?php echo $row["time"];?></td>
                </tr>
            <?php endforeach;?>

        </tbody>
    </table>
</div>
