<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR | E_PARSE);

require "compare.php";

$compare = new db_compare();

// uncomment and change if needed
// default is utf8mb4 COLLATE utf8mb4_unicode_ci
//$compare->setCharset("utf8mb4 COLLATE utf8mb4_unicode_ci");

$compare->compare();