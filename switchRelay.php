<?php
namespace Elminson\rasprelayphp;
require __DIR__ . 'vendor/autoload.php';

$rasprelayphp = new rasprelayphp();
$rasprelayphp->switchRelay($_GET['relay_id'],$_GET['status']);
