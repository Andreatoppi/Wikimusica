<?php

require_once 'includes/autoload.inc.php';
require_once 'includes/config.inc.php';

$chome=USingleton::getInstance("CHome");
$chome->smista();
?>