<?php
include_once("db.inc.php");
include_once("functions.php");

$resultSet = receiveIdQuery($pdo,$_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_detail.css">
    <title>GPTchallenge</title>
</head>
<body>
   <div class="container">
    <!-- Sidebar -->
        <div class="sidebar">
            <p>Admin Dashboard</p>
            <input type="text" class="input" placeholder="         Quick Search...">
            <a class="anchor-button" id="overview-button" href="dashboard.php"><img class="box-icon" src="img/layout-regular-24.png">Overview</a>
            <a class="anchor-button" href="#"><img class="box-icon" src="img/setting-regular-24.png">Settings</a>
        </div>

    <!-- Main content --> 
        <div class="main-content">
            <!-- Header section -->
            <p>Customer message</p>
            <p class="createDate">Created: <?php if (!empty($resultSet)) { echo htmlspecialchars($resultSet['gemaakt_op']);}?></p>
            <div class="top-content">
                <!-- Toolbar section, content like search, filters, etc. -->

                <table class="content-table">
                <?php
                    if (!empty($resultSet)) {
                                ?>
                                <tr class="main-table-row">
                                    <td class="bericht-container"><?=htmlspecialchars($resultSet['bericht']) ?></td>
                                </tr>
                                <?php 
                        } 
                ?>
                </table>
            </div>
            <!-- Table Section -->
            <div class="bottom-content">
                <!-- Table headers -->
                        <textarea name="" id="" cols="" rows="" placeholder="Leave a note here: "></textarea>
                        <form action="dashboard_code.php" method="POST">
                            <button type="submit">></button>
                        </form>
            </div>
        </div>
        <div class="cust-content">
            <div class="weokfw">
                <p>Customer information</p>
                <div class="cust-info">
                <?php
                        if (!empty($resultSet)) {
                                ?>
                                <table class="row">
                                    <tr>
                                        <th>MsgID: </th>
                                        <td id="msgId"><?=htmlspecialchars($resultSet['id']); ?></td>
                                    </tr>
                                </table>
                                <table class="row">
                                    <tr>
                                        <th>Naam: </th>
                                        <td><?=htmlspecialchars($resultSet['naam']); ?></td>
                                    </tr>
                                </table>
                                <table class="row">
                                    <tr>
                                        <th>E-mail: </th>
                                        <td><?=htmlspecialchars($resultSet['email']); ?></td>
                                    </tr>
                                </table>
                                <table class="row">
                                    <tr>
                                        <th>Soort: </th>
                                        <td><?=htmlspecialchars(ucfirst($resultSet['berichtType'])); ?></td>
                                    </tr>
                                </table>
                                <table class="row">
                                    <tr>
                                        <th>Prio: </th>
                                        <td><?=htmlspecialchars(ucfirst($resultSet['prio'])); ?></td>
                                    </tr>
                                </table>
                                <table class="row">
                                    <tr>
                                        <th>Contactvoorkeur: </th>
                                        <td><?=htmlspecialchars(ucfirst($resultSet['contactvoorkeur'])); ?></td>
                                    </tr>
                                </table>
                                <?php 
                            } 
                        ?>
                </div>
                    <div class="cust-note-read">
                        <p>Customer notes </p>
                    <pre><?=htmlspecialchars($resultSet['bericht']);?></pre>
                </div>
            </div>
            <div class="cust-note-create">
            <p>New customer note </p>
                <textarea name="" id="" cols="" rows=""></textarea>
            </div>
        </div>
   </div>
</body>
</html>