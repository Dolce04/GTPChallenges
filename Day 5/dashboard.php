<?php
include_once("db.inc.php");
include_once("functions.php");

$resultSet = retrieveMsg($pdo,[]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_admin.css">
    <title>GPTchallenge</title>
</head>
<body>
   <div class="container">
    <!-- Sidebar -->
        <div class="sidebar">
            <p>Admin Dashboard</p>
            <input type="text" class="input" placeholder="         Quick Search...">
            <a class="anchor-button" href="#"><img class="box-icon" src="img/layout-regular-24.png">Overview</a>
            <a class="anchor-button" href="#"><img class="box-icon" src="img/setting-regular-24.png">Settings</a>
        </div>

    <!-- Main content -->
        <div class="main-content">
            <!-- Header section -->
            <div class="toolbar">
            <!-- Toolbar section, content like search, filters, etc. -->

            </div>

            <!-- Table Section -->
            <div class="table-container">
                <!-- Table headers -->
                <div class="table-header-container">
                    <!-- Headers items like "Name", "Customer ID". etc. -->
                    <table class="table-header">
                        <tr class="table-header-row">
                            <th class="table-header-row-head">Msg ID</th>
                            <th class="table-header-row-head">Name</th>
                            <th class="table-header-row-head">Email</th>
                            <th class="table-header-row-head">Type</th>
                            <th class="table-header-row-head">Prio</th>
                            <th class="table-header-row-head">ContactType</th>
                            <th class="table-header-row-head">Bericht</th>
                        </tr>
                        <!-- Table Rows -->
                        <?php
                        if (!empty($resultSet)) {
                            foreach ($resultSet as $index => $row){
                                ?>
                                <tr class="main-table-row">
                                    <td class="table-row-data"><?=htmlspecialchars($row['id']); ?></td>
                                    <td class="table-row-data"><?=htmlspecialchars($row['naam']) ?></td>
                                    <td class="table-row-data"><?=htmlspecialchars($row['email']) ?></td>
                                    <td class="table-row-data"><?=htmlspecialchars($row['berichtType']) ?></td>
                                    <td class="table-row-data"><?=htmlspecialchars($row['prio']) ?></td>
                                    <td class="table-row-data"><?=htmlspecialchars($row['contactvoorkeur']) ?></td>
                                    <td class="table-row-data"><?=htmlspecialchars($row['bericht']) ?></td>
                                </tr>
                                <?php 
                            } 
                        }  else { 
                            ?>
                            <tr>
                                <td colspan="7">No results found</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
   </div>
</body>
</html>