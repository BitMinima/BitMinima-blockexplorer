<?php
include('config.php');
$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
$tx_id = $_GET['tx_id'];
$blk_id = $_GET['blk_id'];
$blk_idt = $_GET['blkc'];
if($blk_idt == ""){
}else{
$blk_id = $blk_idt;
}
if($blk_id == ""){
$tx_id = $_POST['blkinf'];
if(strlen($tx_id) >= 24){
$raw_tx = $client->getrawtransaction($tx_id);
$block_hash = $raw_tx["blockhash"];
$blk_info = $client->getblock($block_hash);
$go_height = $blk_info["height"];
header ("Location: info.php?blkc=$go_height");
exit();
}else{
header ("Location: info.php?blkc=$tx_id");
exit();
}
}else{
header ("Location: info.php?blkc=$blk_id");
exit();
}
?>
