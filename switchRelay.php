<?php
namespace Elminson\rasprelayphp;

$rasprelayphp = new rasprelayphp();
$rasprelayphp->switchRelay($_GET['relay_id'],$_GET['status']);
