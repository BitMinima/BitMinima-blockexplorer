<?php
include('../config.php');
$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
$network_info = $client->getinfo ();
$totalbc = $network_info["gettxoutsetinfo"];
echo $totalbc->total_amount;
return $totalbc->total_amount;
?>
