<?php
    session_start(); // turn on sessions

    require_once('credentials.php');
    require_once('query.php');
    $db = db_connect();
  ?>