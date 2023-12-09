<?php
$configFiles = glob('configs/*.php');
if ($configFiles) {
    foreach ($configFiles as $configFile) {
        require_once $configFile;
    }
}
