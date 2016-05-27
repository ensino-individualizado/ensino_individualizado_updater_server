<?php

require __DIR__ . '/Jacwright/RestServer/RestServer.php';
require 'Updater.php';

$server = new \Jacwright\RestServer\RestServer('debug');
$server->addClass('Updater');
$server->handle();
