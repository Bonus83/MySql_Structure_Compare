<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR | E_PARSE);

require "compare.php";

$compare = new db_compare();

$compare->compare();