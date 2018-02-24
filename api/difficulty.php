<?php
include('../config.php');
$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
$net_diff = $client->getdifficulty();
$diff = $net_diff["proof-of-work"];
echo $diff;
return $diff;
?>