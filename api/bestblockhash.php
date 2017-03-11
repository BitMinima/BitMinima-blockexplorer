<?php
include('../config.php');
$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
$network_info = $client->getinfo ();
$block_index = $network_info["blocks"];
$bestblockhash = $client->getblockhash($block_index);
echo $bestblockhash;
return $bestblockhash;
?>