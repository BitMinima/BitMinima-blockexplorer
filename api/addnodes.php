<?php
include('../config.php');
$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
$getPeerInfo = $client->getpeerinfo();
foreach ($getPeerInfo as $key => $peer_info) {
$peer_addr = $peer_info['addr'];
if(strlen($peer_addr) > 26){
}else{
echo "addnode=$peer_addr";
echo "<br/> \n";
}
}
return $peer_addr;
?>