<?php
session_start();
header('Cache-control: private'); // IE 6 FIX
include('jsonRPCClient.php');
include('lib/Client.php');
error_reporting( E_ERROR );

$fullname = "BitMinima"; //Website Title
$short = "BMI"; //Coin Short
$v_blk = "20"; //How many blocks to display on the main page
$fee = "0.0001";
$net_sf = "GH/s"; //PH/s TH/s GH/s MH/s KH/s H/s
$blk_save = "on"; //save blk_info on off
$rpc_host = "localhost";
$rpc_port = "4332";
$rpc_user = "";
$rpc_pass = "";
?>





