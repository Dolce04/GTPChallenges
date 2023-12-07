<?php
session_start();
include_once("db.inc.php");
include_once("functions.php");

if (isset($_POST['archive-button'])) {

    //Set needed Post variables into regular variables to put into the function.
    $id = $_POST['archive-button'];
    archiveRecord($pdo, $id);
}