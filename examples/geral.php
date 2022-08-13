<?php

date_default_timezone_set('America/Sao_Paulo');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . "/../vendor/autoload.php";

$item = new LI\Cliente();

$item->setApiKey('')
    ->setAppKey('');

$items = $item->listarTodas();

\LI\Helper\LIHelper::dump($items);