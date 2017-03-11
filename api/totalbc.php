<?php
include('../config.php');
$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
$network_info = $client->getinfo ();
$totalbc = $network_info["moneysupply"];
echo $totalbc;
return $totalbc;
?>
