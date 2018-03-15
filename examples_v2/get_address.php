<?php
require("connect/connection.php");

include("connect/button.php");

global $conn;

if ($conn) {
    $API->write('/ip/address/print');

    $READ = $API->read(false);
    $ARRAY = $API->parseResponse($READ); ?>

    <hr/>
    <h1>mengambil data alamat ip</h1>
    <table border="1" width="100%">
        <thead>
        <tr>
            <th>No Id</th>
            <th>Address</th>
            <th>Network</th>
            <th>Interface</th>
            <th>Actual-Interface</th>
            <th>Invalid</th>
            <th>Dynamic</th>
            <th>Disabled</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($ARRAY as $value) { ?>

            <tr>
                <td><?= $value[".id"] ?></td>
                <td><?= $value["address"] ?></td>
                <td><?= $value["network"] ?></td>
                <td><?= $value["interface"] ?></td>
                <td><?= $value["actual-interface"] ?></td>
                <td><?= $value["invalid"] ?></td>
                <td><?= $value["dynamic"] ?></td>
                <td><?= $value["disabled"] ?></td>
            </tr>
            <?php
        } ?>

        </tbody>
    </table>

    <?php $API->disconnect();
}