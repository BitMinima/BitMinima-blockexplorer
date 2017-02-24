<?php
session_start();
header('Cache-control: private'); // IE 6 FIX
include('jsonRPCClient.php');
include('lib/Client.php');
error_reporting( E_ERROR );

$fullname = "ReddByteCoin"; //Website Title
$short = "RBC"; //Coin Short
$v_blk = "20";
$fee = "0.0001";
$net_sf = "GH/s"; //PH/s TH/s GH/s MH/s KH/s H/s
$rpc_host = "localhost";
$rpc_port = "";
$rpc_user = "";
$rpc_pass = "";
?>
