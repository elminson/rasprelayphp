<?php
namespace Elminson\rasprelayphp;
require __DIR__ . '/vendor/autoload.php';

$rasprelayphp = new rasprelayphp();
$command = "";
if(isset($_GET['command'])){
    $command= $_GET['command'];
}
switch ($command){
    case 'status':
        echo json_encode($rasprelayphp->getStatus());
    break;
    case 'switchRelay':
        echo $rasprelayphp->switchRelay($_GET['relay_id'], $_GET['status']);
    break;
}