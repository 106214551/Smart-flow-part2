<?php
/* settings.php | Database settings used by EVERY page that talks to MySQL.
   Use it at the top of a page like this:
       require_once "settings.php";
       $conn = mysqli_connect($host, $user, $pwd, $sql_db);
   The brief says: do NOT set a password. */
$host   = "localhost";   // XAMPP runs MySQL on this computer
$user   = "root";        // XAMPP's default user
$pwd    = "";            // no password (required by the brief)
$sql_db = "smartflow";   // the database name everyone creates in phpMyAdmin
?>
