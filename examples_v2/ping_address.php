<?php
require("connect/connection.php");

global $conn;

if (isset($_POST["submit"])) {
    if ($conn) {
        $API->write('/ping', false);
        $API->write('=address=' . $_POST["ip_address"], false);
        $API->write('=count=5');

        $READ = $API->read(false);
        $ARRAY = $API->parseResponse($READ); ?>

        <hr/>
        <h1>mengambil data Ping ip</h1>
        <table border="1" width="100%">
            <thead>
            <tr>
                <th>Host</th>
                <th>Size Or Status</th>
                <th>TTL</th>
                <th>Time</th>
                <th>Sent</th>
                <th>Received</th>
                <th>Packet-Lost</th>
                <th>Min-rtt</th>
                <th>Avg-rtt</th>
                <th>Max-rtt</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($ARRAY as $value) { ?>
                <tr>
                    <td><?= isset($value["host"]) ? $value["host"] : "ip gagal di ping" ?></td>
                    <td><?= isset($value["size"]) ? $value["size"] : (isset($value["status"]) ? "Status = " .  $value["status"] : "-") ?></td>
                    <td><?= isset($value["ttl"]) ? $value["ttl"] : "-" ?></td>
                    <td><?= isset($value["time"]) ? $value["time"] : "-" ?></td>
                    <td><?= isset($value["sent"]) ? $value["sent"] : "-" ?></td>
                    <td><?= isset($value["received"]) ? $value["received"] : "-" ?></td>
                    <td><?= isset($value["packet-loss"]) ? $value["packet-loss"] : "-" ?></td>
                    <td><?= isset($value["min-rtt"]) ? $value["min-rtt"] : "-" ?></td>
                    <td><?= isset($value["avg-rtt"]) ? $value["avg-rtt"] : "-" ?></td>
                    <td><?= isset($value["max-rtt"]) ? $value["max-rtt"] : "-" ?></td>
                </tr>
                <?php
            } ?>

            </tbody>
        </table>

        <?php $API->disconnect();
    }

} ?>

<form action="" method="post">
    <h2>input ip yang di ping</h2>
    <input type="text" name="ip_address">
    <input type="submit" name="submit" value="Send">
</form>
