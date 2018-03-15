<?php
require("connect/connection.php");
include("connect/button.php");

global $conn;

if ($conn) {
    if (isset($_POST["save"])) {
        $username = $_POST["user"];
        $password = $_POST["password"];
        $group = $_POST["group"];

        $API->comm('/user/add', ['name' => $username, 'password' => $password, 'group' => $group]);

        if ($API) {
            echo "success";
        }
    }

    $API->write('/user/getall');
    $READ = $API->read(false);
    $ARRAY = $API->parseResponse($READ);
    ?>
    <hr/>
    <table border="1" width="100%">
        <thead>
        <tr>
            <th>No Id</th>
            <th>Name</th>
            <th>Group</th>
            <th>Disabled</th>
            <th>Comment</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($ARRAY as $value) { ?>
            <tr>
                <td><?= $value[".id"] ?></td>
                <td><?= $value["name"] ?></td>
                <td><?= $value["group"] ?></td>
                <td><?= $value["disabled"] ?></td>
                <td><?= isset($value["comment"]) ? $value["comment"] : "-" ?></td>
                <td>action</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <hr/>
    <form action="" method="post">
        <input name="user" value="" required>
        <input name="password" value="" required>
        <select name="group" required>
            <option value="">pilih group akses</option>
            <option value="full">Full</option>
            <option value="read">Read</option>
            <option value="write">Write</option>
        </select>
        <input type="submit" value="save" name="save">
    </form>
    <?php } ?>